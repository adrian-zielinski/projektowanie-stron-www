<?php
/**
 * Sekcja: DWIE KOLUMNY (lewa/prawa WYSIWYG).
 * Layout: "split".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$left  = sb_sub( 'left' );
$right = sb_sub( 'right' );
$cls   = 'section' . ( sb_sub( 'bg' ) ? ' section--tight bg-cream2' : '' );
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container split">
		<div class="reveal"><?php echo wp_kses_post( $left ); ?></div>
		<div class="reveal" data-d="1"><?php echo wp_kses_post( $right ); ?></div>
	</div>
</section>
