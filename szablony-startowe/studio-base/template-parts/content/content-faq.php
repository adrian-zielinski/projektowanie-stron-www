<?php
/**
 * Sekcja: FAQ (akordeon <details>). Generuje też JSON-LD FAQPage.
 * Layout: "faq".
 * @package studio-base
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$eyebrow = sb_sub( 'eyebrow' );
$heading = sb_sub( 'heading' );
$items   = sb_rows( 'items' );
$cls     = 'section' . ( sb_sub( 'bg' ) ? ' bg-cream2' : '' );

$ld = array();
foreach ( $items as $it ) {
	$q = $it['q'] ?? '';
	$a = $it['a'] ?? '';
	if ( $q && $a ) {
		$ld[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $q ),
			'acceptedAnswer' => array( '@type' => 'Answer', 'text' => wp_strip_all_tags( $a ) ),
		);
	}
}
?>
<section class="<?php echo esc_attr( $cls ); ?>">
	<div class="container">
		<?php if ( $eyebrow || $heading ) : ?>
			<div class="sec-head reveal">
				<?php if ( $eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?>
				<?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $items ) : ?>
			<div class="faq reveal" data-d="1">
				<?php foreach ( $items as $it ) : ?>
					<details>
						<summary><?php echo esc_html( $it['q'] ?? '' ); ?></summary>
						<p><?php echo esc_html( $it['a'] ?? '' ); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php if ( $ld ) : ?>
<script type="application/ld+json"><?php echo wp_json_encode( array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $ld ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>
<?php endif; ?>
