# 06 — Stack technologiczny: custom theme WordPress (bez Elementora)

SOP dla projektu Claude Code, który buduje strony jako **własny motyw WordPress** — pełna kontrola nad wyglądem i animacjami, bez page-builderów. Hosting docelowy: **LH.pl, plan Mango** (NVMe, SSH, LiteSpeed, DirectAdmin). Dokument jest dla początkujących web-designerów: każdy krok da się odtworzyć i wkleić.

Stack w skrócie:

| Warstwa | Wybór | Dlaczego |
|---|---|---|
| Motyw | **Classic theme** (PHP), nie block theme | Pełna kontrola nad HTML/CSS/JS, dowolne animacje, brak ograniczeń edytora bloków |
| Treść edytowalna przez klienta | **ACF** (Advanced Custom Fields) | Klient zmienia teksty/zdjęcia w panelu, nie dotyka kodu ani Elementora |
| CSS | **Tailwind CSS + Vite** | Szybki build, mały plik wynikowy (tylko użyte klasy), HMR w devie |
| Animacje | **GSAP + ScrollTrigger**, **Lenis**, **Lottie**, **Swup / View Transitions** | Płynne, sterowane scrollem animacje i przejścia między stronami |
| Cache/wydajność | **LiteSpeed Cache** (serwerowy na LH) | Najszybszy cache na LiteSpeed, Core Web Vitals |
| Dev lokalny | **LocalWP** (start) lub **wp-env** (zaawansowani) | Szybkie środowisko WP na lokalnej maszynie |

---

## 1. Budowa custom theme (classic theme)

### 1.1 Classic vs block theme — co wybrać

**Rekomendacja: classic theme.** Block theme (Full Site Editing, FSE) jest świetny, gdy klient ma sam przebudowywać layouty wizualnie i nie potrzeba nietypowych animacji. My budujemy strony z customowym wyglądem i bogatymi animacjami sterowanymi JS-em — tu liczy się pełna kontrola nad markupem, kolejnością ładowania skryptów i strukturą szablonów. To domena classic theme.

Kiedy rozważyć block theme: prosty serwisowy/blogowy projekt, gdzie klient ma samodzielnie składać podstrony z gotowych bloków, a animacje są minimalne. Block theme ładuje CSS tylko dla bloków obecnych na stronie i często dostaje 100/100 w Lighthouse „z pudełka" — ale tę samą wydajność osiągniemy w classic theme przez Tailwind (purge) + LiteSpeed.

Decyzja domyślna w tym projekcie: **classic theme.**

### 1.2 Minimalne wymagania

Motyw technicznie wymaga tylko dwóch plików: `style.css` (z nagłówkiem-metadanymi) i `index.php`. W praktyce budujemy pełną strukturę.

### 1.3 Struktura plików motywu

```
moj-motyw/
├── style.css            ← nagłówek motywu (metadane) + ewentualnie krytyczny CSS
├── functions.php        ← enqueue assetów, menu, obszary, ACF, hooki
├── index.php            ← fallback dla całej hierarchii szablonów
├── front-page.php       ← strona główna (gdy ustawiona jako statyczna)
├── home.php             ← lista wpisów bloga (gdy blog na osobnej stronie)
├── page.php             ← pojedyncza strona (Page)
├── single.php           ← pojedynczy wpis (Post)
├── archive.php          ← archiwa (kategorie, tagi, daty, CPT)
├── search.php           ← wyniki wyszukiwania
├── 404.php              ← strona błędu 404
├── header.php           ← wspólny <head> + nagłówek <body>
├── footer.php           ← stopka + zamknięcie </body>
├── template-parts/      ← powtarzalne fragmenty (sekcje)
│   ├── header/
│   ├── footer/
│   └── content/
│       ├── content-hero.php
│       ├── content-cta.php
│       └── content-card.php
├── inc/                 ← logika PHP (rejestracje, helpery)
│   ├── enqueue.php
│   ├── setup.php
│   └── acf.php
├── src/                 ← źródła frontendu (Tailwind, JS) — TO buildujemy
│   ├── css/main.css
│   └── js/main.js
├── dist/                ← skompilowane assety (output Vite) — TO ładuje WP
├── screenshot.png       ← podgląd motywu w panelu (1200×900)
└── theme.json           ← opcjonalnie: paleta/typografia dla edytora
```

Wzorzec ze sprawdzonych motywów (np. Twenty Seventeen): katalog `assets/` na statyczne pliki, `inc/` na logikę PHP, `template-parts/` na powtarzalne sekcje.

