# Faza 1 — Architektura treści

Zamieniasz brief na strukturę, na której zbudują się design i SEO. Tu decyduje się, czy strona prowadzi użytkownika do celu — zanim padnie pierwszy piksel czy linia CSS. Zasada nadrzędna systemu: **struktura przed stylem** (`wiedza/01`, sekcja 0).

## Kroki

1. **Mapa stron (sitemap).** Z zakresu podstron z briefu zrób hierarchię: strony główne, podstrony, wpisy. Każda strona ma jeden powód istnienia. Usuń podstrony, które nie służą celowi biznesowemu.

2. **Jedna strona = jedna intencja = jedno CTA.** Przypisz każdej podstronie główną intencję użytkownika i jedną akcję. Strona, która chce wszystkiego naraz, nie konwertuje.

3. **Sekcje każdej podstrony (wireframe treściowy).** Rozpisz kolejność sekcji. Dla landinga/strony sprzedażowej użyj anatomii z `wiedza/02-landing-page-konwersja.md` (sekcja 2): hero → problem → rozwiązanie → dowód społeczny → oferta → FAQ → CTA. Dla strony usługowej — wzorce sekcji z `wiedza/01` (sekcja 2).

4. **Szkielet copy wg frameworka.** Dobierz framework do celu (`wiedza/02`, sekcja 1):
   - **PAS** (Problem–Agitacja–Rozwiązanie) — gdy ból klienta jest wyraźny.
   - **AIDA** (Uwaga–Zainteresowanie–Pożądanie–Akcja) — klasyczny lejek sprzedażowy.
   - **4U** (Useful, Urgent, Unique, Ultra-specific) — do nagłówków.
   Napisz szkielet nagłówków i kluczowych zdań, nie pełne teksty. Pełne copy powstaje równolegle z treściami od klienta.

5. **Ścieżki konwersji.** Prześledź drogę od wejścia do celu dla każdej grupy odbiorców. Gdzie jest CTA, czy nie ma ślepych zaułków, ile kliknięć do celu.

6. **Wstępna mapa słów kluczowych.** Przypisz każdej podstronie główną frazę/intencję (1 strona = 1 fraza główna). To wejście dla fazy 4 (SEO). Pełne podejście: `wiedza/05-seo-on-page.md`. Tu wystarczy szkic — szczegóły dopina `seo-techniczne-onpage` w fazie 4.

7. **Warianty wg typu projektu.**
   - **Sklep** → struktura kategorii i ścieżka produkt→koszyk→checkout (`wiedza/03-ecommerce-wg-branz.md`, sekcja 1).
   - **Kursy** → sales page kursu + lejek (`wiedza/04-sprzedaz-kursow-lms.md`, sekcje 1-2).

## Copy — anti-slop

Każdy nagłówek i opis przepuszczaj mentalnie przez `stop-slop`: tnij frazy-wypełniacze, binarne kontrasty („to nie X, to Y"), listy negacji, stronę bierną. Konkret, aktywny głos, język grupy docelowej z briefu.

## Antywzorce

- Sitemap kopiowany z konkurencji bez związku z celem klienta.
- Strona „O nas" jako autobiografia zamiast mostu do zaufania i CTA.
- Mnożenie podstron „bo wypada mieć" — każda strona to koszt utrzymania i treści.
- Pisanie pełnych tekstów, zanim klient dostarczył materiały (ryzyko podwójnej pracy).

## Typowe błędy, które tu się rodzą

Wyłap je teraz — na etapie kodu kosztują wielokrotnie więcej (`wiedza/02`, sekcja 7):

- Nawigacja z 9+ pozycjami — rozprasza, rozmywa główne CTA.
- Brak hierarchii w hero (nie wiadomo, co czytać najpierw).
- Dowód społeczny schowany na dole zamiast blisko oferty/CTA.

## Artefakt fazy

`ARCHITEKTURA.md` (lub sekcja w briefie): mapa stron, intencja+CTA per strona, lista sekcji per strona, framework copy, wstępne słowa kluczowe, ścieżki konwersji.

## Bramka wyjścia → Faza 2

- Mapa stron pokrywa wszystkie cele z briefu, bez zbędnych podstron.
- Każda strona ma jedną intencję i jedno główne CTA.
- Sekcje rozpisane, hierarchia treści jasna.
- Wstępne słowa kluczowe przypisane.

Następnie: faza 2 wywołuje `web-design-anti-slop`, który ubiera tę strukturę w system wizualny.
