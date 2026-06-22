<?php
/**
 * functions.php — bootstrap motywu: theme supports + enqueue assetów z buildu Vite.
 *
 * @package starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Blokuj bezpośredni dostęp.
}

/**
 * Theme supports + obszary menu.
 * Rejestracja w after_setup_theme — to właściwy hook na deklaracje możliwości motywu.
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');            // WP sam zarządza <title>.
    add_theme_support('post-thumbnails');      // Obrazki wyróżniające.
    add_theme_support('responsive-embeds');    // Skalowalne embedy (YouTube itp.).
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Menu główne', 'starter-theme'),
        'footer'  => __('Menu w stopce', 'starter-theme'),
    ]);
});

/**
 * Enqueue skompilowanych assetów wg manifestu Vite.
 *
 * Dev: ładuj z serwera Vite (HMR) — wymaga `define('IS_VITE_DEV', true);` w wp-config.php.
 * Produkcja: czytaj dist/.vite/manifest.json i ładuj zbudowane CSS/JS.
 */
add_action('wp_enqueue_scripts', function () {
    $theme_uri  = get_template_directory_uri();
    $theme_path = get_template_directory();
    $is_dev     = defined('IS_VITE_DEV') && IS_VITE_DEV;
    $dev_server = 'http://localhost:5173';
    $entry_src  = 'src/main.js'; // Entry zgodne z vite.config.js.

    if ($is_dev) {
        // Klient Vite (HMR) + entry. Oba jako moduły (patrz filtr niżej).
        wp_enqueue_script('vite-client', "$dev_server/@vite/client", [], null, false);
        wp_enqueue_script('starter-main', "$dev_server/$entry_src", [], null, true);
        return;
    }

    // Produkcja — manifest. Vite 5+ zapisuje do dist/.vite/manifest.json.
    $manifest_file = $theme_path . '/dist/.vite/manifest.json';
    if (!file_exists($manifest_file)) {
        // Fallback dla starszych wersji Vite.
        $manifest_file = $theme_path . '/dist/manifest.json';
        if (!file_exists($manifest_file)) {
            return; // Brak buildu — nic nie ładuj (uruchom `npm run build`).
        }
    }

    $manifest = json_decode(file_get_contents($manifest_file), true);
    $entry    = $manifest[$entry_src] ?? null;
    if (!$entry) {
        return;
    }

    // CSS wygenerowany z entry (jeden lub więcej plików).
    if (!empty($entry['css'])) {
        foreach ($entry['css'] as $i => $css) {
            wp_enqueue_style("starter-style-$i", "$theme_uri/dist/$css", [], null);
        }
    }

    // JS entry — ładowany jako moduł.
    if (!empty($entry['file'])) {
        wp_enqueue_script('starter-main', "$theme_uri/dist/" . $entry['file'], [], null, true);
    }
});

/**
 * Zamień <script> na <script type="module"> dla naszych handle'i.
 * Vite serwuje ESM, więc bez type=module przeglądarka nie odpali importów.
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    if (in_array($handle, ['starter-main', 'vite-client'], true)) {
        return '<script type="module" src="' . esc_url($src) . '"></script>' . "\n";
    }
    return $tag;
}, 10, 3);

/**
 * ACF Local JSON — wersjonowanie definicji pól w repo (obowiązek, nie opcja).
 * Zapis: każda zmiana grupy pól w panelu ląduje jako .json w acf-json/.
 * Wczytywanie: ACF czyta stąd definicje, więc pola jadą z motywem (git), nie z bazy.
 */
add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]); // Pomiń domyślną ścieżkę ACF.
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

/**
 * Meta + JSON-LD w <head>. Szkielet SEO trzymamy w inc/seo-head.php.
 */
require_once get_template_directory() . '/inc/seo-head.php';
