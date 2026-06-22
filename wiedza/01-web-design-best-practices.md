# SOP: Projektowanie wysoko konwertujących stron (custom theme WordPress)

> **Dla kogo:** początkujący web-designerzy (osoby na etacie) budujący strony-wizytówki dla klientów.
> **Stack:** custom theme WordPress (block theme / FSE lub klasyczny), bez Elementora i innych page builderów.
> **Jak używać:** to dokument roboczy. Przed każdym projektem przejdź checklisty, przy każdej sekcji stosuj reguły. Na końcu masz listę zasobów do podpięcia jako kontekst dla Claude/Cursor.

---

## 0. Zasada nadrzędna: struktura przed stylem

Wysoka konwersja nie bierze się z ładnych gradientów. Bierze się z tego, że odwiedzający w 5 sekund rozumie: **co to jest, dla kogo, dlaczego teraz** — i wie, gdzie kliknąć. Najpierw ustaw strukturę i hierarchię, dopiero potem dokładaj estetykę. Strona, która ładnie wygląda, ale gubi użytkownika, nie sprzedaje.

**Kolejność pracy nad każdą stroną:**
1. Brief → cel strony (jedna główna akcja: telefon / formularz / rezerwacja).
2. Treść i hierarchia komunikatów (co mówisz i w jakiej kolejności).
3. Szkielet sekcji (wireframe, bez kolorów).
4. Typografia + skala + siatka odstępów.
5. Kolor, kontrast, akcent CTA.
6. Wizuale (realne zdjęcia > stock).
7. Mobile-first sprawdzenie.
8. Wydajność i dostępność.

---

## 1. Zasady wysoko konwertującego designu

### 1.1 Hierarchia wizualna — prowadź oko

Hierarchia to ustawienie elementów wg ważności tak, by oko samo wiedziało, gdzie patrzeć najpierw. Buduj ją przez: **rozmiar, kontrast, kolor, odstęp, pozycję**. Na ekranie powinien być jeden dominujący element (nagłówek), jeden wyraźny akcent (CTA) i reszta podporządkowana.

**Reguły:**
- Jeden ekran = jeden najważniejszy komunikat + jedna główna akcja.
- Najważniejsze elementy: duże, kontrastowe, otoczone pustą przestrzenią.
- Nie więcej niż 2–3 poziomy ważności w obrębie sekcji (H1 → H2 → tekst).
- Akcent kolorystyczny (kolor CTA) używaj oszczędnie — jeśli wszystko krzyczy, nic nie krzyczy.

### 1.2 Anatomia hero (sekcja powitalna)

Hero ma jedno zadanie: odpowiedzieć na trzy pytania w 5 sekund — *co to jest, dla kogo, dlaczego teraz*. Wszystko kluczowe ma być widoczne bez scrollowania.

**Cztery elementy hero:**
1. **Nagłówek (H1)** — korzyść/wynik, nie cecha. Maks. ~8 słów. Jeśli ruch idzie z reklamy/linku, zachowaj „message match" (ten sam język co w reklamie).
2. **Podtytuł** — wyjaśnia *jak* dostarczasz tę korzyść; trafia w konkretny ból klienta.
3. **CTA** — jeden główny przycisk, wysoki kontrast, czasownik akcji. Drugi (opcjonalny) jako link/przycisk słabszy wizualnie.
4. **Wizual** — produkt/usługa w akcji lub pożądany efekt. Realni ludzie budują więcej zaufania niż generyczny stock.

> Dane do zapamiętania: ~62% konwersji dzieje się powyżej linii zgięcia; nagłówek korzyściowy + jeden wyraźny CTA to fundament. (źródła niżej)

**Anty-przykład nagłówka:** „Budujemy przyszłość", „Twój partner w sukcesie". Puste. **Dobry:** „Remont łazienki w 10 dni — stała cena, bez niespodzianek".

### 1.3 Powyżej linii zgięcia (above the fold)

To, co widać bez scrolla, decyduje, czy ktoś zostanie. Umieść tu: nagłówek, podtytuł, CTA, wizual i (jeśli się zmieści) jeden dowód społeczny — np. „Zaufało nam 500+ firm" albo rząd logotypów.

**Checklist above-the-fold:**
- [ ] H1 mówi, co robisz i dla kogo.
- [ ] Widoczny przynajmniej jeden CTA.
- [ ] Jest sygnał zaufania (liczba, logo, ocena).
- [ ] Na mobile to wszystko mieści się bez nadmiernego scrolla i nie jest ściśnięte.

### 1.4 Dowód społeczny

