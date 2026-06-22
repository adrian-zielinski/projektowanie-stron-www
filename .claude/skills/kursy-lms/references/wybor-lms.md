# Wybór LMS — pełna tabela, płatności, wydajność

Czytaj przy rekomendacji LMS-a klientowi. Cztery wtyczki: LearnDash, Tutor LMS, Sensei LMS, LifterLMS.

> Ceny zmieniają się co roku i zależą od liczby stron oraz promocji — zawsze sprawdź aktualny cennik producenta przed rekomendacją. Poniższe to stan orientacyjny na 2026.

## Tabela porównawcza (pełna)

| Kryterium | LearnDash | Tutor LMS | Sensei LMS | LifterLMS |
|---|---|---|---|---|
| **Cena (1 strona, rocznie)** | od ~199 USD (brak darmowej wersji) | darmowy core + Pro od ~199 USD | darmowy core + Sensei Pro od ~179 USD | darmowy core + od ~149,50 USD |
| **Wersja darmowa** | nie | tak | tak | tak |
| **Model przechowywania danych** | **własne tabele** (skaluje się do 10k+ uczniów) | mieszany | mieszany (oparty na WooCommerce) | głównie post-meta (komfortowo do ~2000 uczniów) |
| **Drip content** | tak | tak | tak | tak |
| **Quizy** | najbogatsze (banki pytań, wiele typów, AI quiz builder, timery) | dobre (timery, oceny) | podstawowe–dobre | dobre |
| **Certyfikaty** | bardzo rozbudowany kreator | tak (Pro) | tak | tak |
| **Gamifikacja** | przez dodatki (GamiPress, BuddyBoss) | wbudowane elementy + dodatki | przez dodatki | mocny nacisk na zaangażowanie + dodatki |
| **Membership / subskrypcje** | przez dodatki / integracje | Pro odblokowuje membership | przez WooCommerce (Subscriptions) | **wbudowane** (membership, plany płatności, subskrypcje) |
| **Płatności wbudowane** | przez integracje | Stripe, PayPal, WooCommerce | przez WooCommerce | **wbudowane Stripe + PayPal** + dodatek WooCommerce |
| **Integracja WooCommerce** | dodatek | tak | natywna (rdzeń ekosystemu) | dodatek |
| **Wydajność** | bardzo dobra na dużej skali (własne tabele) | dobra, nowoczesny UI | zależna od WooCommerce | dobra do średniej skali, potem wymaga optymalizacji |
| **Krzywa wejścia** | średnia–wysoka | niska (najłatwiejszy) | niska, jeśli znasz WooCommerce | niska–średnia |
| **Najlepszy do** | duże, zaawansowane platformy, kursy quiz-heavy | freelancer/MŚP, najlepszy stosunek funkcji do ceny i prostoty | strony już oparte na WooCommerce | kursy + membership + społeczność w jednym |

## Modele płatności i subskrypcji — szczegóły per LMS

- **LifterLMS** ma najwięcej z pudełka: wbudowane bramki Stripe i PayPal, membership, plany ratalne i subskrypcje bez WooCommerce. Z dodatkiem WooCommerce spinasz produkt WooCommerce z planem dostępu — po zakupie uczeń zapisuje się automatycznie do kursu/membershipu.
- **Sensei LMS** monetyzuje przez WooCommerce — naturalny wybór, gdy strona i tak stoi na WooCommerce (produkty, subskrypcje, płatności w jednym ekosystemie).
- **Tutor LMS** wspiera Stripe, PayPal i WooCommerce; Pro odblokowuje membership i dodatkowe bramki.
- **LearnDash** sam obsługuje proste płatności i subskrypcje (Stripe/PayPal), a pełną elastyczność (kupony, membership, bundling) daje przez WooCommerce i dodatki.

## Wydajność — co musisz wiedzieć

- **LearnDash** trzyma dane w dedykowanych tabelach, nie w `wp_postmeta` — dlatego radzi sobie na dużej skali (10k+ uczniów, ~1,2 s ładowania lekcji na przyzwoitym hostingu). Mimo to generuje personalizowane strony (postęp, wyniki) = sporo zapytań; cache i dobry hosting obowiązkowe.
- **LifterLMS** opiera się mocno na post-meta — działa komfortowo do ~2000 uczniów, powyżej wymaga optymalizacji bazy lub custom dev.
- **Próg bólu** dla każdego LMS-a: powyżej ~100 aktywnych uczniów jednocześnie albo przy kursach quiz-heavy przejdź na VPS / managed WordPress. Współdzielony hosting padnie.
- Niezależnie od wyboru: cache stron, obiektowy cache (Redis), CDN na wideo (nie hostuj wideo lekcji na WordPressie — wrzuć na Vimeo/Bunny/Cloudflare Stream i osadzaj).

## Szybka decyzja

- **Budżet napięty, prosty kurs, początkujący klient** → Tutor LMS (darmowy start, najłatwiejszy, najlepszy stosunek ceny do funkcji).
- **Duża platforma, dużo quizów, zaawansowane oceny, skala** → LearnDash.
- **Strona już na WooCommerce / sklep + kursy** → Sensei LMS.
- **Kursy + membership + społeczność jako jeden produkt subskrypcyjny** → LifterLMS.
