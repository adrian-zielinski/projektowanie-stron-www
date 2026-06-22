<?php
/**
 * archive.php — archiwa: kategorie, tagi, autorzy, daty.
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-16">
    <header class="mb-10">
        <h1 class="text-4xl font-bold"><?php the_archive_title(); ?></h1>
        <?php if (get_the_archive_description()) : ?>
            <div class="mt-3 text-slate-600"><?php the_archive_description(); ?></div>
        <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content/content'); ?>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(['mid_size' => 1, 'class' => 'mt-16']); ?>
    <?php else : ?>
        <?php get_template_part('template-parts/content/content', 'none'); ?>
    <?php endif; ?>
</main>

<?php
get_footer();
