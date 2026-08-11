<?php
/**
 * Plugin Name: Rezerwacje iCal (Booking.com sync)
 * Description: Prosty system rezerwacji z dwukierunkową synchronizacją kalendarza przez iCal — import zajętości z Booking.com (cron co godzinę) i eksport własnych rezerwacji jako feed .ics do wpięcia w Booking.com. Ustawienia: menu „Rezerwacje” → „Ustawienia synchronizacji”.
 * Version: 1.0.0
 * Author: Studio
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/* ===== CPT: rezerwacja (draft = oczekująca, publish = potwierdzona) ===== */
add_action( 'init', function () {
	register_post_type( 'rezerwacja', array(
		'labels' => array(
			'name' => 'Rezerwacje', 'singular_name' => 'Rezerwacja',
			'add_new_item' => 'Dodaj rezerwację', 'edit_item' => 'Edytuj rezerwację',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array( 'title' ),
	) );
	if ( ! wp_next_scheduled( 'rez_ical_sync' ) ) {
		wp_schedule_event( time() + 60, 'hourly', 'rez_ical_sync' );
	}
	if ( ! get_option( 'rez_ics_key' ) ) {
		add_option( 'rez_ics_key', wp_generate_password( 20, false ) );
	}
} );

/* ===== Ustawienia (SCF/ACF options page) ===== */
add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_options_page' ) ) { return; }
	acf_add_options_page( array(
		'page_title' => 'Ustawienia synchronizacji (Booking.com)',
		'menu_title' => 'Ustawienia synchronizacji',
		'menu_slug'  => 'rez-sync',
		'parent_slug'=> 'edit.php?post_type=rezerwacja',
		'capability' => 'edit_pages',
	) );
	acf_add_local_field_group( array(
		'key' => 'group_rez_sync', 'title' => 'Synchronizacja kalendarza',
		'fields' => array(
			array( 'key' => 'field_rez_import', 'name' => 'rez_import_urls', 'label' => 'Adresy iCal do IMPORTU (np. z Booking.com)',
				'type' => 'textarea', 'rows' => 3,
				'instructions' => 'Jeden adres na linię. W Booking.com: Kalendarz → Synchronizacja kalendarzy → „Eksportuj kalendarz” — wklej tutaj otrzymany link .ics. Zajętość z tych kalendarzy blokuje terminy na stronie (odświeżanie co godzinę).' ),
			array( 'key' => 'field_rez_mail', 'name' => 'rez_mail_to', 'label' => 'E-mail powiadomień o nowych rezerwacjach',
				'type' => 'email', 'instructions' => 'Pusty = e-mail administratora.' ),
			array( 'key' => 'field_rez_export_info', 'name' => 'rez_export_info', 'label' => 'Adres iCal do EKSPORTU (wklej w Booking.com)',
				'type' => 'message', 'message' => '' ),
		),
		'location' => array( array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'rez-sync' ) ) ),
	) );
} );

/* Pokaż link eksportu w polu message (dynamicznie). */
add_filter( 'acf/load_field/key=field_rez_export_info', function ( $field ) {
	$url = home_url( '/?rez_ics=' . rawurlencode( get_option( 'rez_ics_key' ) ) );
	$field['message'] = '<code>' . esc_html( $url ) . '</code><br>W Booking.com: Kalendarz → Synchronizacja kalendarzy → „Importuj kalendarz” — wklej ten adres. Feed zawiera tylko zakresy dat (bez danych gości). Ostatnia synchronizacja importu: <strong>'
		. esc_html( get_option( 'rez_last_sync', 'jeszcze nie było' ) ) . '</strong>';
	return $field;
} );

/* ===== Import iCal (cron) ===== */
add_action( 'rez_ical_sync', 'rez_do_sync' );
function rez_do_sync() {
	$raw = function_exists( 'get_field' ) ? (string) get_field( 'rez_import_urls', 'option' ) : '';
	$busy = array();
	foreach ( array_filter( array_map( 'trim', explode( "\n", $raw ) ) ) as $url ) {
		if ( ! preg_match( '#^https?://#', $url ) ) { continue; }
		$res = wp_remote_get( $url, array( 'timeout' => 15 ) );
		if ( is_wp_error( $res ) || 200 !== wp_remote_retrieve_response_code( $res ) ) { continue; }
		$busy = array_merge( $busy, rez_parse_ics( wp_remote_retrieve_body( $res ) ) );
	}
	update_option( 'rez_busy_external', $busy, false );
	update_option( 'rez_last_sync', current_time( 'mysql' ), false );
}

