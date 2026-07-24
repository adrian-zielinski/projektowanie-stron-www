<?php
/**
 * Strona (Page). Pętla ustawia kontekst posta; jeśli ma sekcje ACF — składamy
 * z sekcji, w innym wypadku renderujemy klasyczną treść edytora.
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();

while ( have_posts() ) :
	the_post();
	if ( have_rows( 'sekcje' ) ) {
		get_template_part( 'template-parts/sections' );
	} else {
		?>
		<article class="section"><div class="container" style="max-width:820px">
			<h1 class="sec-head" style="margin-bottom:24px"><?php the_title(); ?></h1>
			<div class="prose"><?php the_content(); ?></div>
		</div></article>
		<?php
	}
endwhile;

get_footer();
