# 09 — Wdrożenie na produkcję (LH.pl) przez SSH — krok po kroku, bez błędów

Cel: gotową stronę (motyw **baza + dziecko** + plugin **importer treści**) wrzucić na hosting **LH.pl** szybko i poprawnie — bez grzebania w terminalu i bez pętli błędów. Spisane z realnego wdrożenia, z pułapkami i ich obejściem, żeby następny klient miał ścieżkę „włącz SSH → wklej jedną komendę → reszta dzieje się sama".

Dwie części: **A** — co robi KLIENT (5 min, raz). **B** — procedura ASYSTENTA (sprawdzona sekwencja). Na końcu: **pułapki z praktyki**.

---

## Zasady niezmienne (bezpieczeństwo)

- **Asystent NIGDY nie wpisuje hasła klienta** (SSH/FTP/bazy/panelu). Dostęp wyłącznie przez **klucz SSH**. To nie kaprys — chroni klienta (hasło hostingu daje pełną władzę nad serwerem i wędruje przez systemy).
- **Klient nie wkleja hasła do czatu.** Podaje tylko: **host, port, login**. Jeśli hasło przypadkiem trafi do rozmowy — **zmień je po wdrożeniu** (klucz działa niezależnie, dostępu nie tracimy).
- **Produkcja = akcja na zewnątrz.** Wdrażamy po wyraźnym „tak". Domyślnie najpierw **staging** (subdomena, `noindex`); jeśli cel to świeży/czysty WP na docelowej domenie — można od razu na produkcję (za zgodą).

---

## CZĘŚĆ A — DLA KLIENTA (LH.pl): włącz SSH i daj dostęp

> Tę część asystent generuje klientowi **spersonalizowaną** (z jego hostem/loginem i gotową komendą z kluczem). Poniżej wzorzec.

### A1. Włącz SSH (panel klienta LH)
1. Wejdź na **panel.lh.pl** i zaloguj się.
2. Menu boczne → **Serwery** → rozwiń swój serwer → zakładka **Ustawienia**.
3. Na liście znajdź **„dostęp SSH"** → kliknij **Włącz**.
4. W sekcji SSH pojawią się dane: **Host** `serwerXXXXXX.lh.pl`, **Port** `40022`, **Login** = `serwerXXXXXX` (ten sam, którym logujesz się do FTP/DirectAdmin).

### A2. Przekaż asystentowi 3 dane — BEZ hasła
- **Host**, **Port (40022)**, **Login**. Nic więcej. **Hasła nie podawaj.**

### A3. Wpuść asystenta kluczem (jednorazowo, ~2 min)
1. Asystent da Ci **jedną komendę** (dopisuje jego klucz publiczny).
2. Otwórz **Terminal** (Mac: Spotlight → „Terminal"; Windows: „PowerShell").
3. Zaloguj się raz:
   ```
   ssh -p 40022 LOGIN@HOST
   ```
   (przy pierwszym razie pytanie o fingerprint → wpisz `yes`; potem hasło — **znaki się nie pokazują, to normalne**).
4. Wklej komendę od asystenta (postaci `mkdir -p ~/.ssh && … >> ~/.ssh/authorized_keys …`) i Enter.
5. Gotowe — od tej chwili asystent loguje się **sam, bez hasła**. Możesz zamknąć terminal.

> **Nie szukaj „Kluczy SSH" w DirectAdmin.** Port `:2222` DirectAdmina bywa zablokowany z zewnątrz (wisi w nieskończoność). Komenda w terminalu jest pewniejsza i szybsza.

---

## CZĘŚĆ B — PROCEDURA ASYSTENTA (sprawdzona, „happy path")

Wszystkie komendy z placeholderami: `HOST`=`serwerXXXXXX.lh.pl`, `LOGIN`=`serwerXXXXXX`, `KEY`=`~/.ssh/<klient>_lh_deploy`, `DOMENA`=`klient.pl`.

### B0. Klucz + wpuszczenie
```bash
ssh-keygen -t ed25519 -f ~/.ssh/<klient>_lh_deploy -N "" -C "deploy-<klient>"
cat ~/.ssh/<klient>_lh_deploy.pub        # daj klientowi tę linię
```
Komenda dla klienta (do wklejenia w jego terminalu po zalogowaniu hasłem):
```bash
mkdir -p ~/.ssh && chmod 700 ~/.ssh && grep -q 'deploy-<klient>' ~/.ssh/authorized_keys 2>/dev/null \
  || echo '<PUBKEY>' >> ~/.ssh/authorized_keys; chmod 600 ~/.ssh/authorized_keys; echo DODANO
```
Test dostępu (bez hasła, nie zawiesi się na haśle):
```bash
ssh -o BatchMode=yes -i KEY -p 40022 LOGIN@HOST 'echo KEY_OK; whoami; wp --version'
```

