<?php
/**
 * template-parts/content/content-none.php — gdy brak wpisów (pusty blog, brak wyników).
 *
 * @package starter-theme
 */
?>
<div class="mx-auto max-w-xl text-center">
    <p class="text-slate-600"><?php esc_html_e('Brak treści do wyświetlenia.', 'starter-theme'); ?></p>
    <div class="mt-6"><?php get_search_form(); ?></div>
</div>
