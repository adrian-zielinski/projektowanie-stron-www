<?php
/**
 * Sekcja: LISTA (eyebrow + H2 + lista punktów, opcjonalnie 2 kolumny + callout).
 * Layout: "iconlist".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$center  = sb_sub( 'center' );
$cols2   = sb_sub( 'cols2' );
$callout = sb_sub( 'callout' );
$items   = sb_rows( 'items' );
$cls     = 'section section--tight' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );
$ulcls   = 'iconlist reveal' . ( $cols2 ? ' cols2' : '' );
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container">
		<?php if ( $eyebrow || $heading ) : ?>
			<div class="sec-head reveal<?php echo $center ? ' center' : ''; ?>">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $items ) : ?>
			<ul class="<?php echo esc_attr( $ulcls ); ?>" data-d="1"<?php echo $center ? ' style="max-width:760px;margin:0 auto"' : ''; ?>>
				<?php foreach ( $items as $it ) : ?>
					<li><?php echo wp_kses_post( $it['text'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<?php if ( $callout ) : ?>
			<div class="callout reveal" data-d="2" style="margin-top:24px"><?php echo esc_html( $callout ); ?></div>
		<?php endif; ?>
	</div>
</section>
