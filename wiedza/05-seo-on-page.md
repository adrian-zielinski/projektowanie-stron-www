# 05 — SEO on-page dla custom theme WordPress (SOP)

> **Dla kogo:** początkujący web-designerzy budujący strony jako **własny motyw (custom theme)** WordPress — bez Elementora, bez page-buildera.
> **Zasada przewodnia:** SEO wpisujemy w kod od pierwszego pliku szablonu. Motyw sam generuje poprawną strukturę i meta, a wtyczka SEO (jeśli w ogóle) tylko ją uzupełnia — nigdy nie ratuje złego HTML-a.
> **Jak czytać:** każda sekcja kończy się konkretnym działaniem lub kodem. Na końcu masz checklistę do odhaczenia per podstrona oraz źródła.

---

## 0. Dlaczego SEO „od startu" w kodzie

W gotowych builderach SEO dorabia się klikaniem. W custom theme **ty piszesz HTML**, więc to ty decydujesz o jakości na poziomie, do którego żadna wtyczka nie sięgnie: jeden `<h1>`, semantyczne landmarki, obrazy z `width`/`height`, lazy-loading, czysty `<head>`. Wtyczka SEO doda tytuły i schema, ale jeśli szablon wypluwa pięć `<h1>` i `<div>` zamiast `<main>`, żaden plugin tego nie naprawi.

Reguła robocza: **najpierw poprawny, semantyczny HTML w szablonie → potem meta i dane strukturalne → na końcu treść pod intencję.**

---

## 1. Hierarchia nagłówków H1–H6

Nagłówki to spis treści strony czytany przez ludzi, czytniki ekranu i roboty. Budują strukturę, a **nie wygląd** — rozmiar i kolor ustawiasz w CSS, nie wyborem poziomu nagłówka.

### Zasady

- **Dokładnie jeden `<h1>` na stronę** = główny temat tej konkretnej podstrony. Technicznie wiele H1 jest dozwolone, ale jeden utrzymuje czytelną hierarchię i nie myli robota o tym, co jest tematem strony.
- **`<h2>` = główne sekcje** strony. **`<h3>` = podsekcje** wewnątrz danego H2. I tak dalej w dół.
- **Logiczne zagnieżdżenie, bez przeskoków poziomów.** Po H1 idzie H2, po H2 — H3. Nie wskakuj z H1 od razu na H3 „bo ładniej wygląda".
- **Nagłówki dla struktury, nie dla stylu.** Chcesz mniejszy/większy tekst? CSS. Nigdy nie wybieraj H4 zamiast H2 tylko dlatego, że H4 jest mniejszy.
- **Pisz dla człowieka.** Nagłówek ma opisywać, co jest w sekcji. Unikaj pustych etykiet typu „Wstęp", „Więcej informacji".
- **Słowo kluczowe w H1 — naturalnie.** H1 ma brzmieć jak prawdziwy nagłówek pisany dla ludzi, bez upychania fraz.
- **Kontekst 2026:** poprawna struktura nagłówków zwiększa szansę na trafienie do odpowiedzi AI, snippetów i „People Also Ask".

### Mapowanie na szablony WordPress

| Typ szablonu | Co jest `<h1>` |
|---|---|
| `front-page.php` / strona główna | Główny przekaz / nazwa marki + propozycja wartości |
| `single.php` (wpis) | Tytuł wpisu (`the_title()`) |
| `page.php` (strona) | Tytuł strony |
| `archive.php` / `category.php` | Nazwa kategorii/archiwum |
| `search.php` | „Wyniki wyszukiwania dla: …" |
| `404.php` | „Nie znaleziono strony" (czytelny komunikat) |

```php
<!-- single.php — JEDEN H1 = tytuł wpisu -->
<article>
  <header>
    <h1><?php the_title(); ?></h1>
  </header>
  <?php the_content(); // tu redaktor wstawia H2/H3 z edytora ?>
</article>
```

> **Uwaga na edytor (Gutenberg):** treść z `the_content()` może zawierać własne nagłówki. Pilnuj, by redaktor zaczynał od H2 (H1 należy do szablonu). W instrukcji dla klienta zapisz: „w treści używaj H2 i niżej, nigdy H1".

