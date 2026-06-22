# SOP: Wysoko konwertujące sklepy WooCommerce wg branż

**Dla kogo:** początkujący web-designerzy budujący sklepy dla klientów na WooCommerce z custom theme (bez Elementora).
**Jak używać:** najpierw przejdź sekcję uniwersalną (działa dla każdego sklepu), potem otwórz checklistę dla branży klienta. Każdy punkt traktuj jak pozycję do odhaczenia w briefie i podczas wdrożenia.

Liczby kontrolne (2025/2026), które warto trzymać przed oczami:
- Średnia konwersja e-commerce: ~1,8%. „Dobry" wynik zależy od branży (patrz sekcje).
- Porzucenie koszyka: ~70% (mobile ~80%, desktop ~66%).
- Powód #1 porzucenia: nieoczekiwane koszty (dostawa, podatki) — ok. 48% przypadków.
- 18% porzuceń to „checkout za długi/za skomplikowany".
- ~60%+ sprzedaży e-commerce w 2026 idzie z mobile. Sekunda opóźnienia ładowania na mobile = nawet -20% konwersji.

---

## 1. Zasady uniwersalne (dla KAŻDEGO sklepu)

### 1.1 Zdjęcia produktów
Zdjęcie to substytut wzięcia produktu do ręki. Brak zoomu = prośba o zakup „na wiarę".

- **Minimum 5 ujęć na produkt** + wideo, jeśli budżet pozwala. Pierwsze zdjęcie: produkt na wprost, czyste (białe) tło.
- **Rozdzielczość 2000–2048 px** na dłuższym boku, żeby zoom był ostry na ekranach retina.
- **Zoom obowiązkowy** (najechanie lub klik). Dodaj ujęcia detali (faktura, szwy, etykiety).
- **360°** tam, gdzie produkt „chce się obejrzeć dookoła" (meble, elektronika, obuwie) — potrafi podnieść konwersję dwucyfrowo. Standard: 24–36 klatek na pełny obrót.
- Wideo produktowe poprawia konwersję i ruch organiczny — pokaż produkt w użyciu.
- **Optymalizuj wagę plików** (WebP, lazy-load), bo na mobile szybkość = konwersja.

