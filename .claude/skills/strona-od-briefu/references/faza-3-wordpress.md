# Faza 3 — WordPress (custom classic theme)

Przekuwasz zaakceptowany design w działający WordPress jako **custom classic theme** — PHP, szablony, `functions.php`, własny CSS/Tailwind. **Zero Elementora i page-builderów** — to twarda zasada projektu (lepsza wydajność, SEO, kontrola, brak vendor-locka).

## Warunek wejścia

`DESIGN.md` zaakceptowany przez klienta (faza 2). Bez akceptacji nie kodujesz — przeróbki motywu są drogie.

## Wywołaj specjalistę

Uruchom przez Skill tool **`wordpress-budowa`** — prowadzi implementację motywu wg `wiedza/06-stack-technologiczny.md`. Zależnie od zakresu z briefu dodatkowo:

- **sklep** → **`woocommerce-sklep`** (produkty, koszyk, płatności, wysyłka, podatki, RODO; `wiedza/03`);
- **kursy/LMS** → **`kursy-lms`** (kursy, lekcje, quizy, dostęp, certyfikaty; `wiedza/04`).

## Kroki (skrót — szczegóły u specjalisty)

1. **Szkielet motywu.** Classic theme: `style.css` (nagłówek motywu), `functions.php`, `index.php`, `header.php`, `footer.php`, szablony stron/wpisów, `404.php`. Patrz `wiedza/06`, sekcja 1.

2. **Tailwind + Vite w motywie.** Build CSS/JS, kolejkowanie przez `wp_enqueue_*`, tokeny z `DESIGN.md` jako konfiguracja Tailwinda. `wiedza/06`, sekcja 3.

3. **Treść edytowalna przez klienta — ACF.** Pola dla sekcji, które klient ma zmieniać (hero, oferta, opinie, dane kontaktowe) — bez page-buildera, ale z wygodną edycją. `wiedza/06`, sekcja 2.

4. **CPT i taksonomie** dla powtarzalnych typów (realizacje, usługi, członkowie zespołu, produkty jeśli nie Woo).

5. **Szablony wg makiet.** Każda podstrona z fazy 1/2 dostaje szablon. Semantyczny HTML5 i hierarchia nagłówków (jeden H1) — to już praca pod SEO (faza 4), rób od razu poprawnie. `wiedza/05`, sekcje 1-2.

6. **Treści.** Wgraj prawdziwe teksty i zdjęcia od klienta. **Zero lorem ipsum na produkcji.** Optymalizuj obrazy (rozmiar, format, lazy-load).

7. **Animacje (oszczędnie).** `wiedza/06`, sekcja 4 — wspierają hierarchię, nie rozpraszają.

8. **Wydajność i cache.** LiteSpeed na LH/Mango, Core Web Vitals. `wiedza/06`, sekcja 5.

9. **Bezpieczeństwo i wtyczki.** Minimalny zestaw wtyczek (`wiedza/06`, sekcja 8), aktualizacje, role, ochrona logowania, backup.

## Antywzorce

- Instalacja Elementora/Divi/WPBakery „żeby szybciej" — łamie zasadę systemu.
- Lorem ipsum lub stockowe placeholdery zostawione na produkcji.
- Hardkodowanie treści, którą klient będzie chciał zmieniać (zamiast pól ACF).
- Dziesiątki wtyczek „na zapas" — każda to ryzyko wydajności i bezpieczeństwa.
- Pomijanie hierarchii nagłówków/semantyki „bo SEO zrobimy później" — drożej poprawiać.

## Artefakt fazy

Działający custom theme na staging/lokalnie, zgodny z makietami, z wgranymi treściami i działającymi formularzami.

## Bramka wyjścia → Faza 4

- Motyw zgodny z zaakceptowanymi makietami (desktop + mobile).
- Treści wgrane, zero lorem ipsum.
- Formularze działają (wysyłka + walidacja + zgody RODO).
- Poprawne 404 i przekierowania.
- Podstawy bezpieczeństwa (aktualizacje, role, backup skonfigurowany) i wydajności.
