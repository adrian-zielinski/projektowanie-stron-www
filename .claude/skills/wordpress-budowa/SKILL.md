---
name: wordpress-budowa
description: >
  Buduje stronę jako CUSTOM CLASSIC THEME WordPress (PHP), zero Elementora/Divi/WPBakery
  i zero builderów wizualnych — wygląd i animacje pisane w kodzie. Obejmuje: strukturę
  motywu i hierarchię szablonów, ACF (pola + Flexible Content jako zamiennik buildera,
  Local JSON), Tailwind v4 + Vite (config, enqueue prod/dev przez manifest, czyszczenie
  klas), animacje GSAP/ScrollTrigger/Lenis, LiteSpeed Cache + Purge po deployu, dev lokalny
  (LocalWP/wp-env), deploy na LH.pl/Mango (FTP/SSH/rsync/git, stage na subdomenie) oraz
  minimalny zestaw wtyczek. Użyj ZA KAŻDYM RAZEM, gdy pojawia się WordPress, WP, motyw,
  theme, child theme, ACF, szablon, functions.php, enqueue, wtyczka, wdrożenie, deploy,
  LiteSpeed, hosting LH/Mango — nawet jeśli użytkownik nie nazwie tego wprost "budową motywu".
---

# WordPress — budowa custom classic theme

Implementacja warstwy WordPress: od pustego motywu do wdrożonej strony. Twarda zasada projektu — **zero Elementora i builderów wizualnych**. Cały wygląd, layout i animacje żyją w kodzie motywu; klient edytuje wyłącznie treść przez ACF. To daje pełną kontrolę nad markupem, kolejnością ładowania skryptów i Core Web Vitals — czego buildery nie dają.

Pełny SOP ze wszystkimi snippetami: `wiedza/06-stack-technologiczny.md`. Ten skill to ścieżka działania + antywzorce + komendy. Po szczegóły deployu i stage idź do `references/deploy-lh.md`.

## Bramka na start (rigid)

Zanim cokolwiek zbudujesz, ustal i potwierdź:
- **Hosting docelowy** — domyślnie LH.pl/Mango (LiteSpeed, SSH, DirectAdmin, Redis). Inny hosting = sprawdź, czy jest LiteSpeed, zanim zaproponujesz LiteSpeed Cache.
- **Dev lokalny** — LocalWP (domyślnie dla początkujących) albo wp-env (gdy chcesz wersjonować środowisko).
- **Slug motywu** — jedna nazwa (`moj-motyw`) używana spójnie w ścieżkach, `base` Vite, handle'ach enqueue. Zmiana sluga później psuje ścieżki `dist/`.
- **Zakres treści edytowalnej** — które sekcje klient ma zmieniać sam (→ ACF/Flexible Content), a które są sztywne.

Nie zaczynaj od instalowania wtyczek „na zapas". Custom theme robi większość roboty kodem.

## Kolejność działania

1. **Szkielet motywu** — utwórz strukturę plików (sekcja niżej), `style.css` z nagłówkiem, `functions.php` wczytujący `inc/`. `index.php` musi istnieć (ostatni fallback hierarchii).
2. **`header.php` / `footer.php`** — z `wp_head()` i `wp_footer()`. Bez nich enqueue i połowa wtyczek nie działa. To pierwsza rzecz do sprawdzenia przy „style się nie ładują".
3. **Tailwind v4 + Vite** — `npm init`, instalacja, `vite.config.js` z `manifest: true` i `base` wskazującym na `dist/`, entry `src/js/main.js` importujące `src/css/main.css`.
4. **Enqueue z manifestu** — `inc/enqueue.php` ładuje z `dist/.vite/manifest.json` na produkcji, z Vite dev servera gdy `IS_VITE_DEV`. Patrz antywzorce niżej.
5. **ACF** — zainstaluj, włącz **Local JSON** (`acf-json/` w motywie), zdefiniuj grupy pól, ustaw Location Rules. Renderuj polami w szablonach (escapuj wyjście).
6. **Flexible Content jako zamiennik buildera** — pętla po `sekcje` → `get_template_part('template-parts/content/content', get_row_layout())`. Każdy layout = osobny plik PHP, który Ty kontrolujesz.
7. **Animacje** — GSAP + ScrollTrigger + Lenis spięte jednym tickerem, całość za bramką `prefers-reduced-motion`.
8. **Wydajność** — fonty lokalne + preload + `font-display: swap`; obrazy z `width`/`height` + WebP, hero z `fetchpriority="high"`; LiteSpeed Cache + Redis object cache.
9. **Build → deploy → Purge** — `npm run build`, wgraj motyw **z `dist/`**, `LiteSpeed → Purge All`. Patrz `references/deploy-lh.md`.