### 1.4 Hierarchia szablonów (co WP ładuje i kiedy)

WordPress sam dobiera plik wg typu żądanej treści. Najważniejsze:

- Strona główna → `front-page.php`, a jak go nie ma → `home.php` → `index.php`
- Pojedyncza strona (Page) → `page.php` → `singular.php` → `index.php`
- Wpis (Post) → `single.php` → `singular.php` → `index.php`
- Archiwum kategorii → `category.php` → `archive.php` → `index.php`
- 404 → `404.php` → `index.php`

`index.php` to ostatnia deska ratunku — musi działać zawsze.

### 1.5 `style.css` — nagłówek (obowiązkowy)

```css
/*
Theme Name: Mój Motyw
Theme URI: https://example.com
Author: Twoje Imię
Description: Custom theme z Tailwind + GSAP, bez page-buildera.
Version: 1.0.0
Requires at least: 6.5
Requires PHP: 8.1
Text Domain: moj-motyw
*/
```

WordPress czyta ten komentarz, żeby pokazać motyw w `Wygląd → Motywy`. Sam CSS produkcyjny idzie z Tailwind/Vite, nie z tego pliku.

### 1.6 `header.php` i `footer.php`

`header.php`:

```php
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); /* OBOWIĄZKOWE — WP wpina tu style/skrypty/meta */ ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <?php
  wp_nav_menu(['theme_location' => 'primary', 'menu_class' => 'nav']);
  ?>
</header>
```

`footer.php`:

```php
<footer class="site-footer">
  <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</footer>
<?php wp_footer(); /* OBOWIĄZKOWE — tu lądują skrypty z stopki */ ?>
</body>
</html>
```

`wp_head()` i `wp_footer()` muszą być — bez nich nie zadziała enqueue ani połowa wtyczek.

### 1.7 Szablon strony — `page.php`

```php
<?php get_header(); ?>

<main id="main" class="container mx-auto px-4 py-16">
  <?php while (have_posts()) : the_post(); ?>
    <h1 class="text-4xl font-bold mb-8"><?php the_title(); ?></h1>
    <div class="prose max-w-none">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
```

Pętla `while (have_posts())` to „The Loop" — serce każdego szablonu WP.

### 1.8 `front-page.php` ze składaniem sekcji

```php
<?php get_header(); ?>

<?php
get_template_part('template-parts/content/content', 'hero');
get_template_part('template-parts/content/content', 'cta');
?>

<?php get_footer(); ?>
```

`get_template_part()` ładuje plik z `template-parts/` — dzięki temu sekcje są reużywalne między podstronami.

### 1.9 `functions.php` — szkielet

```php
<?php
// Wczytaj logikę z inc/
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/acf.php';
```

`inc/setup.php`:

```php
<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');

    register_nav_menus([
        'primary' => 'Menu główne',
        'footer'  => 'Menu w stopce',
    ]);
});
```

---

## 2. ACF — treść edytowalna przez klienta (bez Elementora)

Cel: klient sam zmienia nagłówki, opisy, zdjęcia, listy usług w panelu WP — bez ruszania kodu i bez page-buildera. ACF to robi: definiujesz pola w panelu, renderujesz je w szablonie.

### 2.1 Definicja pól

W `Custom Fields → Add New` tworzysz **grupę pól** (Field Group), dodajesz pola (tekst, obraz, WYSIWYG, repeater, flexible content) i ustawiasz **Location Rules** — gdzie się pokazują (np. „Page is equal to Strona główna" albo „Post Type is equal to Page").

Dobra praktyka: trzymaj definicje pól w repo. W ACF włącz **Local JSON** (folder `acf-json/` w motywie) — ACF zapisuje tam definicje jako JSON i synchronizuje między środowiskami. Dzięki temu pola jadą z kodem przez git, a nie tylko w bazie.

### 2.2 Renderowanie pól w szablonie

Dwie główne funkcje:

- `get_field('nazwa')` — **zwraca** wartość (do zmiennej / logiki). Uniwersalna, działa dla każdego typu pola.
- `the_field('nazwa')` — **wypisuje** wartość bezpośrednio.

```php
<section class="hero">
  <h1><?php the_field('hero_naglowek'); ?></h1>
  <p><?php the_field('hero_podtytul'); ?></p>

  <?php
  $img = get_field('hero_obraz'); // pole typu Image (zwraca tablicę)
  if ($img) : ?>
    <img
      src="<?php echo esc_url($img['sizes']['large']); ?>"
      width="<?php echo esc_attr($img['sizes']['large-width']); ?>"
      height="<?php echo esc_attr($img['sizes']['large-height']); ?>"
      alt="<?php echo esc_attr($img['alt']); ?>"
      loading="lazy">
  <?php endif; ?>
</section>
```