/** Parser iCal: zwraca [['start'=>'Y-m-d','end'=>'Y-m-d'(wyłączny)], …] */
function rez_parse_ics( $ics ) {
	$ics = str_replace( array( "\r\n ", "\r\n\t" ), '', $ics ); // unfold
	$out = array();
	if ( ! preg_match_all( '/BEGIN:VEVENT(.*?)END:VEVENT/s', $ics, $events ) ) { return $out; }
	foreach ( $events[1] as $ev ) {
		$g = function ( $prop ) use ( $ev ) {
			return preg_match( '/^' . $prop . '[^:]*:([^\r\n]+)/m', $ev, $m ) ? trim( $m[1] ) : '';
		};
		$s = rez_ics_date( $g( 'DTSTART' ) );
		$e = rez_ics_date( $g( 'DTEND' ) );
		if ( $s && ! $e ) { $e = gmdate( 'Y-m-d', strtotime( $s . ' +1 day' ) ); }
		if ( $s && $e ) { $out[] = array( 'start' => $s, 'end' => $e ); }
	}
	return $out;
}
function rez_ics_date( $v ) {
	if ( preg_match( '/^(\d{4})(\d{2})(\d{2})/', $v, $m ) ) { return "$m[1]-$m[2]-$m[3]"; }
	return '';
}

/* ===== Eksport iCal (feed dla Booking.com) ===== */
add_action( 'template_redirect', function () {
	if ( ! isset( $_GET['rez_ics'] ) ) { return; }
	if ( ! hash_equals( (string) get_option( 'rez_ics_key' ), (string) wp_unslash( $_GET['rez_ics'] ) ) ) {
		status_header( 403 ); exit;
	}
	$posts = get_posts( array( 'post_type' => 'rezerwacja', 'post_status' => 'publish', 'numberposts' => 500 ) );
	header( 'Content-Type: text/calendar; charset=utf-8' );
	echo "BEGIN:VCALENDAR\r\nVERSION:2.0\r\nPRODID:-//rezerwacje-ical//PL\r\n";
	foreach ( $posts as $p ) {
		$s = get_post_meta( $p->ID, 'rez_start', true );
		$e = get_post_meta( $p->ID, 'rez_end', true );
		if ( ! $s || ! $e ) { continue; }
		printf( "BEGIN:VEVENT\r\nUID:rez-%d@%s\r\nDTSTAMP:%s\r\nDTSTART;VALUE=DATE:%s\r\nDTEND;VALUE=DATE:%s\r\nSUMMARY:Zarezerwowane\r\nEND:VEVENT\r\n",
			$p->ID, wp_parse_url( home_url(), PHP_URL_HOST ), gmdate( 'Ymd\THis\Z' ),
			str_replace( '-', '', $s ), str_replace( '-', '', $e ) );
	}
	echo "END:VCALENDAR\r\n";
	exit;
} );

/* ===== Zajętość: scal import + lokalne (draft i publish blokują) ===== */
function rez_busy_ranges() {
	$busy = (array) get_option( 'rez_busy_external', array() );
	$posts = get_posts( array( 'post_type' => 'rezerwacja', 'post_status' => array( 'publish', 'draft' ), 'numberposts' => 500 ) );
	foreach ( $posts as $p ) {
		$s = get_post_meta( $p->ID, 'rez_start', true );
		$e = get_post_meta( $p->ID, 'rez_end', true );
		if ( $s && $e ) { $busy[] = array( 'start' => $s, 'end' => $e ); }
	}
	return $busy;
}

/* AJAX: zajęte dni miesiąca (publiczne). */
add_action( 'wp_ajax_rez_month', 'rez_ajax_month' );
add_action( 'wp_ajax_nopriv_rez_month', 'rez_ajax_month' );
function rez_ajax_month() {
	$y = max( 2020, min( 2100, (int) ( $_GET['y'] ?? 0 ) ) );
	$m = max( 1, min( 12, (int) ( $_GET['m'] ?? 0 ) ) );
	$first = sprintf( '%04d-%02d-01', $y, $m );
	$days_in = (int) gmdate( 't', strtotime( $first ) );
	$busy_days = array();
	foreach ( rez_busy_ranges() as $r ) {
		for ( $t = strtotime( $r['start'] ); $t < strtotime( $r['end'] ); $t += DAY_IN_SECONDS ) {
			if ( gmdate( 'Y-m', $t ) === sprintf( '%04d-%02d', $y, $m ) ) {
				$busy_days[] = (int) gmdate( 'j', $t );
			}
		}
	}
	wp_send_json( array( 'y' => $y, 'm' => $m, 'days' => $days_in, 'busy' => array_values( array_unique( $busy_days ) ) ) );
}

