<?php
/**
 * Sekcja: PAS CTA (ctaband). Nagłówek lub pullquote + tekst + 2 przyciski.
 * Layout: "cta".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$pull = sb_sub( 'pullquote' );
$head = sb_sub( 'heading' );
$text = sb_sub( 'text' );
$c1_l = sb_sub( 'cta1_label' );
$c1_u = sb_sub( 'cta1_url' );
$c2_l = sb_sub( 'cta2_label' );
$c2_u = sb_sub( 'cta2_url' );
?>
<section class="section">
	<div class="container">
		<div class="ctaband reveal">
			<svg class="leaf-corner" style="right:24px;top:-18px;width:150px;height:150px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".8"><path d="M12 22c0-8 0-12 9-18-1 10-4 15-9 18Z"/></svg>
			<?php if ( $pull ) : ?><p class="pullquote" style="margin:0 auto 18px"><?php echo esc_html( $pull ); ?></p><?php endif; ?>
			<?php if ( $head ) : ?><h2><?php echo esc_html( $head ); ?></h2><?php endif; ?>
			<?php if ( $text ) : ?><p><?php echo esc_html( $text ); ?></p><?php endif; ?>
			<?php if ( ( $c1_l && $c1_u ) || ( $c2_l && $c2_u ) ) : ?>
				<div class="acts">
					<?php if ( $c1_l && $c1_u ) : ?><a href="<?php echo esc_url( $c1_u ); ?>" class="btn btn--solid on-dark"><?php echo esc_html( $c1_l ); ?> <span class="arw">→</span></a><?php endif; ?>
					<?php if ( $c2_l && $c2_u ) : ?><a href="<?php echo esc_url( $c2_u ); ?>" class="btn btn--outline on-dark"><?php echo esc_html( $c2_l ); ?></a><?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
