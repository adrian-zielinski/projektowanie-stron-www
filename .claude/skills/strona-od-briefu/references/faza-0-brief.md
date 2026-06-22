# Faza 0 — Brief (bramka wejścia)

Brief jest jedynym wejściem do całego procesu. Niedopytany brief = przeróbki na każdej kolejnej fazie. Dlatego ta faza jest sztywna: bez kompletu informacji nie rusza architektura, design ani kod.

## Jak prowadzić wywiad

- Pytaj **partiami**, nie wysypuj 12 pytań naraz — to zniechęca klienta. Grupuj: najpierw cel + odbiorca, potem zakres + funkcje, na końcu logistyka (hosting, treści, deadline).
- Zaczynaj od „dlaczego", nie od „ile podstron". Cel biznesowy steruje całą resztą.
- Gdy klient wrzucił brief — przeczytaj go i dopytaj **tylko o luki**. Nie odpytuj z rzeczy, które już podał.
- Notuj na bieżąco do `briefy/<klient>.md` (wzór: `briefy/SZABLON-BRIEFU.md`).
- Parafrazuj zwrotnie: „Czyli głównym celem jest X, sukces mierzymy przez Y — dobrze rozumiem?". To wyłapuje nieporozumienia zanim wejdą w design.

## Minimalny komplet (bramka)

Każdy punkt musi mieć odpowiedź albo świadomą decyzję „do zaprojektowania / do ustalenia później":

1. **Cel biznesowy + KPI** — jedna główna akcja (lead / zakup / telefon / zapis / rezerwacja). Co liczymy jako sukces.
2. **Główne CTA** — co dokładnie ma kliknąć użytkownik.
3. **Grupa docelowa** — kto, jaki problem, jakim językiem mówi, na jakim urządzeniu wchodzi (mobile-first?).
4. **Zakres podstron** — pełna lista (np. Start, O nas, Oferta/Usługi, Cennik, Realizacje, Blog, Kontakt).
5. **Funkcje** — sklep? kursy/LMS? blog? rezerwacje? newsletter? strefa logowania? formularze (jakie pola)?
6. **Marka / CI** — logo (jest/do zrobienia), kolory, fonty, ton komunikacji, materiały (księga znaku).
7. **Referencje wizualne** — 2-3 strony, które się klientowi podobają + co konkretnie (to ratuje fazę designu).
8. **Treści** — kto pisze teksty, kto daje zdjęcia, kiedy, w jakim formacie. Brak treści to najczęstszy blocker.
9. **Język / i18n** — jeden język czy wiele; jeśli wiele — który domyślny.
10. **Hosting / domena / dostępy** — gdzie stoi (LH.pl / Mango / inny), czy są dostępy (WP-admin, FTP/SSH, panel DNS), czy domena już wskazuje.
11. **Deadline + budżet funkcji** — termin i co realnie wchodzi w zakres (priorytety, gdy czas krótki).
12. **Wymogi prawne** — RODO, polityka prywatności, regulamin (zwł. sklep), polityka cookies, zgody w formularzach.

## Sygnały, że trzeba dopytać głębiej

- „Chcę nowoczesną stronę" → poproś o 2-3 referencje + powiedz czego konkretnie w nich brakuje konkurencji klienta.
- „Sklep" bez liczby produktów / sposobu dostawy / metod płatności → dopytaj, bo to determinuje WooCommerce config.
- „Kursy" bez modelu dostępu (jednorazowy zakup vs subskrypcja vs kohorta) → dopytaj, bo to wybór LMS.
- Brak deklaracji kto dostarcza treści → ustal teraz, inaczej projekt utknie między fazą 2 a 3.
- „Przeniesienie istniejącej strony" → dopytaj o stare URL-e (potrzebne przekierowania 301, by nie stracić SEO).
- „Strona ma być szybko" → ustal, co wchodzi do wersji 1, a co do późniejszej iteracji (priorytetyzacja zakresu).

## Pierwsza partia pytań (gdy brief pusty)

Zacznij od trzech, resztę dopytuj po odpowiedzi:

1. Po co ta strona — co konkretnie ma się dziać, gdy ktoś na nią wejdzie?
2. Kto jest klientem docelowym i jaki problem mu rozwiązujecie?
3. Czy są strony, które się Wam podobają — i co dokładnie się w nich podoba?

## Artefakt fazy

`briefy/<klient>.md` — wypełniony szablon ze wszystkimi 12 punktami. To dokument, do którego wracasz przy każdej decyzji w kolejnych fazach.

## Bramka wyjścia → Faza 1

- Wszystkie 12 punktów mają odpowiedź lub świadomą decyzję.
- Zakres i funkcje jednoznaczne (wiadomo: sklep tak/nie, kursy tak/nie, ile podstron).
- Ustalone kto i kiedy dostarcza treści.
- Klient potwierdził parafrazę celu i zakresu.

Powiązana wiedza: brief landinga w `wiedza/02-landing-page-konwersja.md` (sekcja 0). Wzór briefu: `briefy/SZABLON-BRIEFU.md`.