### Najczęstsze błędy

- Kilka `<h1>` na jednej stronie (np. logo w H1 + tytuł wpisu w H1).
- Logo/nazwa serwisu zaszyte w `<h1>` na **każdej** podstronie — wtedy każda strona ma ten sam temat.
- Przeskoki poziomów (H1 → H4).
- Nagłówki użyte jako stylowanie zwykłego tekstu (pogrubienie „na siłę" przez `<h3>`).
- Pusty/brakujący H1 (częste na stronie głównej zrobionej z samych „sekcji").

---

## 2. Semantyczny HTML5

Element semantyczny mówi przeglądarce, czytnikowi ekranu i robotowi, **czym** jest dany blok. `<nav>` znaczy „to nawigacja"; `<div>` nie znaczy nic. Roboty dzięki temu szybciej rozumieją, gdzie jest treść główna — mniej zgadywania, sprawniejsze indeksowanie. Czytniki ekranu zamieniają te elementy w landmarki, po których użytkownik skacze klawiaturą.

### Szkielet strony (układ landmarków)

```html
<body>
  <header>            <!-- nagłówek strony: logo + nawigacja -->
    <nav aria-label="Główne menu"> ... </nav>
  </header>

  <main>              <!-- DOKŁADNIE JEDEN <main> = treść główna danej strony -->
    <article>         <!-- samodzielna treść (wpis, produkt) -->
      <h1>...</h1>
      <section>       <!-- wydzielona sekcja tematyczna, zwykle z własnym nagłówkiem -->
        <h2>...</h2>
      </section>
    </article>

    <aside>           <!-- treść poboczna: powiązane wpisy, box autora -->
    </aside>
  </main>

  <footer>            <!-- stopka: kontakt, prawne, dodatkowa nawigacja -->
  </footer>
</body>
```

### Kiedy co

- **`<header>`** — szczyt strony (logo, menu) **lub** nagłówek pojedynczego `<article>`. Może wystąpić wielokrotnie.
- **`<nav>`** — bloki nawigacji (menu główne, breadcrumbs). Daj `aria-label`, jeśli masz więcej niż jeden `<nav>`.
- **`<main>`** — **jeden na stronę**, opakowuje treść unikalną dla tej podstrony (bez powtarzalnego nagłówka/stopki).
- **`<section>`** — logicznie wydzielona część treści, **prawie zawsze z nagłówkiem**. Nie używaj zamiast `<div>` do samego stylowania.
- **`<article>`** — treść, która ma sens samodzielnie: wpis bloga, produkt, karta usługi, komentarz.
- **`<aside>`** — treść poboczna (sidebar, powiązane linki, box autora).
- **`<footer>`** — stopka strony lub stopka artykułu (data, autor, tagi).

### Wpływ na SEO i dostępność

- **SEO:** robot szybciej wyłapuje treść główną i strukturę → sprawniejsze indeksowanie. Semantyka wspiera też wyciąganie fragmentów do AI/snippetów.
- **Dostępność:** landmarki (`main`, `nav`, `header`, `footer`) pozwalają użytkownikom czytników ekranu przeskakiwać między sekcjami. To także zgodność z WCAG.

### Najczęstsze błędy

- „Div-suppa" — cała strona z `<div class="...">` zamiast landmarków.
- Wiele `<main>` na stronie.
- `<section>` użyty jako kontener stylujący bez nagłówka (powinien być `<div>`).
- Menu w `<div>` zamiast `<nav>`.

---

## 3. Meta — `<head>` motywu

To, co motyw wkłada do `<head>`, decyduje o wyglądzie w Google i przy udostępnianiu w social. W custom theme te tagi wpina się przez hook **`wp_head`** (w `functions.php`) albo wprost w `header.php`.

### 3.1 Title (tytuł)

- **Długość:** celuj w **50–60 znaków** (Google liczy piksele, nie znaki; ~600 px na desktopie). Tytuły 51–55 znaków są przepisywane przez Google najrzadziej.
- **Wzorzec:** `Główna fraza | Marka` — najważniejsze słowa **na początku**.
- Każda podstrona = **unikalny** title.
- Google i tak często przepisuje tytuły (badania 2025: nawet ~76%), więc liczy się trafność i sensowny początek, nie walka o idealny licznik znaków.
- **W WordPress nie hardkoduj `<title>`.** Włącz wsparcie i pozwól rdzeniowi/wtyczce generować go dynamicznie:

```php
// functions.php
add_theme_support( 'title-tag' );   // WP/wtyczka generuje <title> dynamicznie
```

> Jeśli używasz wtyczki SEO, ona przejmuje title/description. Bez wtyczki — `title-tag` zrobi sensowny tytuł z nazwy wpisu + nazwy witryny.

### 3.2 Meta description

- **Długość:** **150–160 znaków** (desktop). Na mobile bywa krócej.
- To **nie czynnik rankingowy**, ale wpływa na CTR — pisz jak zachętę z frazą.
- Unikalna per strona. Bez tagu Google sam wytnie fragment treści (często gorszy).

### 3.3 Canonical

- `<link rel="canonical">` wskazuje wersję kanoniczną URL — chroni przed duplikatami (parametry, `?utm=`, paginacja, www vs bez www).
- Każda strona wskazuje **na samą siebie** (self-referencing), chyba że celowo łączysz duplikaty.

### 3.4 Open Graph + Twitter Card

Te tagi decydują, jak link wygląda po wklejeniu na Facebooku, LinkedIn, Discordzie, Slacku, X.

- **5 obowiązkowych OG:** `og:title`, `og:description`, `og:image`, `og:url`, `og:type`.
- **`og:url` = ten sam URL co canonical.**
- **Obrazek OG:** **1200×630 px** (uniwersalny standard). Format **PNG/JPEG** — unikaj WebP/SVG, bo Facebook/Slack ich nie renderują. Plik < 5 MB (limit X), najlepiej < 500 KB.
- **Twitter Card:** `summary_large_image` = duży obraz nad tytułem; `summary` = mała miniatura. Crawler X nie wykonuje JS — tagi muszą być w surowym HTML.
- Tagi `<head>` umieszczaj wcześnie, przed dużymi skryptami, żeby crawlery łapały je od razu.

### 3.5 Gotowy szablon `<head>` (custom theme, bez wtyczki)

```php
<!-- header.php -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  // Dane do meta (przykład dla wpisu/strony)
  $meta_desc = wp_strip_all_tags( get_the_excerpt() );
  $canonical = wp_get_canonical_url();
  $og_image  = has_post_thumbnail()
      ? get_the_post_thumbnail_url( null, 'large' )
      : get_template_directory_uri() . '/assets/og-default.jpg';
  ?>

  <meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>">
  <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>">
  <meta property="og:description" content="<?php echo esc_attr( $meta_desc ); ?>">
  <meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
  <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
  <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr( get_the_title() ); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr( $meta_desc ); ?>">
  <meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>">

  <?php wp_head(); // OBOWIĄZKOWE: tytuł, style, skrypty, wtyczki ?>
</head>
```

> **Zawsze** wywołuj `wp_head()` w `<head>` i `wp_footer()` przed `</body>` — bez tego nie działa pół ekosystemu (style, skrypty, wtyczki, `title-tag`).
> Jeśli włączysz wtyczkę SEO, **usuń** ręczne OG/description, żeby nie dublować tagów.

---

## 4. Dane strukturalne JSON-LD (schema.org)

JSON-LD to format zalecany przez Google: osobny blok `<script type="application/ld+json">`, niezależny od HTML i wyglądu strony. Każdy blok ma `@context` (`"https://schema.org"`) i `@type`. Dobrze dobrana schema = szansa na rozszerzone wyniki (gwiazdki, FAQ, breadcrumbs, knowledge panel) i lepszą widoczność w AI.

### Kiedy które

| Typ | Gdzie stosować |
|---|---|
| **Organization** | Strona główna / cała witryna firmowa (tożsamość marki, logo, social) |
| **LocalBusiness** | Firma z fizyczną lokalizacją (usługi lokalne, sklep, gabinet) — rozszerza Organization o adres i godziny |
| **Product** | Karta produktu (cena, dostępność, oceny) |
| **Course** | Strona kursu / szkolenia |
| **FAQPage** | Strona/sekcja z pytaniami i odpowiedziami (Q&A) |
| **BreadcrumbList** | Każda podstrona z okruszkami nawigacji |
| **Article** | Wpisy bloga, artykuły, aktualności |

> **Nie dubluj** typów (np. jednocześnie Article i BlogPosting o tym samym). Oznaczaj tylko treść **widoczną** na stronie — Google karze schema niezgodną z treścią.

### Przykłady (skrócone)

**Organization** (strona główna):
```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Nazwa Firmy",
  "url": "https://twojadomena.pl",
  "logo": "https://twojadomena.pl/logo.png",
  "sameAs": [
    "https://www.facebook.com/twojafirma",
    "https://www.instagram.com/twojafirma"
  ]
}
```

**LocalBusiness** (firma lokalna):
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Salon XYZ",
  "image": "https://twojadomena.pl/foto.jpg",
  "telephone": "+48 600 100 200",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "ul. Przykładowa 12",
    "addressLocality": "Warszawa",
    "postalCode": "00-001",
    "addressCountry": "PL"
  },
  "openingHours": "Mo-Fr 09:00-17:00",
  "priceRange": "$$"
}
```

**Product** (karta produktu):
```json
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "Nazwa produktu",
  "image": "https://twojadomena.pl/produkt.jpg",
  "description": "Krótki opis produktu.",
  "brand": { "@type": "Brand", "name": "Marka" },
  "offers": {
    "@type": "Offer",
    "price": "199.00",
    "priceCurrency": "PLN",
    "availability": "https://schema.org/InStock"
  }
}
```

**Course** (kurs):
```json
{
  "@context": "https://schema.org",
  "@type": "Course",
  "name": "Kurs SEO od podstaw",
  "description": "Praktyczny kurs SEO on-page.",
  "provider": {
    "@type": "Organization",
    "name": "Nazwa Firmy",
    "sameAs": "https://twojadomena.pl"
  }
}
```

**FAQPage** (sekcja FAQ):
```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Ile trwa realizacja strony?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Zwykle 2–4 tygodnie zależnie od zakresu."
    }
  }]
}
```

**BreadcrumbList** (okruszki):
```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Start", "item": "https://twojadomena.pl/" },
    { "@type": "ListItem", "position": 2, "name": "Usługi", "item": "https://twojadomena.pl/uslugi/" },
    { "@type": "ListItem", "position": 3, "name": "Strony WWW" }
  ]
}
```

**Article** (wpis bloga):
```json
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Tytuł wpisu (≤110 znaków)",
  "image": "https://twojadomena.pl/wpis.jpg",
  "datePublished": "2026-06-22T08:00:00+02:00",
  "dateModified": "2026-06-22T10:00:00+02:00",
  "author": { "@type": "Person", "name": "Imię Nazwisko" },
  "publisher": {
    "@type": "Organization",
    "name": "Nazwa Firmy",
    "logo": { "@type": "ImageObject", "url": "https://twojadomena.pl/logo.png" }
  }
}
```

### Wstrzykiwanie JSON-LD w custom theme

```php
// functions.php — Article tylko na pojedynczych wpisach
add_action( 'wp_head', function () {
  if ( ! is_single() ) return;

  $schema = [
    '@context'      => 'https://schema.org',
    '@type'         => 'Article',
    'headline'      => get_the_title(),
    'datePublished' => get_the_date( 'c' ),
    'dateModified'  => get_the_modified_date( 'c' ),
    'author'        => [ '@type' => 'Person', 'name' => get_the_author() ],
  ];

  echo '<script type="application/ld+json">'
     . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
     . '</script>';
} );
```

> **Testuj zawsze** w [Rich Results Test](https://search.google.com/test/rich-results) i Schema Validator. `JSON_UNESCAPED_UNICODE` dba o polskie znaki.

---

## 5. Treść pod SEO

### Intencja wyszukiwania

Zanim napiszesz treść, ustal **po co** ktoś wpisuje frazę:
- **Informacyjna** („jak …", „co to …") → poradnik, artykuł.
- **Komercyjna** („najlepszy …", „ranking …") → porównanie, recenzja.
- **Transakcyjna** („kup …", „cena …") → strona produktu/usługi.
- **Nawigacyjna** (nazwa marki) → strona główna/kontakt.

Najprostszy test: wpisz frazę w Google i zobacz, **jaki typ treści** już się wyświetla. Dopasuj się do tego formatu.

### Dobór słów kluczowych

- Jedna główna fraza na podstronę + kilka pobocznych/long-tail.
- Frazę umieść w: **title, H1, pierwszym akapicie, jednym H2, URL-u**.
- Pisz naturalnie. Upychanie fraz szkodzi — Google i AI rozpoznają język ludzki.

### Nagłówki pod wyszukiwarki

- H2/H3 odzwierciedlają realne pytania użytkowników (świetne pod „People Also Ask").
- Jeden temat = jedna sekcja z opisowym nagłówkiem.

### Linkowanie wewnętrzne

- Linkuj z nowych treści do powiązanych podstron i odwrotnie — to jeden z najmocniejszych sygnałów, jaki kontrolujesz.
- **Opisowy anchor** („zobacz nasz kurs SEO"), nigdy „kliknij tutaj".
- Strony ważne biznesowo (usługi, produkty) powinny dostawać najwięcej linków wewnętrznych.

### Obrazy

- **`alt`** — opisz, co jest na obrazku, w kontekście treści. Pomaga czytnikom ekranu i Grafice Google. Bez upychania fraz. Obrazy czysto dekoracyjne → `alt=""`.
- **Nazwa pliku** — opisowa, z myślnikami: `czerwony-rower-gorski.webp`, nie `IMG_2931.jpg`.
- **Format:** kolejność 2026 → **AVIF** (–50% vs JPEG) → **WebP** (–25–35%) → JPEG/PNG jako fallback dla starych przeglądarek.
- **Lazy-loading:** `loading="lazy"` dla obrazów **pod foldem**. Obraz LCP (zwykle bohater nad foldem) ładuj **eager** — lazy-loading go zaszkodzi Core Web Vitals.
- **Zawsze `width` i `height`** (lub `aspect-ratio` w CSS) → zero przeskoków layoutu (CLS).

```html
<!-- Obraz nad foldem (LCP): eager + fetchpriority -->
<img src="hero.avif" alt="Zespół przy pracy nad stroną"
     width="1200" height="630" fetchpriority="high">

