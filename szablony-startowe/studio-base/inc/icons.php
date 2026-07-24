<?php
/**
 * Biblioteka ikon SVG (stroke, currentColor) — wspólna dla sekcji.
 * Dane ACF trzymają tylko klucz ikony (np. "leaf"), markup żyje tutaj.
 * Neutralna i reużywalna — zero treści klienta.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Zwraca wewnętrzne ścieżki ikony wg klucza. Pusta wartość = brak ikony.
 */
function sb_icon_paths( $key ) {
	$lib = array(
		'leaf'      => '<path d="M12 21c0-6 0-10 7-15-1 8-3 12-7 15Z"/><path d="M12 21c0-5-1-8-5-11"/>',
		'leaf-fan'  => '<path d="M7 20c-1-7 2-11 9-14M17 20c1-6-1-9-5-11"/><path d="M5 20h14"/>',
		'search'    => '<circle cx="11" cy="11" r="6"/><path d="m20 20-4-4"/>',
		'doc'       => '<rect x="6" y="4" width="12" height="16" rx="2"/><path d="M9 4V3h6v1M9 9h6M9 13h6M9 17h3"/>',
		'waves'     => '<circle cx="12" cy="12" r="2"/><path d="M7.8 7.8a6 6 0 0 0 0 8.4M16.2 7.8a6 6 0 0 1 0 8.4M5 5a9 9 0 0 0 0 14M19 5a9 9 0 0 1 0 14"/>',
		'shield'    => '<path d="M12 3 5 6v5c0 4 3 7 7 9 4-2 7-5 7-9V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>',
		'person'    => '<circle cx="12" cy="8" r="3"/><path d="M5 20c0-4 3-6 7-6s7 2 7 6"/>',
		'laser'     => '<path d="M12 2v4M12 18v4M2 12h4M18 12h4M5 5l2.5 2.5M16.5 16.5 19 19M19 5l-2.5 2.5M7.5 16.5 5 19"/><circle cx="12" cy="12" r="2.4"/>',
		'star'      => '<path d="m12 3 2.3 4.8 5.2.7-3.8 3.6.9 5.2L12 15.6 7.4 18l.9-5.2-3.8-3.6 5.2-.7L12 3Z"/>',
		'physio'    => '<path d="M7 11V6a1.5 1.5 0 0 1 3 0v4M10 10V4.5a1.5 1.5 0 0 1 3 0V10M13 10V6a1.5 1.5 0 0 1 3 0v6c0 4-2 6-5 6s-5-1-6-4l-1.5-3a1.5 1.5 0 0 1 2.6-1.5L7 12"/>',
		'needle'    => '<path d="M5 19 19 5M8 5H5v3M16 19h3v-3"/><circle cx="9" cy="15" r="1"/><circle cx="15" cy="9" r="1"/>',
		'flask'     => '<path d="M9 3h6M10 3v4l-3.5 9a2 2 0 0 0 1.9 2.7h7.2A2 2 0 0 0 17.5 16L14 7V3"/><path d="M8 14h8"/>',
		'team'      => '<circle cx="9" cy="9" r="2.4"/><circle cx="16" cy="10" r="2"/><path d="M3 19c0-3 2.7-5 6-5s6 2 6 5M15 18c0-2 1.5-3.5 4-3.5"/>',
		'flag'      => '<path d="M6 21V4M6 5h9l-1.5 3L15 11H6"/>',
		'usg'       => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 15l5-4 4 3 3-2 6 4"/><circle cx="9" cy="9" r="1.4"/>',
	);
	return isset( $lib[ $key ] ) ? $lib[ $key ] : '';
}

/**
 * Wypisuje pełny <svg> ikony. $key pusty/nieznany → nic.
 */
function sb_icon( $key, $size = 20 ) {
	$paths = sb_icon_paths( $key );
	if ( ! $paths ) {
		return '';
	}
	return sprintf(
		'<svg viewBox="0 0 24 24" width="%1$d" height="%1$d" fill="none" stroke="currentColor" stroke-width="1.4">%2$s</svg>',
		(int) $size,
		$paths // statyczny, zaufany markup z biblioteki
	);
}
