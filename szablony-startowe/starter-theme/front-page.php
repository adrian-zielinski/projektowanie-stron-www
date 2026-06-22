<?php
/**
 * front-page.php — strona główna (gdy ustawiona jako statyczna w Ustawienia → Czytanie).
 *
 * Składa stronę z reużywalnych sekcji z template-parts/.
 * Każda sekcja renderuje pola ACF — klient edytuje treść w panelu, nie w kodzie.
 *
 * @package starter-theme
 */

get_header();
?>

<main id="main">
    <?php
    // Sekcja hero — przykład sekcji renderowanej z pól ACF.
    get_template_part('template-parts/section', 'hero');

    // Dodawaj kolejne sekcje wg potrzeb, np.:
    // get_template_part('template-parts/section', 'uslugi');
    // get_template_part('template-parts/section', 'cta');
    ?>
</main>

<?php
get_footer();