<!-- Obraz pod foldem: lazy -->
<img src="galeria-1.webp" alt="Realizacja: sklep z meblami"
     width="800" height="600" loading="lazy" decoding="async">
```

> WordPress od 5.5 sam dokleja `loading="lazy"` do obrazów w treści — ale to **ty** w szablonie odpowiadasz za `width`/`height` i za `fetchpriority` na obrazie LCP.

---

## 6. Techniczne SEO

### sitemap.xml

- Lista URL-i do indeksacji + data ostatniej modyfikacji.
- WordPress **od 5.5 generuje sitemapę natywnie** pod `/wp-sitemap.xml` — dla małych/średnich stron to wystarcza.
- Jeśli używasz wtyczki SEO (Yoast/RankMath), ona robi własną sitemapę → **wyłącz natywną**, żeby nie mieć dwóch:

```php
add_filter( 'wp_sitemaps_enabled', '__return_false' ); // gdy wtyczka robi sitemapę
```

- **Nigdy dwa generatory naraz.** Po publikacji zgłoś sitemapę w Google Search Console.

### robots.txt

- Steruje, co robot może skanować (to **nie** to samo co indeksowanie — do wykluczenia z indeksu służy `noindex`).
- Sensowne minimum dla WordPress + link do sitemapy:

```
User-agent: *
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php

