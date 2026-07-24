---
name: web-design-anti-slop
description: >
  Ustala kierunek wizualny strony WWW bez szablonowości: system tokenów (paleta,
  typografia, skala, layout, jeden element-sygnatura), anatomia sekcji wysoko
  konwertujących, animacje z umiarem, twarde reguły anti-slop. Pracuje dwufazowo —
  propozycja designu, potem krytyka względem briefu — i kończy ZAAKCEPTOWANYM
  designem PRZED pisaniem kodu. Użyj zawsze, gdy mowa o "wyglądzie", "designie",
  "projekcie graficznym", "makiecie", "stylu", "palecie", "kolorach", "typografii",
  "fontach", "layoucie", "hero", "sekcji", "animacjach", "redesignie" albo gdy ktoś
  prosi "zaprojektuj stronę", "jak ma wyglądać", "zrób ładnie" — nawet jeśli nie
  nazwie tego wprost designem. To etap PRZED implementacją w WordPressie.
---

# Web design anti-slop — kierunek wizualny przed kodem

Prowadzisz design jak art director w studiu, którego klient już raz odrzucił szablonowe propozycje i płaci za wyraźny punkt widzenia. Twoje zadanie: zamienić brief w **zaakceptowany system wizualny + anatomię sekcji**, zanim ktokolwiek dotknie PHP. Strona powstaje jako **custom classic theme WordPress** (kod, zero Elementora i builderów wizualnych) — projekt musisz dać się przełożyć na ręcznie pisane szablony i tokeny, nie na klocki page-buildera.

Najważniejsza zasada (z obu SOP-ów): **struktura przed stylem.** Najpierw cel strony, hierarchia komunikatów i szkielet sekcji. Dopiero potem paleta i estetyka. Ładna strona, która gubi użytkownika, nie sprzedaje.

## Wywołaj specjalistów (faza projektu)

Nie projektuj "z głowy" — to prosta droga do AI-slopu. W fazie projektu wywołaj globalne skille i połącz ich wkład:

- **`frontend-design`** — dyscyplina anti-default: hero jako teza, typografia z charakterem, sygnatura, krytyka przed budową.
- **`ui-ux-pro-max`** — biblioteka stylów, palet, par fontów, wytycznych UX i typów produktów; użyj do doboru kierunku pod branżę.
- **`design-taste-frontend`** — audyt smaku, wyłapywanie templated patterns, kontrola jakości kierunku.
- **`theme-factory`** — gdy potrzebujesz spójnego motywu tokenów (kolory/fonty) jako bazy do `DESIGN.md`.
- **`stop-slop`** — do KAŻDego copy w makiecie (nagłówki, CTA, mikrokopia). Proza w designie to materiał, nie ozdoba; tnij frazy-wypełniacze i puste hasła.

Złóż ich propozycje w jeden spójny system. Sprzeczne sugestie rozstrzygaj briefem, nie uśrednianiem.

## Praca dwufazowa (rdzeń skilla)

### Faza 1 — Propozycja
Najpierw zakotwicz projekt w świecie klienta. Jeśli brief nie domyka, czym jest produkt/usługa, kto jest odbiorcą i jaka jest **jedna główna akcja** strony (telefon / formularz / rezerwacja) — dopytaj albo nazwij to wprost i zapisz. Wyróżniki biorą się z branży, materiałów, języka i realiów klienta, nie z generycznych trendów.

Zbuduj zwięzły **system tokenów** (szczegóły niżej) + **anatomię sekcji** + **jeden element-sygnatura**. Layout ideuj na opisach jednozdaniowych i ASCII-wireframe'ach, żeby porównać warianty tanio (bez kodu).

### Faza 2 — Krytyka względem briefu
Zanim cokolwiek zaakceptujesz, przejdź własną propozycję i zapytaj o każdy element: *"Czy to wybór pod TEN brief, czy default, który wyprodukowałbym dla dowolnej podobnej strony?"* Test praktyczny: przejdź w myślach podobny prompt — jeśli wyszedłbyś w to samo miejsce, to default. Popraw te miejsca i **nazwij, co zmieniłeś i dlaczego**.

Większość iteracji rób w myśleniu. Użytkownikowi pokazuj dopiero dopracowaną propozycję z uzasadnieniem.

**Wyjście fazy:** zaakceptowany design (system wizualny + lista sekcji z treścią/hierarchią + sygnatura). To bramka — kod (specjalista `wordpress-budowa`) rusza dopiero po akceptacji.

## System tokenów

Tu powstaje `DESIGN.md` projektu — kontekst dla implementacji. Konkret bije ogólnik: **hexy, nie "niebieski"; nazwy fontów, nie "sans-serif"; piksele, nie "trochę odstępu".**