Zawsze escapuj dane wyjściowe: `esc_html()`, `esc_url()`, `esc_attr()`. To podstawa bezpieczeństwa.

### 2.3 Repeater — listy (np. usługi, opinie)

```php
<?php if (have_rows('uslugi')) : ?>
  <div class="grid md:grid-cols-3 gap-6">
    <?php while (have_rows('uslugi')) : the_row(); ?>
      <article class="card">
        <h3><?php the_sub_field('tytul'); ?></h3>
        <p><?php the_sub_field('opis'); ?></p>
      </article>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
```

`have_rows()` + `the_row()` + `the_sub_field()` to wzorzec dla repeaterów i flexible content.

### 2.4 Flexible Content — klient składa sekcje sam

Flexible Content pozwala klientowi dodawać/przestawiać predefiniowane sekcje (jak builder, ale na Twoich komponentach). W szablonie:

```php
<?php if (have_rows('sekcje')) : ?>
  <?php while (have_rows('sekcje')) : the_row(); ?>
    <?php
    // layout = nazwa wybranego bloku
    get_template_part('template-parts/content/content', get_row_layout());
    ?>
  <?php endwhile; ?>
<?php endif; ?>
```

Każdy `layout` ma swój plik w `template-parts/content/` (np. `content-hero.php`). Klient w panelu układa kolejność i treść, Ty kontrolujesz wygląd i animacje w kodzie. To zastępuje Elementora bez utraty kontroli.

> Uwaga: ACF Blocks (renderowane PHP-em bloki Gutenberga) to alternatywa, gdy chcesz dawać klientowi pola wewnątrz edytora bloków. Dla czysto custom classic theme zwykle wystarczą zwykłe pola + Flexible Content.

---

## 3. Tailwind CSS + Vite w motywie

Cel: pisać klasami Tailwind w plikach PHP, buildować do jednego małego CSS (tylko użyte klasy) i ładować go przez `wp_enqueue_style`.

### 3.1 Inicjalizacja

W katalogu motywu:

```bash
npm init -y
npm install -D vite tailwindcss @tailwindcss/vite
```

> Tailwind v4: plugin `@tailwindcss/vite` zastępuje dawne `postcss.config.js` + `tailwind.config.js`. Konfigurację robisz w CSS dyrektywami `@import "tailwindcss";` i `@source`. Poniżej wariant v4 (zalecany) — jeśli używasz v3, dochodzi `tailwind.config.js` z polem `content`.

### 3.2 `vite.config.js`

```js
import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [tailwindcss()],
  base: '/wp-content/themes/moj-motyw/dist/',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true, // generuje dist/.vite/manifest.json
    rollupOptions: {
      input: 'src/js/main.js', // entry: JS importuje CSS
    },
  },
});
```

### 3.3 Wejście CSS — `src/css/main.css`

```css
@import "tailwindcss";

/* Tailwind v4: wskaż pliki do skanowania pod klasy (purge) */
@source "../../**/*.php";
@source "../js/**/*.js";

/* własne warstwy */
@layer base {
  :root { --brand: #16a34a; }
}
```

W v3 odpowiednikiem `@source` jest pole `content` w `tailwind.config.js`:

```js
// tylko Tailwind v3
export default {
  content: ['./**/*.php', './src/**/*.js'],
};
```

To gwarantuje **czyszczenie nieużywanych klas** — w buildzie zostaje tylko CSS faktycznie użyty w szablonach. Jeśli generujesz klasy dynamicznie (np. z ACF), dorzuć je do safelisty/komentarza, żeby purge ich nie wyciął.

### 3.4 Entry JS — `src/js/main.js`

```js
import '../css/main.css'; // Vite wciąga CSS do buildu
// tu też inicjalizacja animacji (GSAP, Lenis) — sekcja 4
```

### 3.5 `package.json` — skrypty

```json
{
  "scripts": {
    "dev": "vite",
    "build": "vite build"
  }
}
```

### 3.6 Enqueue w `inc/enqueue.php` (dev vs produkcja)

Najczystszy wzorzec: w devie ładuj z serwera Vite (HMR), na produkcji z `dist/` wg `manifest.json`.