Najszybszy sposób na budowę zaufania. Działa, bo ludzie ufają innym ludziom.

**Rodzaje (od najmocniejszych):**
- Wideo-opinie i case studies z konkretnym wynikiem (liczby!).
- Opinie tekstowe z imieniem, zdjęciem, firmą — im więcej szczegółu, tym wiarygodniej.
- Logotypy klientów / „zaufali nam".
- Liczby: „2 000+ zrealizowanych projektów", „4,9/5 z 312 opinii".
- Oceny gwiazdkowe, recenzje Google.
- Odznaki zaufania, certyfikaty, gwarancje.

**Reguła rozmieszczenia:** stawiaj dowód społeczny **tuż przed lub przy CTA**. Opinie + gwiazdki bezpośrednio nad/pod przyciskiem podnoszą konwersję mocniej niż te same elementy rozrzucone luzem.

### 1.5 CTA — wezwanie do działania

**Copy:** krótkie, czasownik + korzyść, 2–7 słów. Pierwsza osoba i konkret biją ogólniki.
- Słabo: „Wyślij", „Dowiedz się więcej".
- Lepiej: „Umów bezpłatną wycenę", „Zarezerwuj termin", „Odbierz wycenę w 24h".

**Kontrast:** przycisk musi odcinać się kolorem od tła i sąsiadów. To jeden element na ekranie, który ma „krzyczeć".

**Umiejscowienie:** główny CTA above the fold + powtórzony po każdej sekcji budującej zaufanie (po dowodzie społecznym, po procesie, na końcu strony). Jedna główna akcja przez całą stronę — nie mnóż różnych celów.

**Mikro-zaufanie przy CTA:** dopisek typu „Bez zobowiązań", „Odpowiadamy w 24h", „Zero spamu" zmniejsza opór.

### 1.6 Elementy zaufania

Poza opiniami: gwarancje, czas reakcji, lata na rynku, ubezpieczenie/licencje (przy usługach fizycznych), polityka prywatności, prawdziwy adres i telefon, zdjęcia zespołu i realizacji, certyfikaty branżowe. Im wyższe ryzyko zakupu, tym więcej zaufania trzeba dołożyć obok punktu decyzji.

### 1.7 Wzorce skanowania: F i Z

Ludzie nie czytają — skanują. Dwa główne wzorce:

- **Wzorzec F** — dla stron tekstowych (blogi, długie opisy usług). Oko jedzie poziomo u góry, potem krótszy poziomy ruch niżej, potem pionowo po lewej krawędzi. **Wniosek:** najważniejsze słowa daj na początku nagłówków i akapitów; lewa krawędź to „autostrada uwagi".
- **Wzorzec Z** — dla stron obrazkowych, ubogich w tekst (typowy hero, landing). Oko: lewy-góra → prawy-góra → po przekątnej → lewy-dół → prawy-dół. **Wniosek:** logo lewy-góra, nawigacja/CTA prawy-góra, główny komunikat na przekątnej, główny CTA prawy-dół lub na końcu Z.

Praktyka: rozmieszczaj kluczowe elementy wzdłuż tych ścieżek, nie wbrew nim.

### 1.8 Pusta przestrzeń (white space)

Pusta przestrzeń to nie „zmarnowane miejsce" — to narzędzie. Odstępy wokół tekstu i tytułów podnoszą zrozumiałość (badania mówią o ~20%), poprawiają skanowalność i wyróżniają to, co ważne.

**Reguły:**
- Izoluj CTA i formularze pustą przestrzenią — wtedy „wyskakują".
- Zasada bliskości (Gestalt): elementy blisko siebie = grupa; oddal, by rozdzielić.
- Reguła „wewnątrz ≤ zewnątrz": odstęp wewnątrz grupy mniejszy niż między grupami.
- Nie bój się oddechu. Ściśnięty layout = tani layout.

### 1.9 Siatka odstępów — system 8 pt

Używaj wielokrotności 8 px dla marginesów i paddingów (8, 16, 24, 32, 48, 64…). Dla gęstszych interfejsów dopuszczalna siatka 4 px. Dzięki temu layout jest spójny i skalowalny, bez ułamkowych pikseli. Line-height ustawiaj jako wielokrotność jednostki bazowej (np. tekst 16 px → line-height 24 px).

### 1.10 Typografia

**Skala:** dobieraj rozmiary wg skali (modular scale), np. proporcja 1:1,25 lub 1:1,333. Dzięki temu H1, H2, H3, tekst tworzą spójną hierarchię, a nie losowy zbiór rozmiarów.