/* ===== Formularz rezerwacji ===== */
add_action( 'admin_post_nopriv_rez_book', 'rez_handle_booking' );
add_action( 'admin_post_rez_book', 'rez_handle_booking' );
function rez_handle_booking() {
	$back = wp_get_referer() ?: home_url( '/' );
	if ( ! isset( $_POST['rez_nonce'] ) || ! wp_verify_nonce( $_POST['rez_nonce'], 'rez_book' ) ) {
		wp_safe_redirect( add_query_arg( 'rez', 'err', $back ) . '#rezerwacja' ); exit;
	}
	$name  = sanitize_text_field( wp_unslash( $_POST['rez_name'] ?? '' ) );
	$email = sanitize_email( wp_unslash( $_POST['rez_email'] ?? '' ) );
	$phone = sanitize_text_field( wp_unslash( $_POST['rez_phone'] ?? '' ) );
	$start = sanitize_text_field( wp_unslash( $_POST['rez_start'] ?? '' ) );
	$end   = sanitize_text_field( wp_unslash( $_POST['rez_end'] ?? '' ) );
	$ok_dates = preg_match( '/^\d{4}-\d{2}-\d{2}$/', $start ) && preg_match( '/^\d{4}-\d{2}-\d{2}$/', $end )
		&& $start >= gmdate( 'Y-m-d' ) && $end > $start;
	if ( ! $name || ! is_email( $email ) || ! $ok_dates ) {
		wp_safe_redirect( add_query_arg( 'rez', 'err', $back ) . '#rezerwacja' ); exit;
	}
	// Kolizja z zajętością (zakresy końcem wyłącznym).
	foreach ( rez_busy_ranges() as $r ) {
		if ( $start < $r['end'] && $end > $r['start'] ) {
			wp_safe_redirect( add_query_arg( 'rez', 'busy', $back ) . '#rezerwacja' ); exit;
		}
	}
	$id = wp_insert_post( array(
		'post_type' => 'rezerwacja', 'post_status' => 'draft',
		'post_title' => sprintf( '%s — %s → %s', $name, $start, $end ),
	) );
	if ( ! $id || is_wp_error( $id ) ) { wp_safe_redirect( add_query_arg( 'rez', 'err', $back ) . '#rezerwacja' ); exit; }
	foreach ( array( 'rez_start' => $start, 'rez_end' => $end, 'rez_name' => $name, 'rez_email' => $email, 'rez_phone' => $phone ) as $k => $v ) {
		update_post_meta( $id, $k, $v );
	}
	$to = function_exists( 'get_field' ) ? (string) get_field( 'rez_mail_to', 'option' ) : '';
	if ( ! is_email( $to ) ) { $to = get_option( 'admin_email' ); }
	wp_mail( $to, 'Nowa rezerwacja: ' . $name . ' (' . $start . ' → ' . $end . ')',
		"Termin: {$start} → {$end}\nImię i nazwisko: {$name}\nE-mail: {$email}\nTelefon: {$phone}\n\nPotwierdź w kokpicie: " . admin_url( 'edit.php?post_type=rezerwacja' ),
		array( 'Reply-To: ' . $email ) );
	wp_mail( $email, 'Otrzymaliśmy Twoją rezerwację',
		"Dziękujemy, {$name}!\nTwoja rezerwacja na termin {$start} → {$end} czeka na potwierdzenie. Odezwiemy się wkrótce.",
		array() );
	wp_safe_redirect( add_query_arg( 'rez', 'ok', $back ) . '#rezerwacja' ); exit;
}

/* Kolumny i szybkie potwierdzanie w liście rezerwacji. */
add_filter( 'manage_rezerwacja_posts_columns', function ( $c ) {
	return array( 'cb' => $c['cb'], 'title' => 'Rezerwacja', 'rez_dates' => 'Termin', 'rez_contact' => 'Kontakt', 'rez_status' => 'Status' );
} );
add_action( 'manage_rezerwacja_posts_custom_column', function ( $col, $id ) {
	if ( 'rez_dates' === $col ) {
		echo esc_html( get_post_meta( $id, 'rez_start', true ) . ' → ' . get_post_meta( $id, 'rez_end', true ) );
	} elseif ( 'rez_contact' === $col ) {
		echo esc_html( get_post_meta( $id, 'rez_email', true ) . ' ' . get_post_meta( $id, 'rez_phone', true ) );
	} elseif ( 'rez_status' === $col ) {
		echo 'publish' === get_post_status( $id )
			? '<strong style="color:#0b6b4f">potwierdzona</strong>'
			: 'oczekująca (Opublikuj, aby potwierdzić)';
	}
}, 10, 2 );

/* Sync od ręki po zapisie ustawień + przycisk „odśwież teraz”. */
add_action( 'acf/save_post', function ( $post_id ) {
	if ( 'options' === $post_id ) { rez_do_sync(); }
} );
