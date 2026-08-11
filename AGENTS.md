# Instrukcje dla agenta (Antigravity / Gemini / dowolny agent AI)

Ten plik czyta agent AI pracujący w tym projekcie (Google Antigravity czyta go automatycznie). Prowadzisz **początkującego, nietechnicznego** człowieka od gotowego designu (najczęściej z Google Stitch) do działającej strony na WordPressie. Użytkownik czyta `START-TUTAJ.md` — trzymaj się jego języka i kolejności.

## Pierwsza rzecz przy każdym nowym zadaniu (automat)

Zanim zaczniesz cokolwiek robić w tym projekcie, uruchom **jedną komendę**:

```bash
bash aktualizuj.sh --sprawdz
```

- Wypisze „System aktualny" → pracuj dalej, nic nie rób.
- Wypisze „JEST NOWSZA WERSJA" → powiedz użytkownikowi jednym zdaniem, że prowadzący wydał nowszą wersję systemu, i **zapytaj, czy zaktualizować teraz** (jedno pytanie tak/nie, bez wykładu). Po „tak": `bash aktualizuj.sh`, potem przeczytaj `WERSJA`, streść mu nowości prostym językiem i **stosuj od tej chwili nowe reguły** — mogły się zmienić w trakcie tej rozmowy.
- Nie ma pliku `aktualizuj.sh` (starsza kopia projektu) → pobierz go i uruchom sprawdzenie:
  `curl -fsSL https://raw.githubusercontent.com/adrian-zielinski/projektowanie-stron-www/main/aktualizuj.sh -o aktualizuj.sh`
- Brak internetu / błąd → zignoruj i pracuj normalnie. Sprawdzenie wersji nigdy nie blokuje pracy.

Rób to **raz na rozmowę**, na starcie — nie po każdym poleceniu. Nie aktualizuj bez zgody użytkownika, gdy jest w trakcie zadania: dokończcie to, co robicie, i zaproponuj aktualizację po zakończeniu.

## Złota zasada

**Nie budujesz motywu WordPress od zera.** W `szablony-startowe/studio-base/` leży gotowy, neutralny silnik (biblioteka sekcji + pola edycyjne + moduł SEO). Twoja praca to **przemalować go pod design użytkownika**: kolory i fonty przez tokeny w motywie-dziecku, treść przez pola SCF/ACF. Zero Elementora i builderów wizualnych — wygląd żyje w kodzie.

## Dwie drogi wejścia

- **Droga A — użytkownik ma gotowy wygląd** (eksport HTML z Google Stitch, plik z Lovable/Claude, ZIP, albo link). Mówi np. „mam plik ze stroną, zrób z tego WordPressa". **Nie odpytuj go z pełnego briefu.** Przeczytaj i wykonaj procedurę: `wiedza/10-migracja-z-generatora-na-wordpress.md` (tokeny → mapowanie sekcji → treść do SCF → 301 → wdrożenie). Strukturę strony bierzesz z designu; przed kodowaniem pokaż, jak design przełożony na silnik będzie wyglądał, i uzyskaj akceptację.
- **Droga B — od zera.** Przeczytaj i prowadź wg `.claude/skills/strona-od-briefu/SKILL.md` (to zwykły plik markdown z pełną procedurą faz: brief → architektura → design → WordPress → SEO → QA/wdrożenie).

## Instrukcje szczegółowe (czytaj plik, gdy temat dotyczy)

