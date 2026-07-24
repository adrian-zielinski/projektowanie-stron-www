<?php
/**
 * Sekcja: HERO (pełnoekranowe zdjęcie + nadtytuł/H1/lead/CTA + wstęga ścieżek).
 * Layout: "hero".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$img     = sb_sub( 'image' );
$heading = sb_sub( 'heading' );
$lead    = sb_sub( 'lead' );
$cta_l   = sb_sub( 'cta_label' );
$cta_u   = sb_sub( 'cta_url' );
$paths   = sb_rows( 'paths' );
$paths_h = sb_sub( 'paths_heading' );
?>
<section class="hero">
	<?php if ( is_array( $img ) ) : ?>
		<img class="hero__img" src="<?php echo esc_url( $img['sizes']['sb_hero'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" />
	<?php endif; ?>
	<div class="hero__ov"></div>
	<div class="hero__frame"></div>
	<div class="hero__c">
		<svg class="hero__orn hero__load" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M12 21c0-6 0-10 7-15-1 8-3 12-7 15Z"/><path d="M12 21c0-5-1-8-5-11"/></svg>
		<?php if ( $heading ) : ?><h1 class="hero__load d1"><?php echo esc_html( $heading ); ?></h1><?php endif; ?>
		<div class="hero__rule hero__load d2"></div>
		<?php if ( $lead ) : ?><p class="hero__lead hero__load d2"><?php echo esc_html( $lead ); ?></p><?php endif; ?>
		<?php if ( $cta_l && $cta_u ) : ?>
			<a href="<?php echo esc_url( $cta_u ); ?>" class="btn hero__cta hero__load d3"><?php echo esc_html( $cta_l ); ?> <span class="arw">→</span></a>
		<?php endif; ?>
	</div>
	<?php if ( $paths ) : ?>
		<div class="hero__paths hero__load d4">
			<p class="hero__paths-h"><?php echo esc_html( $paths_h ?: 'Najczęściej wybierane ścieżki' ); ?></p>
			<div class="hero__paths-row">
				<?php foreach ( $paths as $p ) : ?>
					<a href="<?php echo esc_url( $p['url'] ?? '#' ); ?>"><?php echo esc_html( $p['label'] ?? '' ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
