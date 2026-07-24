<?php
/**
 * Sekcja: FILARY (dwa/więcej bloków: tag + tytuł + treść WYSIWYG).
 * Layout: "filars".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$filars  = sb_rows( 'filars' );
$i       = 0;
?>
<section class="section">
	<div class="container">
		<?php if ( $eyebrow || $heading ) : ?>
			<div class="sec-head reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $filars ) : ?>
			<div class="filars">
				<?php foreach ( $filars as $f ) : ?>
					<div class="filar reveal"<?php echo $i > 0 ? ' data-d="' . $i . '"' : ''; ?>>
						<?php if ( ! empty( $f['tag'] ) ) : ?><div class="filar__tag"><?php echo esc_html( $f['tag'] ); ?></div><?php endif; ?>
						<?php if ( ! empty( $f['title'] ) ) : ?><h3><?php echo esc_html( $f['title'] ); ?></h3><?php endif; ?>
						<?php echo wp_kses_post( $f['body'] ?? '' ); ?>
					</div>
				<?php $i++; endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
