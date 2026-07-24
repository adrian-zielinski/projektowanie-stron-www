<?php
/**
 * Header + nawigacja. Menu i logo konfiguruje klient w WP (brandless).
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$sb_booksy = sb_option( 'booksy_url' );
$sb_cta    = sb_option( 'cta_label' ) ?: 'Umów wizytę';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="nav" id="nav">
	<div class="nav__in">
		<nav class="nav__l">
			<?php wp_nav_menu( array( 'theme_location' => 'primary_left', 'container' => false, 'menu_class' => 'nav__menu', 'depth' => 2, 'fallback_cb' => false ) ); ?>
		</nav>

		<?php
		$sb_logo_id  = get_theme_mod( 'custom_logo' );
		$sb_logo_url = $sb_logo_id ? wp_get_attachment_image_url( $sb_logo_id, 'full' ) : '';
		$sb_name     = get_bloginfo( 'name' );
		?>
		<?php if ( $sb_logo_url ) : ?>
			<a class="nav__logo nav__logo--img" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $sb_name ); ?>"><img src="<?php echo esc_url( $sb_logo_url ); ?>" alt="<?php echo esc_attr( $sb_name ); ?>" /></a>
		<?php else : ?>
			<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $sb_name ); ?></a>
		<?php endif; ?>
		<?php if ( $sb_logo_url ) : ?>
			<a class="nav__logo-m nav__logo-m--img" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $sb_name ); ?>"><img src="<?php echo esc_url( $sb_logo_url ); ?>" alt="<?php echo esc_attr( $sb_name ); ?>" /></a>
		<?php else : ?>
			<a class="nav__logo-m" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $sb_name ); ?></a>
		<?php endif; ?>

		<nav class="nav__r">
			<?php wp_nav_menu( array( 'theme_location' => 'primary_right', 'container' => false, 'menu_class' => 'nav__menu', 'depth' => 1, 'fallback_cb' => false ) ); ?>
			<?php if ( $sb_booksy ) : ?>
				<a class="nav__book" href="<?php echo esc_url( $sb_booksy ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $sb_cta ); ?></a>
			<?php endif; ?>
		</nav>

		<button class="burger" id="burger" aria-label="<?php esc_attr_e( 'Otwórz menu', 'studio-base' ); ?>"><span></span><span></span><span></span></button>
	</div>
</header>

<div class="mobile" id="mobile">
	<div class="mobile__top">
		<span><?php bloginfo( 'name' ); ?></span>
		<button class="mobile__close" id="mclose"><?php esc_html_e( 'Zamknij', 'studio-base' ); ?></button>
	</div>
	<nav>
		<?php
		wp_nav_menu( array( 'theme_location' => 'primary_left', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 2, 'fallback_cb' => false ) );
		wp_nav_menu( array( 'theme_location' => 'primary_right', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 1, 'fallback_cb' => false ) );
		if ( $sb_booksy ) :
			?><a class="btn btn--solid on-dark" href="<?php echo esc_url( $sb_booksy ); ?>" target="_blank" rel="noopener" style="margin-top:8px"><?php echo esc_html( $sb_cta ); ?> <span class="arw">→</span></a><?php
		endif;
		?>
	</nav>
</div>
