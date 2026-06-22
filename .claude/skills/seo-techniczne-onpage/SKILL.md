---
name: seo-techniczne-onpage
description: >
  SEO techniczne i on-page dla stron WordPress budowanych jako custom classic theme
  (zero Elementora, zero page-buildera) — kod od pierwszego pliku szablonu. Obejmuje:
  hierarchię nagłówków H1–H6, semantyczny HTML5 (landmarki), meta title/description/canonical,
  Open Graph i Twitter Card, JSON-LD (LocalBusiness, Product, Course, FAQPage, BreadcrumbList,
  Article, Organization), optymalizację obrazów (alt, AVIF/WebP, lazy, CLS), Core Web Vitals
  (LCP/CLS/INP), podział pracy theme vs wtyczka SEO oraz checklistę on-page per podstrona.
  Użyj ZAWSZE, gdy mowa o "SEO", "pozycjonowaniu", "widoczności w Google", "wynikach
  wyszukiwania", "nagłówkach", "meta tagach", "schema/danych strukturalnych", "Core Web
  Vitals", "indeksacji", "sitemapie", "canonical" lub "OG/social preview" — także gdy
  użytkownik prosi o szablon WordPress i nie nazwie SEO wprost (bo strukturę pod SEO
  wpisujemy w kod od początku, a nie dorabiamy później).
---

# SEO techniczne i on-page (custom theme WordPress)

Sterujesz jakością SEO na poziomie, do którego żadna wtyczka nie sięgnie: jeden `<h1>`, semantyczne landmarki, czysty `<head>`, obrazy bez przeskoków layoutu. W custom theme to **ty piszesz HTML**, więc to ty odpowiadasz za fundament. Wtyczka SEO doda tytuły, meta i schema — ale złego HTML-a nie naprawi.

Kolejność robót (rigid — pominięcie psuje resztę): **najpierw poprawny semantyczny HTML w szablonie → potem meta i dane strukturalne → na końcu treść pod intencję.**

Pełny SOP ze źródłami i pełnymi przykładami: `wiedza/05-seo-on-page.md`. Sięgaj tam po rozszerzone fragmenty kodu i listę źródeł.

## 1. Hierarchia nagłówków H1–H6

Nagłówki to struktura (spis treści), **nie wygląd**. Rozmiar i kolor ustawiasz w CSS — nigdy nie wybieraj poziomu nagłówka dla efektu wizualnego.

