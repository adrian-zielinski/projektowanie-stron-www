# 08 — Praktyka: reużywalny WordPress, narzędzia i workflow

Lekcje z realnych wdrożeń (sesja Holiestetyka). Gotowe przepisy, komendy i antywzorce. Czytaj, gdy: budujesz motyw WP, weryfikujesz stronę lokalnie, przetwarzasz materiały od klienta (głosówki, zdjęcia) albo składasz stronę wielo-agentowo.

---

## 1. Reużywalny motyw: BAZA + DZIECKO (nie buduj motywu od zera per klient)

Cel: minimalizować pracę/tokeny przy kolejnych klientach przy zachowaniu hand-coded jakości. **Jeden motyw-bazę wgrywasz zawsze, motyw-dziecko go nadpisuje pod konkretną stronę.**

- **Motyw-baza (parent)** = brandless silnik + biblioteka sekcji. NIE zawiera żadnej marki.
  - `functions.php` + `inc/{setup,enqueue,acf}.php`, szablony `header/footer/index/front-page/page/404`.
  - `template-parts/sections.php` = pętla **ACF Flexible Content „sekcje"** (`have_rows('sekcje')` → `get_template_part('template-parts/content/content', get_row_layout())`).
  - `template-parts/content/content-*.php` — jeden plik na typ sekcji (hero, subhero, radial, galeria…).
  - `acf-json/` (Local JSON) + strona opcji ACF (Booksy, NAP, social).
  - CSS **bespoke** (komponenty, nie utility Tailwinda — gdy design jest hand-coded, Tailwind to zbędny refaktor). Tokeny jako **zmienne semantyczne** w `:root` z **neutralnymi defaultami**: `--c-primary/--c-bg/--c-accent/--c-text/--c-muted/--c-line` + `--font-body/--font-display/--font-accent`. Wszystkie komponenty używają `var(...)`, nigdy hardkodu koloru/fontu.
  - JS toolkit (animacje) w `assets/js/main.js`. Enqueue z `filemtime()` jako wersja.
- **Motyw-dziecko (per klient)** = TYLKO marka.
  - `style.css` z nagłówkiem `Template: <slug-bazy>`.
  - `functions.php`: enqueue fontów + `assets/css/tokens.css` z **zależnością od handle bazy** (`array('studio-base-main')`), żeby `:root` dziecka nadpisał bazę.
  - `assets/css/tokens.css` = `:root{ --c-primary:…; --font-body:… }` (paleta + fonty marki).
  - Treść i zdjęcia = ACF (panel WP) + Media Library, NIE pliki motywu.
- **Per nowy klient:** instaluj bazę + nowe dziecko = `tokens.css` (paleta/fonty) + treść w ACF → ~0 tokenów na layout. Nowa sekcja tylko gdy spoza biblioteki (biblioteka rośnie).
- Referencyjna implementacja: baza `szablony-startowe/studio-base/`, dziecko `Klienci/Samanta/holiestetyka-theme/`.
- Refaktor brandowego CSS na tokeny: `sed` zamieniający `--green→--c-primary`, `'Raleway',sans-serif→var(--font-body)` itd. (kolejność: `--green-deep` PRZED `--green`).

---

## 2. Lokalny WordPress bez Dockera/LocalWP — WordPress Playground (php-wasm)

Gdy nie ma Dockera ani LocalWP, a jest `node` — stawiasz prawdziwy WP przez Playground:

```bash
npx --yes @wp-playground/cli@latest server \
  --mount "/abs/sciezka/studio-base:/wordpress/wp-content/themes/studio-base" \
  --mount "/abs/sciezka/holiestetyka-theme:/wordpress/wp-content/themes/holiestetyka" \
  --blueprint "/abs/sciezka/blueprint.json" \
  --port 9400
```

`blueprint.json` (instaluje ACF z wp.org + aktywuje motyw-dziecko):
```json
{ "$schema":"https://playground.wordpress.net/blueprint-schema.json","landingPage":"/","login":true,
  "steps":[
    {"step":"installPlugin","pluginData":{"resource":"wordpress.org/plugins","slug":"advanced-custom-fields"},"options":{"activate":true}},
    {"step":"activateTheme","themeFolderName":"holiestetyka"}
  ] }
```

