<?php
/**
 * index.php — ostatni fallback hierarchii szablonów. Musi działać zawsze.
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-16">
    <?php if (have_posts()) : ?>

        <?php if (is_home() && !is_front_page()) : ?>
            <h1 class="mb-10 text-4xl font-bold"><?php single_post_title(); ?></h1>
        <?php endif; ?>

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
