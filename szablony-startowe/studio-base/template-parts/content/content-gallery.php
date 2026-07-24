<?php
/**
 * Sekcja: GALERIA (efekty / przed-po). Siatka figur z podpisem + nota.
 * Layout: "gallery".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$note    = sb_sub( 'note' );
$items   = sb_rows( 'items' );
$cls     = 'section section--tight reveal' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container">
		<?php if ( $eyebrow || $heading ) : ?>
			<div class="sec-head reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $items ) : ?>
			<div class="gallery reveal">
				<?php foreach ( $items as $g ) :
					$im = $g['image'] ?? null;
					if ( ! is_array( $im ) ) { continue; }
					$cap = $g['caption'] ?? '';
					$tag = $g['tag'] ?? 'Przed · Po';
					?>
					<figure>
						<img src="<?php echo esc_url( $im['sizes']['sb_card'] ?? $im['url'] ); ?>" alt="<?php echo esc_attr( $im['alt'] ?? '' ); ?>" loading="lazy">
						<?php if ( $cap ) : ?><figcaption><b><?php echo esc_html( $tag ); ?></b> <?php echo esc_html( $cap ); ?></figcaption><?php endif; ?>
					</figure>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<?php if ( $note ) : ?><p class="galeria-note"><?php echo esc_html( $note ); ?></p><?php endif; ?>
	</div>
</section>
