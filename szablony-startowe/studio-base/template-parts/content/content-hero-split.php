<?php
/**
 * Sekcja: HERO SPLIT (jasne tło, tekst obok kolażu zdjęć).
 * Częsty wzorzec migracji z generatorów (Claude design / Lovable), gdzie hero
 * nie jest pełnoekranowym zdjęciem z ciemną nakładką, tylko układem split.
 * Layout: "hero-split".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$lead    = sb_sub( 'lead' );
$cta_l   = sb_sub( 'cta_label' );
$cta_u   = sb_sub( 'cta_url' );
$img1    = sb_sub( 'image1' );
$img2    = sb_sub( 'image2' );
?>
<section class="hero-split">
	<div class="container hero-split__in">
		<div class="hero-split__c reveal">
			<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
			<?php if ( $heading ) : ?><h1><?php echo esc_html( $heading ); ?></h1><?php endif; ?>
			<?php if ( $lead ) : ?><p class="hero-split__lead"><?php echo esc_html( $lead ); ?></p><?php endif; ?>
			<?php if ( $cta_l && $cta_u ) : ?>
				<a href="<?php echo esc_url( $cta_u ); ?>" class="btn btn--solid"><?php echo esc_html( $cta_l ); ?> <span class="arw">→</span></a>
			<?php endif; ?>
		</div>
		<div class="hero-split__media reveal" data-d="2">
			<?php if ( is_array( $img1 ) ) : ?>
				<div class="hero-split__ph hero-split__ph--1">
					<img src="<?php echo esc_url( $img1['sizes']['sb_card'] ?? $img1['url'] ); ?>" alt="<?php echo esc_attr( $img1['alt'] ?? '' ); ?>" loading="eager">
				</div>
			<?php else : ?>
				<div class="hero-split__ph hero-split__ph--1 ph-img"><span class="lab">Zdjęcie 1</span></div>
			<?php endif; ?>
			<?php if ( is_array( $img2 ) ) : ?>
				<div class="hero-split__ph hero-split__ph--2">
					<img src="<?php echo esc_url( $img2['sizes']['sb_card'] ?? $img2['url'] ); ?>" alt="<?php echo esc_attr( $img2['alt'] ?? '' ); ?>" loading="lazy">
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
