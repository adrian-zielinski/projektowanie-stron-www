<?php
/**
 * Konfiguracja motywu: wsparcia, menu, rozmiary obrazów.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );

	register_nav_menus( array(
		'primary_left'  => __( 'Menu główne — lewa', 'studio-base' ),
		'primary_right' => __( 'Menu główne — prawa', 'studio-base' ),
		'footer_1'      => __( 'Stopka — kolumna 1', 'studio-base' ),
		'footer_2'      => __( 'Stopka — kolumna 2', 'studio-base' ),
		'footer_legal'  => __( 'Stopka — prawne', 'studio-base' ),
	) );

	// Rozmiary pod galerie efektów i zdjęcia sekcji.
	add_image_size( 'sb_hero', 1800, 1100, true );
	add_image_size( 'sb_card', 900, 1200, true );
	add_image_size( 'sb_wide', 1400, 900, true );
} );

// Czyszczenie: wyłącz emoji i porządki w <head>.
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
} );

/**
 * Helper: bezpieczne wypisanie pola ACF (z fallbackiem, gdy ACF nieaktywny).
 */
function sb_field( $name, $post_id = false ) {
	return function_exists( 'get_field' ) ? get_field( $name, $post_id ) : null;
}
