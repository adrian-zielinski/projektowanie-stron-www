# Różnice WG BRANŻ — checklisty i pola produktu

Po rozpoznaniu branży klienta odhacz checklistę uniwersalną, potem nałóż branżową. Każda sekcja: na czym zapada decyzja zakupowa → co działa → jak to zrobić w WooCommerce → checklista.

---

## Checklista uniwersalna (każdy sklep, odhacz najpierw)

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

## 1. Usługi (konsultacje, usługi lokalne)

Decyzja zapada na: **czy ten wykonawca jest wiarygodny i czy łatwo umówić termin.** Sprzedajesz zaufanie + dostępność, nie towar z magazynu.

Co działa:
- **Rezerwacja/kontakt nad zakładką (above the fold).** CTA: „Umów wizytę", „Zamów wycenę", „Zadzwoń". Salony z rezerwacją online robią ~39% więcej przychodu; 70% klientów usług woli umawiać się online; rezerwacja 24/7 łapie leady poza godzinami pracy.
- **Cennik, choćby widełki.** 68% odbiorców porzuca stronę bez ceny. Brak cen → „od X zł" albo pakiety.
- **Portfolio per typ usługi**, najlepiej before/after — wizualny dowód kompetencji.
- **Opinie wysoko i z twarzą** (imię, zdjęcie, gwiazdki). 91% czyta opinie, 84% ufa im jak rekomendacji znajomego.
- **Lokalne SEO:** Google Business Profile, spójne NAP (nazwa-adres-telefon), podstrony per miasto/dzielnica, frazy „darmowa wycena", „usługa awaryjna".
- **Ścieżki usług pod hero** („Umów", „Wyceń", „Zadzwoń") redukują zmęczenie decyzyjne.

WooCommerce: produkt typu „Usługa" jako **wirtualny** (bez wysyłki) + wtyczka rezerwacji (WooCommerce Bookings lub odpowiednik) dla terminów; albo formularz wyceny + płatność zaliczki.

Checklista:
- [ ] CTA rezerwacji/kontaktu nad zakładką, powtórzone w stopce i sticky na mobile
- [ ] Rezerwacja online 24/7 (kalendarz/terminy) lub formularz wyceny
- [ ] Cennik lub widełki / pakiety widoczne bez kontaktu
- [ ] Portfolio per typ usługi (before/after)
- [ ] Opinie z imieniem, zdjęciem, gwiazdkami — wysoko
- [ ] Lokalne SEO: GBP, spójne NAP, podstrony lokalizacyjne
- [ ] Produkt „usługa" jako wirtualny (bez kosztów/pól wysyłki)
- [ ] Zaufanie: certyfikaty, licencje, gwarancje, ubezpieczenie OC

---

## 2. Produkty fizyczne (generyczne)

Decyzja: **czy to dokładnie ten produkt, czy jest dostępny i czy bezpiecznie kupić.**

Co działa:
- **Karta pełna:** komplet zdjęć + zoom, cena, warianty, dostępność, dostawa, zwroty, opinie, CTA „Do koszyka" bez scrollowania.
- **Warianty czytelne.** Swatche kolorów/rozmiarów zamiast suchego dropdownu; blokuj/oznaczaj niedostępne kombinacje; zmieniaj zdjęcie po wyborze wariantu.
- **Dostępność jako sygnał.** „Na stanie", „Ostatnie 3 szt.", „Wysyłka w 24 h". Out-of-stock → „Powiadom o dostępności" (zbieraj maile, nie trać leada).
- **Gwarancje i zwroty wprost** przy CTA (gwarancja producenta, 14/30 dni, „gwarancja zwrotu pieniędzy").
- **Urgency uczciwie** — realne stany, realny licznik. Fałszywa pilność niszczy zaufanie.

WooCommerce natywnie: warianty (produkt zmienny + atrybuty), zarządzanie stanami, related/upsell/cross-sell, powiadomienia o stanach (z wtyczką back-in-stock).

Checklista:
- [ ] Komplet zdjęć + zoom; zdjęcie zmienia się przy wyborze wariantu
- [ ] Warianty jako swatche; niedostępne kombinacje oznaczone
- [ ] Status dostępności i czas wysyłki na karcie
- [ ] „Powiadom o dostępności" dla out-of-stock
- [ ] Gwarancja + polityka zwrotów przy CTA
- [ ] Cross-sell w koszyku, upsell (lepszy wariant) na karcie
- [ ] Realne sygnały pilności (bez ściemy)

---

## 3. Odzież i moda

Najwięcej zwrotów (10–20% sprzedaży; 61% zwraca, bo „nie pasowało"). Konwersja kobiece ~3,6%, męskie ~0,8%. Gra toczy się o **rozmiar + estetykę + wyobrażenie produktu na sobie.**

Co działa:
- **Tabela rozmiarów + fit finder.** Dokładne wymiary, nota „runs small/true to size". Lepszy size guide = mniej zwrotów, wyższa marża.
- **UGC i wideo z modelem/klientem.** Podawaj **wzrost i rozmiar** osoby na zdjęciu/wideo — natychmiast zbija lęk o rozmiar.
- **Lookbook / stylizacje.** Kompletne outfity budują aspirację i podnoszą AOV.
- **Polityka zwrotów eksponowana.** Łatwy zwrot/wymiana, jasne warunki i czas; rozważ wymianę lub kredyt sklepowy zamiast tylko zwrotu kasy.
- **Estetyka wizualna.** Spójna fotografia, czysty layout, duże zdjęcia — wygląd sklepu = postrzegana jakość marki.
- **Filtry typowe:** rozmiar, kolor, materiał, krój, okazja, cena.

WooCommerce: warianty rozmiar×kolor jako atrybuty + swatche; galeria per wariant; wtyczka tabel rozmiarów; lookbook jako sekcja w custom theme (shop-the-look z hotspotami).

Checklista:
- [ ] Tabela rozmiarów (dokładne wymiary) + nota „runs small/true to size"
- [ ] Fit finder / rekomendacja rozmiaru (jeśli możliwe)
- [ ] UGC i wideo z podanym wzrostem i rozmiarem osoby
- [ ] Lookbook / shop-the-look ze stylizacjami
- [ ] Galeria zmienia się przy wyborze koloru/wariantu
- [ ] Polityka zwrotów/wymiany eksponowana przy CTA
- [ ] Filtry: rozmiar, kolor, materiał, krój, cena
- [ ] Spójna, wysokiej jakości estetyka fotografii

---

## 4. Zdrowie i uroda

Klient kupuje **efekt i bezpieczeństwo na własnym ciele.** Rozwiej obawy o skład, skuteczność i wiarygodność.

Co działa:
- **Skład / lista składników w pełni i czytelnie.** Pochodzenie, „bez parabenów/SLS", wegańskie, hipoalergiczne. Transparentność = zaufanie.
- **Certyfikaty i dowody zewnętrzne.** Testy dermatologiczne, cytaty ekspertów/dermatologów — kluczowe drivery zaufania w tej branży.
- **Before/after i recenzje z efektem.** Autentyczne transformacje (zdjęcia/wideo). Opinie filtrowane po typie skóry/wieku/problemie przebijają samą ocenę gwiazdkową.
- **Subskrypcje.** Produkty zużywalne → opcje 30/60/90 dni z rabatem; subskrypcja podnosi LTV i przewidywalność.
- **Edukacja:** jak stosować, kiedy efekt, dla kogo — zbija obiekcje i zwroty.

Uwaga prawna: kosmetyki/suplementy mają ograniczenia w obietnicach — **zakaz przypisywania właściwości leczniczych suplementom**, oświadczenia kosmetyczne wg rozporządzenia UE. Trzymaj copy w ryzach.

WooCommerce: WooCommerce Subscriptions (lub odpowiednik) dla cykli; pola dodatkowe na skład/sposób użycia; galeria before/after w custom theme; recenzje z atrybutami (typ skóry).

Checklista:
- [ ] Pełny skład + oznaczenia (wegańskie, bez X, hipoalergiczne)
- [ ] Certyfikaty / testy derm. / cytaty ekspertów
- [ ] Before/after + recenzje z efektem, filtrowane po typie skóry/wieku
- [ ] Subskrypcja 30/60/90 dni z rabatem (produkty zużywalne)
- [ ] Sekcja „jak stosować / kiedy efekt"
- [ ] Copy zgodne z prawem (bez obietnic leczniczych)
- [ ] Próbki / zestawy startowe jako obniżenie progu wejścia

---

## 5. Produkty cyfrowe

Brak logistyki = brak kosztów wysyłki i czekania. Decyzja: **czy to działa i czy dostanę od razu.** Natychmiastowość i dowód działania robią różnicę.

Co działa:
- **Dostawa natychmiastowa.** Po płatności od razu link do pobrania + mail z dostępem. „Dostęp natychmiast po zakupie".
- **Demo / próbka / wersja darmowa.** Trial, freemium, fragment (sample rozdziału, demo pluginu, podgląd presetów).
- **Licencje jasno opisane.** Co wolno (jedno stanowisko / komercyjnie / liczba pobrań), jak długo, czy aktualizacje w cenie. Klucze licencyjne, limity pobrań, znaki wodne.
- **Zero kosztów wysyłki — wyeksponuj.** „Bez kosztów wysyłki, plik od razu" usuwa największy hamulec klasycznego e-commerce.
- **Checkout maksymalnie krótki.** Wyłącz pola wysyłki, zostaw e-mail + płatność.

WooCommerce: produkt „wirtualny" + „do pobrania", limity pobrań i wygasanie linków natywnie; wyłącz pola/metody wysyłki dla koszyka cyfrowego; wtyczka kluczy licencyjnych dla software'u.

Checklista:
- [ ] Produkt wirtualny + do pobrania; link i mail natychmiast po płatności
- [ ] Demo / trial / próbka dostępne przed zakupem
- [ ] Licencja opisana (zakres, czas, aktualizacje)
- [ ] Komunikat „bez kosztów wysyłki, dostęp od razu"
- [ ] Checkout bez pól adresu/wysyłki
- [ ] Ochrona: limit pobrań, wygasanie linku, klucze/znaki wodne
- [ ] FAQ techniczne (wymagania, format pliku, wsparcie)
