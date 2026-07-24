<?php
/**
 * Sekcja: SUBHERO (nagłówek podstrony — zdjęcie + okruszki + H1 + lead + 2 CTA).
 * Layout: "subhero".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$img  = sb_sub( 'image' );
$cp_l = sb_sub( 'crumb_parent_label' );
$cp_u = sb_sub( 'crumb_parent_url' );
$head = sb_sub( 'heading' );
$lead = sb_sub( 'lead' );
$c1_l = sb_sub( 'cta1_label' );
$c1_u = sb_sub( 'cta1_url' );
$c2_l = sb_sub( 'cta2_label' );
$c2_u = sb_sub( 'cta2_url' );
?>
<section class="subhero">
	<?php if ( is_array( $img ) ) : ?>
		<img class="subhero__img" src="<?php echo esc_url( $img['sizes']['sb_hero'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" />
	<?php endif; ?>
	<div class="subhero__ov"></div>
	<div class="subhero__frame"></div>
	<div class="subhero__c">
		<div class="container">
			<div class="crumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
				<?php if ( $cp_l ) : ?> / <a href="<?php echo esc_url( $cp_u ?: '#' ); ?>"><?php echo esc_html( $cp_l ); ?></a><?php endif; ?>
				<?php if ( $head ) : ?> / <span><?php echo esc_html( $head ); ?></span><?php endif; ?>
			</div>
			<?php if ( $head ) : ?><h1><?php echo esc_html( $head ); ?></h1><?php endif; ?>
			<?php if ( $lead ) : ?><p class="subhero__lead"><?php echo esc_html( $lead ); ?></p><?php endif; ?>
			<?php if ( ( $c1_l && $c1_u ) || ( $c2_l && $c2_u ) ) : ?>
				<div class="subhero__cta">
					<?php if ( $c1_l && $c1_u ) : ?><a href="<?php echo esc_url( $c1_u ); ?>" class="btn btn--gold"><?php echo esc_html( $c1_l ); ?> <span class="arw">→</span></a><?php endif; ?>
					<?php if ( $c2_l && $c2_u ) : ?><a href="<?php echo esc_url( $c2_u ); ?>" class="btn btn--outline on-dark"><?php echo esc_html( $c2_l ); ?></a><?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
