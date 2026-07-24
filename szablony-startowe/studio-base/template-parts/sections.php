<?php
/**
 * Pętla sekcji „sekcje" (Flexible Content) — zamiennik page-buildera.
 * Renderujemy z get_field() (sb_sections), niezależnie od runtime pętli ACF.
 * Każdy layout → template-parts/content/content-{layout}.php.
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

foreach ( sb_sections() as $sb_row ) {
	sb_render_section( $sb_row );
}
