<?php
/**
 * header.php — wspólny <head> i otwarcie <body>.
 *
 * @package starter-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php
    /*
     * wp_head() jest obowiązkowe — WP wpina tu style, skrypty, meta (w tym title-tag)
     * oraz nasz blok SEO/JSON-LD podpięty w inc/seo-head.php.
     */
    wp_head();
    ?>
</head>

<body <?php body_class('antialiased text-slate-900 bg-white'); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:rounded focus:bg-slate-900 focus:px-4 focus:py-2 focus:text-white" href="#main">
    <?php esc_html_e('Przejdź do treści', 'starter-theme'); ?>
</a>

<header class="site-header border-b border-slate-100">
    <div class="container mx-auto flex items-center justify-between px-4 py-4">
        <a class="text-lg font-semibold" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
        </a>

        <nav class="site-nav" aria-label="<?php esc_attr_e('Menu główne', 'starter-theme'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class'     => 'flex gap-6',
                'container'      => false,
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>
    </div>
</header>