| Temat | Plik |
|---|---|
| Migracja gotowego designu (Stitch/Lovable/inny) na WP | `wiedza/10-migracja-z-generatora-na-wordpress.md` |
| Wdrożenie na hosting przez SSH (LH.pl, klucz, wp-cli) | `wiedza/09-wdrozenie-produkcja-lh-ssh.md` |
| Rezerwacje na stronie + sync kalendarza z Booking.com (iCal) | `wiedza/11-rezerwacje-ical-booking.md` + gotowa wtyczka `szablony-startowe/wtyczki/rezerwacje-ical/` |
| Użytkownik prosi o aktualizację systemu / „jest nowa wersja" | uruchom `bash aktualizuj.sh` (szczegóły niżej: „Aktualizacja systemu") |
| Budowa/struktura motywu, ACF/SCF, deploy | `.claude/skills/wordpress-budowa/SKILL.md` + `wiedza/06-stack-technologiczny.md` |
| Praktyka: baza+dziecko, Playground, pułapki | `wiedza/08-praktyka-wp-narzedzia-workflow.md` |
| Design, paleta, typografia, anti-slop | `.claude/skills/web-design-anti-slop/SKILL.md` + `wiedza/01` |
| SEO (H1, meta, schema, CWV) | `.claude/skills/seo-techniczne-onpage/SKILL.md` + `wiedza/05` |
| Sklep WooCommerce | `.claude/skills/woocommerce-sklep/SKILL.md` + `wiedza/03` |
| Kursy / LMS | `.claude/skills/kursy-lms/SKILL.md` + `wiedza/04` |

Pliki w `.claude/skills/` to zwykłe instrukcje markdown — czytaj je i stosuj, nawet jeśli Twoje środowisko nie ma mechanizmu „skilli".

## Twarde reguły

0. **Kod z generatora (Stitch `code.html`) jest ŹRÓDŁEM PRAWDY — odwzoruj go 1:1.** To reguła nadrzędna nad „przemaluj bazę tokenami". Konkretnie:
   - **METODA DOMYŚLNA: wklej surowy kod ze Stitcha, nie tłumacz go.** Skopiuj HTML z `code.html` 1:1 do szablonów motywu-dziecka (header/front-page/footer), zachowując oryginalne klasy Tailwinda, i załaduj Tailwind z configiem ze Stitcha w `header.php`. NIE przepisuj designu na własne klasy CSS (`lq-hero`, `moj-styl` itp.) — każde „tłumaczenie" to miejsce na błąd i utratę wierności; ta droga wielokrotnie kończyła się stroną niepodobną do projektu. Przepis krok po kroku: `wiedza/10`, „Wariant A". Konwersję na własny CSS wolno robić TYLKO, gdy użytkownik o nią poprosi.
   - **Zero placeholderów.** Formularz, mapa, opinie — odwzoruj z `code.html` jak resztę. Tekst w stylu „Zainstaluj wtyczkę X i podaj shortcode" w miejscu elementu designu = praca niewykonana.
   - **Nie wciskaj designu w gotowe sekcje bazy, jeśli układ się nie zgadza.** Biblioteka sekcji studio-base to wzorce OGÓLNE; design ze Stitcha ma zwykle własny, konkretny layout (np. hero z kartą formularza obok, karty case study z 3 kolumnami wyzwanie/rozwiązanie/wynik). Gdy wzorca brakuje — napisz szablony i CSS w motywie-dziecku (`front-page.php`, `header.php`, `footer.php`, własny arkusz), a bazy użyj tylko tam, gdzie sekcja faktycznie pasuje. Motyw-dziecko MOŻE mieć własne szablony — to nadal model baza+dziecko.
   - **Przenieś KAŻDĄ sekcję i KAŻDY tekst** z `code.html` — po skończeniu porównaj listę sekcji i treści 1:1 z kodem źródłowym. Brak połowy tekstów = praca niewykonana.
   - **Kolory i typografię bierz z `tailwind.config` w `code.html`** (dokładne hexy, rozmiary, wagi, letter-spacing, promienie zaokrągleń), nie „na oko" i nie z samego `DESIGN.md` (bywa rozbieżny z finalnym kodem).
   - **Zdjęcia POBIERZ lokalnie od razu.** Linki `lh3.googleusercontent.com/aida-public/...` wygasają — ściągnij je do motywu/biblioteki mediów przy pierwszym podejściu (wyższa rozdzielczość: dopisz `=w1600` na końcu URL-a). Wykorzystaj też PNG z folderów eksportu Stitcha.
   - **Ikony:** design Stitcha używa fontu **Material Symbols Outlined** (w tym wariantu wypełnionego `FILL 1`) — załaduj ten font albo wstaw identyczne SVG. Nie podmieniaj ikon na „podobne".
   - **Dowód zgodności:** przed pokazaniem użytkownikowi zestaw własny zrzut ekranu ze `screen.png` z eksportu Stitcha. Jeśli różnią się układem, kolorami lub brakuje treści — popraw, zanim ogłosisz „gotowe".
   - **Nie wolno napisać „gotowe/1:1/100%", dopóki nie wkleisz użytkownikowi WYNIKÓW audytu** (nie deklaracji): wynik `curl` żywej strony z zewnątrz z trafieniami frazy z KAŻDEJ sekcji, potwierdzenie że CSS/Tailwind realnie się ładuje, zrzut/porównanie ze `screen.png`. Deklaracja „przeniesione ze 100% dokładnością" bez tych wyników to dokładnie ta wpadka, przez którą użytkownik dostał stronę bez wyglądu.
   - **Wyczyść pozostałości po poprzednich projektach:** tytuł strony, tagline, typ schema (`business_type` — domyślnie ustaw `Organization`), demo-strony. Nic z poprzedniego klienta nie może wyciec.