## Struktura motywu (classic theme)

```
moj-motyw/
├── style.css            ← nagłówek-metadane (Theme Name, Version…); produkcyjny CSS idzie z Vite
├── functions.php        ← require inc/setup.php, inc/enqueue.php, inc/acf.php
├── index.php            ← fallback całej hierarchii — musi działać zawsze
├── front-page.php       ← strona główna (statyczna) — składa sekcje get_template_part()
├── home.php             ← lista wpisów bloga
├── page.php  single.php  archive.php  search.php  404.php
├── header.php  footer.php   ← wp_head() / wp_footer() OBOWIĄZKOWE
├── template-parts/content/  ← content-hero.php, content-cta.php, content-card.php (sekcje Flexible Content)
├── inc/                 ← setup.php, enqueue.php, acf.php
├── src/                 ← ŹRÓDŁA: css/main.css, js/main.js  (TO buildujesz)
├── dist/                ← OUTPUT Vite  (TO ładuje WP — commituj do repo)
├── acf-json/            ← Local JSON ACF (definicje pól w gicie)
└── screenshot.png       ← podgląd w panelu (1200×900)
```

**Hierarchia szablonów** (co WP ładuje): strona główna → `front-page.php` → `home.php` → `index.php`; Page → `page.php` → `singular.php` → `index.php`; Post → `single.php`; archiwum → `category.php`/`archive.php`; błąd → `404.php`. `index.php` zawsze na końcu.

## Tailwind v4 + Vite — kluczowe punkty

- **v4 ≠ v3.** W v4 nie ma `tailwind.config.js` ani `postcss.config.js` — używasz pluginu `@tailwindcss/vite` + w CSS `@import "tailwindcss";` i `@source "../../**/*.php";`. Tylko gdy projekt jest na v3, dochodzi `tailwind.config.js` z polem `content`. Nie mieszaj wzorców.
- **Czyszczenie klas (purge) zależy od `@source`/`content`.** Musi pokrywać **wszystkie** pliki `.php` i `.js`, inaczej z buildu wypadną realnie używane klasy. Klasy budowane dynamicznie (np. nazwa z ACF sklejana w stringu) purge wytnie — wypisuj pełne klasy lub dodaj safelistę.
- **`base` w `vite.config.js`** musi wskazywać `/wp-content/themes/<slug>/dist/`, bo inaczej ścieżki do assetów (fonty, obrazy z CSS) będą złe na produkcji.
- **Ścieżka manifestu**: Vite 5+ zapisuje `dist/.vite/manifest.json` (starsze: `dist/manifest.json`). Sprawdź po pierwszym buildzie i dostosuj ścieżkę w `enqueue.php`.

```bash
npm install -D vite tailwindcss @tailwindcss/vite   # v4
npm run dev      # Vite + HMR (wymaga define('IS_VITE_DEV', true) w wp-config.php)
npm run build    # → dist/ + manifest
```

## ACF — zamiennik buildera bez utraty kontroli

- **Local JSON to obowiązek**, nie opcja. Bez `acf-json/` definicje pól żyją tylko w bazie i nie jadą z kodem przez git — między środowiskami się rozjeżdżają. Włącz folder `acf-json/` w motywie.
- **Flexible Content > Elementor.** Klient dodaje i przestawia predefiniowane sekcje w panelu; Ty trzymasz wygląd i animacje w `template-parts/content/content-*.php`. To daje builderowy UX bez builderowego balastu CSS/JS.
- **Renderowanie**: `get_field()` zwraca wartość (do logiki), `the_field()` wypisuje. Repeater/Flexible: `have_rows()` + `the_row()` + `the_sub_field()` / `get_row_layout()`.
- **Escapuj każde wyjście**: `esc_html()`, `esc_url()`, `esc_attr()`. To podstawa bezpieczeństwa, nie kosmetyka.

## Animacje — spięcie GSAP/ScrollTrigger/Lenis

- Zarejestruj `ScrollTrigger`, spnij Lenis z tickerem GSAP **jedną** pętlą rAF (`gsap.ticker.add(t => lenis.raf(t*1000))`, `lagSmoothing(0)`), podłącz `lenis.on('scroll', ScrollTrigger.update)` — inaczej dostajesz scroll-jank, który zabija INP.
- **Cały blok animacji za bramką** `window.matchMedia('(prefers-reduced-motion: reduce)').matches`. Gdy użytkownik ogranicza ruch — treść pojawia się statycznie, od razu.
- **Animuj tylko `transform` i `opacity`** (GPU, bez reflow). Nie animuj `width`/`top`/`margin`.
- Przejścia stron: domyślnie **View Transitions API** (`@view-transition { navigation: auto; }`, zero JS, progressive enhancement). Swup tylko gdy potrzeba reżyserowanych przejść — wtedy po każdej tranzycji `ScrollTrigger.refresh()` i ponowne podłączenie animacji.

