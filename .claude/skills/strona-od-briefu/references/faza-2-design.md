# Faza 2 — Design (akceptacja przed implementacją)

Ubierasz architekturę treści w system wizualny. **Zasada nadrzędna: projekt idzie do akceptacji klienta zanim cokolwiek trafi do kodu.** Implementacja niezaakceptowanego designu to najdroższy błąd w całym procesie — przeróbki dotykają szablonów, CSS i treści naraz.

## Wywołaj specjalistę

Uruchom przez Skill tool **`web-design-anti-slop`** — to on prowadzi kierunek wizualny, system tokenów i krytykę anti-slop. Wspomóż się globalnymi:

- **`frontend-design`** — aesthetic direction, typografia, decyzje, które nie czytają się jak default.
- **`ui-ux-pro-max`** — style, palety, font-pairing, komponenty, dostępność.
- **`stop-slop`** — każda proza/copy w makietach.

Nie projektuj „z głowy" — to droga do szablonowego AI-slop, który w tym projekcie już raz odrzucono (zasada z `CLAUDE.md`).

## Kroki

1. **Kierunek wizualny z briefu, nie z defaultów.** Wyjdź od marki/CI klienta i jego referencji wizualnych (faza 0, pkt 6-7). Szukaj wyróżnika w świecie klienta — branża, materiały, język. Jeśli klient nie ma CI — zaproponuj 1-2 kierunki, nie 5.

2. **System tokenów (`DESIGN.md`).** Spisz: paleta (z rolami: tło, tekst, akcent, stany), skala typograficzna i font-pairing, skala odstępów, promienie, cienie, breakpointy. Patrz `wiedza/01-web-design-best-practices.md` (sekcje 1 i 4, wzór `DESIGN.md`).

3. **Element-sygnatura.** Jeden mocny, charakterystyczny element (sekcja hero, sposób kadrowania zdjęć, mikroanimacja, układ siatki) — „odwagę wydaj w jednym miejscu", reszta spokojna i zdyscyplinowana.

4. **Makiety kluczowych podstron.** Hero + 2-3 najważniejsze sekcje na desktop i mobile. Nie trzeba malować każdej podstrony — wystarczą wzorce, które reszta odziedziczy.

5. **Krytyka anti-slop (dwufazowo).** Najpierw burza pomysłów, potem krytyka względem briefu: czy coś czyta się jak default AI (warm cream + serif + terracotta; prawie-czarne tło + kwaśna zieleń; generyczny hero z gradientem)? Popraw to, co wygląda szablonowo. Lista defaultów: `wiedza/01`, sekcja 4.

6. **Dostępność od razu.** Kontrast WCAG AA, czytelne rozmiary, stany focus. Taniej wbudować teraz niż naprawiać po wdrożeniu.

## Antywzorce

- Projekt oderwany od briefu i CI klienta — ładny, ale nie ten.
- Default AI: gradientowy hero, stockowe „handshake", trzy kafelki z ikonkami bez treści.
- Pięć równorzędnych „mocnych" elementów — chaos zamiast hierarchii.
- Przejście do kodu „bo design w 90% gotowy" — brakujące 10% wraca jako przeróbka.

## Jak prezentować klientowi

- Pokaż 1-2 kierunki, nie 5 — nadmiar wariantów paraliżuje decyzję i wydłuża fazę.
- Pokaż makiety na tle realnych treści klienta, nie lorem — łatwiej ocenić, czy „to działa".
- Pytaj o konkret („czy hero komunikuje, czym się zajmujecie?"), nie o gust ogólny.
- Zbierz uwagi, nanieś, wróć po jedno zatwierdzenie — nie wpadaj w nieskończoną pętlę poprawek.

## Artefakt fazy

`DESIGN.md` (paleta, typografia, skale, element-sygnatura, zasady) + makiety hero i kluczowych sekcji (desktop + mobile).

## Bramka wyjścia → Faza 3

- Zgodny z briefem i CI klienta.
- **Nie wygląda jak default AI** (przeszedł krytykę anti-slop).
- Kontrast WCAG AA, spójny system tokenów, responsywny.
- **Klient zaakceptował** projekt na piśmie/wyraźnie.

Dopiero akceptacja otwiera fazę 3. Bez niej `wordpress-budowa` czeka.