Sitemap: https://twojadomena.pl/wp-sitemap.xml
```

> Nie blokuj `/wp-content/uploads/` (tam są obrazy). Treści wrażliwe wykluczaj `noindex`, nie samym robots.txt.

### Przyjazne URL-e

- W WP ustaw **Ustawienia → Bezpośrednie odnośniki → Nazwa wpisu** (`/nazwa-wpisu/`). Nigdy `?p=123`.
- Krótkie, opisowe, **małe litery, myślniki** (`/uslugi/strony-www`), bez polskich znaków/spacji/podkreśleń. Celuj < 60 znaków.
- Słowo kluczowe blisko początku. Hierarchia odzwierciedla strukturę: `/kategoria/podkategoria/strona`.
- Cała witryna na **HTTPS**.

### Przekierowania 301

- 301 = trwała zmiana adresu; przekazuje (prawie cały) link juice i ranking na nowy URL.
- Stosuj przy: zmianie sluga/struktury, HTTP→HTTPS, zmianie domeny, scalaniu duplikatów, naprawie 404 (na pokrewną stronę).
- **Każda zmiana URL-a opublikowanej strony = 301** ze starego na nowy. Trzymaj przekierowanie jak najdłużej (min. rok, najlepiej bezterminowo).
- Nie rób łańcuchów (A→B→C). Przekieruj od razu do celu (A→C).

### Core Web Vitals

Google ocenia na 75. percentylu realnych użytkowników (pole, nie lab). Progi „dobre":

| Metryka | Co mierzy | Próg „dobry" |
|---|---|---|
| **LCP** (Largest Contentful Paint) | Czas wyświetlenia największego elementu | **< 2,5 s** |
| **CLS** (Cumulative Layout Shift) | Przeskoki layoutu | **< 0,1** |
| **INP** (Interaction to Next Paint) | Responsywność na interakcje | **< 200 ms** |

**Jak spełnić w custom theme:**

- **LCP:** szybki hosting/serwer, obrazy w AVIF/WebP, `fetchpriority="high"` na obrazie bohatera, preload kluczowego fontu, CDN, minimum render-blocking CSS/JS.
- **CLS:** `width`/`height` (lub `aspect-ratio`) na każdym obrazie/wideo/embedzie; rezerwuj miejsce na reklamy/bannery; `font-display: swap` + preload fontów (przeciw przeskokom tekstu); nie wstrzykuj treści nad istniejącą.
- **INP:** mniej JavaScriptu, dziel długie zadania, odraczaj nieistotne skrypty (`defer`/`async`), ogranicz third-party (czaty, piksele, widżety).

```php
// functions.php — odładuj jQuery/skrypty, których motyw nie używa (pomaga INP/LCP)
add_action( 'wp_enqueue_scripts', function () {
  // przykład: zdejmij emoji-skrypt WP (zbędny narzut)
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
}, 20 );
```

---

## 7. WordPress: Yoast vs RankMath vs ręczna implementacja

### Co motyw MUSI generować SAM (niezależnie od wtyczki)

To jest **fundament** — wtyczka tego nie naprawi:

1. **Semantyczny HTML5** (`header`/`nav`/`main`/`article`/`section`/`aside`/`footer`).
2. **Poprawną hierarchię nagłówków** — jeden `<h1>` per szablon, logiczne H2/H3.
3. **`<meta charset>` + `<meta viewport>`** w `<head>`.
4. **`wp_head()` i `wp_footer()`** — bez nich nic nie działa.
5. **`add_theme_support('title-tag')`** — dynamiczny `<title>`.
6. **`width`/`height` na obrazach + `fetchpriority` na LCP** (CLS/LCP).
7. **Wydajny CSS/JS** (mało render-blocking, odładowanie zbędnych skryptów).
8. **Dostępne, semantyczne menu** (`wp_nav_menu` w `<nav>`).

### Co może zrobić wtyczka (albo ty ręcznie)

`<title>`/meta description per strona, kanoniczne, OG/Twitter, sitemapa XML, JSON-LD (schema), przekierowania, analiza treści, breadcrumbs.

### Którą drogę wybrać

| Opcja | Kiedy | Plusy | Minusy |
|---|---|---|---|
| **RankMath** | Większość małych/średnich firm | Dużo funkcji za darmo (redirecty, wiele fraz, 18 typów schema, podpowiedzi linków), nowoczesny kreator startowy | Mniej tutoriali niż Yoast |
| **Yoast** | Gdy zależy na ekosystemie wiedzy i Schema API | Ogromna baza poradników, czysty Schema API do rozszerzania, „bezpieczny" wybór | Część funkcji (redirecty, wiele fraz, linki wewn.) płatna |
| **Ręcznie w theme** | Lekki landing, pełna kontrola, zero narzutu wtyczki | Najlżejszy kod, brak zależności, pełna kontrola nad `<head>` i JSON-LD | Wszystko utrzymujesz sam; łatwo o lukę przy skali |

**Rekomendacja dla początkujących:** zbuduj motyw z poprawnym fundamentem (pkt „MUSI"), a meta/schema/sitemapę **na początek oddaj wtyczce** (RankMath dla bogatego darmowego zakresu albo Yoast dla bazy wiedzy). Ręczną implementację `<head>`/JSON-LD wybieraj świadomie dla lekkich landingów — i wtedy **wyłącz** dublujące się funkcje, żeby nie mieć dwóch zestawów tagów.

> **Zasada „jednego źródła":** title/description/OG generuje **albo** theme, **albo** wtyczka — nigdy oba naraz (inaczej zdublowane tagi i konflikty).

---

## 8. Checklista SEO on-page — do odhaczenia per podstrona

### Struktura i semantyka
- [ ] Dokładnie **jeden `<h1>`** = temat tej strony
- [ ] H2/H3 logicznie zagnieżdżone, **bez przeskoków** poziomów
- [ ] Nagłówki opisowe (nie „Wstęp"), główna fraza w H1 naturalnie
- [ ] Landmarki: jeden `<main>`, `<header>`, `<nav>`, `<footer>`; sekcje w `<section>`/`<article>`
- [ ] Menu w `<nav>`, nie w `<div>`

### Meta (`<head>`)
- [ ] `<title>` unikalny, **50–60 znaków**, fraza na początku, wzorzec `Fraza | Marka`
- [ ] `meta description` unikalny, **150–160 znaków**, z zachętą + frazą
- [ ] `<link rel="canonical">` ustawiony (self-referencing)
- [ ] OG: `og:title`, `og:description`, `og:image` (1200×630, PNG/JPEG), `og:url` (= canonical), `og:type`
- [ ] Twitter Card: `summary_large_image` + title/description/image
- [ ] `wp_head()` i `wp_footer()` obecne; brak zdublowanych tagów (theme vs wtyczka)

### Dane strukturalne (JSON-LD)
- [ ] Dobrany właściwy typ (Article / Product / LocalBusiness / FAQPage / Course…)
- [ ] **BreadcrumbList** jeśli są okruszki
- [ ] Schema zgodna z **widoczną** treścią, bez dublowania typów
- [ ] Przeszła [Rich Results Test](https://search.google.com/test/rich-results) bez błędów

### Treść
- [ ] Format dopasowany do **intencji** wyszukiwania
- [ ] Jedna główna fraza + long-tail; w title, H1, 1. akapicie, jednym H2, URL-u
- [ ] Linki wewnętrzne do/z powiązanych stron, **opisowe anchory**
- [ ] Bez upychania fraz; język naturalny

### Obrazy
- [ ] `alt` opisowy (dekoracyjne → `alt=""`)
- [ ] Nazwy plików opisowe, z myślnikami, bez polskich znaków
- [ ] AVIF/WebP z fallbackiem; obrazy zoptymalizowane wagowo
- [ ] `width` + `height` na każdym obrazie; obraz LCP `fetchpriority="high"`, reszta `loading="lazy"`

### Techniczne
- [ ] URL krótki, małe litery, myślniki, fraza blisko początku, HTTPS
- [ ] Strona w `wp-sitemap.xml` (lub w sitemapie wtyczki) — tylko **jeden** generator
- [ ] `robots.txt` nie blokuje treści ani `uploads`; zawiera link do sitemapy
- [ ] Strony usunięte/przeniesione mają **301** (bez łańcuchów)
- [ ] CWV: LCP < 2,5 s, CLS < 0,1, INP < 200 ms (test PageSpeed Insights)
- [ ] Strona indeksowalna (brak przypadkowego `noindex`)

---

## Źródła

- [Yoast — How to use headings on your site](https://yoast.com/how-to-use-headings-on-your-site/)
- [Search Engine Journal — How To Use Header Tags: SEO Best Practices](https://www.searchenginejournal.com/on-page-seo/header-tags/)
- [Conductor — How to Optimize H1–H6 Headings for SEO, AEO, and Visibility](https://www.conductor.com/academy/headings/)
- [Seobility Wiki — How to use Headings](https://www.seobility.net/en/wiki/H1-H6_headings)
- [W3Schools — HTML Semantic Elements](https://www.w3schools.com/html/html5_semantic_elements.asp)
- [web.dev — Semantic HTML](https://web.dev/learn/html/semantic-html)
- [Search Atlas — Semantic HTML for SEO (2025)](https://searchatlas.com/blog/semantic-html/)
- [Destination Digital — Title & Meta Description Length 2025](https://destination-digital.co.uk/news-blogs-case-studies/title-meta-description-length-google-serps-2025/)
- [Zyppy — The Ideal Title Tag Length for Google SEO](https://zyppy.com/title-tags/meta-title-tag-length/)
- [EverywhereMarketer — Ultimate Guide To Social Meta Tags (Open Graph & X Cards)](https://www.everywheremarketer.com/blog/ultimate-guide-to-social-meta-tags-open-graph-and-twitter-cards)
- [OG Fixer — Open Graph Meta Tags Best Practices 2026](https://ogfixer.com/blog/open-graph-meta-tags-best-practices)
- [Google Search Central — Organization Schema Markup](https://developers.google.com/search/docs/appearance/structured-data/organization)
- [Incremys — Schema.org for SEO: Ready-to-Use JSON-LD Examples (2026)](https://www.incremys.com/en/resources/blog/schema-seo)
- [jsonld.com — Organization Schema JSON-LD](https://jsonld.com/organization/)
- [web.dev — Defining the Core Web Vitals thresholds](https://web.dev/articles/defining-core-web-vitals-thresholds)
- [Google Search Central — Understanding Core Web Vitals](https://developers.google.com/search/docs/appearance/core-web-vitals)
- [OWDT — How to improve Core Web Vitals in 2025](https://owdt.com/insight/how-to-improve-core-web-vitals/)
- [Google Search Central — Image SEO Best Practices](https://developers.google.com/search/docs/appearance/google-images)
- [Digital Applied — Image SEO 2026: Complete Optimization and Alt Text Guide](https://www.digitalapplied.com/blog/image-seo-complete-optimization-guide-2026)
- [Semrush — 9 SEO Best Practices](https://www.semrush.com/blog/seo-best-practices/)
- [WPBeginner — How to Optimize Your WordPress Robots.txt for SEO](https://www.wpbeginner.com/wp-tutorials/how-to-optimize-your-wordpress-robots-txt-for-seo/)
- [Yoast — WordPress robots.txt: Best-practice example](https://yoast.com/wordpress-robots-txt-example/)
- [WordPress.com — What is a WordPress Sitemap](https://wordpress.com/blog/2025/04/08/wordpress-sitemap/)
- [Octaria — SEO-Friendly URL Structure: Best Practices 2025](https://www.octaria.com/blog/seo-friendly-url-structure-best-practices-2025)
- [Semrush — 301 Redirects: How to Use Them & How They Affect SEO](https://www.semrush.com/blog/301-redirects/)
- [WPSchool — Yoast SEO vs Rank Math (2026)](https://wpschool.com/comparisons/yoast-vs-rank-math/)
- [Kinsta — Rank Math vs Yoast SEO](https://kinsta.com/blog/rank-math-vs-yoast/)

---

*Dokument roboczy SOP. Aktualizuj progi i limity przy zmianach algorytmów Google (CWV, długości snippetów). Stan wiedzy: czerwiec 2026.*