Gotchas (sprawdzone):
- **`preview_start`/panel NIE odpali npx** — npm bije w `EPERM uv_cwd` w sandboxie. Uruchamiaj Playground przez **Bash `run_in_background`** (ma poprawny cwd).
- **Weryfikuj przez `curl` z basha** — serwer wystartowany w bashu jest w tym samym sandboxie, więc `curl http://127.0.0.1:9400/` działa (panel-owy `python -m http.server` był nieosiągalny przez izolację; Playground z basha — osiągalny).
- W logu lecą `fcntl(): EBADF Bad file descriptor` (php-wasm + blokady plików) — **nieszkodliwe**, serwer i tak zwraca HTTP 200 + czysty HTML.
- Weryfikacja bez przeglądarki: `curl -sL :9400` → grep w HTML: czy ładuje się `main.css` bazy + `tokens.css` dziecka (dowód, że baza/dziecko działa), czy jest nav/footer, czy **brak** `Fatal error|Parse error|Warning:`.
- Pusta strona główna pokaże tylko nav/stopkę — sekcje renderują się dopiero, gdy jest strona z polami ACF Flexible Content.

---

## 3. Przetwarzanie materiałów od klienta (głosówki, czat, zdjęcia)

Klient przysyła komplet w WhatsApp (głosówki `.opus`, zdjęcia, wideo, czat `_chat.txt`). Tu jest najwięcej realnych ustaleń — przebadaj WSZYSTKO, zanim cokolwiek zbudujesz.

### Transkrypcja głosówek (.opus) — lokalnie
`ffmpeg` z Homebrew bywa zepsuty (`Library not loaded: libx265.…dylib` po aktualizacji x265). Obejście: natywny **`afconvert`** + **`whisper-cli`** (whisper.cpp):
```bash
MODEL="$HOME/.cache/whisper/ggml-small.bin"   # pobierz raz: curl -L -o "$MODEL" https://huggingface.co/ggerganov/whisper.cpp/resolve/main/ggml-small.bin
for f in *.opus; do b="${f%.opus}"
  afconvert -f WAVE -d LEI16@16000 -c 1 "$f" "/tmp/$b.wav"
  whisper-cli -m "$MODEL" -l pl -nt -otxt -of "_transkrypcje/$b" -f "/tmp/$b.wav"
done
```
`afconvert` ogarnia też audio z `.mp4`. Model `small` daje dobrą polszczyznę na czytelnych głosówkach. Uwaga na glob w zsh: `for v in *.mp4` wywala „no matches" — użyj `find . -iname '*.mp4'`.

### Analiza czatu + zdjęć
- `_chat.txt` z eksportu WhatsApp = oś czasu (kto, co, kiedy + odnośniki do mediów). Czytaj CAŁOŚĆ — tam są akceptacje, zmiany, „co się nie podobało".
- **Klasyfikacja zdjęć medycznych** (efekty przed/po) rób przez agentów oglądających pliki — z flagą wrażliwości (`ok do publikacji` / `intymne/nagość` / `mocno medyczne`). Nie wstawiaj „na oko" — błędne przypisanie zdjęcia intymnego na główną jest niedopuszczalne. Mapowanie filename→kategoria krzyżuj z podpisami z czatu (godzina w nazwie pliku ↔ podpis).
- Linki: Google Photos albumy **nie pobiorą się** curlem (strona JS, brak `gallery-dl`/`yt-dlp`) — poproś klienta o „Pobierz wszystko" (ZIP). WeTransfer wygasa po 7 dniach.
- Strony-inspiracje od klienta sprawdzaj `WebFetch`-em w kontekście projektu (czytelność, styl zdjęć, sekcje zaufania).

---

## 4. Wielo-agentowe workflow w budowie/audycie strony

Sprawdzone fan-outy (ostrożnie z tokenami — odpalaj świadomie):
- **Audyt pokrycia treści**: 1 agent na podstronę porównuje zbudowany HTML z zatwierdzonym dokumentem tekstów → raport braków (werdykt + lista). Wyłapuje skróty/pominięte sekcje, których nie widać gołym okiem.
- **Klasyfikacja zdjęć**: partie po ~7 plików, każdy agent ogląda + opisuje + przypisuje stronę + flaga wrażliwości.
- **Domknięcie per podstrona**: 1 agent na stronę uzupełnia braki z dokumentu + wpina zdjęcia/galerie + ® + meta. Daj exemplar (jedna wzorcowa strona) + wspólny CSS + dokładną treść.
- **Rozkład animacji**: 1 agent na podstronę wstawia INNY akcent ruchu (z gotowego toolkitu), żeby było „podobne, ale nie 1:1".

