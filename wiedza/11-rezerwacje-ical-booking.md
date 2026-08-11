# 11 — Rezerwacje na stronie + synchronizacja z Booking.com (iCal)

SOP dodania systemu rezerwacji do motywu na `studio-base`, z **dwukierunkową synchronizacją kalendarza z Booking.com**. Gotowy kod: `szablony-startowe/wtyczki/rezerwacje-ical/`.

## Jak to działa (powiedz to klientowi prosto)

Booking.com nie udostępnia zwykłym partnerom API do rezerwacji, ale **udostępnia synchronizację kalendarzy w formacie iCal** (`.ics`) — tym samym, którego używają Airbnb, Google Calendar i większość systemów rezerwacyjnych. Działa to w dwie strony:

- **Import** — Booking daje link do swojego kalendarza; strona pobiera go co godzinę i **blokuje zajęte terminy**, żeby nikt nie zarezerwował dnia sprzedanego już na Bookingu.
- **Eksport** — strona wystawia własny kalendarz pod tajnym adresem; wklejasz go w Bookingu, więc rezerwacje ze strony **znikają z dostępności na Booking.com**.

Klientowi mów: „kalendarze rozmawiają ze sobą, nie musisz niczego przepisywać ręcznie". Nie obiecuj natychmiastowości — **iCal to synchronizacja okresowa** (Booking odpytuje zwykle co kilka–kilkanaście minut), więc przy bardzo dużym obłożeniu zostaje minimalne ryzyko dubla. To standard branżowy, nie wada wdrożenia.

## Instalacja (5 kroków)

1. Skopiuj `szablony-startowe/wtyczki/rezerwacje-ical/rezerwacje-ical.php` do `wp-content/plugins/rezerwacje-ical/` i aktywuj (`wp plugin activate rezerwacje-ical`).
2. Skopiuj z `przyklad-motyw/` do motywu-dziecka: `rezerwacje.php` → `template-parts/`, `rezerwacje.js` → `assets/js/`, zawartość `rezerwacje.css` dopisz do arkusza dziecka (styl korzysta wyłącznie z tokenów `--c-*`, więc dostosuje się do marki sam).
3. Wywołaj blok tam, gdzie ma być: `get_template_part( 'template-parts/rezerwacje', null, array( 'tag' => 'h2' ) );` — `h2` w sekcji strony głównej, `h1` na dedykowanej podstronie (**jedno H1 na stronę!**).
4. Dociąż skrypt tylko tam, gdzie blok występuje:
   ```php
   if ( is_front_page() || is_page_template( 'page-rezerwacje.php' ) ) {
       wp_enqueue_script( 'rez-js', get_stylesheet_directory_uri() . '/assets/js/rezerwacje.js', array(), filemtime( get_stylesheet_directory() . '/assets/js/rezerwacje.js' ), array( 'strategy' => 'defer', 'in_footer' => true ) );
   }
   ```
5. **Prawdziwy cron na serwerze** — WP-Cron odpala się tylko przy ruchu, a kalendarz ma być świeży także w nocy:
   ```
   */15 * * * * curl -s https://DOMENA/wp-cron.php?doing_wp_cron >/dev/null 2>&1
   ```

## Konfiguracja w kokpicie

Menu **Rezerwacje → Ustawienia synchronizacji**:
- **Adresy iCal do importu** — w Booking.com: *Kalendarz → Synchronizacja kalendarzy → Eksportuj kalendarz*; wklej link (jeden na linię, można wiele obiektów/pokoi).
- **Adres iCal do eksportu** — gotowy, wyświetlony na tej samej stronie; w Booking.com: *Kalendarz → Synchronizacja kalendarzy → Importuj kalendarz*.
- **E-mail powiadomień** o nowych rezerwacjach.

Rezerwacja ze strony trafia jako **szkic = oczekująca**; klikasz **Opublikuj** = potwierdzona (i dopiero wtedy wychodzi w feedzie do Bookinga). Oczekujące też blokują termin, żeby nie doszło do dubla w czasie rozpatrywania.

## Co jest zabezpieczone (nie usuwaj tego przy przeróbkach)

- **Nonce** na formularzu + walidacja dat po stronie serwera (format, brak dat wstecz, koniec > początek).
- **Kolizja sprawdzana serwerowo**, nie tylko w kalendarzu — JS można obejść.
- **Feed eksportu za tajnym kluczem** (`rez_ics_key`), zły klucz → 403. Feed zawiera **wyłącznie zakresy dat** i słowo „Zarezerwowane" — zero danych gości (RODO: nie wystawiaj nazwisk pod publicznym URL-em).
- Zakresy iCal mają **koniec wyłączny** (`DTEND` = dzień wyjazdu, wolny dla kolejnego gościa) — tak liczy Booking i tak liczy ten kod. Nie „popraw" tego na własną rękę.

## Pułapki

- **Brak crona na serwerze** → import odświeża się tylko przy ruchu na stronie. Zawsze dodaj wpis w crontab (krok 5).
- **`wp_mail` bez SMTP** → maile lądują w spamie. Na produkcji podepnij SMTP (wtyczka typu FluentSMTP + konto pocztowe klienta).
- **Ładne adresy URL** — podstrona `/rezerwacje/` wymaga permalinków i pliku `.htaccess`. Na LH po `wp rewrite flush` plik bywa nietworzony — sprawdź `curl -o /dev/null -w "%{http_code}"` i w razie 404 zapisz standardowe reguły WordPressa ręcznie.
- **Strefy czasowe** — iCal z Bookinga potrafi mieć daty w dwóch formatach (`VALUE=DATE` i pełny timestamp `Z`). Parser obsługuje oba; testuj po podpięciu prawdziwego kalendarza.
- **Płatności/zadatki** są poza zakresem tej wtyczki — jeśli klient ich potrzebuje, to już WooCommerce Bookings albo zewnętrzny silnik.

## Weryfikacja przed oddaniem (dowód, nie deklaracja)

```
[ ] Rezerwacja przez formularz → 302 ?rez=ok + wpis w kokpicie + mail
[ ] Termin nachodzący na zajęty → odrzucony (?rez=busy)
[ ] Po potwierdzeniu: dni widoczne jako zajęte w kalendarzu (AJAX rez_month)
[ ] Feed eksportu zwraca VCALENDAR z rezerwacją; zły klucz = 403
[ ] Import: po wklejeniu linku z Bookinga zajętość pojawia się na stronie
[ ] Podstrona i sekcja: jedno H1 na stronę, kalendarz renderuje się w obu
```
