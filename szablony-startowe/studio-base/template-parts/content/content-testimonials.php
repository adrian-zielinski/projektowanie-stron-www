<?php
/**
 * Sekcja: OPINIE (siatka kart: gwiazdki + cytat + avatar + autor).
 * Wariant jasny (domyślny) lub ciemny (pole „dark").
 * Layout: "testimonials".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$items   = sb_rows( 'items' );
$dark    = (bool) sb_sub( 'dark' );
$cls     = 'section testi';
if ( $dark ) {
	$cls .= ' on-dark testi--dark';
} elseif ( sb_sub( 'bg' ) ) {
	$cls .= ' bg-cream2';
}
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
				<?php
				foreach ( $items as $it ) :
					$rating = isset( $it['rating'] ) ? max( 0, min( 5, (int) $it['rating'] ) ) : 0;
					$avatar = ( ! empty( $it['avatar'] ) && is_array( $it['avatar'] ) ) ? $it['avatar'] : null;
					?>
					<div class="card testi__card">
						<?php if ( $rating ) : ?>
							<div class="testi__stars" aria-label="Ocena <?php echo esc_attr( $rating ); ?> na 5">
								<?php echo str_repeat( '★', $rating ) . str_repeat( '☆', 5 - $rating ); // phpcs:ignore ?>
							</div>
						<?php endif; ?>
						<p class="testi__quote">„<?php echo esc_html( $it['quote'] ?? '' ); ?>"</p>
						<?php if ( ! empty( $it['author'] ) || $avatar ) : ?>
							<div class="testi__by">
								<?php if ( $avatar ) : ?>
									<span class="testi__avatar"><img src="<?php echo esc_url( $avatar['sizes']['thumbnail'] ?? $avatar['url'] ); ?>" alt="<?php echo esc_attr( $avatar['alt'] ?? '' ); ?>" loading="lazy"></span>
								<?php endif; ?>
								<?php if ( ! empty( $it['author'] ) ) : ?><h3><?php echo esc_html( $it['author'] ); ?></h3><?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