```php
<?php
add_action('wp_enqueue_scripts', function () {
    $theme_uri  = get_template_directory_uri();
    $theme_path = get_template_directory();
    $is_dev     = defined('IS_VITE_DEV') && IS_VITE_DEV; // ustaw w wp-config.php lokalnie

    if ($is_dev) {
        // Vite dev server (HMR)
        wp_enqueue_script('vite-client', 'http://localhost:5173/@vite/client', [], null, false);
        wp_enqueue_script('theme-main', 'http://localhost:5173/src/js/main.js', [], null, true);
        return;
    }

    // Produkcja: czytaj manifest
    $manifest_file = $theme_path . '/dist/.vite/manifest.json';
    if (!file_exists($manifest_file)) return;

    $manifest = json_decode(file_get_contents($manifest_file), true);
    $entry    = $manifest['src/js/main.js'] ?? null;
    if (!$entry) return;

    // CSS wygenerowany z entry
    if (!empty($entry['css'])) {
        foreach ($entry['css'] as $i => $css) {
            wp_enqueue_style("theme-style-$i", "$theme_uri/dist/$css", [], null);
        }
    }
    // JS jako moduł
    wp_enqueue_script('theme-main', "$theme_uri/dist/" . $entry['file'], [], null, true);
});

// Załaduj main.js jako <script type="module">
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    if ($handle === 'theme-main' || $handle === 'vite-client') {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}, 10, 3);
```

W `wp-config.php` lokalnie: `define('IS_VITE_DEV', true);`. Na produkcji tej stałej nie ma → WP ładuje z `dist/`.

> Ścieżka manifestu: Vite 5+ zapisuje do `dist/.vite/manifest.json`. Starsze wersje do `dist/manifest.json` — sprawdź po pierwszym buildzie i dostosuj ścieżkę.

---

## 4. Animacje

Zasada: animacje mają być płynne, sterowane scrollem, lekkie i dostępne. Stos: **GSAP + ScrollTrigger** (logika animacji), **Lenis** (smooth scroll), **Lottie** (animacje wektorowe), **Swup / View Transitions** (przejścia między stronami).

### 4.1 Instalacja

```bash
npm install gsap lenis lottie-web
npm install swup @swup/head-plugin   # jeśli przejścia bez full-reload
```

### 4.2 GSAP + ScrollTrigger + Lenis (z poszanowaniem reduced-motion)

Lenis to lekka (~3 kB) biblioteka smooth-scroll, którą synchronizuje się z tickerem GSAP — animacje są płynne i bez „scroll-janku" (a jank to jeden z głównych zabójców wyniku INP).

```js
// src/js/main.js
import '../css/main.css';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

// 1. Szacunek dla prefers-reduced-motion — fundament dostępności
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
  // 2. Smooth scroll
  const lenis = new Lenis({ duration: 1.1, smoothWheel: true });

  // 3. Spięcie Lenis z tickerem GSAP (jedna pętla rAF, zero konfliktów)
  lenis.on('scroll', ScrollTrigger.update);
  gsap.ticker.add((time) => lenis.raf(time * 1000));
  gsap.ticker.lagSmoothing(0);

  // 4. Animacje wejścia sekcji
  gsap.utils.toArray('[data-animate]').forEach((el) => {
    gsap.from(el, {
      opacity: 0,
      y: 40,
      duration: 0.8,
      ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 80%' },
    });
  });
}
```

W szablonie wystarczy `<section data-animate>...`. Gdy użytkownik ma włączone „ogranicz ruch", cały blok animacji jest pomijany — treść pojawia się od razu, statycznie.

### 4.3 Lottie (animacje wektorowe)

```js
import lottie from 'lottie-web';

if (!reduceMotion) {
  const el = document.querySelector('#lottie-hero');
  if (el) {
    lottie.loadAnimation({
      container: el,
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path: '/wp-content/themes/moj-motyw/dist/anim/hero.json',
    });
  }
}
```

Lottie można też odpalać/cofać scrollem przez ScrollTrigger (np. odtwarzanie do konkretnej klatki przy wejściu w sekcję).

### 4.4 Przejścia między stronami

Dwie drogi:

- **View Transitions API** — natywne w przeglądarce, dla MPA (zwykłe WP) działa przez `@view-transition { navigation: auto; }` w CSS. Zero JS, ale wsparcie zależy od przeglądarki (progressive enhancement — gdzie nie działa, jest zwykłe przeładowanie).

```css
/* src/css/main.css */
@view-transition { navigation: auto; }
```

- **Swup** — przejścia bez pełnego przeładowania (podmienia kontener `#swup`). Daje pełną kontrolę nad animacją wejścia/wyjścia, dobrze gra z GSAP/Lenis. Po każdej tranzycji **re-inicjalizuj** ScrollTrigger i Lenis (nowy DOM):

