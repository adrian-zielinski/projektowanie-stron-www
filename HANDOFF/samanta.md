---
kind: handoff-topic
topic: samanta
status: in-progress
updated: 2026-09-02
---

# Holiestetyka — strona Samanty Zioły na WordPressie

> Zakres: motyw-dziecko, treści, media, logo, produkcja na LH. NIE obejmuje: Logistiq / Stitch B2B (`Klienci/STRONKA NOWA`).

## Aktualny stan
- ✅ Produkcja [holiestetyka.pl](https://holiestetyka.pl). Motyw-dziecko na serwerze (nie rsyncować `holiestetyka-theme/` z 24.06).
- ✅ **2.09** wdrożona runda WA 26.08 (screeny + 7 filmów + 3 głosówki z `Downloads/samanta 2`). Backup ACF: `~/holi-acf-backup-samanta-20260902-064421`.
- ✅ Kadry: hard-crop `sb_hero`/`sb_card` wyłączony w szablonach dziecka (pełny plik). Logo HOLIMEDICA ~72–96 px. H1 desktop `clamp(1.65–2.55rem)`. Ścieżki na home w kolumnie. Galerie 2 kolumny, bez ucięcia przed/po.
- ✅ Hero/feat: brzuch-przed/po i Canva „CARE zapisz się” i cartoon plemniki zdjęte z nagłówków. Gabinet = **307**. Portret Samanty = **308**. Maszyna INDIBA = **331**. USG/Dermapen/biofeedback = **332–334**.
- ✅ Proces: 3 karty jej copy. Dno: kafelki Kobiety/Mężczyźni + rolka rozstępu tu (nie na fizjo). Laser: dermatozy w tytule i galerii. Kosmetologia: filar bez „leczenia dermatoz” (odesłanie na laser).
- ✅ Reel: przycisk „Włącz dźwięk” (autoplay nadal muted).
- ⛔ Brak talking-head: kosmetologia, proces, kontakt, menu. Booksy/telefon/godziny — CTA `href="#"`. Opinie generyczne. Marka Holiestetyka vs Holimedica otwarta.
- ⛔ `Downloads/Samanta/holiestetyka-theme/` z 24.06 — nie wgrywać.

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
Dać Samancie link do przeglądu (nie pisać „wszystko ogarnięte” / nie obiecywać talking-head na każdej zakładce). Potem z niej: brakujące filmiki kosmetologia/proces/kontakt, prawdziwe opinie Booksy, jej zdjęcia sprzętu jeśli 332–334 nie przejdą. Równolegle: Booksy + telefon + godziny (CTA martwe). Marka — decyzja Adriana.

## Czego NIE robić
- Nie rsync lokalnego `Downloads/Samanta/holiestetyka-theme/` na prod.
- Nie rebrandować na Holimedica bez „tak”.
- Nie publikować identyfikowalnych twarzy pacjentek ani surowych filmów z piersiami.
- Nie wciskać tej samej rolki (laser/home) na kilka zakładek jako „powitanie specjalisty”.
- Nie wracać do Elementora / Lovable.
- Nie kasować na serwerze bez kopii i zgody. Backup ACF: `~/holi-acf-backup-video-20260823-133225` i `~/holi-acf-backup-fill-20260823-144832`.
- Nie committować materiałów klienta (gitignor `Klienci/`).

## Artefakty
- Live: https://holiestetyka.pl — dziecko na serwerze: `themes/holiestetyka/{functions.php,assets/css/overrides.css,assets/js/reel-sound.js,template-parts/content/content-*.php}`; filmy `uploads/holi/*.mp4`
- `/Users/adrianmacbook2/Downloads/Samanta/` — folder roboczy (theme 24.06 stale); `theme-prod/` = kopia dziecka z 2.09
- `uwagi-samanty-2026-07.md`, `materialy-mapa.md`, `wdrozenie/WDROZENIE.md`
- `/Users/adrianmacbook2/Downloads/WhatsApp Chat - Samanta Zioła 2/` — pełniejszy czat
- `/Users/adrianmacbook2/Downloads/samanta 2/` — runda 26.08 (screeny, 7 filmów, 3 głosówki)
- Transkrypcje: `inbox/samanta-transkrypcje/`
- ACF backup: `~/holi-acf-backup-samanta-20260902-064421` (plus starsze video/fill z 23.08)
- Media 2.09: 331 maszyna INDIBA, 332 USG, 333 Dermapen, 334 biofeedback

## Dziennik sesji
- 2026-09-02 — WA 26.08: screeny + 7 filmów laptopa + 3 głosówki. Zdjęto ucięte/obrzydliwe kadry z hero, logo większe, H1 mniejsze, dźwięk na rolkach, dno K/M, rozstęp z fizjo na dno, dermatozy na laser, sprzęt USG/Dermapen/biofeedback na technologiach. Nie pisać jej „gotowe na 100%”.
- 2026-08-23 — WA 22.08 (filmy powitalne + 3 wzory + czcionki). Wdrożono nagłówki ze zdjęciem, H1 mobile, talking-head na głównej/dnie/fizjo/onko, stock laser, grafiki feat. Nie każda zakładka ma specjalistę. Nie pisać jej „wszystko ogarnięte”.
- 2026-08-20 — `/pickup samanta`: odtworzono HANDOFF po skasowaniu 11.08. CTA puste, decyzja marki otwarta.
- 2026-07-14 — produkcja: copy WA+maile, media, logo Holimedica.
