<?php
/**
 * home.php — strona wpisów (blog), gdy front-page jest statyczny.
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-16">
    <header class="mb-10">
        <h1 class="text-4xl font-bold">
            <?php echo esc_html(get_the_title(get_option('page_for_posts')) ?: __('Blog', 'starter-theme')); ?>
        </h1>
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
