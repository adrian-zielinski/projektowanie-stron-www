<?php
/**
 * Fallback hierarchii szablonów (archiwum / blog / wynik). Musi działać zawsze.
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<section class="section"><div class="container">
	<?php if ( have_posts() ) : ?>
		<div class="sec-head"><h1><?php echo esc_html( wp_get_document_title() ); ?></h1></div>
		<div class="grid3">
			<?php while ( have_posts() ) : the_post(); ?>
				<a class="tile" href="<?php the_permalink(); ?>">
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
				</a>
			<?php endwhile; ?>
		</div>
		<div style="margin-top:40px"><?php the_posts_pagination(); ?></div>
	<?php else : ?>
		<p class="prose"><?php esc_html_e( 'Brak treści.', 'studio-base' ); ?></p>
	<?php endif; ?>
</div></section>
<?php
get_footer();
