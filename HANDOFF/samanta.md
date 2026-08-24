---
kind: handoff-topic
topic: samanta
status: in-progress
updated: 2026-08-23
---

# Holiestetyka — strona Samanty Zioły na WordPressie

> Zakres: motyw-dziecko, treści, media, logo, produkcja na LH. NIE obejmuje: Logistiq / Stitch B2B (`Klienci/STRONKA NOWA`).

## Aktualny stan
- ✅ Produkcja [holiestetyka.pl](https://holiestetyka.pl) (motyw `holiestetyka` + baza `studio-base`). Copy z maili/WA (29.06–10.07) live. Logo **HOLIMEDICA** w nagłówku, domena i copy = Holiestetyka.
- ✅ 22–23.08 na produkcji: zdjęcia wróciły w nagłówki podstron (overlay, biały H1); H1 mobile ~28 px (było ~20); filmiki; grafiki między tekstami; `<strong>` w leadach laser/INDIBA zdjęte.
- ✅ Filmy live: główna `holi/home.mp4` (specjalistka, 22 s), dno, fizjo (rozstęp), onkologia (talking-head — stare `oknologia.mp4` cesarskie zdjęte), technologie (rolka INDIBA), laser (stock zabiegu na twarzy, Pexels), plus stare rolki blizny/operacje/INDIBA.
- ✅ Grafiki: feat/galerie na proces, dno, kosmetologia, fizjo, operacje, onko, INDIBA, tech, kontakt, menu. Stock WP ID **326–330** (twarz-zabieg, serum, maska, USG, ciąża). Kontakt header = **320** (twarz Samanty, nie kark 308).
- ⛔ **Nie** każda zakładka ma film powitalny ze specjalistą. Brak talking-head: kosmetologia, proces, kontakt, menu. Albumy Google Photos z 30.04 puste; WeTransfer wygasł.
- ⛔ Booksy, telefon, godziny. CTA → `href="#"`. Opinie generyczne. Fonty z Google CDN. Decyzja marki Holiestetyka vs Holimedica wciąż otwarta.
- ⛔ Lokalny `Downloads/Samanta/holiestetyka-theme/` z **24.06** — nie wgrywać (prod nowsza).

## Kluczowe decyzje i ustalenia
- Źródło prawdy treści: maile + WhatsApp (eksport „Zioła 2” pełniejszy) + `uwagi-samanty-2026-07.md`.
- 10.07 Samanta: „Mamy komplet” / „Tak, odpalamy!”. Adrian wdrażał 14.07.
- Logo 00000649 = Holimedica. Domena i copy = Holiestetyka. 14.07 wpięte 1:1 na polecenie Adriana.
- **22.08 Samanta:** teksty OK i zostają; wzór strony OK; w zakładkach brakowało grafik i wideo; czcionki za małe na tel. Wzory: bmuse.clinic, dermapen.com.pl (producent sprzętu, nie klinika), weaesthetic.pl. Zielone światło na stock z netu pod specjalizacje. Adrian: ostatnia poprawka tego typu.
- Zdjęcia twarzy pacjentek = pisemna zgoda Samanty. Ciało/blizny bez twarzy: OK. Surowych filmów z piersiami z Drive (`IMG_3616` itd.) **nie publikować**.
- `Klienci/Samanta/` nie istnieje. Materiały: `/Users/adrianmacbook2/Downloads/Samanta/`.
- SSH: `ssh -i ~/.ssh/holi_lh_deploy -p 40022 serwer426465@serwer426465.lh.pl`. WP: `.../public_html/autoinstalator/holiestetyka.pl/wordpress154120`. Hasła nie prosić. Cache = **Cache Enabler** (`wp cache-enabler clear` + `rm -rf wp-content/cache/cache-enabler/*`), nie LiteSpeed.
- `njnj/IMG_4484.jpeg` — hasło w kadrze, nie używać.

## Następny krok
Czekać na jej filmiki talking-head na kosmetologię / proces / kontakt (Drive lub WeTransfer, nie Photos — albumy z 30.04 puste). Nie pisać jej, że „każda zakładka ma powitanie specjalisty”. Potem: Booksy + telefon + godziny (CTA martwe). Marka Holiestetyka vs Holimedica — wciąż decyzja Adriana.

## Czego NIE robić
- Nie rsync lokalnego `Downloads/Samanta/holiestetyka-theme/` na prod.
- Nie rebrandować na Holimedica bez „tak”.
- Nie publikować identyfikowalnych twarzy pacjentek ani surowych filmów z piersiami.
- Nie wciskać tej samej rolki (laser/home) na kilka zakładek jako „powitanie specjalisty”.
- Nie wracać do Elementora / Lovable.
- Nie kasować na serwerze bez kopii i zgody. Backup ACF: `~/holi-acf-backup-video-20260823-133225` i `~/holi-acf-backup-fill-20260823-144832`.
- Nie committować materiałów klienta (gitignor `Klienci/`).

## Artefakty
- Live: https://holiestetyka.pl — dziecko tylko na serwerze (`themes/holiestetyka/assets/css/{tokens,overrides}.css`; filmy `wp-content/uploads/holi/*.mp4`)
- `/Users/adrianmacbook2/Downloads/Samanta/` — folder roboczy (theme 24.06 stale)
- `uwagi-samanty-2026-07.md`, `materialy-mapa.md`, `wdrozenie/WDROZENIE.md` w tym folderze
- `/Users/adrianmacbook2/Downloads/WhatsApp Chat - Samanta Zioła 2/` — pełniejszy czat
- Drive reels (mat/vid) nadal publiczne jako `drive.google.com/uc?export=download&id=…` z maila Technologie; Google Photos 30.04 puste
- ACF backup serwer: `~/holi-acf-backup-video-20260823-133225`, `~/holi-acf-backup-fill-20260823-144832`
- Sesja Claude 14.07: `721b9915-5e22-4886-b384-43d01ff7243a`

## Dziennik sesji
- 2026-08-23 — WA 22.08 (filmy powitalne + 3 wzory + czcionki). Wdrożono nagłówki ze zdjęciem, H1 mobile, talking-head na głównej/dnie/fizjo/onko, stock laser, grafiki feat. Nie każda zakładka ma specjalistę. Nie pisać jej „wszystko ogarnięte”.
- 2026-08-20 — `/pickup samanta`: odtworzono HANDOFF po skasowaniu 11.08. CTA puste, decyzja marki otwarta.
- 2026-07-14 — produkcja: copy WA+maile, media, logo Holimedica.
