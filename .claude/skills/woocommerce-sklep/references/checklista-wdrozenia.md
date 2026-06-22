# Checklista wdrożenia sklepu — bramka jakości przed publikacją

Odhacz wszystkie sekcje przed oddaniem sklepu klientowi. Kolejność: uniwersalna → branżowa (z `branze.md`) → płatności/dostawa/faktury → testy → prawo i mobile.

---

## Konwersja (uniwersalna)

- [ ] ≥5 zdjęć + zoom na każdym produkcie; WebP/lazy-load; zdjęcie zmienia się przy wyborze wariantu
- [ ] Opisy korzyściami, skanowalne, z FAQ na obiekcje
- [ ] Oceny + liczba opinii przy cenie/CTA
- [ ] Zakup jako gość włączony; minimum pól w checkoucie; walidacja inline
- [ ] Cross-sell w koszyku, upsell na karcie (order bump opcjonalnie)
- [ ] Sekwencja maili o porzuconym koszyku (1 h bez rabatu / 24 h / 48–72 h)
- [ ] Wyszukiwarka AJAX + filtry fasetowe z zapamiętywaniem
- [ ] PLP nawiguje (podkategorie nad listą, SEO), PDP sprzedaje (komplet info)

## Branżowa

- [ ] Otwarta i odhaczona checklista branży klienta z `branze.md` (usługi / fizyczne / moda / zdrowie-uroda / cyfrowe)

## Płatności i dostawa

- [ ] BLIK włączony (P24 / PayU / Tpay); Stripe tylko jako dodatek do zagranicy
- [ ] Koszt i czas dostawy widoczne na karcie i w koszyku (nie tylko w ostatnim kroku)
- [ ] Próg darmowej wysyłki komunikowany w koszyku
- [ ] Kurierzy skonfigurowani (Furgonetka); Paczkomat InPost z mapą wyboru punktu
- [ ] Faktury automatyczne (Fakturownia/odpowiednik) — generują się i przychodzą mailem
- [ ] Plakietki zaufania pod przyciskiem płatności; polityka zwrotów przy „Do koszyka"

## Testy (dowód, nie deklaracja)

- [ ] Zamówienie testowe każdą metodą płatności
- [ ] Zamówienie testowe każdą metodą dostawy (kurier + Paczkomat z wyborem punktu)
- [ ] Faktura testowa wygenerowana i wysłana
- [ ] Ścieżka zwrotu/anulowania działa
- [ ] Mail o porzuconym koszyku faktycznie wychodzi

## Mobile i wydajność

- [ ] Mobile-first: szybkie ładowanie (krytyczny CSS, defer JS, WebP, lazy-load)
- [ ] Sticky „Do koszyka" na PDP; elementy klikalne ≥44 px
- [ ] Szybkie metody płatności (BLIK/Apple/Google Pay) jako pierwsze
- [ ] Skrypty Woo nieładowane na stronach nie-sklepowych

## Prawo i zaufanie

- [ ] SSL aktywne (https + kłódka)
- [ ] Dane firmy (NIP, adres, telefon), regulamin, polityka prywatności, polityka cookies/RODO
- [ ] Copy zgodne z prawem (brak obietnic leczniczych dla suplementów; oświadczenia kosmetyczne wg UE)

## Theme (zasada twarda)

- [ ] Sklep zbudowany jako custom classic theme — zero Elementora/builderów
- [ ] Szablony Woo przesłaniane przez katalog `woocommerce/` + hooki; przesłonięte tylko realnie zmienione pliki
- [ ] Po publikacji: wyłączyć tryb sandbox bramki, włączyć indeksację
