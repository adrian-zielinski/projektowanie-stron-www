<?php
/**
 * Sekcja: OPINIE (siatka kart cytat + autor).
 * Layout: "testimonials".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$items   = sb_rows( 'items' );
$cls     = 'section' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );
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
			<div class="grid3 reveal" data-d="1">
				<?php foreach ( $items as $it ) : ?>
					<div class="card">
						<p>„<?php echo esc_html( $it['quote'] ?? '' ); ?>"</p>
						<?php if ( ! empty( $it['author'] ) ) : ?><h3><?php echo esc_html( $it['author'] ); ?></h3><?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
