# Integracja LMS z custom theme — override, panel studenta, pułapki

Czytaj przy integracji LMS-a z motywem. Domyślne szablony lekcji wyglądają generycznie i rzadko pasują do custom theme. Spójność robisz przez **nadpisywanie szablonów (template override)** w child theme, nie przez grzebanie w plikach wtyczki — edycja plików wtyczki znika przy aktualizacji i potrafi unieważnić licencję/wsparcie.

## Zasada nadrzędna

1. Pracuj zawsze w **child theme** (lub w głównym custom theme, jeśli to on jest produktem).
2. Nadpisuj szablony przez kopiowanie do motywu z zachowaniem struktury katalogów.
3. Wygląd zmieniaj przez **hooki** (action/filter) zawsze, gdy się da — przeżywa aktualizacje lepiej niż kopia całego szablonu.
4. Po każdej większej aktualizacji LMS-a porównaj swoje nadpisane szablony z nowymi oryginałami wtyczki (override może się zdezaktualizować i zgubić nowe funkcje).

## Override szablonów — per LMS

**LearnDash (motyw LD30).** Kopiujesz szablon z `wp-content/plugins/sfwd-lms/themes/ld30/templates/lekcja.php` do `wp-content/themes/twoj-child/learndash/ld30/lekcja.php` — czyli do katalogu `learndash/` w motywie, z zachowaniem podścieżki, ale bez segmentu `/templates/`. Do drobnych zmian używaj filtra `learndash_template` (podmienia ścieżkę szablonu) oraz hooków, np. `learndash-course-payment-buttons-before/after`, `ld_after_course_status_template_container`.

**LifterLMS.** Kopiujesz szablony do katalogu `lifterlms/` w motywie, zachowując strukturę z folderu `templates` wtyczki. Tak nadpiszesz np. karty kursów w katalogu, layout pojedynczej lekcji czy pasek postępu. LifterLMS ma bogaty zestaw hooków do wstrzykiwania treści bez kopiowania całych plików.

**Tutor LMS.** Override przez katalog `tutor/` w motywie (kopia z folderu szablonów wtyczki). Nowoczesny front i dużo ustawień wyglądu z panelu — część rzeczy zmienisz bez kodu.

**Sensei LMS.** Override przez katalog `sensei/` w motywie; mocno trzyma się konwencji WooCommerce — jeśli znasz nadpisywanie szablonów Woo, jesteś w domu.

## Własny wygląd panelu studenta

Panel ucznia (dashboard: moje kursy, postęp, certyfikaty) to najczęściej najbardziej „obcy" wizualnie element.

1. Zlokalizuj szablon dashboardu w danym LMS-ie i nadpisz go w motywie (LifterLMS: `lifterlms/myaccount/` / `dashboard`; LearnDash: bloki/skróty profilu; Tutor/Sensei: odpowiednie pliki dashboardu).
2. Owiń panel w layout motywu (ten sam header/footer, kontener, siatka), żeby uczeń nie czuł, że wyszedł ze strony.
3. Ostyluj przez **własne klasy i zmienne CSS motywu**, nie przez nadpisywanie dziesiątek selektorów wtyczki `!important`. Najpierw zmapuj klasy LMS-a, potem dopnij je do swojego design-systemu.
4. Player wideo i listę lekcji potraktuj priorytetowo — tu uczeń spędza najwięcej czasu.

## Spójność wizualna — checklista

- [ ] Typografia, kolory i odstępy lekcji = zmienne design-systemu motywu (jedno źródło prawdy w `:root`).
- [ ] Przyciski LMS (zapisz się, dalej, ukończ) przejmują styl przycisków motywu.
- [ ] Pasek postępu, karty kursów, certyfikaty zgodne z brandem.
- [ ] Header/footer i kontener takie same na stronie marketingowej i wewnątrz platformy.
- [ ] Strony logowania/rejestracji/konta ostylowane (nie domyślny `wp-login`).
- [ ] Responsywność lekcji i playera sprawdzona na telefonie.
- [ ] Po aktualizacji LMS-a: regresja wizualna lekcji, dashboardu i checkoutu.
- [ ] Gdy potrzebna społeczność/gamifikacja ponad to, co daje LMS → rozważ **BuddyBoss** (nadpisuje wiele szablonów LearnDash/LifterLMS/Tutor i dorzuca punkty, odznaki, rangi, feed) zamiast budować od zera.

## Pułapki, których unikać

- **Nie edytuj plików wtyczki** — zawsze override w motywie. Aktualizacja kasuje pracę.
- **Nie hostuj wideo lekcji na WordPressie** — zabije transfer i wydajność. Vimeo/Bunny/Cloudflare Stream.
- **Nie wybieraj LMS-a pod cenę licencji w oderwaniu od skali** — tani LMS na 5000 uczniów wygeneruje koszt w godzinach optymalizacji.
- **Nie mieszaj dwóch LMS-ów** na jednej stronie — migracja danych między nimi bywa bolesna.
- **Nie zostawiaj domyślnego brandingu** na checkoucie i e-mailach transakcyjnych — to wciąż ścieżka klienta.
