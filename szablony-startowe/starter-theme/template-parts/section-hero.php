<?php
/**
 * template-parts/section-hero.php — sekcja hero renderowana z pól ACF.
 *
 * Pola (grupa ACF przypięta do strony głównej):
 *   hero_naglowek  (Text)
 *   hero_podtytul  (Textarea / Text)
 *   hero_cta_label (Text)
 *   hero_cta_link  (Link lub URL)
 *   hero_obraz     (Image — zwraca tablicę)
 *
 * Fallbacki sprawiają, że sekcja działa też zanim ACF zostanie skonfigurowany.
 * get_field() zwraca null, gdy ACF nie jest aktywny — stąd funkcja-strażnik.
 *
 * @package starter-theme
 */

if (!defined('ABSPATH')) {
    exit;
}

// Strażnik: gdy wtyczka ACF nie jest aktywna, get_field() nie istnieje.
$acf  = function_exists('get_field');
$head = $acf ? get_field('hero_naglowek') : '';
$sub  = $acf ? get_field('hero_podtytul') : '';
$cta  = $acf ? get_field('hero_cta_label') : '';
$link = $acf ? get_field('hero_cta_link') : '';
$img  = $acf ? get_field('hero_obraz') : null;

// Fallbacki, żeby sekcja nie była pusta na świeżej instalacji.
$head = $head ?: get_bloginfo('name');
$sub  = $sub ?: get_bloginfo('description');
?>

<section class="hero" data-animate>
    <div class="container mx-auto grid items-center gap-10 px-4 py-20 md:grid-cols-2 md:py-28">
        <div>
            <h1 class="text-4xl font-bold leading-tight md:text-5xl">
                <?php echo esc_html($head); ?>
            </h1>

            <?php if ($sub) : ?>
                <p class="mt-5 text-lg text-slate-600">
                    <?php echo esc_html($sub); ?>
                </p>
            <?php endif; ?>

            <?php if ($cta && $link) : ?>
                <?php
                // Pole ACF Link zwraca tablicę; pole URL — string. Obsłuż oba.
                $href   = is_array($link) ? ($link['url'] ?? '#') : $link;
                $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url($href); ?>"
                   target="<?php echo esc_attr($target); ?>"
                   class="mt-8 inline-block rounded-lg bg-slate-900 px-6 py-3 font-medium text-white transition hover:bg-slate-700">
                    <?php echo esc_html($cta); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ($img && !empty($img['url'])) : ?>
            <div>
                <img
                    src="<?php echo esc_url($img['sizes']['large'] ?? $img['url']); ?>"
                    width="<?php echo esc_attr($img['sizes']['large-width'] ?? $img['width'] ?? ''); ?>"
                    height="<?php echo esc_attr($img['sizes']['large-height'] ?? $img['height'] ?? ''); ?>"
                    alt="<?php echo esc_attr($img['alt'] ?? ''); ?>"
                    class="h-auto w-full rounded-xl"
                    fetchpriority="high">
            </div>
        <?php endif; ?>
    </div>
</section>
