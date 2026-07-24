# Szablony startowe

Gotowe assety startowe dla projektu „Projektowanie stron WWW". Dwa motywy do wyboru:

- **`studio-base/`** — **domyślny silnik (zalecany).** Brandless motyw-baza: biblioteka 17 typów sekcji (ACF/SCF Flexible Content), render przez `get_field()`, moduł SEO w kodzie, bespoke CSS w pełni sterowany tokenami. Pracujesz w modelu **baza + motyw-dziecko per klient**: bazy nie ruszasz, dziecko dostarcza tylko paletę i fonty (`tokens.css`) oraz treść przez panel. Do tego celujesz, gdy budujesz stronę od briefu albo zasilasz ją z pliku Claude design.
- **`starter-theme/`** — minimalny punkt startu „od zera". Jedna sekcja hero, stack PHP + Tailwind v4 (Vite) + ACF + GSAP/Lenis. Bierz go, gdy chcesz ręcznie złożyć prosty motyw na Tailwindzie bez biblioteki sekcji.

Oba są custom classic theme — bez Elementora i page-builderów, cały wygląd i animacje w kodzie.

---

## studio-base — silnik baza + dziecko (zalecany)

**Zasada:** motywu nie budujesz od zera per klient. Instalujesz `studio-base` (silnik) raz, a per klient tworzysz **motyw-dziecko** = tylko marka.

1. **Baza** — wgraj `studio-base/` do `wp-content/themes/`. `:root` w `assets/css/main.css` ma neutralne tokeny (`--c-primary/--c-bg/--c-accent…` + kanały `--c-*-rgb`) i neutralne fonty. Żaden komponent nie ma zaszytego koloru — wszystko czyta z tokenów.
2. **Dziecko** — nowy motyw z nagłówkiem `Template: studio-base`, w nim `assets/css/tokens.css` nadpisujący tokeny paletą i fontami marki (enqueue z zależnością od handle bazy, żeby `:root` dziecka wygrał). Treść i zdjęcia klient wpisuje w panelu (SCF/ACF), nie w plikach motywu.
3. **Pola i treść** — Flexible Content „sekcje" renderuje się przez `get_field()` (działa na darmowym SCF i na ACF Pro). Pola „obraz" podpinaj po attachment ID, nie po URL.

Efekt: nowy klient = `tokens.css` (paleta/fonty) + treść w panelu → prawie zero pracy nad layoutem. Nowe sekcje dopisujesz tylko, gdy czegoś brak w bibliotece. Szerzej: `../wiedza/08-praktyka-wp-narzedzia-workflow.md` i `../wiedza/06-stack-technologiczny.md`. Migracja istniejącej strony (Lovable / Claude design / inny generator) → `../wiedza/10-migracja-z-generatora-na-wordpress.md`.

---

## starter-theme — szybki start

### Wymagania

- Node.js 18+ (do builda Tailwind/Vite)
- WordPress 6.5+ na PHP 8.1+
- Wtyczka **ACF** (Advanced Custom Fields) — sekcja hero czyta pola ACF (działa też bez niej, na fallbackach)
- Lokalne środowisko WP: **LocalWP** (najprościej) lub **wp-env**

### 1. Instalacja zależności

W katalogu motywu:

```bash
cd starter-theme
npm install
```

### 2. Praca lokalna (HMR)

```bash
npm run dev
```

Vite podnosi dev server na `http://localhost:5173` z hot reloadem. Żeby WordPress ładował assety z dev servera zamiast z `dist/`, dodaj w `wp-config.php` swojej lokalnej instalacji:

```php
define('IS_VITE_DEV', true);
```

Bez tej stałej (czyli na produkcji) WP ładuje zbudowane pliki z `dist/` wg manifestu.

### 3. Build produkcyjny

```bash
npm run build
```

Tworzy `dist/` razem z `dist/.vite/manifest.json`. `functions.php` czyta manifest i enqueue'uje wynikowe CSS/JS. **Build commituj do repo** — serwer nie buduje niczego.

### 4. Konfiguracja w WordPressie

1. Wgraj cały folder `starter-theme/` (wraz z `dist/`) do `wp-content/themes/`.
2. `Wygląd → Motywy` → aktywuj **Starter Theme**.
3. `Ustawienia → Czytanie` → ustaw stronę główną jako **stronę statyczną**, żeby zadziałał `front-page.php`.
4. `Wygląd → Menu` → przypisz menu do lokalizacji **Menu główne** i **Menu w stopce**.
5. Zainstaluj i aktywuj **ACF**. Utwórz grupę pól przypiętą do strony głównej z polami sekcji hero:
   `hero_naglowek` (Text), `hero_podtytul` (Textarea), `hero_cta_label` (Text), `hero_cta_link` (Link), `hero_obraz` (Image, format: Array).

> Sekcja hero ma fallbacki — wyświetli się sensownie nawet zanim skonfigurujesz ACF.

### 5. Deploy na serwer (LH.pl / Mango lub dowolny)

Motyw ląduje w `wp-content/themes/starter-theme/`. Wgrasz go jednym ze sposobów:

- **SFTP/FTP** (np. FileZilla) — wgraj cały folder motywu **wraz z `dist/`**.
- **SSH (rsync)** — szybsze dla większych zmian:
  ```bash
  rsync -avz --delete ./starter-theme/ user@serwer:~/domains/twojadomena.pl/public_html/wp-content/themes/starter-theme/
  ```
- **Git** przez SSH — `git pull` wprost do katalogu themes (pamiętaj, że `dist/` jest w repo).

Po każdym deployu nowego `dist/`: **LiteSpeed → Toolbox → Purge All**, inaczej cache poda stary CSS/JS.

---

## Struktura motywu

```
starter-theme/
├── style.css                      ← nagłówek motywu (metadane dla WP)
├── functions.php                  ← theme supports + enqueue Vite + ACF Local JSON
├── front-page.php                 ← strona główna (składa sekcje z ACF)
├── home.php                       ← lista wpisów (blog)
├── index.php                      ← fallback hierarchii szablonów
├── page.php                       ← pojedyncza strona
├── single.php                     ← pojedynczy wpis
├── archive.php                    ← archiwa (kategorie, tagi, daty)
├── search.php                     ← wyniki wyszukiwania
├── 404.php                        ← strona błędu 404
├── header.php / footer.php        ← wp_head() / wp_footer() (obowiązkowe)
├── template-parts/
│   ├── section-hero.php           ← sekcja hero z pól ACF (z fallbackami)
│   └── content/
│       ├── content.php            ← karta wpisu (pętla)
│       └── content-none.php       ← komunikat „brak treści"
├── inc/
│   └── seo-head.php               ← meta + JSON-LD wpinane w wp_head
├── acf-json/                      ← definicje pól ACF (Local JSON, wersjonowane w git)
├── src/
│   ├── styles.css                 ← @import Tailwind + @source (purge)
│   └── main.js                    ← entry: import CSS + GSAP/Lenis (reduced-motion gate)
├── dist/                          ← output Vite (commitowany) — to ładuje WP
├── package.json                   ← skrypty dev/build
├── vite.config.js                 ← Vite + Tailwind v4, base = ścieżka motywu
└── .gitignore
```

## Zmiana nazwy motywu

Nazwa folderu, `Theme Name` w `style.css` oraz `base`/`THEME_FOLDER` w `vite.config.js` muszą być spójne — `base` wskazuje na `/wp-content/themes/<folder>/dist/`. Po zmianie nazwy zbuduj ponownie (`npm run build`).
