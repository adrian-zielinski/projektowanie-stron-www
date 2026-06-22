<?php
/**
 * inc/seo-head.php — szkielet meta + JSON-LD wpinany w wp_head.
 *
 * To minimalny fallback działający bez wtyczek SEO. Jeśli używasz Rank Math / Yoast,
 * te wtyczki przejmują meta description i schema — wtedy wyłącz tutejszy output,
 * żeby nie dublować tagów (patrz strażnik starter_seo_plugin_active()).
 *
 * @package starter-theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Czy aktywna jest wtyczka SEO, która sama generuje meta/schema?
 * Jeśli tak — nie dublujemy outputu.
 */
function starter_seo_plugin_active(): bool {
    return defined('WPSEO_VERSION')          // Yoast
        || defined('RANK_MATH_VERSION')      // Rank Math
        || class_exists('Yoast\\WP\\SEO\\Main');
}

/**
 * Meta description + Open Graph. Priorytet 1, żeby trafić wysoko w <head>.
 */
add_action('wp_head', function () {
    if (starter_seo_plugin_active()) {
        return;
    }

    // Opis: excerpt wpisu/strony → opis witryny.
    $description = '';
    if (is_singular()) {
        $post = get_queried_object();
        $description = has_excerpt($post) ? get_the_excerpt($post) : wp_trim_words(wp_strip_all_tags($post->post_content ?? ''), 30);
    }
    $description = $description ?: get_bloginfo('description');

    // Tytuł i URL bieżącego widoku.
    $title = wp_get_document_title();
    $url   = home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));

    if ($description) {
        printf('<meta name="description" content="%s">' . "\n", esc_attr($description));
    }
    printf('<meta property="og:type" content="%s">' . "\n", is_singular() ? 'article' : 'website');
    printf('<meta property="og:title" content="%s">' . "\n", esc_attr($title));
    printf('<meta property="og:description" content="%s">' . "\n", esc_attr($description));
    printf('<meta property="og:url" content="%s">' . "\n", esc_url($url));
    printf('<meta property="og:site_name" content="%s">' . "\n", esc_attr(get_bloginfo('name')));

    // Obraz OG z miniatury wpisu, jeśli jest.
    if (is_singular() && has_post_thumbnail()) {
        $thumb = get_the_post_thumbnail_url(get_queried_object_id(), 'large');
        if ($thumb) {
            printf('<meta property="og:image" content="%s">' . "\n", esc_url($thumb));
        }
    }

    printf('<meta name="twitter:card" content="%s">' . "\n", 'summary_large_image');
}, 1);

/**
 * JSON-LD (schema.org). Organization globalnie + Article na pojedynczym wpisie.
 * Skrypt drukowany przez wp_head, dane przepuszczone przez wp_json_encode (escaping).
 */
add_action('wp_head', function () {
    if (starter_seo_plugin_active()) {
        return;
    }

    $graph = [];

    // Organizacja — wizytówka witryny.
    $graph[] = [
        '@type' => 'Organization',
        'name'  => get_bloginfo('name'),
        'url'   => home_url('/'),
        // 'logo' => get_template_directory_uri() . '/dist/img/logo.png', // uzupełnij realnym logo
    ];

    // Article — tylko na pojedynczym wpisie.
    if (is_singular('post')) {
        $post = get_queried_object();
        $graph[] = [
            '@type'         => 'Article',
            'headline'      => get_the_title($post),
            'datePublished' => get_the_date('c', $post),
            'dateModified'  => get_the_modified_date('c', $post),
            'author'        => [
                '@type' => 'Person',
                'name'  => get_the_author_meta('display_name', $post->post_author),
            ],
            'mainEntityOfPage' => get_permalink($post),
        ];
    }

    $data = [
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>' . "\n";
}, 2);
