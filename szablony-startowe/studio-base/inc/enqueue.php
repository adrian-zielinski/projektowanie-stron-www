<?php
/**
 * Ładowanie assetów motywu-bazy.
 * Kolejność: main.css (baza, neutralne tokeny) -> tokens.css (dziecko, marka) -> main.js.
 * Dziecko podpina swoje tokeny przez handle zależny 'studio-base-main'.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_enqueue_scripts', function () {
	$css = STUDIO_BASE_DIR . '/assets/css/main.css';
	$js  = STUDIO_BASE_DIR . '/assets/js/main.js';

	wp_enqueue_style(
		'studio-base-main',
		STUDIO_BASE_URI . '/assets/css/main.css',
		array(),
		file_exists( $css ) ? filemtime( $css ) : STUDIO_BASE_VER
	);

	wp_enqueue_script(
		'studio-base-main',
		STUDIO_BASE_URI . '/assets/js/main.js',
		array(),
		file_exists( $js ) ? filemtime( $js ) : STUDIO_BASE_VER,
		array( 'strategy' => 'defer', 'in_footer' => true )
	);
}, 20 );
