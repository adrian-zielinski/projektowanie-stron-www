<?php
/**
 * 404.php — strona „nie znaleziono".
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-24">
    <div class="mx-auto max-w-xl text-center">
        <p class="text-6xl font-bold text-slate-900">404</p>
        <h1 class="mt-4 text-2xl font-semibold"><?php esc_html_e('Nie znaleziono strony', 'starter-theme'); ?></h1>
        <p class="mt-3 text-slate-600">
            <?php esc_html_e('Adres nie istnieje albo strona została przeniesiona.', 'starter-theme'); ?>
        </p>

        <div class="mt-8"><?php get_search_form(); ?></div>

        <a href="<?php echo esc_url(home_url('/')); ?>"
           class="mt-6 inline-block rounded-lg bg-slate-900 px-6 py-3 font-medium text-white transition hover:bg-slate-700">
            <?php esc_html_e('Wróć na stronę główną', 'starter-theme'); ?>
        </a>
    </div>
</main>

<?php
get_footer();
