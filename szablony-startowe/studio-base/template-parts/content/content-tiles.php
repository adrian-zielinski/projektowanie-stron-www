<?php
/**
 * Sekcja: KAFLE (grid 3-kolumnowy). Kafel z URL = klikalny (<a>), bez = statyczny.
 * Layout: "tiles".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$intro   = sb_sub( 'intro' );
$tiles   = sb_rows( 'tiles' );
$cols    = (int) sb_sub( 'cols', 3 );
$grid    = ( 4 === $cols ) ? 'grid4' : 'grid3';
$cls     = 'section section--tight' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container">
		<?php if ( $eyebrow || $heading || $intro ) : ?>
			<div class="sec-head reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
				<?php if ( $intro ) : ?><p><?php echo esc_html( $intro ); ?></p><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $tiles ) : ?>
			<div class="<?php echo esc_attr( $grid ); ?> reveal" data-d="1">
				<?php foreach ( $tiles as $t ) :
					$t_url = $t['url'] ?? '';
					$t_ic  = $t['icon'] ?? '';
					$t_img = ( ! empty( $t['image'] ) && is_array( $t['image'] ) ) ? $t['image'] : null;
					$tag   = $t_url ? 'a' : 'div';
					?>
					<<?php echo $tag; ?> class="tile<?php echo $t_img ? ' tile--photo' : ''; ?>"<?php echo $t_url ? ' href="' . esc_url( $t_url ) . '"' : ''; ?>>
						<?php if ( $t_img ) : ?><span class="tile__img"><img src="<?php echo esc_url( $t_img['sizes']['sb_card'] ?? $t_img['url'] ); ?>" alt="<?php echo esc_attr( $t_img['alt'] ?? '' ); ?>" loading="lazy"></span><?php endif; ?>
						<?php if ( $t_ic ) : ?><span class="ic"><?php echo sb_icon( $t_ic ); ?></span><?php endif; ?>
						<h3><?php echo esc_html( $t['title'] ?? '' ); ?></h3>
						<?php if ( ! empty( $t['text'] ) ) : ?><p><?php echo wp_kses_post( $t['text'] ); ?></p><?php endif; ?>
					</<?php echo $tag; ?>>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
