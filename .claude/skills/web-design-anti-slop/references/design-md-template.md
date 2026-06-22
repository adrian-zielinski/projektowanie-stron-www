# Szablon `DESIGN.md` — kontekst dla implementacji

Wypełnij po akceptacji designu i oddaj specjaliście `wordpress-budowa`. To jedno źródło prawdy o tokenach — implementacja custom classic theme czerpie z niego paletę, fonty, skalę i zakazy. Konkret bije ogólnik: hexy zamiast nazw kolorów, nazwy fontów zamiast "sans", piksele zamiast "trochę".

```
# DESIGN.md — [nazwa klienta / projektu]

Branża / ton: [np. rzemiosło premium, ciepły, godny zaufania]
Jedna główna akcja strony: [telefon / formularz / rezerwacja / zakup]
Odbiorca + jego problem: [krótko, językiem klienta]

## Paleta (4–6 nazwanych hexów)
  - tło jasne:   #FFFFFF
  - tło ciemne:  #0F1A14
  - tekst:       #1A1A1A
  - marka:       #0E5A3A
  - akcent CTA:  #E8A33D   ← tylko dla głównej akcji
Kontrast zweryfikowany: tekst ≥ 4,5:1, duży tekst ≥ 3:1 (WCAG AA)

## Typografia
  - nagłówki (display): [np. Fraunces]   ← z charakterem, używany z umiarem
  - tekst (body):       [np. Source Sans 3]
  - utility/dane (opc.): [np. ...]
  Skala: 1:1,25, baza 16 px
  Line-height tekstu: ≥ 1,5; wiersz ≤ ~80 znaków
  latin-ext: [TAK — sprawdzone] ← polskie znaki ą/ę/ł/ś/ż
  Hosting fontów: lokalnie, font-display: swap

## Skala odstępów
  8 px (8 / 16 / 24 / 32 / 48 / 64)
  Reguła: odstęp wewnątrz grupy < odstęp między grupami

## Layout
  Siatka: [np. 12 kolumn, max-width 1200 px]
  Rytm sekcji: [lista układów per sekcja — patrz anatomia-sekcji.md]
  Mobile-first: cele dotykowe ≥ 44–48 px; hero + CTA bez scrolla

## Zaokrąglenia i cienie
  [świadomy wybór jako element marki, nie wszędzie to samo 16px]

## ELEMENT-SYGNATURA
  [jeden element, po którym zapamięta się stronę — opis + dlaczego pod ten brief]

## Animacje
  Stos: [GSAP / Lenis / Lottie — które i gdzie]
  prefers-reduced-motion: wariant zredukowany dla [lista animacji]

## ZAKAZANE (reguły negatywne)
  Inter/Roboto/Arial jako twarz marki, gradient fiolet-niebieski "znikąd",
  neony/cyjan/cyberpunk glow, stock corpo, wszystkie karty 16px radius,
  emoji jako ikony, puste hasła ("partner w sukcesie"),
  numerowane markery 01/02/03 gdy treść nie jest sekwencją.
```

## Uwaga: custom classic theme, nie page-builder
`DESIGN.md` ma się przekładać na ręcznie pisane szablony PHP/HTML + CSS z tokenami (zmienne CSS / `:root`), reużywalne wzorce sekcji i warunkowe ładowanie zasobów. Nie projektuj pod logikę klocków Elementora — w tym systemie ich nie ma.