**Pary fontów:** sprawdzona metoda to serif + sans-serif (np. nagłówki serif, tekst sans). Maksymalnie 2 rodziny fontów na stronę. Sans-serif do długich partii tekstu na ekranie.

**Czytelność:**
- Tekst min. 16 px.
- Długość wiersza maks. ~80 znaków.
- Line-height tekstu ≥ 1,5.
- Unikaj fontów condensed, ozdobnych, „nowinkowych" do dłuższych partii.

**Uwaga anti-slop:** porzuć domyślne Inter/Roboto/Arial jako „twarz" marki. To pierwszy sygnał generyczności (patrz sekcja 4).

### 1.11 Kontrast (i kolor)

WCAG: kontrast min. **4,5:1** dla zwykłego tekstu, **3:1** dla dużego (≥18 pt / ~24 px lub ≥14 pt bold). Sprawdzaj kontrast nagłówków, tekstu i ikon w trybie jasnym i ciemnym. Tekst musi skalować się do 200% bez utraty funkcji.

**Kolor:** zdefiniuj paletę: 1 kolor marki + 1 akcent (CTA) + neutralne (tła, teksty). Akcent rezerwuj dla akcji. Nigdy nie przekazuj informacji samym kolorem (np. czerwony błąd) — dołóż ikonę/tekst.

### 1.12 Spójność

Jeden zestaw tokenów (kolory, fonty, odstępy, zaokrąglenia, cienie) używany konsekwentnie na całej stronie. Przyciski wyglądają tak samo wszędzie, nagłówki mają stałą skalę, odstępy z jednej siatki. Niespójność czytamy podświadomie jako brak profesjonalizmu.

### 1.13 Mobile-first

Ponad 60% ruchu to mobile, a Google indeksuje mobile-first. Projektuj najpierw na wąski ekran, potem rozszerzaj.

**Checklist mobile:**
- [ ] CTA łatwo dosięgalne kciukiem (cele dotykowe min. ~44×44 px).
- [ ] Nagłówek i CTA widoczne bez scrolla.
- [ ] Tekst czytelny bez zoomu (≥16 px).
- [ ] Formularze krótkie, pola pełnej szerokości, poprawne typy klawiatury.
- [ ] Nic nie wystaje poza ekran; brak poziomego scrolla.
- [ ] Sticky CTA/telefon na dole bywa skuteczny przy usługach lokalnych.

### 1.14 Dostępność (WCAG — podstawy)

- Kontrast 4,5:1 / 3:1 (jak wyżej).
- Semantyczny HTML: jedna H1, logiczna hierarchia nagłówków, `<button>`/`<a>` zgodnie z funkcją.
- Każdy obraz znaczący ma `alt`; dekoracyjne `alt=""`.
- Pełna obsługa klawiaturą + widoczny focus.
- Pola formularza mają etykiety (`<label>`).
- Nie polegaj na samym kolorze.
- Tekst skaluje się do 200%.

Dostępność to nie tylko zgodność — to też więcej konwersji (mniej barier = więcej ukończonych akcji).

### 1.15 Szybkość jako czynnik konwersji

Wolna strona traci klientów i pozycje. Twarde dane: ~1 s opóźnienia ≈ −7% konwersji (na mobile nawet do −20%); strony zaliczające wszystkie Core Web Vitals notują ~24% niższy bounce.