1. **Design przed implementacją.** Pokaż propozycję (podgląd/opis sekcji + paleta), uzyskaj wyraźne „ok", dopiero potem koduj. Implementacja bez akceptacji = zmarnowana praca.
2. **Silnik studio-base jest nietykalny w warstwie marki.** Marka (kolory, fonty, treść, zdjęcia) żyje WYŁĄCZNIE w motywie-dziecku (`tokens.css` + pola SCF + ewentualne własne szablony dziecka). Do bazy dopisuj tylko nowe, neutralne typy sekcji, gdy w bibliotece brakuje wzorca. Uwaga: ta reguła mówi GDZIE żyje marka, a nie że wolno używać wyłącznie sekcji bazy — wierność designowi (reguła 0) jest ważniejsza niż reużycie sekcji.
3. **Tokeny w komplecie.** Motyw-dziecko nadpisuje w `:root` nie tylko hexy (`--c-primary`, `--c-bg`, `--c-accent`…), ale też kanały RGB (`--c-primary-rgb`, `--c-bg-rgb`, `--c-accent-rgb`, `--c-accent-2-rgb`, `--c-ink-rgb`) — bez nich przezroczystości zostaną w kolorach bazy.
4. **SEO od startu:** jedno H1 na stronę, semantyczny HTML, meta, schema (moduł w `studio-base/inc/seo.php`). Fonty lokalnie przed startem produkcyjnym (RODO) — przepis w `wiedza/10`.
5. **Weryfikuj, nie deklaruj.** Po każdym etapie pokaż dowód (podgląd, zrzut, `curl` z zewnątrz po wdrożeniu). Nie mów „gotowe" bez sprawdzenia.
6. **Bezpieczeństwo dostępów:** NIGDY nie proś użytkownika o hasło do hostingu/panelu i nigdy go nie zapisuj. Dostęp do serwera wyłącznie kluczem SSH (procedura w `wiedza/09`). Hasło użytkownik wpisuje sam, bezpośrednio w terminalu, gdy pyta o nie serwer.
7. **Wdrożenie na żywą domenę tylko po wyraźnym „tak"** użytkownika; przy działającym biznesie najpierw staging.
8. **Po KAŻDYM deployu: cache i weryfikacja z zewnątrz.** Kolejność obowiązkowa: (a) `wp plugin list` — znajdź wszystko, co pachnie cache/maintenance (`litespeed-cache`, `cache-enabler`, `wp-super-cache`, `w3-total-cache`, `maintenance`, `coming-soon`); (b) wyczyść cache TEJ wtyczki, która jest aktywna — `wp litespeed-purge all`, `wp cache-enabler clear` albo `rm -rf wp-content/cache/*` — samo `wp cache flush` czyści tylko object cache i NIE wystarcza; (c) wtyczki maintenance/coming-soon deaktywuj; (d) zweryfikuj Z ZEWNĄTRZ: `curl -s https://DOMENA/ | grep <znacznik-nowej-wersji>` (np. nazwa nowego pliku CSS). Gdy użytkownik zgłasza „goły tekst bez stylów" — to prawie zawsze stary cache albo nieładujący się CSS; najpierw (b) i (d), dopiero potem przebudowa kodu.
9. **Na serwerze niczego nie usuwasz bez kopii i zgody.** Usunięcie podstron, wtyczek (nawet Elementora), motywów czy plików = najpierw backup (`wp db export` + kopia folderu), potem JEDNO pytanie do użytkownika z listą do skasowania i dopiero po „tak" — kasowanie. „Zero Elementora" znaczy: nie buduj nim stron; nie znaczy: kasuj go z cudzego serwera bez pytania.

