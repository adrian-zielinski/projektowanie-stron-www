# Faza 4 — SEO techniczne i on-page

Domykasz widoczność strony w Google. SEO nie jest doklejką na koniec — hierarchia nagłówków i semantyka powstają już przy kodowaniu szablonów (faza 3). Ta faza to wplecenie meta/schema i audyt całości. Zasada systemu: SEO „od startu" w kodzie (`wiedza/05-seo-on-page.md`, sekcja 0).

## Wywołaj specjalistę

Uruchom przez Skill tool **`seo-techniczne-onpage`** — prowadzi pełną robotę wg `wiedza/05`. Korzysta ze wstępnej mapy słów kluczowych z fazy 1.

## Kroki

1. **Meta per strona.** Unikalny `title` i `meta description` dla każdej podstrony, pod frazę z mapy słów kluczowych. Bez duplikatów. `wiedza/05`, sekcja 3.

2. **Hierarchia nagłówków.** Jeden `H1` na stronę, logiczne H2-H6. Jeśli faza 3 zrobiła to poprawnie — tu weryfikujesz. `wiedza/05`, sekcja 1.

3. **Semantyczny HTML5.** `header`, `nav`, `main`, `article`, `section`, `footer` — nie sam `div`. `wiedza/05`, sekcja 2.

4. **Dane strukturalne JSON-LD.** Schema dopasowana do typu: Organization/LocalBusiness, Product (sklep), Course (kursy), Article (blog), FAQPage, BreadcrumbList. `wiedza/05`, sekcja 4.

5. **Czyste URL-e.** Krótkie, czytelne, bez parametrów-śmieci, ze słowem kluczowym. Stała struktura permalinków.

6. **Obrazy.** Atrybuty `alt` opisowe, sensowne nazwy plików, kompresja, nowoczesne formaty (WebP/AVIF), wymiary dla CLS.

7. **Canonical i indeksacja.** Canonical na stronach z ryzykiem duplikacji. UWAGA: indeksację włącza się **dopiero na produkcji** (faza 5) — na stagingu zostaje blokada.

8. **Mapa strony + robots.** `sitemap.xml` generowany, `robots.txt` poprawny (na prod). `wiedza/05`, sekcja 6.

9. **Core Web Vitals.** LCP, INP, CLS w normie — domknięcie wydajności z fazy 3. Zmierz (Lighthouse/PageSpeed), popraw wąskie gardła. `wiedza/05`, sekcja 6.

10. **Wtyczka SEO.** Yoast lub RankMath albo ręczna implementacja w motywie — wybór wg `wiedza/05`, sekcja 7.

## Antywzorce

- Jeden `title`/`description` skopiowany na wszystkie podstrony.
- Wiele `H1` na stronie albo nagłówki użyte dla wyglądu, nie struktury.
- Schema wklejona z generatora bez dopasowania do treści (Google to wyłapie).
- Włączenie indeksacji już teraz — staging trafia do Google. To robota fazy 5.
- Keyword stuffing zamiast naturalnego copy pod intencję.

## Artefakt fazy

Strona z kompletnym SEO on-page: unikalne meta, schema, mapa strony, czyste URL-e, CWV w normie — gotowa do publikacji (z wciąż zablokowaną indeksacją do czasu prod).

## Bramka wyjścia → Faza 5

- Unikalne `title` i `description` na każdej podstronie.
- Jeden `H1` na stronę, poprawna hierarchia.
- JSON-LD dopasowane do typów treści.
- `sitemap.xml` + `robots.txt` przygotowane.
- Alt-y obrazów, canonical tam gdzie trzeba.
- Core Web Vitals zmierzone i w normie.

Pełna lista: `references/checklisty.md` (sekcja „Po SEO").
