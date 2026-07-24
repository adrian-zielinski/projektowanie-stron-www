<?php
/**
 * Sekcja: TERAPIE ŁĄCZONE (radial — sygnatura marki).
 * 6 węzłów (3 lewo / 3 prawo) + emblemat; połączenia rysuje JS drawRadial().
 * Layout: "combined".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$img     = sb_sub( 'image' );
$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$sub     = sb_sub( 'sub' );
$em_t    = sb_sub( 'emblem_title' ) ?: 'Terapia łączona';
$em_d    = sb_sub( 'emblem_desc' );
$combos  = sb_rows( 'combos' );
$c1_l    = sb_sub( 'cta1_label' );
$c1_u    = sb_sub( 'cta1_url' );
$c2_l    = sb_sub( 'cta2_label' );
$c2_u    = sb_sub( 'cta2_url' );

$nodes = sb_rows( 'nodes' );
$half  = (int) ceil( count( $nodes ) / 2 );
$left  = array_slice( $nodes, 0, $half );
$right = array_slice( $nodes, $half );

$render_node = function ( $n ) {
	echo '<div class="node"><span class="node__ic">' . sb_icon( $n['icon'] ?? '', 22 ) . '</span><div>';
	echo '<div class="node__t">' . esc_html( $n['title'] ?? '' ) . '</div>';
	if ( ! empty( $n['desc'] ) ) {
		echo '<p class="node__d">' . esc_html( $n['desc'] ) . '</p>';
	}
	echo '</div></div>';
};
?>
<section class="combined section">
	<div class="container">
		<div class="combined__top">
			<div class="cphoto reveal">
				<div class="ph-img">
					<?php if ( is_array( $img ) ) : ?>
						<img src="<?php echo esc_url( $img['sizes']['sb_card'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover">
					<?php endif; ?>
				</div>
			</div>
			<div class="reveal" data-d="1">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo wp_kses( $heading, array( 'br' => array() ) ); ?></h2><?php endif; ?>
				<?php if ( $sub ) : ?><p class="combined__sub"><?php echo esc_html( $sub ); ?></p><?php endif; ?>
			</div>
		</div>

		<?php if ( $nodes ) : ?>
			<div class="radial reveal">
				<svg class="radial__svg" viewBox="0 0 1000 440" preserveAspectRatio="none" fill="none" stroke="var(--gold-soft)" stroke-width="1.2" stroke-linecap="round"></svg>
				<div class="radial__grid">
					<div class="col col--l">
						<?php foreach ( $left as $n ) { $render_node( $n ); } ?>
					</div>
					<div class="emblem-wrap">
						<div class="emblem"><div>
							<svg class="emblem__leaf" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><path d="M12 21c0-6 0-10 7-15-1 8-3 12-7 15Z"/><path d="M12 21c0-5-1-8-5-11"/></svg>
							<div class="emblem__t"><?php echo esc_html( $em_t ); ?></div>
							<?php if ( $em_d ) : ?><div class="emblem__d"><?php echo esc_html( $em_d ); ?></div><?php endif; ?>
						</div></div>
					</div>
					<div class="col col--r">
						<?php foreach ( $right as $n ) { $render_node( $n ); } ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $combos ) : ?>
			<ul class="iconlist cols2 reveal on-dark" style="margin-top:36px;max-width:820px;margin-left:auto;margin-right:auto">
				<?php foreach ( $combos as $c ) : ?>
					<li><?php echo esc_html( $c['text'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( ( $c1_l && $c1_u ) || ( $c2_l && $c2_u ) ) : ?>
			<div class="combined__cta reveal">
				<?php if ( $c1_l && $c1_u ) : ?><a href="<?php echo esc_url( $c1_u ); ?>" class="btn btn--solid on-dark"><?php echo esc_html( $c1_l ); ?> <span class="arw">→</span></a><?php endif; ?>
				<?php if ( $c2_l && $c2_u ) : ?><a href="<?php echo esc_url( $c2_u ); ?>" class="btn btn--outline on-dark"><?php echo esc_html( $c2_l ); ?></a><?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