- **Paleta** — 4–6 nazwanych hexów: 1 kolor marki + 1 akcent CTA + neutralne (tła, tekst). Akcent rezerwuj wyłącznie dla głównej akcji — jeśli wszystko krzyczy, nic nie krzyczy. Dopisz reguły negatywne (sekcja anti-slop). Sprawdź kontrast: 4,5:1 tekst, 3:1 duży tekst (WCAG AA).
- **Typografia** — pary 2 rodzin (np. wyrazisty display w nagłówkach + neutralny tekst), nie te same, po które sięgnąłbyś w każdym projekcie. Skala modularna (np. 1:1,25, baza 16 px), świadome grubości i tracking. Tekst min. 16 px, line-height ≥ 1,5, wiersz ≤ ~80 znaków. **Wymóg twardy: font MUSI mieć `latin-ext`** — inaczej polskie znaki (ą/ę/ł/ś/ż) się posypią. Fonty hostowane lokalnie, `font-display: swap`.
- **Skala odstępów** — siatka 8 px (8/16/24/32/48/64). Reguła "wewnątrz ≤ zewnątrz": odstęp w grupie mniejszy niż między grupami. Izoluj CTA i formularze pustą przestrzenią, żeby "wyskakiwały".
- **Layout** — koncept siatki + rytm sekcji. Mieszaj układy (pełnoekranowy wizual, split 50/50, lista kroków, cytat na całą szerokość) — nie każda sekcja to "nagłówek + 3 karty". Mobile-first (>60% ruchu, Google indeksuje mobile-first): cele dotykowe ≥ 44–48 px, hero + CTA bez scrolla na telefonie.
- **Element-sygnatura** — JEDEN element, po którym zapamięta się tę stronę i który ucieleśnia brief (sposób kadrowania zdjęć realizacji, charakterystyczny układ hero, autorski styl dividerów, motyw z materiału branży). "Odwagę wydaj w jednym miejscu": sygnatura jest mocna, reszta spokojna i zdyscyplinowana.

Szablon `DESIGN.md` do wypełnienia i oddania implementacji: `references/design-md-template.md`.

## Anatomia sekcji wysoko konwertujących

Logika stała: **zrozum → zaufaj → działaj.** Liczbę i kolejność dopasuj do briefu (landing tnij do jednego celu; strona usługowa ma więcej sekcji). Szczegółowe wzorce sekcja po sekcji, frameworki copy (AIDA/PAS/FAB/BAB) i bramka konwersji: `references/anatomia-sekcji.md`.

Niezmienniki, których pilnuj na poziomie projektu:
- **Hero** odpowiada w ~5 s: co to / dla kogo / dlaczego teraz. Nagłówek korzyściowy (≤ ~8 słów, nie "Budujemy przyszłość"), podtytuł, jeden główny CTA, realny wizual. Przy ruchu z reklamy — message match z treścią reklamy.
- **Dowód społeczny** stawiaj przy punktach decyzji (tuż przy CTA), z konkretem: imię, zdjęcie, liczba, wynik.
- **Jeden główny CTA**, powtarzany jako ta sama akcja po każdej sekcji budującej zaufanie. Czasownik korzyści + konkret + mikrokopia zdejmująca obiekcję ("bez zobowiązań", "odpowiadamy w 24h").
- **FAQ** to sekcja sprzedażowa — rozbraja realne obiekcje (cena, termin, "czy to dla mnie"), nie wypełniacz.
- **Footer**: NAP (nazwa/adres/telefon — lokalne SEO) + linki prawne.

## Animacje z umiarem

Animacja ma służyć treści, nie udowadniać, że umiesz animować. Nadmiar ruchu to jeden z sygnałów "AI-generated". Zorkiestrowany jeden moment (sekwencja page-load, reveal na scroll, sensowny hover) ląduje mocniej niż rozsypane efekty wszędzie.

- Stos do rozważenia pod custom theme: **GSAP** (sekwencje, scroll-triggery), **Lenis** (smooth scroll), **Lottie** (lekkie animacje wektorowe zamiast ciężkich GIF/wideo). Ładuj warunkowo — tylko na podstronach, które ich używają (wydajność = konwersja).
- **`prefers-reduced-motion` to wymóg, nie opcja.** Każda nietrywialna animacja musi mieć wariant zredukowany/wyłączony. To kwestia dostępności i jakości — projekt zakłada to z góry.
- Pilnuj **CLS**: rezerwuj miejsce na elementy animowane/ładowane, żeby layout nie skakał.

## Reguły anti-slop — nazwij defaulty i ich unikaj

AI domyślnie produkuje to, co najczęstsze w danych treningowych. To defaulty, nie wybory. Tam, gdzie brief zostawia oś wolną, **nie wydawaj tej wolności na default.** Gdy brief jawnie prosi o któryś z tych looków — słowo briefu wygrywa, zrób to.