```js
import Swup from 'swup';
const swup = new Swup({ containers: ['#swup'] });
swup.hooks.on('page:view', () => {
  ScrollTrigger.refresh();
  // ponownie podłącz animacje data-animate dla nowej treści
});
```

Domyślny wybór dla początkujących: **View Transitions API** (najmniej kodu). Swup gdy potrzeba reżyserowanych, niestandardowych przejść.

### 4.5 Wydajność animacji

- Animuj **tylko `transform` i `opacity`** (idą po GPU, nie wywołują reflow). Unikaj animowania `width`, `top`, `margin`.
- `will-change: transform` na elementach mocno animowanych — oszczędnie, bo nadużycie zżera pamięć.
- Wszystko za bramką `prefers-reduced-motion`.
- Ciężkie biblioteki ładuj w stopce/jako moduł (już tak robimy przez Vite) — nie blokuj renderu.
- Lottie: preferuj renderer `svg`; bardzo złożone JSON-y potrafią obciążać CPU → rozważ `canvas` lub lżejszą animację.

---

## 5. Wydajność i cache (LiteSpeed na LH/Mango) + Core Web Vitals

Plan Mango stoi na **LiteSpeed**, więc właściwym cache jest **LiteSpeed Cache (LSCache)** — buforuje na poziomie serwera, znacznie mocniej niż wtyczki PHP-owe. Nie instaluj drugiej wtyczki cache (konflikt).

### 5.1 LiteSpeed Cache — konfiguracja startowa

1. Zainstaluj wtyczkę **LiteSpeed Cache** (`Wtyczki → Dodaj nową`).
2. `LiteSpeed Cache → Cache` → **Enable Cache = ON**. To włącza buforowanie po stronie serwera (najważniejszy przełącznik).
3. **Page Optimization → CSS/JS**: włącz minify CSS/JS. **Combine** testuj ostrożnie (z HTTP/2 łączenie bywa zbędne, czasem szkodzi).
4. **Lazy Load Images = ON** — odciąża pierwsze malowanie.
5. **Media → WebP Replacement = ON** — serwuj WebP zamiast JPG/PNG.
6. **Object Cache**: na LH w DirectAdmin jest **Redis** — włącz w `LiteSpeed Cache → Cache → Object` i wskaż Redis. Mocno przyspiesza zapytania do bazy.
7. Po włączeniu **wyczyść cache** (`LiteSpeed → Toolbox → Purge All`) i sprawdź stronę zalogowany/wylogowany.

Złoty standard wydajności: LSCache + NVMe + aktualne PHP (na LH wybór wersji w DirectAdmin, celuj w PHP 8.2/8.3) + OPcache + Redis.

> Uwaga przy buildzie: po każdym wgraniu nowego `dist/` (CSS/JS) **purge cache**, inaczej klient zobaczy stary wygląd. To częsta pułapka.

### 5.2 Fonty (CLS + LCP)

- **Hostuj fonty lokalnie** w motywie (nie z Google Fonts CDN) — szybciej i zgodnie z RODO.
- **Preload** krytycznego fontu w `header.php`:

```php
<link rel="preload"
      href="<?php echo get_template_directory_uri(); ?>/dist/fonts/inter-var.woff2"
      as="font" type="font/woff2" crossorigin>
```

- W `@font-face` ustaw **`font-display: swap`** — tekst widoczny od razu, bez „niewidzialnego" okresu.

```css
@font-face {
  font-family: 'Inter';
  src: url('/wp-content/themes/moj-motyw/dist/fonts/inter-var.woff2') format('woff2');
  font-weight: 100 900;
  font-display: swap;
}
```

### 5.3 Obrazy (LCP)

- Najszybszy zysk LCP: zoptymalizuj **pierwszy widoczny obraz** (hero). Daj mu `fetchpriority="high"` i rozważ `preload`, a nie `loading="lazy"`.
- Reszta obrazów: `loading="lazy"`, nowoczesne formaty **WebP/AVIF** (LSCache umie WebP automatycznie).
- **Zawsze** podawaj `width` i `height` na `<img>` — rezerwuje miejsce i eliminuje CLS.

### 5.4 INP (responsywność na kliknięcia)

INP psuje nadmiar JS na głównym wątku. Ładuj skrypty jako moduły w stopce (mamy to przez Vite), nie pakuj wielkich bibliotek, których nie używasz. Mniej wtyczek = mniej cudzego JS.

### 5.5 Cele Core Web Vitals

