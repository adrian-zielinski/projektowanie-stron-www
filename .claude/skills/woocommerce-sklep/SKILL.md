---
name: woocommerce-sklep
description: >
  Buduje wysoko konwertujący sklep na WooCommerce jako custom classic theme (zero
  Elementora i builderów): konwersja, różnice WG BRANŻ (usługi, produkty fizyczne, moda,
  zdrowie/uroda, cyfrowe), polskie bramki z naciskiem na BLIK, override szablonów Woo,
  minimalny zestaw wtyczek, faktury (Fakturownia) i kurierzy (Furgonetka/InPost). Użyj
  ZAWSZE, gdy mowa o sklepie internetowym, e-commerce, WooCommerce, produktach, koszyku,
  checkoucie, płatnościach, BLIK-u, wysyłce, fakturach lub gdy brief klienta zakłada
  sprzedaż online — nawet jeśli ktoś nie nazwie tego wprost „sklepem".
---

# WooCommerce — sklep (custom classic theme)

Specjalista od sklepów dla systemu projektowania stron WP. Budujesz sklep, który **konwertuje**, jako **custom classic theme w kodzie** — bez Elementora i page-builderów. Decyzje konwersyjne i dobór funkcji zależą od **branży** klienta — najpierw rozpoznaj branżę, potem dobierz checklistę.

## Kolejność pracy