## Aktualizacja systemu (gdy użytkownik mówi „zaktualizuj", „jest nowa wersja")

Uruchom `bash aktualizuj.sh` z katalogu projektu. Skrypt pobiera najnowszą wersję od prowadzącego i nadpisuje **wyłącznie część systemową** (`AGENTS.md`, `GEMINI.md`, `CLAUDE.md`, `README.md`, `START-TUTAJ.md`, `WERSJA`, `wiedza/`, `szablony-startowe/`, `.claude/skills/`, szablon briefu). Praca użytkownika (`Klienci/`, jego briefy, jego motywy) zostaje nietknięta, a poprzednie pliki systemowe lądują w `_kopia-przed-aktualizacja/`.

Po aktualizacji: **przeczytaj `WERSJA`** i powiedz użytkownikowi po ludzku, co doszło. Potem stosuj już nowe reguły — mogły się zmienić.

Gdy `bash` jest niedostępny (np. czysty Windows bez Git Bash), zrób to samo ręcznie: pobierz `https://github.com/adrian-zielinski/projektowanie-stron-www/archive/refs/heads/main.tar.gz`, rozpakuj i skopiuj **tylko** wymienione wyżej ścieżki, nadpisując istniejące pliki i **nie kasując** niczego, czego nie ma w paczce.

## Jak mówić do użytkownika

Prosto, jedno pytanie na raz, gotowe zdania do wklejenia, zawsze tłumacz „po co". Żargon tłumacz na żywo:

| Termin | Powiedz |
|---|---|
| SCF/ACF, pola | „miejsce w panelu WordPress, gdzie edytujesz teksty i zdjęcia" |
| motyw-baza / studio-base | „gotowy szablon strony" |
| motyw-dziecko / tokeny | „plik z Twoimi kolorami i czcionkami" |
| SSH / klucz | „bezpieczny dostęp do serwera kluczem zamiast hasła" |
| terminal / komenda | „okienko poleceń — wklejasz gotowe rzeczy" |
| deploy / wdrożenie | „wgranie strony na serwer, żeby była w internecie" |

Użytkownik ma prawo nie wiedzieć niczego. Gdy się gubi — zwolnij, rozbij krok na mniejsze, nigdy nie daj mu poczuć się głupim.

## Pułapki znane z praktyki (nie odkrywaj ich ponownie)

- Eksport ZIP ze Stitcha bywa bez kodu (tylko `design.md`+PNG) → poproś użytkownika o eksport/skopiowanie kodu HTML per ekran.
- Darmowe „Advanced Custom Fields" NIE ma Flexible Content — instaluj **Secure Custom Fields** (darmowy fork z pełnią funkcji); render i tak idzie przez `get_field()` (patrz `wiedza/08`).
- Pola „obraz" przyjmują **attachment ID**, nie URL — media najpierw do biblioteki WP.
- Font bez `latin-ext` = krzaki zamiast ą/ę/ś — sprawdź przed użyciem.
- WP z autoinstalatora LH: błąd bazy/500 = rozjechane hasło DB — reset w panelu LH + `wp config set DB_PASSWORD` (`wiedza/09`).
- Po deployu wyczyść cache tej wtyczki, która realnie działa (sprawdź `wp plugin list`), nie „na ślepo LiteSpeed". `wp cache flush` NIE czyści page cache! Cache Enabler trzyma statyczne HTML-e w `wp-content/cache/cache-enabler/` — realny przypadek: świeży motyw wgrany, a domena dalej serwowała starą stronę bez stylów, aż do ręcznego `rm -rf` tego folderu. Wtyczki `maintenance` też podmieniają stronę — deaktywuj.
