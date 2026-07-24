<?php
/**
 * Renderowanie sekcji z get_field() — niezależne od runtime pętli ACF.
 * get_field('sekcje') zwraca tablicę wierszy (każdy: acf_fc_layout + pola wg nazw)
 * zarówno na ACF Pro (spłaszczone meta), jak i na darmowym ACF (blob).
 * Szablony sekcji czytają pola przez sb_sub()/sb_rows() zamiast get_sub_field()/have_rows().
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zwraca wiersze sekcji bieżącego (lub wskazanego) posta.
 */
function sb_sections( $post_id = null ) {
	$rows = function_exists( 'get_field' ) ? get_field( 'sekcje', $post_id ) : null;
	return is_array( $rows ) ? $rows : array();
}

/**
 * Ustawia bieżący wiersz sekcji (dla sb_sub/sb_rows) i renderuje jego szablon.
 */
function sb_render_section( $row ) {
	if ( ! is_array( $row ) || empty( $row['acf_fc_layout'] ) ) { return; }
	$GLOBALS['__sb_row'] = $row;
	get_template_part( 'template-parts/content/content', $row['acf_fc_layout'] );
}

/**
 * Wartość pola bieżącego wiersza sekcji.
 */
function sb_sub( $key, $default = '' ) {
	$r = $GLOBALS['__sb_row'] ?? array();
	return ( is_array( $r ) && array_key_exists( $key, $r ) && null !== $r[ $key ] ) ? $r[ $key ] : $default;
}

/**
 * Wiersze zagnieżdżonego repeatera bieżącego wiersza sekcji.
 */
function sb_rows( $key ) {
	$r = $GLOBALS['__sb_row'] ?? array();
	return ( is_array( $r ) && isset( $r[ $key ] ) && is_array( $r[ $key ] ) ) ? $r[ $key ] : array();
}