1. **Branża najpierw.** Z briefu ustal, którą branżę obsługujesz: usługi · produkty fizyczne · moda · zdrowie/uroda · cyfrowe. Branża zmienia karty produktu, pola, wtyczki i copy — nie buduj „generycznego sklepu" w oderwaniu od niej.
2. **Sprawdź, czy Woo robi to natywnie** (sekcja „Co WooCommerce robi natywnie") — zanim sięgniesz po wtyczkę. Każda zbędna wtyczka to dług na wydajności i bezpieczeństwie.
3. **Zastosuj zasady uniwersalne konwersji** (poniżej) na każdym sklepie.
4. **Nałóż różnice branżowe** z `references/branze.md`.
5. **Płatności + dostawa + faktury** — bramka z BLIK, jawne koszty, integracje (`references/platnosci-integracje.md`).
6. **Override szablonów Woo w theme** — czysto, bez buildera (`references/override-theme.md`).
7. **Testy:** zamówienie testowe każdą metodą płatności i dostawy, mobile, szybkość, ścieżka zwrotu.

Otwórz plik z `references/` dopiero, gdy wchodzisz w jego fazę — nie ładuj wszystkiego naraz.

## Zasada twarda: zero Elementora i builderów

Cały sklep budujesz jako **custom classic theme**. Szablony WooCommerce przesłaniasz przez katalog `woocommerce/` w motywie (template override) i hooki (`woocommerce_before_add_to_cart_button` itd.). To przewaga, nie ograniczenie: ładujesz tylko potrzebny CSS/JS, bez bloatu buildera — a na mobile szybkość = konwersja (sekunda opóźnienia ≈ -20% konwersji). Szczegóły i wzorce override → `references/override-theme.md`.

## Zasady uniwersalne konwersji (każdy sklep)

Liczby kontrolne 2025/2026: średnia konwersja e-commerce ~1,8%; porzucenie koszyka ~70% (mobile ~80%); powód #1 porzuceń = nieoczekiwane koszty dostawy/podatków (~48%); ~60%+ sprzedaży idzie z mobile.

- **Zdjęcia jak substytut dotyku.** Min. 5 ujęć/produkt, dłuższy bok 2000–2048 px, zoom obowiązkowy, detale (faktura, szwy). 360° tam, gdzie produkt „chce się obejrzeć dookoła". WebP + lazy-load — waga pliku to konwersja na mobile.
- **Opisy korzyściami, nie specyfikacją.** Parametr → korzyść („bawełna 200 g/m²" → „nie prześwituje, trzyma kształt po praniu"). Struktura: obietnica → 3–5 bulletów → rozwinięcie → specyfikacja → FAQ na realne obiekcje.
- **Oceny widoczne przy cenie i CTA.** Średnia + liczba opinii wysoko na karcie. Opinie konkretne i ze zdjęciami klientów (UGC) konwertują najmocniej.
- **Sygnały zaufania we właściwym miejscu.** SSL to baza. Plakietki bezpieczeństwa **pod przyciskiem płatności** w checkoucie (nie na stronie głównej). Politykę zwrotów pokaż **przy „Do koszyka"** (potrafi podnieść add-to-cart o ~23%), nie tylko w stopce. Dane firmy (NIP, adres) + regulamin + polityka prywatności — wymóg prawny i wiarygodność.
- **Szybki checkout.** Zakup jako gość włączony — wymuszanie konta wypycha pierwszych kupujących (konto proponuj PO zakupie). Tnij pola (przeciętny checkout ma ~15, wystarcza mniej). Walidacja inline. Bez niespodzianek na ostatnim kroku.
- **Koszty dostawy jawne wcześnie** — na karcie produktu i w koszyku, nie w ostatnim kroku. Komunikuj próg darmowej wysyłki („Brakuje 23 zł do darmowej wysyłki").
- **Cross-sell w koszyku, upsell na karcie** (Woo robi natywnie). Order bump w checkoucie podnosi AOV. Nie przesadzaj — nadmiar propozycji = paraliż.
- **Ratowanie porzuconego koszyka:** sekwencja 3 maili (1 h bez rabatu → 24 h zbicie obiekcji → 48–72 h zachęta z limitem). Pierwszy bez rabatu, inaczej uczysz klientów porzucać dla zniżki.
- **Wyszukiwarka AJAX + filtry fasetowe.** Natywna wyszukiwarka Woo jest słaba — FiboSearch (live-suggestions, miniatury, ceny). Filtry (rozmiar, kolor, marka, cena) z zapamiętywaniem wyborów; pokazuj liczbę wyników.
- **PLP ≠ PDP.** Strona kategorii (PLP) = „wybierz kierunek": nawigacja, podkategorie nad listą, dobre SEO (kategorie ściągają nawet 400% więcej ruchu niż pojedyncze karty). Karta produktu (PDP) = „podejmij decyzję": komplet zdjęć, cena, warianty, dostępność, dostawa, opinie, CTA.

## Różnice WG BRANŻ (skrót — pełne checklisty w references/branze.md)

Rozpoznaj branżę, potem otwórz `references/branze.md` po komplet checklisty i pól produktu.

- **Usługi.** Sprzedajesz zaufanie + dostępność, nie towar z magazynu. CTA rezerwacji/kontaktu nad zakładką („Umów wizytę", „Zamów wycenę"). Cennik lub widełki (68% porzuca stronę bez ceny). Portfolio before/after, opinie z twarzą, lokalne SEO (GBP, spójne NAP). W Woo: produkt **wirtualny** (bez wysyłki) + wtyczka rezerwacji albo formularz wyceny + zaliczka.
- **Produkty fizyczne.** Karta pełna; warianty jako **swatche** (nie suchy dropdown), zmiana zdjęcia po wyborze, oznaczanie niedostępnych kombinacji. Dostępność jako sygnał („Ostatnie 3 szt.", „Wysyłka 24 h"); out-of-stock → „Powiadom o dostępności". Gwarancja i zwroty przy CTA. Pilność tylko uczciwa.
- **Moda.** Najwięcej zwrotów (61% bo „nie pasowało"). **Tabela rozmiarów + fit finder**, nota „runs small / true to size". UGC i wideo z **podanym wzrostem i rozmiarem** osoby. Lookbook / shop-the-look. Galeria zmienia się przy wyborze koloru. Filtry: rozmiar, kolor, materiał, krój, cena. Estetyka = postrzegana jakość marki.
- **Zdrowie/uroda.** Klient kupuje efekt i bezpieczeństwo na własnym ciele. Pełny **skład** + oznaczenia (wegańskie, bez parabenów, hipoalergiczne). Certyfikaty / testy derm. / cytaty ekspertów. Before/after + recenzje filtrowane po typie skóry/wieku. **Subskrypcje 30/60/90 dni** dla produktów zużywalnych (LTV). Copy zgodne z prawem — **zakaz obietnic leczniczych** dla suplementów, oświadczenia kosmetyczne wg rozporządzenia UE.
- **Cyfrowe.** Brak logistyki → natychmiastowość i dowód działania. Produkt **wirtualny + do pobrania**: link i mail od razu po płatności. Demo/trial/próbka przed zakupem. Licencja opisana (zakres, czas, aktualizacje). **Checkout bez pól adresu/wysyłki.** Komunikat „bez kosztów wysyłki, dostęp od razu". Ochrona: limit pobrań, wygasanie linku, klucze licencyjne.

## Co WooCommerce robi natywnie (nie dokładaj wtyczki na próżno)

- Warianty produktów (produkt zmienny + atrybuty), zarządzanie stanami i statusem dostępności.
- Upsell, cross-sell, produkty powiązane (zakładka „Linked Products"; related po tagach/kategoriach).
- Produkty wirtualne i do pobrania z limitem pobrań i wygasaniem linków (cyfrowe, usługi).
- Koszyk, checkout, konta, kupony, podatki, strefy i metody wysyłki.
- Zakup jako gość (Ustawienia → Konta i prywatność).
- Block Cart/Checkout (na blokach) — szybszy niż stary shortcode-checkout; preferuj w custom theme, ale **zweryfikuj zgodność bramki i widżetu Paczkomatów** przed wyborem.

## Polskie bramki płatności — BLIK to warunek startu

**BLIK to ~48% płatności online w PL — bez niego nie startuj.** Reguła doboru: sprzedaż głównie PL → bramka z natywnym BLIK (Przelewy24 / PayU / Tpay). Sprzedaż zagraniczna lub silne karty/portfele → dorzuć Stripe **obok** (Stripe nie ma BLIK natywnie).

| Bramka | BLIK | Kiedy |
|---|---|---|
| **Przelewy24** | tak (~1,0%) | Domyślna rekomendacja: niezawodna, wypłaty ~24 h, brak opłat na start |
| **PayU** | tak (~1,19%) | Największa rozpoznawalność w PL, raty/odroczone płatności |
| **Tpay** | tak (najniższy BLIK ~0,7%) | Prosta integracja, dobry dla mniejszych sklepów |
| **Stripe** | **NIE natywnie** | Zagranica + karty/portfele (Apple/Google Pay) — dorzuć obok bramki PL |

Setup każdej: rejestracja u operatora (1–3 dni weryfikacji firmy) → wtyczka z repo WP → klucze API → konfiguracja metod → **zamówienie testowe**. Szczegóły → `references/platnosci-integracje.md`.

## Minimalny zestaw wtyczek

Trzymaj liczbę wtyczek nisko — wydajność i bezpieczeństwo. Zdrowy rdzeń:

- **Wyszukiwarka:** FiboSearch (free na start).
- **Filtry fasetowe:** FiboFilters / odpowiednik z zapamiętywaniem.
- **Porzucony koszyk:** Cart Abandonment Recovery (sekwencje maili).
- **Recenzje/UGC:** zbieranie opinii ze zdjęciami + auto-prośba po dostawie.
- **SEO:** Rank Math lub Yoast (schema produktu, sitemap).
- **Wydajność:** cache + optymalizacja obrazów (WebP).
- **Branżowo (tylko gdy trzeba):** tabele rozmiarów (moda) · subskrypcje (uroda/zużywalne) · klucze licencyjne (cyfrowe) · rezerwacje (usługi).

## Integracje: faktury i kurierzy

- **Faktury automatyczne:** Fakturownia (lub wFirma/iFirma/inFakt) — generuje fakturę po zamówieniu. Konto w programie + wtyczka/REST API (Fakturownia → Integracje → E-commerce → WooCommerce).
- **Kurierzy:** **Furgonetka** = jedna wtyczka, wielu przewoźników (InPost/Paczkomaty z mapą, DPD, DHL, UPS, GLS, Poczta, Orlen Paczka). Konfiguracja: Ustawienia → Wysyłka → metoda → wtyczka Furgonetka → wybór przewoźnika + mapa punktów.
- **Paczkomaty InPost** wymagają widżetu mapy wyboru punktu — przy block-checkout **sprawdź zgodność widżetu** zanim go zostawisz.

Szczegóły kroków → `references/platnosci-integracje.md`.

## Antywzorce (czego unikać)

- **Elementor / page-builder na sklep.** Łamie zasadę systemu i dokłada bloat — zabija przewagę szybkości na mobile. Buduj theme + override Woo.
- **Wymuszanie konta przed zakupem.** Wypycha pierwszych kupujących — gość włączony, konto po zakupie.
- **Koszty dostawy odkrywane w ostatnim kroku.** Powód #1 porzuceń — pokaż je na karcie i w koszyku.
- **Plakietki zaufania na stronie głównej zamiast w checkoucie.** Decyzja o pieniądzach pada pod przyciskiem płatności — tam je umieść.
- **Start bez BLIK** przy sprzedaży na PL. Stripe sam nie wystarczy.
- **Stos wtyczek „na wszelki wypadek".** Najpierw natywne Woo; każda wtyczka musi zarabiać na swoje miejsce.
- **Pierwszy mail o porzuconym koszyku z rabatem.** Uczy porzucać dla zniżki.
- **Generyczny sklep bez warstwy branżowej.** Moda bez tabeli rozmiarów, uroda bez składu, cyfrowe z polami wysyłki — to stracona konwersja.
- **Obietnice lecznicze przy suplementach.** Ryzyko prawne — copy w ryzach.

## Materiały (references/)

- `references/branze.md` — pełne checklisty i pola produktu per branża (usługi · fizyczne · moda · zdrowie/uroda · cyfrowe). Czytaj, gdy znasz branżę klienta.
- `references/platnosci-integracje.md` — krok po kroku: bramki PL (BLIK), konfiguracja wysyłki, Furgonetka/InPost, faktury Fakturownia. Czytaj na fazie płatności/dostawy.
- `references/override-theme.md` — jak przesłaniać szablony Woo w custom theme i używać hooków bez buildera. Czytaj na fazie implementacji.
- `references/checklista-wdrozenia.md` — bramka jakości przed oddaniem sklepu (uniwersalna + testy płatności/dostawy/zwrotu). Odhacz przed publikacją.

Pełny SOP źródłowy: `wiedza/03-ecommerce-wg-branz.md`.