Defaulty AI do unikania:
- **Fonty:** Inter / Roboto / Arial jako "twarz" marki bez powodu. Wybierz parę z charakterem.
- **Kolor:** gradient niebiesko-fioletowy "znikąd", neony, cyjan, "cyberpunk glow", "purple AI slop".
- **Trzy kliszowe looki:** (1) kremowe tło ~#F4F1EA + kontrastowy serif display + akcent terakota; (2) prawie-czarne tło + jeden kwaśno-zielony/wermilionowy akcent; (3) broadsheet z włoskowymi liniami, zero border-radius, gęste kolumny. Legalne dla niektórych briefów — ale pojawiają się niezależnie od tematu, więc traktuj jako alarm.
- **Hero-pustosłowie:** "Build the future", "Twój partner w sukcesie", "Empower your X".
- **Monotonia komponentów:** wszystkie karty z tym samym `border-radius: 16px` i identycznym cieniem; każda sekcja w układzie "3 kafelki".
- **Emoji jako ikony** "na szybko".
- **Stockowe zdjęcia** uśmiechniętych ludzi z laptopem zamiast realnych zdjęć produktu/realizacji/zespołu — to spadek zaufania i sygnał generyczności.
- **Numerowane markery 01/02/03** i eyebrowsy, gdy treść NIE jest sekwencją. Struktura ma kodować coś prawdziwego, nie dekorować.

Czerwona flaga nadrzędna: **brak ani jednej świadomej decyzji estetycznej** — wszystko "bezpieczne" i nijakie. Pełna lista czerwonych flag i kontrprzykłady: `references/anti-slop-checklista.md`.

## Bramka jakości designu (przed akceptacją)

Przejdź, zanim oddasz design do implementacji:
- [ ] Zgodność z briefem (cel, odbiorca, jedna główna akcja).
- [ ] Element-sygnatura obecny i uzasadniony briefem.
- [ ] Nie czyta się jak default AI (przeszedłeś krytykę fazy 2).
- [ ] Spójny system tokenów (paleta + typografia + skala + layout).
- [ ] Kontrast WCAG AA (4,5:1 / 3:1), font z `latin-ext`.
- [ ] Hero: co/dla kogo/dlaczego teraz + jeden CTA, bez scrolla na mobile.
- [ ] CTA powtórzony, dowód społeczny przy decyzji, FAQ rozbraja obiekcje.
- [ ] Zróżnicowany rytm sekcji (nie wszystko "3 karty").
- [ ] Animacje z umiarem + `prefers-reduced-motion`.
- [ ] Copy przepuszczone przez `stop-slop`, zero pustych haseł.

## Materiały

- `references/design-md-template.md` — szablon `DESIGN.md` (tokeny + reguły zakazane) do oddania implementacji.
- `references/anatomia-sekcji.md` — wzorce sekcji, frameworki copy, bramka konwersji.
- `references/anti-slop-checklista.md` — pełna lista czerwonych flag i kontrprzykłady.
- `wiedza/08-praktyka-wp-narzedzia-workflow.md` — toolkit animacji „motion", QA podglądu (overflow, cache-busting), galerie efektów + wrażliwość.

## Animacje + QA z praktyki (→ `wiedza/08`)

- **Gotowy toolkit „motion"** (reużywalne klasy CSS): `.flow-line`/`.accent-line` (płynący divider — „żyła"), `.rf-rings` (fale), `.scan` (omiatający promień), `.dots` (pulsujący sygnał), `.pulse-soft`/`.beat`/`.drift`, puls emblematu. Każda za bramką `prefers-reduced-motion`. Animuj `transform`/`opacity` (GPU) + `stroke-dashoffset` na przepływ linii. **Per podstrona daj INNY motyw** — to buduje unikalność („podobne, ale nie 1:1").
- **Radial „hub & spokes" rysuj JS-em wg realnych pozycji węzłów** (`getBoundingClientRect`), nie sztywnymi ścieżkami SVG — te się rozjeżdżają przy responsywności; przerysowuj na `resize` + `fonts.ready`; na mobile chowaj linie i składaj w listę.
- **QA podglądu**: walidacja strukturalna w Bash (jeden `<h1>`, martwe linki, emoji), audyt overflow przez `preview_eval` (`scrollWidth - clientWidth`, lista elementów szerszych niż viewport) + `body/html{overflow-x:hidden}` i `.section{overflow-x:clip}`, **cache-busting `?v=N`** na CSS/JS (bumpuj po każdej zmianie — inaczej klient „nie widzi zmian").
- **Galerie efektów przed/po** (klinika/medycyna): dyskretne, z notą „za zgodą pacjentów"; materiał mocno medyczny/intymny — decyzja o publikacji należy do klienta (i blokuje Google/Meta Ads).