| Metryka | Cel „Good" | Główna dźwignia |
|---|---|---|
| **LCP** | < 2,5 s | hero-obraz + preload fontu + cache |
| **INP** | < 200 ms | mniej JS na main-thread |
| **CLS** | < 0,1 | width/height na obrazach, `font-display: swap`, rezerwacja miejsca |

Mierz w **PageSpeed Insights** (dane polowe CrUX) i `Lighthouse`. Testuj na produkcji z włączonym cache.

---

## 6. Local dev + workflow z Claude Code

### 6.1 Wybór środowiska

- **LocalWP** (od WP Engine) — GUI, zero Dockera, jeden klik = nowa instalacja WP z bazą. Najlżejszy start dla początkujących. Ma „Live Link" do pokazania klientowi.
- **wp-env** — oficjalne narzędzie WP, na Dockerze; sterowane z terminala, ma w środku WP-CLI, Composer, PHPUnit. Dla osób ogarniających CLI i powtarzalne środowiska.

Rekomendacja dla początkujących: **LocalWP**. Gdy chcesz wersjonować całe środowisko w repo i pracować skryptowo: **wp-env**.

### 6.2 wp-env w skrócie

```bash
npm install -g @wordpress/env
# w katalogu projektu:
wp-env start          # podnosi WP na http://localhost:8888
wp-env stop
```

`.wp-env.json` może mapować Twój motyw do instancji:

```json
{
  "core": "WordPress/WordPress",
  "themes": ["./moj-motyw"],
  "plugins": ["./acf"]
}
```

### 6.3 Workflow z Claude Code (kod lokalnie → build → deploy)

1. **Git od początku.** Motyw to repozytorium. Wersjonujesz `src/`, pliki PHP, `acf-json/`. **Nie** wersjonujesz `node_modules/` (do `.gitignore`). `dist/` — patrz niżej.
2. **Praca lokalna.** Claude Code edytuje pliki motywu w LocalWP/wp-env. Równolegle:
   ```bash
   npm run dev   # Vite + HMR, IS_VITE_DEV=true w wp-config
   ```
3. **Treść w ACF** → włączony Local JSON (`acf-json/`), definicje pól jadą z repo.
4. **Build przed deployem:**
   ```bash
   npm run build   # tworzy dist/ + manifest
   ```
5. **`dist/` — dwie strategie:**
   - **Prościej (dla początkujących):** commituj `dist/` do repo i wgrywaj na serwer razem z motywem. Serwer nie buduje niczego.
   - **Czyściej:** `dist/` w `.gitignore`, build w CI/lokalnie tuż przed wysyłką. Wymaga dyscypliny, by nie wgrać motywu bez `dist/`.
   Dla tego projektu: **commituj `dist/`** — mniej rzeczy do zapomnienia.
6. **Deploy** → sekcja 7.

`.gitignore` minimum:

```
node_modules/
.DS_Store
*.log
# jeśli budujesz na serwerze/CI, dodaj też: dist/
```

---

## 7. Deploy na LH.pl / Mango

### 7.1 Instalacja WordPressa

Najszybciej: **autoinstalator** w Panelu Klienta LH — wybierasz domenę, podajesz dane strony, WP stawia się w ~15 sekund. Alternatywnie ręcznie przez FTP + kreator instalacji.

W DirectAdmin ustaw **wersję PHP** (celuj 8.2/8.3) i włącz **Redis** (Redis Management) — przyda się do object cache (sekcja 5.1).

### 7.2 Wgranie motywu — opcje

Motyw ląduje w `wp-content/themes/moj-motyw/`. Sposoby:

- **SFTP/FTP** — najprościej. Klient FTP (FileZilla), dane z DirectAdmin. Wgraj cały folder motywu **wraz z `dist/`**.
- **SSH** (Mango ma SSH) — szybciej dla większych zmian. Włącz SSH w DirectAdmin, połącz `ssh user@serwer`, wgraj przez `scp`/`rsync`:
  ```bash
  rsync -avz --delete ./moj-motyw/ user@serwer:~/domains/twojadomena.pl/public_html/wp-content/themes/moj-motyw/
  ```
- **Git** — przez SSH możesz `git clone`/`git pull` repozytorium motywu wprost do katalogu themes (pamiętaj o buildzie `dist/` przed lub po). To najczystszy deploy dla zespołu.

> Po każdym deployu: **LiteSpeed → Purge All** (inaczej stary CSS/JS z cache).

### 7.3 Oddzielenie środowisk (staging / produkcja)

LH wspiera wersję testową na **subdomenie**. Procedura stage na LH (krok po kroku):

