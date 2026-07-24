<?php
/**
 * Sekcja: REEL (wideo + blok tekstu obok). Wideo z biblioteki mediów lub URL.
 * Layout: "reel".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$video   = sb_sub( 'video' );
$vurl    = sb_sub( 'video_url' );
$poster  = sb_sub( 'poster' );
$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$text    = sb_sub( 'text' );
$cta_l   = sb_sub( 'cta_label' );
$cta_u   = sb_sub( 'cta_url' );
$src     = is_array( $video ) ? ( $video['url'] ?? '' ) : ( $vurl ?: '' );
$cls     = 'section' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container">
		<div class="reel reveal">
			<div class="reel__media">
				<?php if ( $src ) : ?>
					<video class="reel__v" src="<?php echo esc_url( $src ); ?>"<?php echo is_array( $poster ) ? ' poster="' . esc_url( $poster['url'] ) . '"' : ''; ?> muted loop autoplay playsinline></video>
				<?php endif; ?>
			</div>
			<div>
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2 style="font-size:clamp(26px,3.4vw,40px);margin:14px 0 14px"><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
				<?php if ( $text ) : ?><p class="prose"><span style="color:var(--muted)"><?php echo esc_html( $text ); ?></span></p><?php endif; ?>
				<?php if ( $cta_l && $cta_u ) : ?><a href="<?php echo esc_url( $cta_u ); ?>" class="btn btn--gold" style="margin-top:18px"><?php echo esc_html( $cta_l ); ?> <span class="arw">→</span></a><?php endif; ?>
			</div>
		</div>
	</div>
</section>
