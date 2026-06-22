<?php
/**
 * footer.php — stopka i zamknięcie dokumentu.
 *
 * @package starter-theme
 */
?>
<footer class="site-footer border-t border-slate-100 mt-24">
    <div class="container mx-auto flex flex-col gap-4 px-4 py-10 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">
        <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Wszelkie prawa zastrzeżone.', 'starter-theme'); ?></p>

        <nav class="footer-nav" aria-label="<?php esc_attr_e('Menu w stopce', 'starter-theme'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'flex gap-4',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 1,
            ]);
            ?>
        </nav>
    </div>
</footer>

<?php
/*
 * wp_footer() jest obowiązkowe — tu lądują skrypty ze stopki,
 * w tym entry Vite (starter-main) ładowane jako moduł.
 */
wp_footer();
?>
</body>
</html>