- **Dokładnie jeden `<h1>` na podstronę** = jej główny temat. Wiele H1 jest technicznie dozwolone, ale myli robota o tym, co jest tematem strony.
- `<h2>` = główne sekcje, `<h3>` = podsekcje wewnątrz H2. Bez przeskoków poziomów (nie H1 → H4 „bo ładniej").
- Nagłówki opisowe, pisane dla człowieka. Unikaj pustych etykiet („Wstęp", „Więcej informacji").
- Główna fraza w H1 naturalnie, bez upychania.

**`<h1>` per typ szablonu:** `front-page.php` → przekaz marki + propozycja wartości · `single.php` → `the_title()` wpisu · `page.php` → tytuł strony · `archive.php`/`category.php` → nazwa archiwum · `search.php` → „Wyniki dla: …" · `404.php` → czytelny komunikat błędu.

Treść z `the_content()` (Gutenberg) ma własne nagłówki — pilnuj, by **redaktor zaczynał od H2** (H1 należy do szablonu). Zapisz to w instrukcji dla klienta.

Antywzorce: kilka H1 na stronie (logo w H1 + tytuł w H1); logo zaszyte w `<h1>` na każdej podstronie (każda ma wtedy ten sam temat); H3 użyty jako „pogrubienie na siłę"; brak H1 na stronie głównej zbudowanej z samych „sekcji".

## 2. Semantyczny HTML5

Element semantyczny mówi robotowi i czytnikowi ekranu, **czym** jest blok. `<nav>` znaczy „nawigacja"; `<div>` nie znaczy nic. Mniej zgadywania = sprawniejsze indeksowanie i landmarki dla dostępności (WCAG).

Szkielet: `<header>` (logo + `<nav aria-label="…">`) → `<main>` (DOKŁADNIE JEDEN, treść unikalna dla strony) zawierający `<article>` z `<h1>` i `<section>`/`<aside>` → `<footer>`.

- `<main>` — jeden na stronę, bez powtarzalnego nagłówka/stopki w środku.
- `<section>` — wydzielona część treści, **prawie zawsze z nagłówkiem**. Do samego stylowania użyj `<div>`.
- `<article>` — treść samodzielna (wpis, produkt, karta usługi).
- `<nav>` — daj `aria-label`, gdy masz więcej niż jeden (menu, breadcrumbs).

Antywzorce: „div-suppa" zamiast landmarków; wiele `<main>`; `<section>` bez nagłówka jako kontener stylujący; menu w `<div>` zamiast `<nav>`.

## 3. Meta — `<head>` motywu

Wpinaj przez `wp_head` (functions.php) albo w `header.php`. **Zawsze** wywołuj `wp_head()` w `<head>` i `wp_footer()` przed `</body>` — bez tego nie działa title-tag, style, skrypty, wtyczki.

- **Title:** 50–60 znaków, wzorzec `Główna fraza | Marka`, fraza na początku, unikalny per strona. Nie hardkoduj — użyj `add_theme_support( 'title-tag' )` i pozwól rdzeniowi/wtyczce generować dynamicznie.
- **Meta description:** 150–160 znaków, unikalna, jak zachęta z frazą. Nie jest czynnikiem rankingowym, ale podnosi CTR.
- **Canonical:** `<link rel="canonical">` self-referencing (na samą siebie), chyba że celowo scalasz duplikaty. Chroni przed `?utm=`, paginacją, www vs bez.
- **Open Graph (5 obowiązkowych):** `og:title`, `og:description`, `og:image`, `og:url` (= canonical), `og:type`. Obrazek **1200×630 px, PNG/JPEG** (nie WebP/SVG — social ich nie renderuje), < 500 KB.
- **Twitter Card:** `summary_large_image` + title/description/image. Crawler X nie wykonuje JS — tagi muszą być w surowym HTML, wcześnie w `<head>`.

Pełny szablon `header.php` z gotowymi tagami OG/Twitter: `wiedza/05-seo-on-page.md` sekcja 3.5.

## 4. Dane strukturalne JSON-LD

Osobny blok `<script type="application/ld+json">`, każdy z `@context: "https://schema.org"` i `@type`. Oznaczaj tylko treść **widoczną** na stronie (Google karze schema niezgodną z treścią) i **nie dubluj typów** (np. Article + BlogPosting o tym samym).

| Typ | Gdzie |
|---|---|
| **Organization** | Strona główna / cała witryna (tożsamość, logo, social) |
| **LocalBusiness** | Firma z fizyczną lokalizacją (adres, godziny) — rozszerza Organization |
| **Product** | Karta produktu (cena, dostępność, oceny) |
| **Course** | Strona kursu/szkolenia (z `provider`) |
| **FAQPage** | Sekcja Q&A (`mainEntity` → Question/Answer) |
| **BreadcrumbList** | Każda podstrona z okruszkami |
| **Article** | Wpisy bloga, artykuły (z `author`, `publisher`, daty) |

Wstrzykuj warunkowo przez `wp_head` (np. Article tylko gdy `is_single()`). Koduj `wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )` — `UNESCAPED_UNICODE` dba o polskie znaki. Testuj w [Rich Results Test](https://search.google.com/test/rich-results).

Gotowe przykłady JSON-LD każdego typu + wstrzykiwanie w theme: `wiedza/05-seo-on-page.md` sekcja 4.

## 5. Obrazy

- **`alt`** opisuje treść obrazka w kontekście; dekoracyjne → `alt=""`. Bez upychania fraz.
- **Nazwa pliku** opisowa, z myślnikami, bez polskich znaków: `czerwony-rower-gorski.webp`, nie `IMG_2931.jpg`.
- **Format (kolejność 2026):** AVIF → WebP → JPEG/PNG jako fallback.
- **`width` + `height`** (lub `aspect-ratio`) na każdym obrazie/wideo/embedzie → zero CLS.
- **LCP (bohater nad foldem):** ładuj **eager** + `fetchpriority="high"`. Reszta pod foldem: `loading="lazy" decoding="async"`. Lazy na obrazie LCP **szkodzi** Core Web Vitals.

WordPress sam dokleja `loading="lazy"` do obrazów w treści — ale `width`/`height` i `fetchpriority` na LCP to **twoja** robota w szablonie.

## 6. Core Web Vitals

Próg „dobry" (75. percentyl realnych użytkowników): **LCP < 2,5 s · CLS < 0,1 · INP < 200 ms**.

- **LCP:** szybki hosting, AVIF/WebP, `fetchpriority="high"` na bohaterze, preload kluczowego fontu, CDN, minimum render-blocking CSS/JS.
- **CLS:** `width`/`height` na mediach, rezerwa miejsca na bannery, `font-display: swap` + preload fontów, nie wstrzykuj treści nad istniejącą.
- **INP:** mniej JS, dziel długie zadania, `defer`/`async`, ogranicz third-party (czaty, piksele). Odładuj zbędne skrypty WP (np. emoji) przez `wp_enqueue_scripts`.

## 7. Co MOTYW musi generować SAM (wtyczka tego nie naprawi)

Fundament, który leży w kodzie szablonu — nie w żadnej wtyczce:

1. Semantyczny HTML5 (header/nav/main/article/section/aside/footer).
2. Poprawna hierarchia nagłówków — jeden `<h1>` per szablon.
3. `<meta charset>` + `<meta viewport>` w `<head>`.
4. `wp_head()` i `wp_footer()`.
5. `add_theme_support( 'title-tag' )`.
6. `width`/`height` na obrazach + `fetchpriority` na LCP.
7. Wydajny CSS/JS (mało render-blocking, odładowane zbędne skrypty).
8. Dostępne semantyczne menu (`wp_nav_menu` w `<nav>`).

**Co może zrobić wtyczka albo ty ręcznie:** title/description per strona, canonical, OG/Twitter, sitemapa XML, JSON-LD, przekierowania 301, breadcrumbs, analiza treści.

**Zasada jednego źródła:** title/description/OG generuje **albo** theme, **albo** wtyczka — nigdy oba (zdublowane tagi, konflikty). Włączasz wtyczkę SEO → usuń ręczne OG/description z szablonu. Wtyczka robi własną sitemapę → wyłącz natywną (`add_filter( 'wp_sitemaps_enabled', '__return_false' )`).

Rekomendacja dla początkujących: zbuduj motyw z poprawnym fundamentem (pkt 1–8), a meta/schema/sitemapę na początek oddaj wtyczce (RankMath — bogaty darmowy zakres; Yoast — baza wiedzy + Schema API). Ręczną implementację `<head>`/JSON-LD wybieraj świadomie dla lekkich landingów. Porównanie Yoast/RankMath/ręcznie: `wiedza/05-seo-on-page.md` sekcja 7.

## 8. Techniczne SEO (skrót)

- **Przyjazne URL-e:** Ustawienia → Bezpośrednie odnośniki → Nazwa wpisu. Krótkie, małe litery, myślniki, bez polskich znaków, fraza blisko początku, < 60 znaków, cała witryna na HTTPS.
- **sitemap.xml:** WP generuje natywnie `/wp-sitemap.xml` — wystarcza dla małych/średnich. Jeden generator, nigdy dwa. Zgłoś w Search Console.
- **robots.txt:** nie blokuj `/wp-content/uploads/`; treści wrażliwe wykluczaj `noindex`, nie robots.txt; dodaj link do sitemapy.
- **301:** każda zmiana sluga opublikowanej strony = 301 ze starego URL; bez łańcuchów (A→C, nie A→B→C); trzymaj min. rok.

## Checklista on-page — per podstrona

Odhacz przed uznaniem podstrony za gotową:

**Struktura i semantyka**
- [ ] Dokładnie jeden `<h1>` = temat tej strony
- [ ] H2/H3 logicznie zagnieżdżone, bez przeskoków poziomów
- [ ] Nagłówki opisowe; główna fraza w H1 naturalnie
- [ ] Landmarki: jeden `<main>`, `<header>`, `<nav>`, `<footer>`; sekcje w `<section>`/`<article>`; menu w `<nav>`

**Meta (`<head>`)**
- [ ] `<title>` unikalny, 50–60 znaków, `Fraza | Marka`
- [ ] `meta description` unikalna, 150–160 znaków, z zachętą + frazą
- [ ] `<link rel="canonical">` self-referencing
- [ ] OG: title/description/image (1200×630, PNG/JPEG)/url (= canonical)/type
- [ ] Twitter Card `summary_large_image` + title/description/image
- [ ] `wp_head()` + `wp_footer()` obecne; brak zdublowanych tagów (theme vs wtyczka)

**Dane strukturalne (JSON-LD)**
- [ ] Właściwy typ (Article/Product/LocalBusiness/FAQPage/Course/Organization…)
- [ ] BreadcrumbList jeśli są okruszki
- [ ] Schema zgodna z widoczną treścią, bez dublowania typów
- [ ] Przeszła Rich Results Test bez błędów

**Treść**
- [ ] Format dopasowany do intencji wyszukiwania
- [ ] Jedna główna fraza + long-tail; w title, H1, 1. akapicie, jednym H2, URL-u
- [ ] Linki wewnętrzne z opisowymi anchorami (nie „kliknij tutaj")
- [ ] Język naturalny, bez upychania fraz

**Obrazy**
- [ ] `alt` opisowy (dekoracyjne → `alt=""`)
- [ ] Nazwy plików opisowe, z myślnikami, bez polskich znaków
- [ ] AVIF/WebP z fallbackiem; zoptymalizowane wagowo
- [ ] `width` + `height` na każdym; LCP `fetchpriority="high"`, reszta `loading="lazy"`

**Techniczne**
- [ ] URL krótki, małe litery, myślniki, fraza blisko początku, HTTPS
- [ ] Strona w jednej sitemapie (tylko jeden generator)
- [ ] `robots.txt` nie blokuje treści ani `uploads`; link do sitemapy
- [ ] Przeniesione/usunięte strony mają 301 bez łańcuchów
- [ ] CWV: LCP < 2,5 s, CLS < 0,1, INP < 200 ms (PageSpeed Insights)
- [ ] Strona indeksowalna (brak przypadkowego `noindex`)

## Materiały
- `wiedza/05-seo-on-page.md` — pełny SOP: gotowe szablony `header.php`, wszystkie przykłady JSON-LD, snippety wydajności, porównanie wtyczek, źródła. Czytaj, gdy potrzebujesz pełnego kodu do skopiowania.