### B1. Znajdź WordPressa (LH „platne" ≠ ~/domains)
```bash
ssh -i KEY -p 40022 LOGIN@HOST 'find ~ -maxdepth 6 -name wp-config.php 2>/dev/null'
# typowo: ~/public_html/autoinstalator/DOMENA/wordpressNNNNNN
```
Ustaw w sesji: `WP="/home/platne/LOGIN/public_html/autoinstalator/DOMENA/wordpressNNNNNN"`.

### B2. Sprawdź połączenie z bazą (NAJCZĘSTSZA pułapka)
```bash
cd "$WP" && wp option get home
```
- Wypisze adres → OK, idź do B3.
- **„Error establishing a database connection"** → autoinstalator WP ma rozjechane hasło bazy (to także powód błędu **500** na stronie, jeszcze przed wdrożeniem). Diagnoza bez wypisywania hasła:
  ```bash
  cd "$WP" && php -r '$c=file_get_contents("wp-config.php");
  foreach(["DB_NAME","DB_USER","DB_PASSWORD","DB_HOST"] as $k){ if(preg_match("/\x27".$k."\x27\s*,\s*\x27([^\x27]*)\x27/",$c,$m)) $V[$k]=$m[1]; }
  $m=@mysqli_connect($V["DB_HOST"],$V["DB_USER"],$V["DB_PASSWORD"],$V["DB_NAME"]);
  echo $m?"DB OK\n":("DB FAIL ".mysqli_connect_errno().": ".mysqli_connect_error()."\n");'
  ```
  - **„Access denied"** → reset hasła bazy (klient, w panelu): **panel.lh.pl → Serwery → Bazy danych MySQL → znajdź bazę → Opcje → Edytuj → zakładka „Dane dostępowe" → wpisz dwukrotnie nowe hasło → Zapisz.** Potem asystent dopina to samo w configu:
    ```bash
    cd "$WP" && wp config set DB_PASSWORD 'NOWE_HASLO' --type=constant && wp option get home
    ```
  - ⚠️ **phpMyAdmin NIE zmieni hasła użytkownika bazy** (`#1227 – brak CREATE USER`). Hasło bazy resetuje się **w panelu LH**, nie w phpMyAdmin ani z shella (shell nie ma admina MySQL).

### B3. Wgraj motywy + plugin + uruchom import (KOLEJNOŚĆ jest ważna)
```bash
# z Maca: wgraj paczki do katalogu domowego
scp -i KEY -P 40022 studio-base.zip holiestetyka.zip holi-importer.zip LOGIN@HOST:~/
```
```bash
# na serwerze:
cd "$WP"
wp theme install ~/studio-base.zip                    # 1) baza (NIE aktywuj)
wp theme install ~/holiestetyka.zip --activate        # 2) dziecko + aktywacja (rejestruje pola)
wp plugin install secure-custom-fields --activate     # 3) Secure Custom Fields (DARMOWE; ma Flexible Content/Repeater/opcje → edycja w panelu). NIE „advanced-custom-fields" (darmowe ACF nie ma flexible/repeater)
wp plugin install ~/holi-importer.zip --activate      # 4) importer: tworzy strony+menu+opcje, ustawia front page
wp rewrite flush                                       # 5) permalinki (inaczej podstrony 404)
```
Reimport po zmianie treści (importer reseeduje na `acf/init`):
```bash
wp option delete holi_seeded_v1 && wp eval '1;'
```

