<?php
/**
 * SEO on-page wbudowane w motyw (bez wtyczki): meta description, Open Graph,
 * Twitter Card, JSON-LD (Organization/LocalBusiness), poprawa <title>.
 * Per-strona edytowalne polami ACF (seo_title/seo_description/seo_og_image),
 * z auto-fallbackiem z treści sekcji. Brandless — dane marki z opcji/ACF.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/** Opis meta: pole ACF → auto z pierwszej sekcji (lead/sub/text) → opcja → tagline. Maks ~160. */
function sb_seo_description() {
	$id = is_singular() ? get_queried_object_id() : 0;
	$d  = ( $id && function_exists( 'get_field' ) ) ? (string) get_field( 'seo_description', $id ) : '';
	if ( ! $d && $id && function_exists( 'sb_sections' ) ) {
		foreach ( sb_sections( $id ) as $r ) {
			foreach ( array( 'lead', 'sub', 'intro', 'text' ) as $k ) {
				if ( ! empty( $r[ $k ] ) ) { $d = wp_strip_all_tags( $r[ $k ] ); break 2; }
			}
		}
	}
	if ( ! $d && function_exists( 'sb_option' ) ) { $d = (string) sb_option( 'seo_default_description' ); }
	if ( ! $d ) { $d = get_bloginfo( 'description' ); }
	$d = trim( preg_replace( '/\s+/', ' ', $d ) );
	if ( mb_strlen( $d ) > 160 ) { $d = rtrim( mb_substr( $d, 0, 157 ) ) . '…'; }
	return $d;
}

/** Obraz do udostępnień: pole ACF → pierwsza sekcja ze zdjęciem → domyślny z opcji → logo. */
function sb_seo_image() {
	$id = is_singular() ? get_queried_object_id() : 0;
	if ( $id && function_exists( 'get_field' ) ) {
		$im = get_field( 'seo_og_image', $id );
		if ( is_array( $im ) && ! empty( $im['url'] ) ) { return $im['url']; }
		if ( function_exists( 'sb_sections' ) ) {
			foreach ( sb_sections( $id ) as $r ) {
				if ( ! empty( $r['image'] ) && is_array( $r['image'] ) && ! empty( $r['image']['url'] ) ) {
					return $r['image']['url'];
				}
			}
		}
	}
	$def = function_exists( 'sb_option' ) ? sb_option( 'og_default_image' ) : null;
	if ( is_array( $def ) && ! empty( $def['url'] ) ) { return $def['url']; }
	$logo = get_theme_mod( 'custom_logo' );
	if ( $logo ) { $src = wp_get_attachment_image_src( $logo, 'full' ); if ( $src ) { return $src[0]; } }
	return '';
}

/** Poprawa <title>: pole seo_title nadpisuje; front page = nazwa + tagline. */
add_filter( 'document_title_parts', function ( $parts ) {
	$id = is_singular() ? get_queried_object_id() : 0;
	$t  = ( $id && function_exists( 'get_field' ) ) ? (string) get_field( 'seo_title', $id ) : '';
	if ( $t ) {
		$parts['title'] = $t;
		unset( $parts['tagline'], $parts['site'] );
		return $parts;
	}
	if ( is_front_page() ) {
		$parts['title'] = get_bloginfo( 'name' );
		$tag = get_bloginfo( 'description' );
		if ( $tag ) { $parts['tagline'] = $tag; }
	}
	return $parts;
}, 20 );

/** <head>: description + Open Graph + Twitter Card. */
add_action( 'wp_head', function () {
	$desc  = sb_seo_description();
	$title = wp_get_document_title();
	$url   = is_singular() ? get_permalink() : home_url( '/' );
	$img   = sb_seo_image();
	$site  = get_bloginfo( 'name' );

	$out  = '';
	if ( $desc ) { $out .= '<meta name="description" content="' . esc_attr( $desc ) . '" />' . "\n"; }
	$out .= '<meta property="og:type" content="' . ( is_front_page() ? 'website' : 'article' ) . '" />' . "\n";
	$out .= '<meta property="og:site_name" content="' . esc_attr( $site ) . '" />' . "\n";
	$out .= '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . "\n";
	if ( $desc ) { $out .= '<meta property="og:description" content="' . esc_attr( $desc ) . '" />' . "\n"; }
	$out .= '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";
	$out .= '<meta property="og:locale" content="pl_PL" />' . "\n";
	if ( $img ) { $out .= '<meta property="og:image" content="' . esc_url( $img ) . '" />' . "\n"; }
	$out .= '<meta name="twitter:card" content="' . ( $img ? 'summary_large_image' : 'summary' ) . '" />' . "\n";
	$out .= '<meta name="twitter:title" content="' . esc_attr( $title ) . '" />' . "\n";
	if ( $desc ) { $out .= '<meta name="twitter:description" content="' . esc_attr( $desc ) . '" />' . "\n"; }
	if ( $img ) { $out .= '<meta name="twitter:image" content="' . esc_url( $img ) . '" />' . "\n"; }
	echo $out; // znaczniki własne, dane już zaescapowane wyżej
}, 1 );

/** JSON-LD: Organization + LocalBusiness (na stronie głównej), z opcji; puste pola pomijane. */
add_action( 'wp_head', function () {
	if ( ! is_front_page() ) { return; }
	$opt   = function_exists( 'sb_option' ) ? 'sb_option' : null;
	$get   = function ( $k ) use ( $opt ) { return $opt ? (string) $opt( $k ) : ''; };
	$site  = get_bloginfo( 'name' );
	$url   = home_url( '/' );
	$img   = sb_seo_image();

	$ld = array( '@context' => 'https://schema.org', '@type' => ( $get( 'business_type' ) ?: 'Organization' ), 'name' => $site, 'url' => $url );
	if ( $img ) { $ld['image'] = $img; $ld['logo'] = $img; }
	if ( $p = $get( 'contact_phone' ) ) { $ld['telephone'] = $p; }
	if ( $e = $get( 'contact_email' ) ) { $ld['email'] = $e; }
	// Adres strukturalny — kluczowy dla lokalnego SEO.
	$street = $get( 'contact_address' );
	$city   = $get( 'contact_city' );
	$postal = $get( 'contact_postal' );
	if ( $street || $city ) {
		$addr = array( '@type' => 'PostalAddress', 'addressCountry' => 'PL' );
		if ( $street ) { $addr['streetAddress'] = wp_strip_all_tags( $street ); }
		if ( $postal ) { $addr['postalCode'] = $postal; }
		if ( $city )   { $addr['addressLocality'] = $city; }
		$ld['address'] = $addr;
		if ( $city ) { $ld['areaServed'] = $city; }
	}
	if ( $h = $get( 'contact_hours' ) ) { $ld['openingHours'] = $h; }
	// Założycielka — sygnał E-E-A-T (medycyna = YMYL).
	if ( $fn = $get( 'founder_name' ) ) {
		$founder = array( '@type' => 'Person', 'name' => $fn );
		if ( $fr = $get( 'founder_role' ) ) { $founder['jobTitle'] = $fr; }
		if ( $zl = $get( 'znanylekarz_url' ) ) { $founder['sameAs'] = $zl; }
		$ld['founder'] = $founder;
	}
	$same = array();
	foreach ( array( 'facebook_url', 'instagram_url', 'znanylekarz_url', 'booksy_url' ) as $s ) { if ( $v = $get( $s ) ) { $same[] = $v; } }
	if ( $same ) { $ld['sameAs'] = $same; }

	echo '<script type="application/ld+json">' . wp_json_encode( $ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}, 5 );