### 1.2 Opisy sprzedażowe (nie specyfikacje)
- Pisz **korzyściami, nie parametrami**. Parametr „bawełna 200 g/m²" → korzyść „gęsta dzianina, która nie prześwituje i trzyma kształt po praniu".
- Struktura karty: nagłówek z obietnicą → 3–5 bulletów korzyści → rozwinięcie → specyfikacja techniczna → FAQ.
- Odpowiadaj na realne obiekcje („Czy pasuje do…?", „Jak długo działa?", „Co jeśli nie zadziała?").
- Skanowalność: krótkie akapity, pogrubienia kluczowych fraz, bullet listy.

### 1.3 Recenzje i UGC
- Pokazuj **średnią ocenę + liczbę opinii** wysoko na karcie, blisko ceny i przycisku „Do koszyka".
- Najlepiej konwertują opinie konkretne (z detalem: do czego użyto, dla kogo, jaki efekt) i ze zdjęciami klientów.
- UGC (zdjęcia/wideo klientów) buduje autentyczność, której nie da fotografia studyjna.
- Zbieraj opinie automatycznie e-mailem po dostawie (np. wtyczki review-request).

### 1.4 Sygnały zaufania i bezpieczeństwa
- 70% kupujących szuka sygnałów zaufania przed zakupem; mogą podnieść konwersję nawet o ~20%.
- **SSL (https + kłódka)** to baza — bez tego przeglądarka straszy „Niezabezpieczona".
- **Plakietki bezpieczeństwa umieszczaj POD przyciskiem płatności** w checkoucie (nie na stronie głównej) — tam, gdzie pada decyzja o pieniądzach.
- **Politykę zwrotów pokaż przy „Do koszyka"**, nie tylko w stopce — to potrafi podnieść add-to-cart nawet o ~23%.
- Badge typu „gwarancja zwrotu pieniędzy 30 dni" realnie podnosi sprzedaż.
- Dane firmy (NIP, adres, telefon), regulamin, polityka prywatności — wymóg prawny i sygnał wiarygodności.

### 1.5 Szybki checkout
- **Zakup jako gość OBOWIĄZKOWY.** Wymuszanie konta wypycha pierwszych kupujących. Konto proponuj PO zakupie (jednym kliknięciem).
- Tnij pola formularza. Przeciętny checkout ma ~15 pól, a wystarcza znacznie mniej. Autouzupełnianie adresu, jedno pole „Imię i nazwisko".
- Portfele cyfrowe i szybkie metody (BLIK, Apple Pay, Google Pay) podbijają konwersję mobilną.
- Pasek postępu / jednoekranowy checkout. Bez niespodzianek na ostatnim kroku.
- Walidacja inline (błąd pokazuj przy polu, nie po wysłaniu całości).

### 1.6 Jawne koszty dostawy
- **Pokaż koszt i czas dostawy JAK NAJWCZEŚNIEJ** — na karcie produktu i w koszyku, nie dopiero w ostatnim kroku. Ukryte koszty to powód #1 porzuceń.
- Kalkulator dostawy w koszyku (po kodzie pocztowym).
- Jeśli jest darmowa dostawa od kwoty X — komunikuj próg w koszyku („Brakuje 23 zł do darmowej wysyłki").

### 1.7 Upsell / cross-sell
- **Cross-sell** (produkty komplementarne) w koszyku — WooCommerce robi to natywnie (zakładka „Produkty powiązane" w produkcie).
- **Upsell** (droższy/lepszy wariant) na karcie produktu — też natywnie.
- Order bump w checkoucie (drobny dodatek jednym kliknięciem) podnosi AOV.
- Nie przesadzaj — za dużo propozycji = paraliż decyzyjny.

### 1.8 Ratowanie porzuconego koszyka
- Sekwencja **3 e-maili** odzyskuje ~69% więcej zamówień niż pojedynczy mail.
- Timing: **1. mail po ~1 h** (sama przypominajka, bez rabatu) → **2. po ~24 h** (zbicie obiekcji) → **3. po ~48–72 h** (zachęta z limitem czasu: darmowa dostawa lub rabat).
- Pierwszy mail bez rabatu — inaczej uczysz klientów porzucać koszyk dla zniżki.
- Personalizowany temat = wyższe otwarcia. Mail ma wyglądać jak napisany przez człowieka (mało grafiki, naturalny język) — lepiej trafia do skrzynki głównej.
- Segmentuj: małe koszyki → standardowa sekwencja z %; duże → spersonalizowany mail „od właściciela" z konkretną kwotą rabatu.

### 1.9 Wyszukiwarka i filtry
- **Wyszukiwarka AJAX z podpowiedziami** (np. FiboSearch) — natywna wyszukiwarka WooCommerce jest słaba. Live-suggestions, miniatury, ceny w podpowiedziach.
- **Filtry fasetowe** (atrybuty: rozmiar, kolor, marka, cena) na stronach kategorii — skracają drogę do produktu i redukują paraliż wyboru.
- **Zapamiętuj wybrane filtry** przy nawigacji tam i z powrotem między listą a kartą produktu.
- Pokazuj liczbę wyników przy filtrach; nie pozwalaj na „0 wyników" bez sugestii.

### 1.10 Strona kategorii vs karta produktu
Mają różne zadania — nie myl ich.

- **Strona kategorii (PLP)** = „wybierz kierunek". Cel: pomóc nawigować, nie sprzedać konkretny produkt. Podkategorie wyróżnione NAD listą produktów, oddzielnie od filtrów. Kategorie ściągają nawet 400% więcej ruchu niż pojedyncze karty produktów — zadbaj o ich SEO i UX.
- **Karta produktu (PDP)** = „podejmij decyzję". Tu komplet: zdjęcia, cena, warianty, dostępność, dostawa, opinie, CTA.
- „Quick shop" (szybki podgląd/dodanie z poziomu listy) ułatwia zakup, ale na PLP nie przeładowuj CTA „kup teraz" — to tworzy konflikt decyzyjny w fazie przeglądania.

**Checklista uniwersalna (odhacz przed oddaniem sklepu):**
- [ ] ≥5 zdjęć + zoom na każdym produkcie, pliki zoptymalizowane (WebP/lazy-load)
- [ ] Opisy korzyściami, skanowalne, z FAQ na obiekcje
- [ ] Oceny + liczba opinii widoczne przy cenie/CTA
- [ ] SSL aktywne, plakietki zaufania pod przyciskiem płatności
- [ ] Zakup jako gość włączony; minimum pól w checkoucie
- [ ] Koszt i czas dostawy widoczne na karcie i w koszyku
- [ ] BLIK + szybkie płatności włączone
- [ ] Cross-sell w koszyku, upsell na karcie
- [ ] Sekwencja maili o porzuconym koszyku (1 h / 24 h / 48–72 h)
- [ ] Wyszukiwarka AJAX + filtry fasetowe z zapamiętywaniem
- [ ] Mobile: szybkość, sticky „Do koszyka", klikalne elementy ≥44 px
- [ ] Polityka zwrotów przy „Do koszyka"

---

## 2. Best practices KONWERSJI wg branż

### 2.1 Usługi (konsultacje, usługi lokalne)
Tu nie sprzedajesz „produktu z magazynu", tylko **zaufanie + dostępność**. Decyzja zapada na „czy ten wykonawca jest wiarygodny i czy łatwo umówić termin".

Co naprawdę działa:
- **Rezerwacja/kontakt nad zakładką ekranu (above the fold).** Jasne CTA: „Umów wizytę", „Zamów wycenę", „Zadzwoń". Salony z rezerwacją online robią ~39% więcej przychodu; 70% klientów usług woli umawiać się online; rezerwacja 24/7 łapie leady poza godzinami pracy.
- **Cennik (choćby widełki).** 68% odbiorców porzuca stronę, gdy nie znajdzie ceny. Jeśli klient nie chce podawać cen — daj „od X zł" albo pakiety.
- **Portfolio / realizacje** pogrupowane po typie usługi, najlepiej before/after — wizualny dowód kompetencji.
- **Opinie wysoko i z twarzą.** 91% czyta opinie, 84% ufa im jak rekomendacji znajomego. Imię, nazwisko, zdjęcie, gwiazdki.
- **Lokalne SEO:** Google Business Profile, NAP (nazwa-adres-telefon) spójne wszędzie, podstrony per miasto/dzielnica, słowa „darmowa wycena", „usługa awaryjna".
- **Ścieżki usług pod hero** (np. „Umów", „Wyceń", „Zadzwoń") — redukują zmęczenie decyzyjne.

WooCommerce dla usług: produkt typu „Usługa" (wirtualny, bez wysyłki) + wtyczka rezerwacji (WooCommerce Bookings lub odpowiednik) dla terminów; albo formularz wyceny + płatność zaliczki.

**Checklista — Usługi:**
- [ ] CTA rezerwacji/kontaktu nad zakładką, powtórzone w stopce i sticky na mobile
- [ ] Rezerwacja online 24/7 (kalendarz/terminy) lub formularz wyceny
- [ ] Cennik lub widełki / pakiety widoczne bez kontaktu
- [ ] Portfolio per typ usługi (before/after)
- [ ] Opinie z imieniem, zdjęciem, gwiazdkami — wysoko
- [ ] Lokalne SEO: GBP, spójne NAP, podstrony lokalizacyjne
- [ ] Produkt „usługa" jako wirtualny (bez kosztów/pól wysyłki)
- [ ] Zaufanie: certyfikaty, licencje, gwarancje, ubezpieczenie OC

---

### 2.2 Produkty fizyczne (generyczne)
Fundament klasycznego sklepu. Decyzja: „czy to dokładnie ten produkt, czy jest dostępny i czy bezpiecznie kupić".

Co naprawdę działa:
- **Karta produktu pełna:** komplet zdjęć + zoom, cena, warianty, dostępność, dostawa, zwroty, opinie, CTA „Do koszyka" widoczne bez scrollowania.
- **Warianty czytelne.** Swatche kolorów/rozmiarów zamiast suchego dropdownu; blokuj/oznaczaj niedostępne kombinacje; zmieniaj zdjęcie po wyborze wariantu.
- **Dostępność jako sygnał.** „Na stanie", „Ostatnie 3 szt.", „Wysyłka w 24 h" budują pilność i pewność. Out-of-stock → „Powiadom o dostępności" (zbieraj maile, nie trać leada).
- **Gwarancje i zwroty wprost.** Gwarancja producenta, 14/30 dni na zwrot, „gwarancja zwrotu pieniędzy" przy CTA.
- **Urgency uczciwie** (realne stany, realny licznik) — fałszywa pilność niszczy zaufanie.

WooCommerce robi natywnie: warianty (produkt z atrybutami), zarządzanie stanami, related/upsell/cross-sell, powiadomienia o stanach (z wtyczką back-in-stock).

**Checklista — Produkty fizyczne:**
- [ ] Komplet zdjęć + zoom; zdjęcie zmienia się przy wyborze wariantu
- [ ] Warianty jako swatche; niedostępne kombinacje oznaczone
- [ ] Status dostępności i czas wysyłki na karcie
- [ ] „Powiadom o dostępności" dla out-of-stock
- [ ] Gwarancja + polityka zwrotów przy CTA
- [ ] Cross-sell w koszyku, upsell (lepszy wariant) na karcie
- [ ] Realne sygnały pilności (bez ściemy)

---

### 2.3 Odzież i moda
Najwięcej zwrotów (10–20% sprzedaży; 61% zwraca, bo „nie pasowało"). Konwersja kobiece ~3,6%, męskie ~0,8%. Gra toczy się o **rozmiar + estetykę + wyobrażenie sobie produktu na sobie**.

Co naprawdę działa:
- **Tabela rozmiarów + fit finder.** Dokładne wymiary, „mierzy mało/duzo", „true to size". Im lepszy size guide, tym mniej zwrotów i wyższa marża.
- **UGC i wideo z modelem/klientem.** W modzie UGC konwertuje mocniej niż gdzie indziej, bo odpowiada na pytania, których nie pokaże studio. Podawaj wzrost i rozmiar osoby na zdjęciu/wideo — to natychmiast zbija lęk o rozmiar.
- **Lookbook / stylizacje.** Kompletne outfity budują aspirację i podnoszą AOV („dokup, żeby mieć cały zestaw").
- **Polityka zwrotów eksponowana.** Łatwy zwrot/wymiana, jasne warunki i czas; rozważ wymianę lub kredyt sklepowy zamiast wyłącznie zwrotu kasy.
- **Estetyka wizualna.** Spójna fotografia, czysty layout, duże zdjęcia — w modzie wygląd sklepu = postrzegana jakość marki.
- **Filtry typowe dla mody:** rozmiar, kolor, materiał, krój, okazja, cena.

WooCommerce: warianty rozmiar×kolor jako atrybuty + swatche; galeria per wariant; wtyczka tabel rozmiarów; lookbook jako sekcja w custom theme (shop-the-look z hotspotami).

**Checklista — Odzież i moda:**
- [ ] Tabela rozmiarów (dokładne wymiary) + nota „runs small/true to size"
- [ ] Fit finder / rekomendacja rozmiaru (jeśli możliwe)
- [ ] UGC i wideo z podanym wzrostem i rozmiarem osoby
- [ ] Lookbook / shop-the-look ze stylizacjami
- [ ] Galeria zmienia się przy wyborze koloru/wariantu
- [ ] Polityka zwrotów/wymiany eksponowana przy CTA
- [ ] Filtry: rozmiar, kolor, materiał, krój, cena
- [ ] Spójna, wysokiej jakości estetyka fotografii

---

### 2.4 Zdrowie i uroda
Klient kupuje **efekt i bezpieczeństwo na własnym ciele**. Trzeba rozwiać obawy o skład, skuteczność i wiarygodność.

Co naprawdę działa:
- **Skład / lista składników w pełni i czytelnie.** Pochodzenie, „bez parabenów/SLS", wegańskie, hipoalergiczne. Transparentność składu = zaufanie.
- **Certyfikaty i dowody zewnętrzne.** Certyfikaty, testy dermatologiczne, cytaty ekspertów/dermatologów — kluczowe drivery zaufania w tej branży.
- **Before/after i recenzje z efektem.** Autentyczne transformacje (zdjęcia/wideo) pozwalają wyobrazić sobie rezultat. Opinie filtrowane po typie skóry/wieku/problemie przebijają samą ocenę gwiazdkową.
- **Subskrypcje.** Produkty zużywalne (kosmetyki, suplementy) → opcje 30/60/90 dni z rabatem; subskrypcja podnosi LTV i przewidywalność.
- **Edukacja:** jak stosować, kiedy efekt, dla kogo — zbija obiekcje i zwroty.

Uwaga prawno-marketingowa: kosmetyki/suplementy mają ograniczenia w obietnicach (zakaz przypisywania właściwości leczniczych suplementom, oświadczenia kosmetyczne wg rozporządzenia UE). Trzymaj copy w ryzach.

WooCommerce: WooCommerce Subscriptions (lub odpowiednik) dla cykli; pola dodatkowe na skład/sposób użycia; galeria before/after w custom theme; recenzje z atrybutami (typ skóry).

**Checklista — Zdrowie i uroda:**
- [ ] Pełny skład + oznaczenia (wegańskie, bez X, hipoalergiczne)
- [ ] Certyfikaty / testy derm. / cytaty ekspertów
- [ ] Before/after + recenzje z efektem, filtrowane po typie skóry/wieku
- [ ] Subskrypcja 30/60/90 dni z rabatem (produkty zużywalne)
- [ ] Sekcja „jak stosować / kiedy efekt"
- [ ] Copy zgodne z prawem (bez obietnic leczniczych)
- [ ] Próbki / zestawy startowe jako obniżenie progu wejścia

---

### 2.5 Produkty cyfrowe
Brak logistyki = brak kosztów wysyłki i brak czekania. Decyzja zapada na „czy to działa i czy dostanę od razu". Tu **natychmiastowość i dowód działania** robią różnicę.

Co naprawdę działa:
- **Dostawa natychmiastowa.** Po płatności od razu link do pobrania + mail z dostępem. Komunikuj wprost: „Dostęp natychmiast po zakupie".
- **Demo / próbka / wersja darmowa.** Trial, freemium, fragment (sample rozdziału, demo pluginu, podgląd presetów) — pozwól doświadczyć przed zakupem.
- **Licencje jasno opisane.** Co wolno (jedno stanowisko / komercyjnie / liczba pobrań), jak długo, czy aktualizacje w cenie. Klucze licencyjne, limity pobrań, znaki wodne dla ochrony.
- **Zero kosztów wysyłki — wyeksponuj to.** „Bez kosztów wysyłki, plik od razu" usuwa największy hamulec klasycznego e-commerce.
- **Checkout maksymalnie krótki.** Cyfrowy produkt nie potrzebuje adresu dostawy — wyłącz pola wysyłki, zostaw e-mail + płatność.
- Dostępność, dostawa i cena jako część odkrywania (nie niespodzianka w checkoucie).

WooCommerce: produkt „wirtualny" + „do pobrania", limity pobrań i wygasanie linków natywnie; wyłącz pola/metody wysyłki dla koszyka cyfrowego; wtyczka kluczy licencyjnych dla software'u.

**Checklista — Produkty cyfrowe:**
- [ ] Produkt wirtualny + do pobrania; link i mail natychmiast po płatności
- [ ] Demo / trial / próbka dostępne przed zakupem
- [ ] Licencja opisana (zakres, czas, aktualizacje)
- [ ] Komunikat „bez kosztów wysyłki, dostęp od razu"
- [ ] Checkout bez pól adresu/wysyłki
- [ ] Ochrona: limit pobrań, wygasanie linku, klucze/znaki wodne
- [ ] FAQ techniczne (wymagania, format pliku, wsparcie)

---

## 3. Kontekst WooCommerce (custom theme, bez Elementora)

### 3.1 Co WooCommerce robi natywnie
Zanim sięgniesz po wtyczkę — sprawdź, czy to nie jest już w rdzeniu:
- **Warianty produktów** (produkt zmienny + atrybuty), zarządzanie stanami magazynowymi i statusem dostępności.
- **Upsell, cross-sell, produkty powiązane** (zakładka „Linked Products"; related generowane automatycznie po tagach/kategoriach).
- **Produkty wirtualne i do pobrania** z limitem pobrań i wygasaniem linków (idealne pod cyfrowe i usługi).
- **Koszyk, checkout, konta, kupony, podatki, strefy i metody wysyłki** — wbudowane.
- **Zakup jako gość** — włączasz w ustawieniach (WooCommerce → Ustawienia → Konta i prywatność).
- **Block Checkout/Cart** (nowy, na blokach) — szybszy i bardziej elastyczny niż stary shortcode-checkout; w custom theme preferuj bloki, ale zweryfikuj zgodność bramki płatności.

W custom theme przesłaniasz szablony Woo przez katalog `woocommerce/` w motywie (template override) i hooki (`woocommerce_before_add_to_cart_button` itd.) — czysto, bez page-buildera.

### 3.2 Polskie bramki płatności
**BLIK to ~48% płatności online w Polsce — bez niego nie wystartuj.**

| Bramka | BLIK | Uwagi |
|---|---|---|
| **Przelewy24** | tak (od ~1,0%) | Niezawodna, szybkie wypłaty (~24 h), dobra wtyczka, brak opłat na start. Częsta rekomendacja domyślna. |
| **PayU** | tak (od ~1,19%) | Największa rozpoznawalność w PL, raty/odroczone płatności. |
| **Tpay** | tak (najniższy BLIK od ~0,7%) | Prosta integracja, czytelny panel — dobry dla mniejszych sklepów. |
| **Stripe** | **NIE natywnie** | Świetny pod rynki zagraniczne i karty/portfele (Apple/Google Pay), ale dla PL osobno dorzuć bramkę z BLIK. |

Wszystkie mają oficjalne wtyczki w repozytorium WordPress. Setup: rejestracja u operatora (1–3 dni na weryfikację firmy) → instalacja wtyczki → klucze API → konfiguracja metod → **zamówienie testowe**.

Reguła doboru: **sprzedaż głównie PL → bramka z natywnym BLIK** (P24 / PayU / Tpay). Sprzedaż zagraniczna lub silne karty/portfele → dorzuć Stripe obok.

### 3.3 Kluczowe wtyczki (minimalny zdrowy zestaw)
Trzymaj liczbę wtyczek nisko (wydajność, bezpieczeństwo). Sensowny rdzeń:
- **Wyszukiwarka:** FiboSearch (AJAX, podpowiedzi z miniaturami/cenami) — free wystarcza na start, Pro dla fuzzy/synonimów.
- **Filtry fasetowe:** FiboFilters / odpowiednik, z zapamiętywaniem wyborów.
- **Porzucony koszyk:** Cart Abandonment Recovery (sekwencje maili).
- **Recenzje/UGC:** wtyczka zbierania opinii ze zdjęciami i automatyczną prośbą po dostawie.
- **SEO:** Rank Math lub Yoast (schema produktu, sitemap).
- **Wydajność/cache:** cache + optymalizacja obrazów (WebP).
- **Branżowo:** tabele rozmiarów (moda), subskrypcje (uroda/zużywalne), klucze licencyjne (cyfrowe), rezerwacje (usługi).

### 3.4 Integracje: faktury i kurierzy
- **Faktury (automatyczne):** Fakturownia, wFirma, iFirma, inFakt — integracja generuje fakturę automatycznie po zamówieniu. Najprościej: konto w programie księgowym + wtyczka/REST API (np. Fakturownia → Ustawienia → Integracje → E-commerce → WooCommerce).
- **Kurierzy/dostawa:** **Furgonetka** to najszybsza droga do wielu przewoźników z jednej wtyczki — InPost (Paczkomaty z mapą wyboru), DPD, DHL, UPS, GLS, Poczta/Pocztex, Orlen Paczka i in. Konfiguracja: WooCommerce → Ustawienia → Wysyłka → metoda → wtyczka Furgonetka → wybór przewoźnika + mapa punktów.
- **Paczkomaty InPost** wymagają widżetu mapy wyboru punktu w checkoucie — sprawdź zgodność z block-checkout, jeśli go używasz.

### 3.5 Wydajność i mobile (przekrojowo)
- Mobile-first: ~60%+ sprzedaży z mobile, a sekunda opóźnienia = nawet -20% konwersji.
- Custom theme = przewaga: ładujesz tylko potrzebny CSS/JS (bez bloatu buildera). Wykorzystaj to — krytyczny CSS, defer JS, lazy-load obrazów, WebP.
- Sticky „Do koszyka" na karcie produktu (mobile), klikalne elementy ≥44 px, szybkie metody płatności (BLIK/Apple/Google Pay) jako pierwsze.

---

## 4. Mini-workflow wdrożenia (kolejność prac)
1. **Brief → branża → checklista** z tego dokumentu (uniwersalna + branżowa).
2. **Architektura:** kategorie/PLP vs karty/PDP, filtry, wyszukiwarka.
3. **Custom theme:** szablony Woo override + hooki; mobile-first; wydajność od startu.
4. **Treść:** zdjęcia (≥5 + zoom), opisy korzyściami, dowody (opinie/UGC/certyfikaty wg branży).
5. **Płatności i dostawa:** bramka z BLIK + jawne koszty dostawy + integracja kurierów i faktur.
6. **Checkout:** gość włączony, minimum pól, plakietki pod przyciskiem płatności.
7. **Konwersja w czasie:** cross/upsell, sekwencja porzuconego koszyka, prośby o opinie.
8. **Testy:** zamówienie testowe (każda metoda płatności + dostawy), mobile, szybkość, ścieżka zwrotu.

---

## Źródła

**Konwersja ogólna, checkout, koszyk:**
- [Fullstory — Ecommerce CRO Guide 2026](https://www.fullstory.com/blog/ecommerce-conversion-rate-optimization/)
- [Yotpo — Ecommerce Conversion Optimization](https://www.yotpo.com/blog/ecommerce-conversion-optimization/)
- [OptiMonk — Ecommerce CRO Statistics 2026](https://www.optimonk.com/ecommerce-conversion-rate-optimization-statistics)
- [Baymard Institute — Checkout Usability Research](https://baymard.com/research/checkout-usability)
- [ZeroCart AI — Cart Abandonment Statistics 2026](https://zerocartai.com/blog/cart-abandonment-statistics-2025)
- [Foursixty — Reduce Cart Abandonment 2026](https://foursixty.com/blog/how-to-reduce-shopping-cart-abandonment/)

**Zdjęcia produktów:**
- [The Good — Product Image Conversions](https://thegood.com/insights/product-image-conversions/)
- [Omi — Product Images Best Practices](https://www.omi.so/resources/blog/product-images-best-practices)
- [Reydar — 360 Images for eCommerce](https://www.reydar.com/elevate-ecommerce-with-360-image-viewers/)
- [Command C — Product Photo Zoom & Conversions](https://commandc.com/product-photo-zoom/)

**Sygnały zaufania:**
- [Yieldify — Trust Badges Boost Conversion](https://www.yieldify.com/blog/trust-badges-boost-conversion-rates/)
- [Shopify — 5 Types of Trust Badges 2026](https://www.shopify.com/blog/trust-badges)
- [FigPii — Trust Signals & Security](https://www.figpii.com/blog/trust-signals-in-e-commerce-conversion/)

**Strony kategorii vs karty produktu, wyszukiwarka, filtry:**
- [Nielsen Norman Group — UX dla homepage/category/listing](https://www.nngroup.com/articles/ecommerce-homepages-listing-pages/)
- [The Good — Product Category Page Design](https://thegood.com/insights/product-category-page/)
- [Invesp — Category Page Design 2026](https://www.invespcro.com/blog/ecommerce-category-page-design/)
- [FiboSearch — AJAX Search for WooCommerce](https://wordpress.org/plugins/ajax-search-for-woocommerce/)
- [Barn2 — Best WooCommerce Search Plugins 2026](https://barn2.com/blog/woocommerce-product-search-plugin/)

**Branża — usługi:**
- [Hook Agency — High-Converting Home Service Websites](https://hookagency.com/blog/home-service-website-examples/)
- [WebFX — Home Services Website Design](https://www.webfx.com/blog/home-services/website-design-handbook/)
- [Go with Flo — High-Converting Service Websites (WordPress)](https://www.gowithflo.work/wordpress-web-design-for-service-businesses-high-converting)

**Branża — moda:**
- [Shopify — Fashion CRO 2026](https://www.shopify.com/enterprise/blog/fashion-conversion-rate-optimization)
- [ConvertCart — Fashion Product Page CRO](https://www.convertcart.com/blog/fashion-product-page-cro)
- [Immerss — Fix Size & Fit Issues](https://www.immerss.live/content/fashion-ecommerce-conversion-guide-fix-size-fit-issues/)
- [Shopify — How to Make a Size Chart 2026](https://www.shopify.com/blog/why-your-retail-store-needs-a-sizing-guide-and-how-to-create-one)

**Branża — zdrowie i uroda:**
- [ConvertCart — High-Converting Health/Beauty Product Pages](https://www.convertcart.com/blog/health-beauty-product-page)
- [TMO Group — Beauty eCommerce Conversion](https://www.tmogroup.asia/insights/beauty-ecommerce-optimization/)
- [TCF — Beauty & Cosmetics CX Best Practices 2025](https://www.tcf.team/blog/beauty-and-cosmetics-customer-experience)

**Branża — produkty cyfrowe:**
- [Shopify — Digital Products to Sell Online 2026](https://www.shopify.com/blog/digital-products)
- [ReferralCandy — Digital Product Delivery Automation](https://www.referralcandy.com/blog/digital-product-delivery-automation-the-complete-guide-to-streamlining-your-ecommerce-operations)
- [commercetools — Boost Online Shopping Conversions](https://commercetools.com/blog/7-best-practices-to-boost-online-shopping-conversions)

**WooCommerce — natywne funkcje, upsell/cross-sell:**
- [WooCommerce — Related Products, Up-Sells, Cross-Sells](https://woocommerce.com/document/related-products-up-sells-and-cross-sells/)
- [Iconic — WooCommerce Cross-Sell Plugins Compared 2026](https://iconicwp.com/blog/woocommerce-cross-sell-plugins-compared/)

**WooCommerce — płatności PL (BLIK):**
- [kcmobile — BLIK w WooCommerce 2026 (PayU, P24, Tpay)](https://kcmobile.pl/baza-wiedzy/ecommerce/blik-platnosci-woocommerce/)
- [WP Desk — Którą bramkę płatności wybrać 2026](https://www.wpdesk.pl/blog/wybieramy-bramke-platnosci/)
- [kcmobile — PayU vs Przelewy24 vs Tpay (prowizje)](https://kcmobile.pl/baza-wiedzy/ecommerce/payu-porownanie-rozwi%C4%85zan-dla-sklepow/)

**WooCommerce — faktury i kurierzy:**
- [Fakturownia — Integracja z WooCommerce](https://pomoc.fakturownia.pl/3004079-integracja-fakturowni-z-woocommerce)
- [Furgonetka — Integracja z WooCommerce (wtyczka)](https://wordpress.org/plugins/furgonetka/)
- [sklep-wp — Integracja faktur WooCommerce (Fakturownia/iFirma/wFirma)](https://sklep-wp.com/integracja-faktury-woocommerce/)

**Ratowanie porzuconego koszyka (WooCommerce):**
- [Retainful — WooCommerce Abandoned Cart Email 2026](https://www.retainful.com/blog/woocommerce-abandoned-cart-email)
- [Cart Abandonment Recovery for WooCommerce (wtyczka)](https://wordpress.org/plugins/woo-cart-abandonment-recovery/)