### B4. Media (zdjęcia/filmy)
```bash
ssh -i KEY -p 40022 LOGIN@HOST "mkdir -p '$WP/wp-content/uploads/holi'"
scp -i KEY -P 40022 assets/foto/*.jpeg assets/wideo/*.mp4 LOGIN@HOST:"$WP/wp-content/uploads/holi/"
```
- **Zdjęcia (pola „obraz") → przez bibliotekę mediów, po ID.** SCF/ACF przetwarza pole image po **attachment ID**, nie po URL. Zaimportuj: `for f in wp-content/uploads/holi/*.jpeg; do wp media import "$f" --porcelain; done` (slug = nazwa pliku, np. `blizny-01`). W danych podaj **ID** (np. `WP_Query` po `name`), nie `array('url'=>...)` — inaczej galerie wyjdą puste.
- **Filmy (pole `video_url`) → zwykły URL** `https://DOMENA/wp-content/uploads/holi/<plik>.mp4` (pole typu URL przyjmuje string).
- Podpięcie generycznie: `holi_apply_media()` w `holi-content.php` (mapa `slug → galeria/reel/combined/feat/subhero`), potem reimport (B3).

### B5. Weryfikacja Z ZEWNĄTRZ (nie deklaruj — sprawdź)
```bash
curl -sIL https://DOMENA/ | head -1                                   # HTTP 200
curl -sL https://DOMENA/ | grep -c 'wp-child-theme-holiestetyka'      # motyw dziecko aktywny
curl -sL https://DOMENA/<slug>/ | grep -oE '<h1[^>]*>[^<]+</h1>'      # treść podstrony
```
Sprawdź 2–3 podstrony + obecność mediów (`uploads/holi/...`).

### B6. Wydajność + porządek
- **Filmy**: kompresja przed publikacją (autoplay = muszą być lekkie). H.264, bez audio, faststart:
  ```bash
  ffmpeg -y -i in.mp4 -an -vf "scale='min(1280,iw)':-2,fps=30" \
    -c:v libx264 -preset medium -crf 28 -pix_fmt yuv420p -movflags +faststart out.mp4
  ```
  (typowo 100 MB → ~8 MB, −92%, bez widocznej straty). Podmień ten sam URL na serwerze.
- **LiteSpeed cache**: po wgraniu nowej wersji `wp litespeed-purge all` (jeśli plugin aktywny) lub panel → Purge.
- Sprzątanie: ZIP-y z `~` można usunąć po imporcie; importer można dezaktywować (treść zostaje).

---

## PUŁAPKI Z PRAKTYKI (czego unikać — to one zżerały czas i tokeny)

- **phpMyAdmin pokazuje SWÓJ PHP** (np. 7.4) — to NIE jest PHP strony. Realny: `wp eval 'echo PHP_VERSION;'` albo `php -v` na serwerze (np. 8.4). Nie obniżaj wymagań motywu na podstawie phpMyAdmina.
- **DirectAdmin `:2222` zablokowany z zewnątrz** — wisi w nieskończoność. Nie kieruj tam klienta po klucze SSH; użyj `authorized_keys` z terminala (B0).
- **LH loguje SSH hasłem** — asystent nie wpisuje hasła → zawsze klucz. Login = `serwerXXXXXX` (= nazwa serwera/konta), NIE domena.
- **`~/domains` na LH „platne" nie istnieje** — WP jest w `public_html/autoinstalator/DOMENA/wordpressNNNNNN`. Szukaj przez `find ~ -name wp-config.php`.
- **Autoinstalator WP bywa zepsuty** (DB „Access denied" → 500) — sprawdź `wp option get home` PRZED wdrożeniem; napraw hasło bazy w panelu (B2).
- **`wp db check` → „mysqlcheck: No such file or directory"** — to NIE błąd połączenia; testuj `wp option get home`.
- **SQL-e (`ALTER USER`, `FLUSH`) idą do phpMyAdmin (przeglądarka), nie do bash-a** — w terminalu dają „command not found".
- **ffmpeg z Homebrew po update bywa zepsuty** (`Library not loaded: libx265.NNN`) — naprawa: `brew reinstall ffmpeg` (symlink wersji NIE działa, ABI się różni). Do kodowania web wystarczy `libx264`.
- **Edycja sekcji w panelu = Secure Custom Fields (darmowy), NIE „advanced-custom-fields".** Darmowe ACF nie ma Flexible Content/Repeater → grupy pól są puste, klient nic nie wyedytuje. SCF (oficjalny fork WordPress.org) ma te funkcje za darmo. Po podmianie ACF→SCF **zrób reseed** (dane zapiszą się w formacie spłaszczonym, nie blob — inaczej edytor pokaże puste sekcje). Płatne ACF Pro nie jest potrzebne.
- **Pole „obraz" po ID, nie URL.** Na SCF/Pro pole image przyjmuje **attachment ID** — wartość typu `array('url'=>...)` zostanie odrzucona (galerie puste). Importuj zdjęcia do biblioteki (`wp media import`) i podawaj ID. Pole URL/wideo przyjmuje zwykły URL. (Na darmowym ACF blob to tolerował — dlatego po przejściu na SCF galerie potrafią „zniknąć".)
- **Klucz SSH działa niezależnie od hasła** — klient może (powinien) zmienić hasło po sesji; dostęp asystenta zostaje.

---

## Materiały powiązane
- `wiedza/06-stack-technologiczny.md` — deploy ogólnie, LiteSpeed, Vite.
- `wiedza/08-praktyka-wp-narzedzia-workflow.md` — motyw baza+dziecko, Playground (lokalna weryfikacja przed produkcją), workflow.
- Pamięć: `acf-flexible-render-getfield` (render sekcji przez `get_field`, ACF Pro tylko do edycji w panelu).
