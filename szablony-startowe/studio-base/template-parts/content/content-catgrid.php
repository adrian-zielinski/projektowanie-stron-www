<?php
/**
 * Sekcja: KATALOG (menu zabiegów). Grupy → karty kategorii → lista pozycji.
 * Pozycje: jedna na linię w polu tekstowym.
 * Layout: "catgrid".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$intro   = sb_sub( 'intro' );
$anchor  = sb_sub( 'anchor' );
$groups  = sb_rows( 'groups' );
$cls     = 'section' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );
$g       = 0;
?>
<section class="<?php echo esc_attr( $cls ); ?>"<?php echo $anchor ? ' id="' . esc_attr( $anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( $eyebrow || $heading || $intro ) : ?>
			<div class="sec-head reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
				<?php if ( $intro ) : ?><p><?php echo esc_html( $intro ); ?></p><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php foreach ( $groups as $grp ) : $g++;
			$gt   = $grp['group_title'] ?? '';
			$cats = ( isset( $grp['cats'] ) && is_array( $grp['cats'] ) ) ? $grp['cats'] : array();
			?>
			<?php if ( $gt ) : ?><h3 class="eyebrow reveal" style="margin:<?php echo $g > 1 ? 'clamp(36px,5vw,52px)' : '0'; ?> 0 18px"><?php echo esc_html( $gt ); ?></h3><?php endif; ?>
			<?php if ( $cats ) : $c = 0; ?>
				<div class="catgrid">
					<?php foreach ( $cats as $cat ) :
						$items = preg_split( '/\r\n|\r|\n/', (string) ( $cat['items'] ?? '' ), -1, PREG_SPLIT_NO_EMPTY );
						?>
						<div class="cat reveal"<?php echo $c > 0 ? ' data-d="' . $c . '"' : ''; ?>>
							<?php if ( ! empty( $cat['title'] ) ) : ?><h3><?php echo esc_html( $cat['title'] ); ?></h3><?php endif; ?>
							<?php if ( $items ) : ?>
								<ul>
									<?php foreach ( $items as $it ) : ?><li><?php echo esc_html( trim( $it ) ); ?></li><?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php $c++; endforeach; ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
