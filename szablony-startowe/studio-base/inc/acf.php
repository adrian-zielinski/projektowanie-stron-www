<?php
/**
 * ACF: Local JSON (wersjonowanie pól w gicie) + strona opcji globalnych.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Local JSON — zapisuj i wczytuj definicje pól z motywu (acf-json/).
add_filter( 'acf/settings/save_json', function () {
	return STUDIO_BASE_DIR . '/acf-json';
} );
add_filter( 'acf/settings/load_json', function ( $paths ) {
	$paths[] = STUDIO_BASE_DIR . '/acf-json';
	return $paths;
} );

// Strona opcji globalnych (Booksy, dane kontaktu, social) — edytowalna przez klienta.
add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}
	acf_add_options_page( array(
		'page_title' => 'Ustawienia strony',
		'menu_title' => 'Ustawienia strony',
		'menu_slug'  => 'ustawienia-strony',
		'capability' => 'edit_theme_options',
		'icon_url'   => 'dashicons-admin-customizer',
		'position'   => 2,
		'redirect'   => false,
	) );
} );

/**
 * Helper do pól opcji globalnych.
 */
function sb_option( $name ) {
	return function_exists( 'get_field' ) ? get_field( $name, 'option' ) : null;
}