Zasada: najpierw zbuduj **wzorzec/exemplar i wspólny system stylów**, dopiero potem fan-out — agenci kopiują wzorzec i wklejają treść (mała wariancja, wysoka spójność). Daj im pełne ścieżki, dokładny fragment do wstawienia i kotwicę.

---

## 5. Animacje — gotowy toolkit „motion" (żywe, ale z umiarem)

Best practices (potwierdzone): animuj **transform/opacity** (GPU), linie „płyną" przez `stroke-dashoffset`, **`prefers-reduced-motion` to bramka obowiązkowa**, cienkie linie dla wydajności.

Reużywalne klasy (w `main.css` bazy): `.flow-line` / `.accent-line` (płynący divider — „żyła"), `.rf-rings` (rozchodzące się fale), `.scan` (omiatający promień), `.dots` (pulsujący sygnał), `.pulse-soft`/`.beat`/`.drift`, oraz puls emblematu radialu. Każda za bramką reduced-motion.

**Radial „hub & spokes" rysuj JS-em wg realnych pozycji węzłów** (nie sztywne ścieżki SVG — te się rozjeżdżają przy responsywności). `drawRadial()` mierzy `getBoundingClientRect()` emblematu i ikon, ustawia `viewBox` = piksele kontenera i rysuje krzywe od środka do każdej ikony; przerysowuj na `resize` + `document.fonts.ready`. Na mobile chowaj linie (`display:none`) i składaj w listę; wyłącz rozchodzący się pierścień (sięgał krawędzi).

Per-podstrona DAJ INNY motyw (laser→scan, RF→rings, technologie→dots, reszta→accent-line z różnymi krzywymi, kosmetologia→drift listka) — to buduje unikalność.

---

## 6. QA podglądu PRZED oddaniem (weryfikuj, nie deklaruj)

- **Walidacja strukturalna (Bash)**: jeden `<h1>`/stronę; każdy `assets/...` istnieje; brak martwych linków `.html`; brak emoji (`grep -lP "[\x{1F300}-\x{1FAFF}…]"`); polskie znaki.
- **Audyt overflow na mobile** (panel + `preview_eval`): zmierz `documentElement.scrollWidth - clientWidth` i wypisz elementy `getBoundingClientRect().right > vw`. „Nic nie wyjeżdża" = `overflowPx 0`. Zabezpieczenie: `body/html{overflow-x:hidden}` + `.section{overflow-x:clip}`. Uwaga: pełnoekranowy obraz z Ken Burns wystaje o kilka px, ale jest clipowany przez `overflow:hidden` sekcji — to OK.
- **Cache-busting podglądu**: linki `assets/styl.css?v=N`; **bumpuj `?v=N` po każdej zmianie CSS/JS** — inaczej klient „nie widzi zmian" (przeglądarka trzyma cache; serwer ma świeże pliki). `sed -i '' 's#styl.css?v=2#styl.css?v=3#g' *.html`.
- Panel `Claude_Preview` (`preview_start` + `preview_screenshot` + `preview_resize` + `preview_eval`) renderuje statyczny podgląd i pozwala mierzyć DOM — używaj go zamiast przejmowania ekranu klienta (computer-use/Arc).

---

## 7. Realne zdjęcia efektów (przed/po) — wrażliwość

- Klinika chce efektów przed/po, ale część materiału jest **mocno medyczna** (otwarte rany, keloidy) lub **intymna/nagość** (biust z planem operacji, pośladki). Nie wrzucaj „jak leci".
- W podglądzie: **dyskretne galerie** „Efekty przed/po" (klasa `.gallery`, kolaże przed/po + nota „za zgodą pacjentów. Efekty indywidualne"). Zdjęcia kategorii → jako zdjęcia sekcji/hero.
- **Decyzja, które idą na LIVE — należy do klienta** (lekarza), i pamiętaj: platformy reklamowe (Google/Meta Ads) **odrzucają nagość i drastyczne medyczne** — to wpływa na wybór przed publikacją.
- Marki: ® przy `INDIBA®`, `Dermapen®`, `PCA SKIN®` itd.
