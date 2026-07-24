<?php
/**
 * Stopka — kolumny z menu WP + dane kontaktu z opcji globalnych.
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$sb_phone   = sb_option( 'contact_phone' );
$sb_email   = sb_option( 'contact_email' );
$sb_address = sb_option( 'contact_address' );
$sb_hours   = sb_option( 'contact_hours' );
$sb_about   = sb_option( 'footer_about' );
$sb_tag     = sb_option( 'footer_tag' );
$sb_booksy  = sb_option( 'booksy_url' );
$sb_cta     = sb_option( 'cta_label' ) ?: 'Umów wizytę';
?>
<footer class="footer">
	<div class="container">
		<div class="footer__grid">
			<div>
				<div class="footer__logo"><?php bloginfo( 'name' ); ?></div>
				<?php if ( $sb_about ) : ?><p class="footer__about"><?php echo esc_html( $sb_about ); ?></p><?php endif; ?>
				<?php if ( $sb_tag ) : ?><span class="tag"><?php echo esc_html( $sb_tag ); ?></span><?php endif; ?>
			</div>
			<div>
				<h4><?php esc_html_e( 'Specjalizacje', 'studio-base' ); ?></h4>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_1', 'container' => false, 'menu_class' => '', 'depth' => 1, 'fallback_cb' => false ) ); ?>
			</div>
			<div>
				<h4><?php esc_html_e( 'Menu', 'studio-base' ); ?></h4>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_2', 'container' => false, 'menu_class' => '', 'depth' => 1, 'fallback_cb' => false ) ); ?>
			</div>
			<div class="footer__contact">
				<h4><?php esc_html_e( 'Kontakt', 'studio-base' ); ?></h4>
				<?php if ( $sb_phone ) : ?><p class="ph"><?php echo esc_html( $sb_phone ); ?></p><?php endif; ?>
				<?php if ( $sb_email ) : ?><p><a href="mailto:<?php echo esc_attr( $sb_email ); ?>"><?php echo esc_html( $sb_email ); ?></a></p><?php endif; ?>
				<?php if ( $sb_address ) : ?><p><?php echo nl2br( esc_html( $sb_address ) ); ?></p><?php endif; ?>
				<?php if ( $sb_hours ) : ?><p><?php echo esc_html( $sb_hours ); ?></p><?php endif; ?>
				<?php if ( $sb_booksy ) : ?><a href="<?php echo esc_url( $sb_booksy ); ?>" target="_blank" rel="noopener" class="btn btn--solid on-dark" style="margin-top:14px"><?php echo esc_html( $sb_cta ); ?> <span class="arw">→</span></a><?php endif; ?>
			</div>
		</div>
		<div class="footer__bar">
			<span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Wszelkie prawa zastrzeżone.', 'studio-base' ); ?></span>
			<span><?php wp_nav_menu( array( 'theme_location' => 'footer_legal', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 1, 'fallback_cb' => '__return_empty_string' ) ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
