<?php
/**
 * Strona główna — składana z sekcji ACF (pętla ustawia kontekst posta).
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/sections' );
endwhile;

get_footer();