## Antywzorce (czego nie robić)

- **Elementor / Divi / WPBakery / dowolny builder wizualny.** Złamanie głównej zasady projektu — dokładają ciężki CSS/JS i psują CWV. Treść edytowalna idzie przez ACF + Flexible Content.
- **Drugiej wtyczki cache** obok LiteSpeed (W3 Total Cache, WP Super Cache, WP Rocket) — konflikt i podwójny cache. Na LiteSpeed jedyną wtyczką cache jest LiteSpeed Cache.
- **Edycja motywu przez edytor w panelu WP** — zmiany poza gitem, łatwo nadpisać deployem. Edytuj lokalnie, wdrażaj przez FTP/SSH/git.
- **Wgranie motywu bez `dist/`** — strona ładuje się bez CSS/JS. W tym projekcie `dist/` commitujemy do repo właśnie po to.
- **Hardkodowanie ścieżek** zamiast `get_template_directory_uri()` / `get_template_directory()` — psuje się przy zmianie domeny/sluga.
- **Pominięcie Purge po deployu** — klient widzi stary wygląd z cache. To najczęstsza „strona się nie zmieniła" pułapka. Purge po **każdym** nowym `dist/`.
- **Google Fonts z CDN** — wolniej i problem RODO. Hostuj fonty lokalnie w `dist/fonts/`.
- **Wtyczki „all-in-one"** robiące wszystko po trochu — balast. Mniej wtyczek = szybciej i bezpieczniej (cel < 20).

## Minimalny zestaw wtyczek

**Rdzeń (zawsze):** ACF (Local JSON), LiteSpeed Cache (jedyny cache na LH), Rank Math *lub* Yoast (jeden, nie oba), UpdraftPlus (backup poza serwer), Wordfence *lub* Solid Security, Fluent Forms (formularze).

**Warunkowo:** WooCommerce (sklep), LearnDash/Tutor LMS/LifterLMS (kursy), Better Search Replace (migracje URL stage↔prod), WP Mail SMTP / Fluent SMTP (dostawa maili).

**Nie instaluj:** drugiej wtyczki cache, page-buildera, wtyczek all-in-one.

## Deploy i stage

Skrót: `npm run build` → wgraj motyw z `dist/` na `wp-content/themes/<slug>/` → `LiteSpeed → Purge All`. Workflow docelowy: **lokalnie → stage (subdomena) → produkcja**.

Pełna procedura (FTP/SFTP, SSH+rsync, git clone/pull, krok-po-kroku stage na subdomenie LH, podmiana URL w bazie, noindex+hasło, Redis/PHP w DirectAdmin) → **`references/deploy-lh.md`**. Czytaj ten plik, gdy zadanie dotyczy wdrożenia, migracji lub konfiguracji serwera.

## Weryfikacja przed zamknięciem zadania

Nie deklaruj „gotowe" bez dowodu. Odhacz:

```
[ ] index.php istnieje; header.php/footer.php mają wp_head() i wp_footer()
[ ] npm run build → dist/ + manifest istnieją; enqueue czyta właściwą ścieżkę manifestu
[ ] @source/content pokrywa wszystkie .php i .js (sprawdź, że klasy nie wypadły z buildu)
[ ] ACF: Local JSON włączony, definicje w acf-json/
[ ] Animacje za bramką prefers-reduced-motion
[ ] Fonty lokalne + preload + font-display: swap
[ ] Obrazy: width/height, WebP, hero fetchpriority="high"
[ ] LiteSpeed Cache ON + Redis object cache; PHP 8.2/8.3 w DirectAdmin
[ ] Po deployu: Purge All; sprawdź stronę zalogowany i wylogowany
[ ] PageSpeed Insights: LCP < 2,5s, INP < 200ms, CLS < 0,1
```

## Materiały

- `wiedza/06-stack-technologiczny.md` — pełny SOP z gotowymi snippetami (PHP, vite.config, enqueue, GSAP). Czytaj, gdy potrzebujesz dokładnego kodu do wklejenia.
- `references/deploy-lh.md` — deploy na LH/Mango i stage na subdomenie. Czytaj przy wdrożeniu, migracji URL lub konfiguracji serwera.
