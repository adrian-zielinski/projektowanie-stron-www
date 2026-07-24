<?php
/**
 * 404.
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<section class="section" style="min-height:60vh;display:grid;place-items:center;text-align:center">
	<div class="container" style="max-width:620px">
		<span class="eyebrow" style="justify-content:center">404</span>
		<h1 style="margin:16px 0 14px"><?php esc_html_e( 'Nie znaleziono strony', 'studio-base' ); ?></h1>
		<p class="prose"><?php esc_html_e( 'Strona mogła zostać przeniesiona lub usunięta.', 'studio-base' ); ?></p>
		<a class="btn btn--solid" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="margin-top:22px"><?php esc_html_e( 'Wróć na stronę główną', 'studio-base' ); ?> <span class="arw">→</span></a>
	</div>
</section>
<?php
get_footer();
