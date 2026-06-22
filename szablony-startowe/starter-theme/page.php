<?php
/**
 * page.php — pojedyncza strona statyczna.
 *
 * Strony landingowe składaj z sekcji ACF (jak front-page.php).
 * Ten szablon obsługuje proste strony treściowe (np. Polityka prywatności, Regulamin).
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-16">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('mx-auto max-w-3xl'); ?>>
            <h1 class="mb-8 text-4xl font-bold leading-tight"><?php the_title(); ?></h1>
            <div class="max-w-none leading-relaxed text-slate-700">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
