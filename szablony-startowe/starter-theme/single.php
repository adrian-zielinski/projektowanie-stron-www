<?php
/**
 * single.php — pojedynczy wpis.
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-16">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('mx-auto max-w-3xl'); ?>>
            <header class="mb-8">
                <h1 class="text-4xl font-bold leading-tight"><?php the_title(); ?></h1>
                <p class="mt-3 text-sm text-slate-500">
                    <?php echo esc_html(get_the_date()); ?> &middot; <?php the_author(); ?>
                </p>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-8 overflow-hidden rounded-xl">
                    <?php the_post_thumbnail('large', ['class' => 'h-auto w-full', 'fetchpriority' => 'high']); ?>
                </div>
            <?php endif; ?>

            <div class="max-w-none leading-relaxed text-slate-700">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
