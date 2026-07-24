<?php
/**
 * Sekcja: O EKSPERTCE / KLINICE (zdjęcie + rola + H2 + tekst + lista + CTA).
 * Layout: "author".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$img   = sb_sub( 'image' );
$role  = sb_sub( 'role' );
$head  = sb_sub( 'heading' );
$body  = sb_sub( 'body' );
$items = sb_rows( 'items' );
$cta_l = sb_sub( 'cta_label' );
$cta_u = sb_sub( 'cta_url' );
?>
<section class="section"><div class="container author">
	<div class="author__photo reveal">
		<?php if ( is_array( $img ) ) : ?>
			<div class="ph-img"><img src="<?php echo esc_url( $img['sizes']['sb_card'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover"></div>
		<?php else : ?>
			<div class="ph-img"><span class="lab"><?php echo sb_icon( 'person', 24 ); ?>Zdjęcie zespołu<br>(do podmiany)</span></div>
		<?php endif; ?>
	</div>
	<div class="reveal" data-d="1">
		<?php if ( $role ) : ?><span class="author__role"><?php echo esc_html( $role ); ?></span><?php endif; ?>
		<?php if ( $head ) : ?><h2><?php echo esc_html( $head ); ?></h2><?php endif; ?>
		<?php if ( $body ) : ?><div class="prose"><?php echo wp_kses_post( $body ); ?></div><?php endif; ?>
		<?php if ( $items ) : ?>
			<ul class="iconlist" style="margin-top:18px">
				<?php foreach ( $items as $it ) : ?>
					<li><?php echo wp_kses_post( $it['text'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<?php if ( $cta_l && $cta_u ) : ?><a href="<?php echo esc_url( $cta_u ); ?>" class="btn btn--solid" style="margin-top:22px"><?php echo esc_html( $cta_l ); ?> <span class="arw">→</span></a><?php endif; ?>
	</div>
</div></section>
