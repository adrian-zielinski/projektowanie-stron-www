# Instrukcje dla agenta (Antigravity / Gemini / dowolny agent AI)

Ten plik czyta agent AI pracujący w tym projekcie (Google Antigravity czyta go automatycznie). Prowadzisz **początkującego, nietechnicznego** człowieka od gotowego designu (najczęściej z Google Stitch) do działającej strony na WordPressie. Użytkownik czyta `START-TUTAJ.md` — trzymaj się jego języka i kolejności.

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
| Budowa/struktura motywu, ACF/SCF, deploy | `.claude/skills/wordpress-budowa/SKILL.md` + `wiedza/06-stack-technologiczny.md` |
| Praktyka: baza+dziecko, Playground, pułapki | `wiedza/08-praktyka-wp-narzedzia-workflow.md` |
| Design, paleta, typografia, anti-slop | `.claude/skills/web-design-anti-slop/SKILL.md` + `wiedza/01` |
| SEO (H1, meta, schema, CWV) | `.claude/skills/seo-techniczne-onpage/SKILL.md` + `wiedza/05` |
| Sklep WooCommerce | `.claude/skills/woocommerce-sklep/SKILL.md` + `wiedza/03` |
| Kursy / LMS | `.claude/skills/kursy-lms/SKILL.md` + `wiedza/04` |

Pliki w `.claude/skills/` to zwykłe instrukcje markdown — czytaj je i stosuj, nawet jeśli Twoje środowisko nie ma mechanizmu „skilli".

## Twarde reguły

1. **Design przed implementacją.** Pokaż propozycję (podgląd/opis sekcji + paleta), uzyskaj wyraźne „ok", dopiero potem koduj. Implementacja bez akceptacji = zmarnowana praca.
2. **Silnik studio-base jest nietykalny w warstwie marki.** Marka (kolory, fonty, treść, zdjęcia) żyje WYŁĄCZNIE w motywie-dziecku (`tokens.css` + pola SCF). Do bazy dopisuj tylko nowe, neutralne typy sekcji, gdy w bibliotece brakuje wzorca.
3. **Tokeny w komplecie.** Motyw-dziecko nadpisuje w `:root` nie tylko hexy (`--c-primary`, `--c-bg`, `--c-accent`…), ale też kanały RGB (`--c-primary-rgb`, `--c-bg-rgb`, `--c-accent-rgb`, `--c-accent-2-rgb`, `--c-ink-rgb`) — bez nich przezroczystości zostaną w kolorach bazy.
4. **SEO od startu:** jedno H1 na stronę, semantyczny HTML, meta, schema (moduł w `studio-base/inc/seo.php`). Fonty lokalnie przed startem produkcyjnym (RODO) — przepis w `wiedza/10`.
5. **Weryfikuj, nie deklaruj.** Po każdym etapie pokaż dowód (podgląd, zrzut, `curl` z zewnątrz po wdrożeniu). Nie mów „gotowe" bez sprawdzenia.
6. **Bezpieczeństwo dostępów:** NIGDY nie proś użytkownika o hasło do hostingu/panelu i nigdy go nie zapisuj. Dostęp do serwera wyłącznie kluczem SSH (procedura w `wiedza/09`). Hasło użytkownik wpisuje sam, bezpośrednio w terminalu, gdy pyta o nie serwer.
7. **Wdrożenie na żywą domenę tylko po wyraźnym „tak"** użytkownika; przy działającym biznesie najpierw staging.

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
- Po deployu wyczyść cache tej wtyczki, która realnie działa (sprawdź `wp plugin list`), nie „na ślepo LiteSpeed".
