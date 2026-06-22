# Strona sprzedaży kursu — szczegóły sekcji i konwersji

Czytaj przy projektowaniu i pisaniu copy strony sprzedaży. SKILL.md daje kolejność; tu jest uzasadnienie każdej sekcji i niuanse copy.

Strona sprzedaży = jedna długa strona, jeden cel: kliknięcie „Kup". Nie rozprasza menu, nie linkuje na zewnątrz, nie sprzedaje pięciu rzeczy naraz. Czytelnik scrolluje przez logiczny ciąg argumentów i na każdym ekranie dostaje powód, by zostać.

## Sekcje — co i dlaczego

1. **Hero z obietnicą/transformacją** — nagłówek mówi, dokąd kurs zaprowadzi (stan PO), nie czym jest kurs. Pod nagłówkiem jedno zdanie doprecyzowujące + pierwsze CTA. Cała góra strony krąży wokół jednej transformacji.
   - Źle: „Kurs Excela dla początkujących".
   - Dobrze: „W 6 tygodni przestaniesz tracić wieczory na ręczne raporty — Excel zrobi je za Ciebie".
2. **Problem i agitacja** — nazwij ból odbiorcy jego słowami. Wymień rozwiązania, które już próbował i które zawiodły (darmowe YouTube, książki, kombinowanie samemu). Buduje świadomość, że potrzebny jest system, nie kolejny przypadkowy tutorial.
3. **Wizja stanu PO** — namaluj konkretnie, jak wygląda życie po ukończeniu kursu. Konkret, nie ogólniki.
4. **Dla kogo (i dla kogo NIE)** — kwalifikacja. „Ten kurs jest dla Ciebie, jeśli…" + „Ten kurs NIE jest dla Ciebie, jeśli…". Sekcja „dla kogo nie" paradoksalnie podnosi konwersję — sygnalizuje uczciwość i odsiewa zwroty.
5. **Program (moduły/lekcje)** — rozbicie na moduły z 1-zdaniowym efektem każdego modułu. Nie listuj samych tytułów lekcji — przy każdym module dopisz, co uczeń BĘDZIE UMIAŁ po jego ukończeniu. Pokaż liczby: X modułów, Y lekcji, Z godzin materiału. Dodaj „peek inside" (zrzut platformy albo fragment lekcji), by zdjąć lęk „a co tam właściwie jest".
6. **Sylwetka prowadzącego** — kim jest, dlaczego ma prawo uczyć tematu (wyniki, doświadczenie, droga). Zdjęcie twarzy. Historia osobista buduje zaufanie szybciej niż lista tytułów.
7. **Dowód społeczny i wyniki uczniów** — opinie z imieniem, zdjęciem, najlepiej konkretnym rezultatem („zwiększyłam sprzedaż o 30%"). Screeny wiadomości, metryki, case studies. Najmocniejsza dźwignia konwersji — daj jej dużo miejsca. Im wyższa cena, tym więcej dowodu strona musi unieść.
8. **Pricing** — warianty cenowe + gwarancja zwrotu tuż pod cennikiem.
9. **Bonusy** — co dostają ekstra (szablony, nagrania, dostęp do grupy). Każdy bonus z przypisaną wartością w zł, by spuchła postrzegana wartość pakietu.
10. **FAQ** — rozbij ostatnie obiekcje.
11. **Domknięcie + ostatnie CTA** — podsumowanie obietnicy, przypomnienie gwarancji, ostatni przycisk.

## Elementy konwersji — szczegóły

**Obietnica/transformacja.** Sprzedajesz zmianę, nie zawartość. Nagłówek = stan docelowy.

**Program kursu.** Pokazuje, że za obietnicą stoi konkretny system. Format: moduł → efekt.

**Dowód społeczny — trzy typy, użyj wszystkich, jakie masz:** opinie tekstowe (z twarzą i nazwiskiem), wyniki liczbowe uczniów, logotypy/media/certyfikaty.

**Pricing — 3 warianty (efekt zakotwiczenia):**
- **Basic** — same moduły rdzeniowe.
- **Standard** (oznacz „Najpopularniejszy") — moduły + bonusy. Ten ma się sprzedawać; zaprojektuj go wizualnie jako domyślny wybór.
- **Premium** — moduły + bonusy + społeczność/konsultacje/case studies.

Od ~2000 zł w górę pokaż **plan ratalny** (np. 3 raty). Widoczna rata podnosi konwersję ofert premium 1,5–2×, bo obniża barierę pierwszej decyzji.

**Gwarancja zwrotu.** Bezpośrednio pod cennikiem — tam wzbiera lęk zakupowy. 14 lub 30 dni „bez pytań". Realny koszt zwykle <3% zwrotów, jeśli kurs dowozi obietnicę; sama gwarancja potrafi podbić konwersję o ~30%. Sformułuj śmiało i konkretnie, nie drobnym druczkiem.

**FAQ.** Odpowiadaj na PRAWDZIWE pytania kupujących, nie na wygodne dla Ciebie. Standardowy zestaw: jak długo trwa dostęp, czy dla początkujących, ile czasu tygodniowo, czy będzie aktualizowany, jak płacę, czy faktura, co jeśli nie mam czasu teraz. Każde FAQ to rozbrojona obiekcja.

**CTA.** 3–4 przyciski rozłożone po stronie: jeden w hero (dla zdecydowanych), 1–2 w środku (po dowodzie społecznym i programie), jeden na dole (po FAQ i gwarancji). Ten sam tekst i kolor na wszystkich — spójność buduje rozpoznawalność akcji. Tekst zorientowany na korzyść („Chcę zacząć"), nie generyczne „Wyślij".

**Bonusy.** Działają jak dokładka, która przeważa decyzję. Każdy z konkretną wartością i krótkim uzasadnieniem, po co uczniowi.

**Etyczne urgency.** Pilność tak — fałszywa nie.
- Etyczne: realne zamknięcie zapisów (kohorta startuje w dacie X), prawdziwie limitowane miejsca (bo jest mentoring), znikający bonus za zapis do daty, rosnąca cena po premierze.
- Nieetyczne i ryzykowne prawnie: fałszywy licznik resetujący się przy każdym wejściu, „ostatnie 3 miejsca" od pół roku, wymyślone rabaty.
- Licznik czasu — niech odlicza do realnego zdarzenia (np. Deadline Funnel z prawdziwym deadline'em per-lead), nie do niczego.

## Checklista wdrożenia (custom theme)

- [ ] Strona jako osobny **template** w motywie (`page-sales.php` lub szablon przez nagłówek `Template Name`), bez sidebaru i bez głównego menu.
- [ ] Sekcje jako modularne `template-parts` — łatwiej przestawiać i recyklować na kolejnych lejkach.
- [ ] Jedno źródło prawdy dla ceny i CTA (pola ACF), żeby przy zmianie ceny nie edytować 4 miejsc.
- [ ] Sticky CTA na mobile (pasek z przyciskiem na dole ekranu).
- [ ] Mobile-first — większość ruchu z reklam jest mobilna; testuj na telefonie zanim na desktopie.
- [ ] Szybkość: lazy-load wideo/opinii, brak ciężkich bibliotek tylko pod jedną animację, obrazy w WebP.
- [ ] Piksele/eventy (Meta, GA4) na widok strony i klik CTA — bez tego lejek jest ślepy.