1. **Kopia plików.** Przez FTP/SSH skopiuj WP do nowego katalogu (np. `wpstage`) w `public_html`.
2. **Subdomena.** W panelu LH (`Serwery → Strony WWW`) dodaj subdomenę `test.twojadomena.pl` i skieruj na folder `wpstage`.
3. **Eksport bazy.** phpMyAdmin → wybierz bazę produkcji → `Eksport` → pobierz (.sql/.gz).
4. **Nowa baza + import.** Utwórz osobną bazę (np. `wpstagesql`), zapisz login/hasło, w phpMyAdmin zaimportuj zrzut.
5. **URL w bazie.** W tabeli `wp_options` zmień `siteurl` i `home` na adres subdomeny.
6. **`wp-config.php` w `wpstage`** → zmień `DB_NAME`, `DB_USER`, `DB_PASSWORD` na nową bazę.
7. **Reszta URL-i.** Wtyczką **Better Search Replace** podmień stary adres na adres stage we wszystkich tabelach (linki, serializowane dane).
8. **Zabezpieczenie.** `Ustawienia → Czytanie` → „Proś wyszukiwarki o nieindeksowanie" + zablokuj katalog hasłem przez `.htaccess` (lub IP).

Workflow docelowy: **lokalnie → stage (subdomena) → produkcja**. Na produkcję trafia tylko to, co przeszło testy na stage. LH robi też **codzienny backup przechowywany 30 dni** — ale traktuj to jako siatkę bezpieczeństwa, nie jedyny backup.

---

## 8. Rekomendowany minimalny zestaw wtyczek

Zasada: **mniej znaczy szybciej i bezpieczniej.** Trzymaj się < 20 wtyczek, tylko sprawdzone i aktualizowane. Custom theme robi większość roboty kodem, więc wtyczek potrzeba mało.

### 8.1 Rdzeń (zawsze)

| Wtyczka | Rola | Uwagi |
|---|---|---|
| **ACF** (Advanced Custom Fields) | pola edytowalne przez klienta | sekcja 2; włącz Local JSON |
| **LiteSpeed Cache** | cache serwerowy + optymalizacja | jedyna wtyczka cache na LH |
| **Rank Math** *(lub Yoast)* | SEO: meta, sitemap, schema | Rank Math = więcej za darmo; Yoast = prostszy. Wybierz jedną |
| **Backup** — UpdraftPlus | kopie do chmury (poza serwerem) | nocny snapshot na Drive/S3; nie polegaj tylko na backupie LH |
| **Security** — Wordfence *(lub Solid Security)* | firewall, skan malware, ochrona logowania | na LH jest Imunify360 serwerowo — Wordfence to warstwa aplikacyjna |
| **Fluent Forms** | formularze kontaktowe | lekki, szybki; alternatywa: WPForms |

### 8.2 Warunkowo (gdy projekt tego wymaga)

| Wtyczka | Kiedy |
|---|---|
| **WooCommerce** | sklep / sprzedaż produktów |
| **LMS** — LearnDash (premium) lub **Tutor LMS** / **LifterLMS** (lżejsze/free) | kursy online |
| **Better Search Replace** | migracje URL (stage ↔ prod), patrz 7.3 |
| **WP Mail SMTP / Fluent SMTP** | niezawodna dostawa maili (potwierdzenia formularzy, Woo) |

### 8.3 Czego nie instalować

- **Drugiej wtyczki cache** obok LiteSpeed (konflikt, podwójny cache).
- **Page-buildera** (Elementor/Divi/WPBakery) — sprzeczne z ideą custom theme, dokłada ciężki CSS/JS i psuje Core Web Vitals.
- Wtyczek „all-in-one" robiących wszystko po trochu — zwykle balast.

---

## 9. Checklista wdrożenia (skrót do odhaczania)

```
[ ] Motyw: classic theme, struktura plików gotowa (sekcja 1.3)
[ ] header.php/footer.php mają wp_head() i wp_footer()
[ ] ACF zainstalowany, Local JSON włączony, pola w acf-json/
[ ] Tailwind + Vite skonfigurowane, @source/content pokrywa wszystkie .php
[ ] npm run build → dist/ + manifest istnieją
[ ] enqueue.php ładuje dist/ na produkcji (dev tylko lokalnie)
[ ] Animacje za bramką prefers-reduced-motion
[ ] Fonty lokalne + preload + font-display: swap
[ ] Obrazy: width/height, WebP, hero z fetchpriority=high
[ ] LiteSpeed Cache ON + Redis object cache + WebP
[ ] PHP 8.2/8.3 ustawione w DirectAdmin
[ ] Stage na subdomenie, noindex + hasło
[ ] Backup zewnętrzny (UpdraftPlus) skonfigurowany
[ ] Po deployu: Purge All w LiteSpeed
[ ] PageSpeed Insights: LCP < 2,5s, INP < 200ms, CLS < 0,1
```

