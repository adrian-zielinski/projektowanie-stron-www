---
kind: handoff-topic
topic: samanta
status: in-progress
updated: 2026-09-10
---

# Holiestetyka — strona Samanty Zioły na WordPressie

> Zakres: motyw-dziecko, treści, media, logo, produkcja na LH. NIE obejmuje: Logistiq / Stitch B2B (`Klienci/STRONKA NOWA`).

## Aktualny stan
- ✅ Produkcja [holiestetyka.pl](https://holiestetyka.pl). Motyw-dziecko na serwerze (nie rsyncować `holiestetyka-theme/` z 24.06). Kopia aktualnego dziecka: `Downloads/Samanta/theme-prod/` (sync 10.09).
- ✅ **10.09** runda „nadal są błędy”: nagłówki podstron zaczynają się pod stałym menu (desktop H1 wjeżdżał pod logo/breadcrumb), H1 mniejsze; zdjęcia feat/author/combined w proporcji pliku (`--ar` z PHP, `holi_img_ar()`), plakietka POD zdjęciem; galerie 3–4 kolumny desktop / 2 mobile, kafle 4:5 contain; reel w proporcji filmu (slajdy Canva 4:5 nieobcinane), przycisk dźwięku tylko gdy audio; **CTA działają** (40× `#` → Booksy/tel), nav „Umów wizytę” + stopka z telefonem i godzinami; formularz kontaktu (wycinany przez `wp_kses_post`) zastąpiony kartą Booksy/tel/mail; opinie = 6 realnych z ZnanyLekarz + gwiazdki i źródło; 3 karty „Co nas wyróżnia” = copy Samanty; onkologia hero 130 i galeria bez zdjęcia piersi; blizny galeria = tylko blizny; kosmetologia hero 323 (ciemny, czytelny H1). Backup: `~/holi-acf-backup-samanta-20260910-132237` na serwerze (ACF JSON + `theme-before/`).
- ✅ 2.09 runda WA 26.08 (screeny + 7 filmów + 3 głosówki z `Downloads/samanta 2`); lokalne backupy ACF z 2.09/23.08 już nie istnieją.
- ✅ Kadry: hard-crop `sb_hero`/`sb_card` wyłączony w szablonach dziecka (pełny plik). Logo HOLIMEDICA ~72–96 px. Ścieżki na home w kolumnie.
- ✅ Hero/feat: brzuch-przed/po i Canva „CARE zapisz się” i cartoon plemniki zdjęte z nagłówków. Gabinet = **307**. Portret Samanty = **308**. Maszyna INDIBA = **331**. USG/Dermapen/biofeedback = **332–334**.
- ✅ Proces: 3 karty jej copy. Dno: kafelki Kobiety/Mężczyźni + rolka rozstępu tu (nie na fizjo). Laser: dermatozy w tytule i galerii. Kosmetologia: filar bez „leczenia dermatoz” (odesłanie na laser).
- ✅ Reel: przycisk „Włącz dźwięk” tylko na filmach z głosem (home, onkologia, dno, fizjo); autoplay nadal muted.
- ⛔ Brak talking-head: kosmetologia, proces, kontakt, menu; blizny/operacje/technologie mają tylko nieme slajdy Canva. Marka Holiestetyka vs Holimedica otwarta. Baner cookie (Cookie Law Info) zasłania pół ekranu na mobile — Samanta ogląda stronę przez niego.
- ⚠️ Telefon +48 668 492 862 i godziny (pon.–pt. 8–21, sob. 9–14) wzięte z publicznego profilu Fresha — potwierdzić z Samantą.
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
- **Realne profile:** Booksy `https://booksy.com/pl-pl/168253_holiestetyka-instytut-zdrowia-i-urody-leczenie-blizn_fizjoterapia_8820_krakow` (5,0 / 116 opinii), ZnanyLekarz `https://www.znanylekarz.pl/samanta-ziola/fizjoterapeuta/krakow` (5,0 / 48). Opinie na stronie = cytaty stamtąd (imię + inicjał).
- Treść z Lovable w polach `split` używa starych zmiennych (`--muted`, `--green`, `--line`, `--white`) — aliasy w `overrides.css` mapują je na `--c-*`. `wp_kses_post` wycina `<form>/<input>` — formularzy w polach WYSIWYG nie robić; gdyby był potrzebny: osobny szablon + handler.
- Zdjęcia: 232 = brzuch przed/po (modelowanie, INDIBA); 236/237/239/240 = ta sama pacjentka (modelowanie) → NIE do „blizn”; 233 klatka, 234 bark, 241 brzuch po plastyce, 128 blizna za uchem = blizny; 129 (pierś) — nie pokazywać; 308 = portret 290×700 (słaby plik, `holi_img_ar` kadruje od góry).
- Zrzuty full-page: Playwright (python) z `wait_until="load"` + blokada `*.mp4`; NIE używać `?s=` jako cache-bustera (to wyszukiwarka WP). Playwright zawyża `svh` — nakładanie menu na H1 w full-page to artefakt, sprawdzać w realnym viewporcie.

## Następny krok
Wysłać Samancie link z prośbą o sprawdzenie na telefonie po odświeżeniu i potwierdzenie telefonu/godzin (nie pisać „wszystko ogarnięte”). Potem od niej: brakujące filmiki (kosmetologia/proces/kontakt, talking-head o bliznach zamiast slajdów), lepszy portret (308 ma 290×700 px), decyzja o banerze cookie (zamienić na wąski pasek na dole). Marka — decyzja Adriana.

## Czego NIE robić
- Nie rsync lokalnego `Downloads/Samanta/holiestetyka-theme/` na prod.
- Nie rebrandować na Holimedica bez „tak”.
- Nie publikować identyfikowalnych twarzy pacjentek ani surowych filmów z piersiami.
- Nie wciskać tej samej rolki (laser/home) na kilka zakładek jako „powitanie specjalisty”.
- Nie wracać do Elementora / Lovable.
- Nie kasować na serwerze bez kopii i zgody. Aktualny backup na serwerze: `~/holi-acf-backup-samanta-20260910-132237`. Cofnięcie: `cp -r theme-before/* wp-content/themes/holiestetyka/` + `wp post meta update` z `page-N.json` / `wp option update` z `options.json`.
- Nie wracać do 2-kolumnowej galerii ani plakietki NA zdjęciu — Samanta: „okropnie duże”, „nie widać zdjęcia”.
- Nie wstawiać brzuchów z modelowania do sekcji „blizny” („Modelowanie sylwetki to jest”).
- Nie committować materiałów klienta (gitignor `Klienci/`).

## Artefakty
- Live: https://holiestetyka.pl — dziecko na serwerze: `themes/holiestetyka/{functions.php,assets/css/overrides.css,assets/js/reel-sound.js,template-parts/content/content-*.php}`; filmy `uploads/holi/*.mp4`
- `/Users/adrianmacbook2/Downloads/Samanta/` — folder roboczy (theme 24.06 stale); `theme-prod/` = kopia dziecka z 10.09 (functions.php z `holi_img_ar`, content-feat/author/combined/reel/testimonials, overrides.css, reel-sound.js)
- `uwagi-samanty-2026-07.md`, `materialy-mapa.md`, `wdrozenie/WDROZENIE.md`
- `/Users/adrianmacbook2/Downloads/WhatsApp Chat - Samanta Zioła 2/` — pełniejszy czat
- `/Users/adrianmacbook2/Downloads/samanta 2/` — runda 26.08 (screeny, 7 filmów, 3 głosówki)
- Transkrypcje: `inbox/samanta-transkrypcje/` (folder już nie istnieje — głosówki 26.08 leżą w `Downloads/samanta 2/*.ogg`)
- ACF backup: serwer `~/holi-acf-backup-samanta-20260910-132237` (page-*.json, options*.json, theme-before/); lokalne z 2.09/23.08 skasowane
- Media 2.09: 331 maszyna INDIBA, 332 USG, 333 Dermapen, 334 biofeedback

## Dziennik sesji
- 2026-09-10 — „Nadal są błędy” (WA 26.08 + 2.09 + 10.09): nagłówki pod menu, mniejsze H1, zdjęcia bez cropu z plakietką pod spodem, galerie 3–4 kol., reel w proporcji, 40 CTA → Booksy/tel, kontakt z telefonem/godzinami, realne opinie ZnanyLekarz, copy Samanty w wyróżnikach, galerie/hero bez złych kadrów, kosmetologia hero ciemne. Formularz kontaktu okazał się wycinany przez kses → karta kontaktu.
- 2026-09-02 — WA 26.08: screeny + 7 filmów laptopa + 3 głosówki. Zdjęto ucięte/obrzydliwe kadry z hero, logo większe, H1 mniejsze, dźwięk na rolkach, dno K/M, rozstęp z fizjo na dno, dermatozy na laser, sprzęt USG/Dermapen/biofeedback na technologiach. Nie pisać jej „gotowe na 100%”.
- 2026-08-23 — WA 22.08 (filmy powitalne + 3 wzory + czcionki). Wdrożono nagłówki ze zdjęciem, H1 mobile, talking-head na głównej/dnie/fizjo/onko, stock laser, grafiki feat. Nie każda zakładka ma specjalistę. Nie pisać jej „wszystko ogarnięte”.
- 2026-08-20 — `/pickup samanta`: odtworzono HANDOFF po skasowaniu 11.08. CTA puste, decyzja marki otwarta.
- 2026-07-14 — produkcja: copy WA+maile, media, logo Holimedica.
