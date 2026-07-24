<?php
/**
 * Sekcja: KROKI / PROCES (numerowane kafelki). Opcjonalny przycisk pod spodem.
 * Layout: "steps".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$steps   = sb_rows( 'steps' );
$cta_l   = sb_sub( 'cta_label' );
$cta_u   = sb_sub( 'cta_url' );
$cls     = 'section' . ( sb_sub( 'bg' ) ? ' section--tight bg-cream2' : '' );
$i       = 0;
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container">
		<?php if ( $eyebrow || $heading ) : ?>
			<div class="sec-head reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $steps ) : ?>
			<div class="steps cols">
				<?php foreach ( $steps as $s ) : $i++; ?>
					<div class="step reveal"<?php echo $i > 1 ? ' data-d="' . ( $i - 1 ) . '"' : ''; ?>>
						<div class="step__n"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></div>
						<h3><?php echo esc_html( $s['title'] ?? '' ); ?></h3>
						<?php if ( ! empty( $s['text'] ) ) : ?><p><?php echo esc_html( $s['text'] ); ?></p><?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<?php if ( $cta_l && $cta_u ) : ?>
			<div class="reveal" data-d="4" style="margin-top:clamp(28px,4vw,40px)">
				<a href="<?php echo esc_url( $cta_u ); ?>" class="btn btn--solid"><?php echo esc_html( $cta_l ); ?> <span class="arw">→</span></a>
			</div>
		<?php endif; ?>
	</div>
</section>
