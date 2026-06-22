<?php
/**
 * template-parts/content/content.php — karta wpisu w pętli (blog, archiwa, wyszukiwarka).
 *
 * @package starter-theme
 */
?>
<article <?php post_class('group'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-lg">
            <?php the_post_thumbnail('large', ['class' => 'h-auto w-full transition-transform duration-300 group-hover:scale-[1.02]', 'loading' => 'lazy']); ?>
        </a>
    <?php endif; ?>

    <h2 class="mt-4 text-xl font-semibold">
        <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
    </h2>

    <div class="mt-2 text-slate-600">
        <?php the_excerpt(); ?>
    </div>
</article>