**Cele Core Web Vitals:**
- **LCP** < 2,5 s (największy element widoczny szybko).
- **CLS** niski (brak „skakania" layoutu — rezerwuj miejsce na obrazy/fonty).
- **INP** niski (szybka reakcja na interakcje).

**Praktyka na WordPressie (custom theme):**
- Obrazy: WebP/AVIF, `width`/`height` ustawione, `loading="lazy"` poniżej zgięcia, hero ładowane priorytetowo (bez lazy).
- Ładuj CSS/JS tylko tam, gdzie potrzebne (block theme + `theme.json` pomagają; nie wrzucaj wszystkiego do `style.css`).
- Minimum wtyczek; brak page buildera = mniej narzutu.
- Czcionki: hostuj lokalnie, `font-display: swap`, podzbiory znaków (latin + latin-ext dla polskich znaków).
- Cache + dobry hosting.

---

## 2. Gotowe wzorce sekcji strony usługowej (wizytówka)

Poniżej rekomendowana kolejność jednostronicowej (lub home) strony usługowej. Każda sekcja ma **cel** i **co musi zawierać**. To szkielet — dopasuj liczbę i kolejność do branży, ale logika „zrozum → zaufaj → działaj" zostaje.

### Kolejność i cel sekcji

1. **Nawigacja (header)**
   *Cel:* orientacja + szybka akcja. Logo (lewy-góra), 3–5 pozycji menu, telefon i/lub CTA (prawy-góra). Sticky na scroll.

2. **Hero**
   *Cel:* w 5 s powiedzieć co/dla kogo/dlaczego teraz i dać akcję. Nagłówek korzyściowy + podtytuł + główny CTA + wizual. Jeśli usługa lokalna — dodaj miasto/region.

3. **Pasek zaufania (logo / liczby)**
   *Cel:* natychmiastowa wiarygodność. Rząd logotypów klientów lub kluczowe liczby („500+ realizacji", „4,9/5"). Krótki, tuż pod hero.

4. **Problem → rozwiązanie**
   *Cel:* pokazać, że rozumiesz ból klienta, i ustawić siebie jako odpowiedź. Schemat: *Masz problem X → mamy rozwiązanie Y → zyskasz Z*. Pisz z perspektywy klienta, nie firmy.

5. **Usługi / oferta**
   *Cel:* pokazać, co konkretnie robisz. 3–6 kluczowych usług w kafelkach (ikona/zdjęcie + nazwa + 1–2 zdania + link do szczegółów). Nie zalewaj listą wszystkiego.

6. **Proces / jak to działa**
   *Cel:* zdjąć niepewność — pokazać, że współpraca jest bezpieczna i przewidywalna. 3–5 kroków („1. Kontakt → 2. Wycena → 3. Realizacja → 4. Efekt"). Krótko, z ikonami.

7. **Dowód społeczny (opinie / case studies)**
   *Cel:* potwierdzić, że dostarczasz wynik. Opinie z imieniem/zdjęciem, oceny, realizacje „przed/po", liczby. Najmocniejszy blok — daj mu miejsce i CTA pod spodem.

8. **O nas**
   *Cel:* uczłowieczyć markę i dołożyć zaufania. Krótka historia, zdjęcie zespołu/właściciela, wartości, certyfikaty. Bez ściany tekstu — zawsze pod kątem „dlaczego mi zaufać".

9. **FAQ**
   *Cel:* rozbroić obiekcje przed decyzją. To nie wypełniacz — to twoja lista zastrzeżeń. 5–8 realnych pytań: cena/wycena, terminy, gwarancje, zakres, obsługa. FAQ stawiaj blisko końcowego CTA.

10. **CTA końcowe (sekcja konwersji)**
    *Cel:* domknąć. Mocny nagłówek-zachęta + formularz lub duży przycisk + element zaufania obok (gwarancja, „odpowiadamy w 24h"). Powtórz główną ofertę z hero.

11. **Stopka (footer)**
    *Cel:* domknięcie i wiarygodność. NAP (nazwa, adres, telefon — ważne dla lokalnego SEO), godziny, mapa, social, powtórzone CTA, linki prawne (polityka prywatności, regulamin), ewentualnie mini-menu i certyfikaty.

> **Zasada ciągu konwersji:** główny CTA powtarzaj po każdej sekcji budującej zaufanie (po dowodzie, po procesie, w FAQ, na końcu). Użytkownik powinien móc kliknąć „w punkcie gotowości", nie scrollując z powrotem.

### Szybka checklist sekcji
- [ ] Hero odpowiada na 3 pytania w 5 s.
- [ ] Jest pasek zaufania tuż pod hero.
- [ ] Problem opisany z perspektywy klienta.
- [ ] Usługi: 3–6, każda z linkiem.
- [ ] Proces: 3–5 kroków.
- [ ] Dowód społeczny z konkretem (imię/liczba/wynik).
- [ ] FAQ rozbraja realne obiekcje.
- [ ] CTA powtórzone min. 3× w toku strony.
- [ ] Footer ma NAP + linki prawne.

---

## 3. Zasoby z GitHuba (do podpięcia jako kontekst dla AI lub do nauki)

Liczby gwiazdek są przybliżone (stan z czerwca 2026, mogą się zmieniać). Repo dzielę wg zastosowania.

### 3.1 Skille / prompty designowe dla Claude i Cursor (najważniejsze dla pracy z AI)

- **rohitg00/awesome-claude-design** (~765★) — kolekcja plików `DESIGN.md` ułożonych w 9 „rodzin estetycznych" + **anti-slop kit** (gotowe prompty przeciw generycznym wynikom), remix recipes i sekcja „Picker" (3 pytania → właściwa estetyka). Najpraktyczniejszy punkt startu, gdy projektujesz z Claude.
- **travisvn/awesome-claude-skills** — kurowana lista skilli do Claude Code, w tym oficjalny **frontend-design** Anthropic (każe unikać „AI slop", podejmować odważne decyzje; dobrze działa z React + Tailwind, ale logika promptów przenosi się też na inne stacki).
- **jiji262/claude-design-skill** — przenośny Claude Skill robiący z Claude „eksperta designera" do artefaktów HTML (landingi, prototypy, animacje, postery). Zaadaptowany z wewnętrznego systemowego promptu designu Claude.ai.
- **Trystan-SA/claude-design-system-prompt** — odtworzony systemowy prompt + biblioteka skilli zamieniająca LLM w opiniotwórczego, świadomego dostępności, odpornego na AI-slop współpracownika designowego.
- **awesome-design-md** (~92k★) — biblioteka plików `DESIGN.md` zreverse-engineerowanych z 55+ znanych stron (Stripe, Vercel, Linear) z dokładnymi tokenami: kolory, typografia, odstępy, komponenty, interakcje. Wklejasz jako kontekst, by AI projektowało „w stylu X", a nie generycznie.
- **ui-ux-pro-max-skill** (~95k★) — AI-skill dający „inteligencję designową" (style, palety, pary fontów, typy produktów, wytyczne UX) dla wielu platform i stacków.

> **Jak to wykorzystać w praktyce:** przed startem projektu przygotuj własny `DESIGN.md` (paleta z dokładnymi hexami, nazwy fontów, skala odstępów/zaokrągleń, lista rzeczy zakazanych) i podaj go Claude jako kontekst. To największa dźwignia przeciw generyczności (patrz sekcja 4).

### 3.2 Kolekcje „awesome" i inspiracje

- **SHSFWork/awesome-inspiration** (~84★) — kurowane galerie w 40+ kategoriach: landingi, SaaS, UI/UX, komponenty, portfolia, dark mode, navbary, footery, 404, typografia, dostępność. Linkuje do Lapa Ninja, Landingfolio, Mobbin, Component.Gallery, SaaS Pages, Dark.Design.
- **PaulleDemon/awesome-landing-pages** — darmowe landingi dla SaaS/freelancerów/agencji; responsywne, poprawne semantycznie (h1/h2/section), z Tailwindem — dobre do podpatrzenia struktury sekcji.
- **creativetimofficial/awesome-landing-page** — darmowy bootstrapowy landing do sklonowania.
- **nordicgiant2/awesome-landing-page** — zestaw ładnych, praktycznych szablonów landingów.
- **pulkitxm/claude-directory** — galeria eksperymentów UI generowanych Claude (hero sekcje, design systemy, shadery, animacje) — inspiracja, czego AI jest zdolne, gdy dobrze poprowadzone.

### 3.3 Szablony i biblioteki komponentów/sekcji (do nauki struktury i kodu)

- **astrowind** (~5,8k★) — darmowy szablon Astro + Tailwind; świetny wzór czystej struktury sekcji.
- **cruip/tailwind-landing-page-template** (~4,5k★) — landing w React/Next + Tailwind.
- **cruip/open-react-template** (~4,7k★) — landing pod open-source/SaaS.
- **ant-design-landing** (~6,5k★) — gotowe sekcje landingowe Ant Design.
- Galerie sekcji do podpatrzenia układów: **Landingfolio**, **Lapa Ninja**, **SaaS Pages**, **Component.Gallery**, **Mobbin** (mobile).

> Uwaga: te repo to React/Tailwind/Astro. Na WordPress custom theme nie kopiujesz ich 1:1 — **przenosisz wzorce sekcji, hierarchię i tokeny**, a kodujesz w PHP/HTML + `theme.json`/blokach.

---

## 4. Anti-slop: jak NIE wyglądać jak generyczny szablon AI

AI domyślnie produkuje to, co najczęstsze w danych treningowych: font Inter/Roboto, gradient niebiesko-fioletowy, gigantyczny hero z pustym hasłem („Build the future"), karty z identycznym `border-radius: 16px` wszędzie, „container soup". Tak wygląda slop. Oto jak go uniknąć.

### 4.1 Reguły bazowe

1. **Najpierw design system, potem generowanie.** Daj AI dokładny kontekst: **hexy** (nie „niebieski"), **nazwy fontów** (nie „sans-serif"), **piksele** odstępów/zaokrągleń, oraz **reguły negatywne** (czego NIE robić). Im więcej konkretu, tym mniej generyczności.
2. **Wymień domyślne fonty.** Porzuć Inter/Roboto/Arial jako twarz marki. Wybierz parę z charakterem (np. wyrazisty serif w nagłówkach + neutralny, ale nie domyślny sans w tekście).
3. **Kontroluj kolor twardo.** Zdefiniuj paletę i dopisz negatywy: „bez neonów, bez fioletu/cyjanu, bez gradientów cyberpunk, bez świecących obwodów". Unikaj „purple AI slop".
4. **Realne zdjęcia zamiast stocku.** Prawdziwi ludzie, prawdziwe realizacje, prawdziwe biuro. Stock = sygnał generyczności i spadek zaufania.
5. **Przepisz copy własnym głosem.** Generyczne hasła zamień na konkrety branżowe i język klienta. Zero „partnera w sukcesie".
6. **Dodaj intencjonalne mikro-interakcje.** Subtelny hover, sensowna animacja wejścia sekcji — nie dlatego, że można, tylko by prowadzić uwagę.
7. **Zróżnicuj rytm.** Nie każda sekcja to „nagłówek + 3 karty". Mieszaj układy: pełnoekranowy wizual, split 50/50, lista kroków, cytat na całą szerokość.
8. **Łam domyślne zaokrąglenia i cienie.** Świadomie wybierz styl narożników i cieni jako element marki, zamiast wszędzie tego samego `16px`.
9. **Iteruj i kwestionuj.** Po pierwszym wyniku pytaj: „to wygląda generycznie — co uczyniłoby to bardziej wyróżniającym się?". Pierwszy output AI to początek rozmowy, nie koniec.
10. **Zbieraj własne referencje.** Trzymaj folder screenshotów stron, które lubisz. Daj je AI jako wzorzec zamiast prosić „zaprojektuj ładną stronę".

### 4.2 Czerwone flagi (jeśli to widzisz — popraw)

- [ ] Font Inter/Roboto bez powodu.
- [ ] Gradient niebiesko-fioletowy „znikąd".
- [ ] Nagłówek-pustosłowie („Build the future", „Empower your X").
- [ ] Wszystkie karty z identycznym zaokrągleniem i cieniem.
- [ ] Stockowe zdjęcia uśmiechniętych ludzi z laptopem.
- [ ] Każda sekcja w tym samym układzie 3 kafelków.
- [ ] Emoji jako ikony „na szybko".
- [ ] Brak jednej, świadomej decyzji estetycznej — wszystko „bezpieczne" i nijakie.

### 4.3 Mini-szablon `DESIGN.md` do podania AI

```
# DESIGN.md — [nazwa klienta]
Branża / ton: [np. rzemiosło premium, ciepły, godny zaufania]
Paleta:
  - tło: #FFFFFF / #0F1A14
  - tekst: #1A1A1A
  - marka: #0E5A3A
  - akcent CTA: #E8A33D
Fonty:
  - nagłówki: [np. Fraunces]
  - tekst: [np. Source Sans 3]
Skala typografii: 1:1,25, baza 16px
Siatka odstępów: 8px (8/16/24/32/48/64)
Zaokrąglenia: 8px karty, 4px przyciski
Styl: [np. ciepły editorial, dużo white space, zdjęcia realizacji]
ZAKAZANE: Inter/Roboto, gradient fiolet-niebieski, stock corpo,
  wszystkie karty 16px radius, emoji jako ikony, puste hasła.
```

---

## 5. Specyfika: custom theme WordPress bez page buildera

- **Wybór architektury:** preferuj **block theme (FSE)** + `theme.json` jako jedno źródło tokenów (kolory, fonty, odstępy, skala). 68% profesjonalistów WP wybiera FSE — czystszy kod, łatwiejsze utrzymanie, lepsza wydajność niż buildery.
- **`theme.json` = design system w kodzie.** Definiuj tu paletę, skalę typografii, presety odstępów. Reszta CSS tylko tam, gdzie naprawdę potrzebna.
- **Sekcje jako wzorce (patterns) i bloki.** Hero, dowód społeczny, FAQ, CTA buduj jako reużywalne patterny/bloki — odwzorowują strukturę z sekcji 2, klient łatwo edytuje treść bez psucia layoutu.
- **Pola treści:** ACF Pro lub natywne bloki do powtarzalnych elementów (opinie, kroki procesu, usługi).
- **Środowisko:** lokalnie (LocalWP/Docker), kontrola wersji w Git.
- **Wydajność (kluczowa dla konwersji):** brak buildera = lżejszy DOM i mniej CSS/JS; ładuj zasoby warunkowo, optymalizuj obrazy (WebP/AVIF), hostuj fonty lokalnie z `latin-ext` dla polskich znaków, ustawiaj `width`/`height` (CLS).
- **Polskie znaki:** zawsze sprawdź, czy wybrany font ma `latin-ext`; inaczej „ą/ę/ł/ś/ż" się posypią.

---

## 6. Master-checklist przed oddaniem strony klientowi

**Komunikat i konwersja**
- [ ] Hero odpowiada: co / dla kogo / dlaczego teraz (5 s test).
- [ ] Jeden główny CTA, powtórzony w toku strony.
- [ ] Dowód społeczny przy punktach decyzji.
- [ ] FAQ rozbraja realne obiekcje.
- [ ] Footer: NAP + linki prawne.

**Design**
- [ ] Jedna spójna hierarchia (H1→H2→tekst), skala typografii.
- [ ] Maks. 2 rodziny fontów, nie domyślny Inter „na odwal".
- [ ] Paleta: marka + 1 akcent CTA + neutralne.
- [ ] Siatka odstępów 8 px, dużo oddechu wokół CTA.
- [ ] Zróżnicowany rytm sekcji (nie wszystko „3 karty").

**Dostępność i kontrast**
- [ ] Kontrast 4,5:1 (tekst) / 3:1 (duży tekst).
- [ ] Semantyka HTML, jedna H1, alt-y, focus, etykiety pól.
- [ ] Informacja nie tylko kolorem.
- [ ] Tekst skaluje się do 200%.

**Mobile**
- [ ] Hero + CTA bez scrolla na telefonie.
- [ ] Cele dotykowe ≥ 44 px, brak poziomego scrolla.
- [ ] Formularze krótkie, poprawne typy klawiatury.

**Wydajność**
- [ ] LCP < 2,5 s, niski CLS, niski INP.
- [ ] Obrazy WebP/AVIF, lazy poniżej zgięcia, hero priorytetowo.
- [ ] Fonty lokalnie + `font-display: swap` + `latin-ext`.
- [ ] Minimum wtyczek, CSS/JS warunkowo.

**Anti-slop**
- [ ] Realne zdjęcia, nie stock.
- [ ] Copy własnym głosem, zero pustych haseł.
- [ ] Brak gradientu fiolet-niebieski „znikąd".
- [ ] Min. jedna świadoma, wyróżniająca decyzja estetyczna.

---

## Źródła

**Hero, above the fold, konwersja**
- [CXL — How to Build a High-Converting Landing Page](https://cxl.com/blog/how-to-build-a-high-converting-landing-page/)
- [The Hoop Studio — High-Converting Landing Page Design: Structure Before Style](https://www.thehoopstudio.com/resources/insights/high-converting-landing-page-design)
- [Branded Agency — Best Practices for High Converting Landing Pages 2025–2026](https://www.brandedagency.com/blog/high-converting-landing-pages)
- [Prismic — Website Hero Section Best Practices + Examples](https://prismic.io/blog/website-hero-section)
- [Primer — The Winning Hero Section Formula](https://www.goprimer.com/blog/the-winning-hero-section-formula)
- [Nudge — 10 Best Practices for a Website's Hero Section](https://www.nudgenow.com/blogs/web-design-hero-section-best-practices)

**Hierarchia wizualna, wzorce F i Z**
- [99designs — Using F and Z patterns to create visual hierarchy](https://99designs.com/blog/tips/visual-hierarchy-landing-page-designs/)
- [Usability Geek — Visual Hierarchy In UX Design](https://usabilitygeek.com/visual-hierarchy-ux-design/)
- [Ramotion — Visual Hierarchy: Principles & How to Design](https://www.ramotion.com/blog/visual-hierarchy/)
- [Slider Revolution — What Is Visual Hierarchy in Web Design?](https://www.sliderrevolution.com/design/visual-hierarchy/)

**Struktura strony usługowej**
- [Deer Web Design — Service Business Website Structure: The 7 Pages You Need](https://www.deerwebdesign.com/service-business-website-structure-the-7-pages-you-need-and-what-goes-on-each/)
- [Rattleback — How to structure your website's service pages to drive conversions](https://www.rattleback.com/insights/articles/service-page-layout-best-practices/)
- [VVRapid — Service Business Website Structure: 9 Pages for Leads](https://vvrapid.com/service-business-website-structure-9-pages/)
- [HUEMOR — High Converting Service Page Design Examples](https://huemor.rocks/blog/service-page-design-examples/)
- [Squarespace — Service Page Design: Complete Guide and Examples](https://www.squarespace.com/blog/services-page-design)

**Dowód społeczny, zaufanie, CTA**
- [Genesys Growth — Social Proof Impact on Conversions: 10 Statistics](https://genesysgrowth.com/blog/social-proof-conversion-stats-for-marketing-leaders)
- [Mouseflow — Using Social Proof for Conversion Rate Optimization](https://mouseflow.com/blog/social-proof-for-cro/)
- [Amra & Elma — Best High-Converting CTA Statistics 2025](https://www.amraandelma.com/high-converting-cta-statistics/)
- [Discovered Labs — Social Proof and Trust Signals for CRO](https://discoveredlabs.com/blog/social-proof-and-trust-signals-for-conversion-rate-optimization-implementation-and-impact)

**Typografia, kontrast, dostępność (WCAG)**
- [ArtVersion — Contrast and Typography Scale for Better Accessibility](https://artversion.com/blog/understanding-contrast-and-typography-scale-for-wcag/)
- [W3C WAI — Understanding SC 1.4.3: Contrast (Minimum)](https://www.w3.org/WAI/WCAG21/Understanding/contrast-minimum.html)
- [WebAIM — Contrast and Color Accessibility](https://webaim.org/articles/contrast/)
- [DeveloperUX — Ultimate Guide to Accessible Font Pairing](https://developerux.com/2025/06/23/ultimate-guide-to-accessible-font-pairing/)
- [A11Y Collective — How to Pick the Perfect Font Size (WCAG)](https://www.a11y-collective.com/blog/wcag-minimum-font-size/)

**Pusta przestrzeń i siatka odstępów**
- [Cieden — Spacing best practices (8pt grid, internal ≤ external)](https://cieden.com/book/sub-atomic/spacing/spacing-best-practices)
- [Rejuvenate Digital — The 8pt Grid System](https://www.rejuvenate.digital/news/designing-rhythm-power-8pt-grid-ui-design)
- [Wade Digital — The Role of White Space in Web Design & UX](https://wadedigital.co.uk/advice/the-role-of-white-space-in-web-design-user-experience/)

**Szybkość, Core Web Vitals, mobile-first**
- [WP Rocket — Website Load Time & Speed Statistics](https://wp-rocket.me/blog/website-load-time-speed-statistics/)
- [Digital Applied — Page Speed Statistics 2026: Revenue Impact](https://www.digitalapplied.com/blog/page-speed-statistics-2026-revenue-impact)
- [Bloggers Ideas — 80+ Page Speed and Core Web Vitals Statistics 2026](https://www.bloggersideas.com/page-speed-core-web-vitals-statistics/)

**Anti-slop / AI**
- [925 Studios — AI Slop Web Design: Spotting and Fixing Generic Websites](https://www.925studios.co/blog/ai-slop-web-design-guide)
- [MindStudio — How to Avoid AI Slop When Using Claude Design](https://www.mindstudio.ai/blog/claude-design-avoid-ai-slop-design-system)
- [Zero Skill AI — How to Fix Purple AI Slop](https://zeroskillai.com/how-to-fix-purple-ai-slop/)
- [Wix — Avoid generic AI website content](https://www.wix.com/blog/avoid-generic-ai-website-content)

**Zasoby GitHub / skille AI do designu**
- [rohitg00/awesome-claude-design](https://github.com/rohitg00/awesome-claude-design)
- [travisvn/awesome-claude-skills](https://github.com/travisvn/awesome-claude-skills)
- [jiji262/claude-design-skill](https://github.com/jiji262/claude-design-skill)
- [Trystan-SA/claude-design-system-prompt](https://github.com/Trystan-SA/claude-design-system-prompt)
- [SHSFWork/awesome-inspiration](https://github.com/SHSFWork/awesome-inspiration)
- [PaulleDemon/awesome-landing-pages](https://github.com/PaulleDemon/awesome-landing-pages)
- [GitHub Topic: landing-page](https://github.com/topics/landing-page)

**WordPress custom theme (bez buildera)**
- [WordPress Developer Blog — You don't need theme.json for block theme styles](https://developer.wordpress.org/news/2025/07/you-dont-need-theme-json-for-block-theme-styles/)
- [ACF — WordPress Block Theme Development Step by Step](https://www.advancedcustomfields.com/blog/wordpress-block-theme-development/)
- [Rocket.net — Top 7 WordPress Theme Development Trends in 2025](https://rocket.net/blog/top-7-wordpress-theme-development-trends-in-2025/)
- [Neoline Logic — Build a Powerful Custom WordPress Theme in 2025](https://www.neolinelogic.com/custom-wordpress-theme-guide-2025/)
