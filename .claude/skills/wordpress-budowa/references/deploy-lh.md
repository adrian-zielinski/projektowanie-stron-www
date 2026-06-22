# Deploy na LH.pl / Mango + stage na subdomenie

Procedura wdrożeniowa dla custom classic theme. Czytaj, gdy zadanie dotyczy wgrania motywu na serwer, migracji URL lub postawienia środowiska testowego. Pełny kontekst w `wiedza/06-stack-technologiczny.md`, sekcja 7.

## Zanim wdrożysz

- **Build jest świeży.** `npm run build` lokalnie → sprawdź, że `dist/` i `dist/.vite/manifest.json` istnieją i są aktualne. Wgrywamy motyw razem z `dist/` (w tym projekcie `dist/` jest commitowane).
- **`IS_VITE_DEV` nie istnieje na produkcji.** Stałą `define('IS_VITE_DEV', true)` trzymaj tylko lokalnie w `wp-config.php`. Na serwerze jej brak → enqueue ładuje z `dist/` wg manifestu.
- **PHP i Redis w DirectAdmin.** Ustaw PHP 8.2/8.3, włącz Redis (Redis Management) pod object cache LiteSpeed.

## Instalacja WordPressa

Najszybciej: **autoinstalator** w Panelu Klienta LH (domena + dane strony → WP staje w ~15 s). Alternatywnie ręcznie przez FTP + kreator instalacji.

## Wgranie motywu — trzy ścieżki

Motyw ląduje w `wp-content/themes/<slug>/`. Wybierz wg skali zmiany:

### 1. SFTP/FTP (najprościej)
Klient FTP (FileZilla), dane z DirectAdmin. Wgraj **cały folder motywu wraz z `dist/`**. Dobre na pierwsze wdrożenie i drobne zmiany.

### 2. SSH + rsync (większe zmiany)
Mango ma SSH. Włącz w DirectAdmin, połącz `ssh user@serwer`, synchronizuj:

```bash
rsync -avz --delete \
  ./moj-motyw/ \
  user@serwer:~/domains/twojadomena.pl/public_html/wp-content/themes/moj-motyw/
```

`--delete` usuwa na serwerze pliki, których już nie ma lokalnie — trzyma katalog czysty. Uważaj, by nie wyciąć plików generowanych po stronie serwera (jeśli takie są — zwykle nie ma).

### 3. Git (najczystszy dla zespołu)
Przez SSH `git clone` / `git pull` repozytorium motywu wprost do `themes/`. Pamiętaj o świeżym `dist/` (commitowanym albo zbudowanym na miejscu). To preferowany deploy przy pracy zespołowej.

## Purge cache po KAŻDYM deployu (rigid)

Po każdym wgraniu nowego `dist/`: `LiteSpeed Cache → Toolbox → Purge All`. Bez tego klient zobaczy stary CSS/JS z cache — to najczęstsza pułapka „strona się nie zmieniła". Po purge sprawdź stronę **zalogowany i wylogowany** (różne warstwy cache).

## Stage na subdomenie (lokalnie → stage → produkcja)

LH wspiera wersję testową na subdomenie. Procedura krok po kroku:

1. **Kopia plików.** FTP/SSH: skopiuj WP do nowego katalogu (np. `wpstage`) w `public_html`.
2. **Subdomena.** Panel LH (`Serwery → Strony WWW`) → dodaj `test.twojadomena.pl` i skieruj na `wpstage`.
3. **Eksport bazy.** phpMyAdmin → baza produkcji → `Eksport` → pobierz (.sql/.gz).
4. **Nowa baza + import.** Utwórz osobną bazę (np. `wpstagesql`), zapisz login/hasło, zaimportuj zrzut w phpMyAdmin.
5. **URL w bazie.** Tabela `wp_options` → zmień `siteurl` i `home` na adres subdomeny.
6. **`wp-config.php` w `wpstage`** → zmień `DB_NAME`, `DB_USER`, `DB_PASSWORD` na nową bazę.
7. **Reszta URL-i.** Wtyczka **Better Search Replace** → podmień stary adres na adres stage we wszystkich tabelach (obsługuje serializowane dane — ręczna podmiana w SQL je psuje).
8. **Zabezpieczenie stage.** `Ustawienia → Czytanie` → „Proś wyszukiwarki o nieindeksowanie" + zablokuj katalog hasłem przez `.htaccess` (lub po IP). Stage NIE może trafić do indeksu Google.

Na produkcję trafia tylko to, co przeszło testy na stage. Włącz indeksację (`Ustawienia → Czytanie` — odznacz noindex) **dopiero na produkcji**.

## Backup

LH robi codzienny backup przechowywany 30 dni — traktuj to jako siatkę bezpieczeństwa, nie jedyny backup. Skonfiguruj **UpdraftPlus** na zewnętrzną chmurę (Drive/S3) z nocnym snapshotem, niezależnie od backupu hostingu.

## Szybka checklista wdrożenia

```
[ ] npm run build świeży; dist/ + manifest istnieją
[ ] IS_VITE_DEV nieobecne na produkcji
[ ] PHP 8.2/8.3 + Redis włączone w DirectAdmin
[ ] motyw wgrany z dist/ (FTP/rsync/git)
[ ] LiteSpeed → Purge All
[ ] sprawdzone zalogowany i wylogowany
[ ] (stage) noindex + hasło, indeksacja włączona dopiero na prod
[ ] UpdraftPlus na zewnętrzną chmurę skonfigurowany
```