---

## Źródła

- [Introduction to Classic themes — Learn WordPress](https://learn.wordpress.org/lesson/introduction-to-classic-themes/)
- [Organizing Theme Files — Theme Handbook](https://developer.wordpress.org/themes/classic-themes/basics/organizing-theme-files/)
- [How to create a classic WordPress theme — Kinsta](https://kinsta.com/blog/create-classic-wordpress-theme/)
- [Building WordPress Custom Themes From The Ground Up — ACF](https://www.advancedcustomfields.com/blog/wordpress-custom-theme-development/)
- [WordPress Block Themes vs Classic Themes — WPZOOM](https://www.wpzoom.com/blog/block-themes-vs-classic-themes/)
- [Block-Based vs Classic Themes: What to Choose in 2025 — Shahzeb Malik](https://shahzebmalik.com/2025/06/05/block-based-vs-classic-themes-2025/)
- [Displaying Custom Field Values in Your Theme — ACF](https://www.advancedcustomfields.com/resources/displaying-custom-field-values-in-your-theme/)
- [WordPress Custom Field Template Explained — ACF](https://www.advancedcustomfields.com/blog/wordpress-custom-field-template/)
- [Intégrer Vite et Tailwind CSS à son thème WordPress en 2025 — Orphée Besson](https://www.orpheebesson.fr/blog/integrer-vite-et-tailwind-css-pour-creer-un-theme-wordpress-moderne-en-2025)
- [wp-theme-vite-tailwind — GitHub (blonestar)](https://github.com/blonestar/wp-theme-vite-tailwind)
- [Install Tailwind CSS with Vite — Tailwind CSS](https://tailwindcss.com/docs/installation/using-vite)
- [Tailwind CSS v4.0 — Tailwind CSS](https://tailwindcss.com/blog/tailwindcss-v4)
- [Smooth Scrolling with Lenis & GSAP — DevDreaming](https://devdreaming.com/blogs/nextjs-smooth-scrolling-with-lenis-gsap)
- [GSAP ScrollTrigger: Complete Guide — GSAPify](https://gsapify.com/gsap-scrolltrigger/)
- [Lenis — Darkroom Engineering (GitHub)](https://github.com/darkroomengineering/lenis)
- [Swup — dokumentacja](https://swup.js.org/)
- [View Transitions API — MDN](https://developer.mozilla.org/en-US/docs/Web/API/View_Transitions_API)
- [WordPress Core Web Vitals Optimization Guide 2025 — Odd Jar](https://oddjar.com/wordpress-core-web-vitals-optimization-guide-2025/)
- [Core Web Vitals for WordPress — corewebvitals.io](https://www.corewebvitals.io/core-web-vitals/wordpress-guide)
- [LiteSpeed Cache — WordPress.org](https://wordpress.org/plugins/litespeed-cache/)
- [Konfiguracja LiteSpeed Cache — Domenomania](https://domenomania.pl/centrum-wiedzy/konfiguracja-litespeed-cache)
- [Hosting WordPress SSD — LH.pl](https://www.lh.pl/hosting-wordpress)
- [Autoinstalator WordPress — LH.pl](https://www.lh.pl/pomoc/doc/autoinstalator-wordpress-jak-zainstalowac-wordpressa/)
- [Wersja testowa WordPressa (stage) — LH.pl](https://www.lh.pl/pomoc/wersja-testowa-wordpressa-jak-stworzyc-stage/)
- [DirectAdmin — jak się zalogować — LH.pl](https://www.lh.pl/pomoc/doc/directadmin-jak-sie-zalogowac/)
- [Jak dodać subdomenę w DirectAdmin — LH.pl](https://www.lh.pl/pomoc/doc/jak-dodac-subdomene-w-directadmin/)
- [Local WordPress Development Workflows — WordPress.com](https://wordpress.com/blog/2025/03/19/local-wordpress-development-workflows/)
- [Tools and Setup — Theme Handbook](https://developer.wordpress.org/themes/getting-started/tools-and-setup/)
- [LocalWP — oficjalna strona](https://localwp.com/)
- [Best WordPress Plugins 2025 — DreamHost](https://www.dreamhost.com/blog/best-wordpress-plugins/)
- [30+ Best WordPress Plugins — SmartWP](https://smartwp.com/best-wordpress-plugins/)
