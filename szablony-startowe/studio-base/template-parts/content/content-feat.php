<?php
/**
 * Sekcja: CO NAS WYRÓŻNIA (feat — zdjęcie z plakietką + siatka kart).
 * Layout: "feat".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$img       = sb_sub( 'image' );
$photo_lab = sb_sub( 'photo_label' );
$tab_t     = sb_sub( 'tab_title' );
$tab_s     = sb_sub( 'tab_sub' );
$eyebrow   = sb_sub( 'eyebrow' );
$heading   = sb_sub( 'heading' );
$sub       = sb_sub( 'sub' );
$cards     = sb_rows( 'cards' );
$numbered  = (bool) sb_sub( 'numbered' );
$i         = 0;
?>
<section class="feat section">
	<div class="container feat__grid">
		<div class="feat__photo reveal">
			<div class="ph-img">
				<svg class="leaf-corner" style="left:-16px;top:-10px;width:150px;height:150px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><path d="M12 22c0-7 0-11 8-17-1 9-4 14-8 17Z"/></svg>
				<?php if ( is_array( $img ) ) : ?>
					<img src="<?php echo esc_url( $img['sizes']['sb_card'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover">
				<?php elseif ( $photo_lab ) : ?>
					<span class="lab"><?php echo sb_icon( 'usg', 24 ); ?><?php echo esc_html( $photo_lab ); ?></span>
				<?php endif; ?>
			</div>
			<?php if ( $tab_t ) : ?>
				<div class="feat__tab"><span class="ic"><?php echo sb_icon( 'person', 18 ); ?></span><div><b><?php echo esc_html( $tab_t ); ?></b><?php if ( $tab_s ) : ?><span><?php echo esc_html( $tab_s ); ?></span><?php endif; ?></div></div>
			<?php endif; ?>
		</div>
		<div>
			<div class="reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
				<?php if ( $sub ) : ?><p class="feat__sub"><?php echo esc_html( $sub ); ?></p><?php endif; ?>
			</div>
			<?php if ( $cards ) : ?>
				<div class="cards">
					<?php foreach ( $cards as $c ) : $i++; ?>
						<div class="card reveal" data-d="<?php echo ( $i % 2 ) ? 1 : 2; ?>">
							<?php if ( $numbered ) : ?><span class="card__n"><?php echo esc_html( sprintf( '%02d', $i ) ); ?></span><?php else : ?><span class="ic"><?php echo sb_icon( $c['icon'] ?? '' ); ?></span><?php endif; ?>
							<h3><?php echo esc_html( $c['title'] ?? '' ); ?></h3>
							<?php if ( ! empty( $c['text'] ) ) : ?><p><?php echo esc_html( $c['text'] ); ?></p><?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
