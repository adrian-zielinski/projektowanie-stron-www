# Płatności, dostawa, faktury — krok po kroku

Kolejność: bramka z BLIK → metody wysyłki + kurierzy → faktury → zamówienie testowe każdą kombinacją.

---

## 1. Bramki płatności (PL — BLIK to warunek startu)

**BLIK to ~48% płatności online w PL.** Reguła doboru:
- Sprzedaż głównie PL → bramka z natywnym BLIK: **Przelewy24 / PayU / Tpay**.
- Sprzedaż zagraniczna lub silne karty/portfele (Apple/Google Pay) → dorzuć **Stripe obok** bramki PL (Stripe nie ma BLIK natywnie).

| Bramka | BLIK | Prowizja od | Kiedy wybrać |
|---|---|---|---|
| **Przelewy24** | tak | ~1,0% | Domyślna rekomendacja: niezawodna, wypłaty ~24 h, brak opłat na start, dobra wtyczka |
| **PayU** | tak | ~1,19% | Największa rozpoznawalność w PL, raty / odroczone płatności |
| **Tpay** | tak | ~0,7% (najniższy BLIK) | Prosta integracja, czytelny panel — mniejsze sklepy |
| **Stripe** | NIE natywnie | — | Rynki zagraniczne, karty + Apple/Google Pay — dorzuć obok bramki PL |

Wszystkie mają oficjalne wtyczki w repozytorium WordPress.

Setup (każda bramka):
1. Rejestracja u operatora — **1–3 dni na weryfikację firmy**, zaplanuj to przed deadline'em.
2. Instalacja oficjalnej wtyczki z repo WP.
3. Wklejenie kluczy API (zwykle tryb sandbox + produkcyjny — testuj na sandbox).
4. Konfiguracja metod (włącz BLIK, przelewy, karty wg potrzeb).
5. **Zamówienie testowe każdą metodą** przed publikacją.

Mobile: szybkie metody (BLIK / Apple Pay / Google Pay) ustaw jako pierwsze — podbijają konwersję mobilną.

---

## 2. Wysyłka i kurierzy

WooCommerce natywnie: strefy wysyłki, metody, koszty, darmowa wysyłka od progu. Dorzuć przewoźników.

- **Furgonetka** = najszybsza droga do wielu przewoźników z jednej wtyczki: InPost (Paczkomaty z mapą wyboru), DPD, DHL, UPS, GLS, Poczta/Pocztex, Orlen Paczka i in.
  Konfiguracja: WooCommerce → Ustawienia → Wysyłka → metoda → wtyczka Furgonetka → wybór przewoźnika + mapa punktów.
- **Paczkomaty InPost** wymagają **widżetu mapy wyboru punktu** w checkoucie. Jeśli używasz block-checkout — **sprawdź zgodność widżetu z blokami** przed wyborem; część widżetów wspiera tylko stary shortcode-checkout.
- **Koszty dostawy jawne wcześnie** — pokaż na karcie produktu i w koszyku (kalkulator po kodzie pocztowym), nie dopiero w ostatnim kroku (powód #1 porzuceń). Komunikuj próg darmowej wysyłki.

---

## 3. Faktury (automatyczne)

- **Fakturownia** (lub wFirma / iFirma / inFakt) — generuje fakturę automatycznie po zamówieniu.
  Najprościej: konto w programie księgowym + wtyczka/REST API.
  Ścieżka: Fakturownia → Ustawienia → Integracje → E-commerce → WooCommerce → wklejenie kluczy.
- Ustal z klientem reguły: faktura automatyczna vs na żądanie, dane do faktury w checkoucie (pole NIP), wysyłka PDF mailem.

---

## 4. Custom theme a checkout

- W custom classic theme preferuj **Block Cart/Checkout** (szybszy, elastyczniejszy) — ale najpierw potwierdź, że bramka PL i widżet Paczkomatów działają z blokami. Jeśli nie — zostań przy shortcode-checkout do czasu zgodności.
- Plakietki bezpieczeństwa umieść **pod przyciskiem płatności** (hook checkoutu), nie na stronie głównej.
- Zakup jako gość: WooCommerce → Ustawienia → Konta i prywatność → włącz „Pozwól na zamówienia bez konta".

---

## 5. Testy przed publikacją

- [ ] Zamówienie testowe każdą metodą płatności (BLIK, przelew, karta, ew. Stripe)
- [ ] Zamówienie testowe każdą metodą dostawy (kurier, Paczkomat z wyborem punktu)
- [ ] Faktura wygenerowała się i przyszła mailem
- [ ] Koszt dostawy widoczny na karcie i w koszyku (nie tylko w ostatnim kroku)
- [ ] Checkout na mobile — szybkie metody pierwsze, pola minimalne
- [ ] Ścieżka zwrotu/anulowania zamówienia działa
