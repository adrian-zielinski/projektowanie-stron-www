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
- ✅ **10.09 (runda 5, wieczór) — PANEL DLA SAMANTY w WP Admin**. Po jej „Źle wszystko" i ustaleniu Adriana, że sama powstawia zdjęcia. Konto **`samanta`** (ID 2), rola **`holi_owner`** = redaktor + `upload_files` + `edit_theme_options`, bez `manage_options`, wtyczek, motywów, użytkowników i edytora plików.
  **Co widzi:** Kokpit z kafelkami 13 stron („Edytuj" / „Zobacz") i trzema krokami · Strony · Media · „Ustawienia strony" (telefon, godziny, Booksy) · „📖 Jak edytować" (11 rozdziałów po polsku) · Profil. Reszta menu ukryta, wejście na `themes.php`/`acf-field-group`/`plugins.php` itd. odbite.
  **Sekcje po ludzku:** każdy zwinięty pasek ma miniaturę zdjęcia, ikonę, przyjazną nazwę typu i nagłówek („🖼 Nagłówek strony · Blizny — kompleksowa terapia"). Etykiety pól po polsku („Mały napis nad nagłówkiem" zamiast „Eyebrow"). Pola techniczne (okruszki, kotwica) schowane przed nie-adminem klasą CSS, nie `return false` — twarde ukrycie kasowało wartość przy zapisie.
  **Trzy nowe sekcje** do wstawiania między teksty: **Zdjęcie** (wąskie/szerokie/pełna szerokość), **Zdjęcia obok siebie** (2–4 w rzędzie, 2 kolumny na telefonie), **Film** (sam film, korzysta z `reel-sound.js`). Klucze stałe: `layout_holi_image|images|video`, pola `field_holi_*`. W menu „Dodaj sekcję" stoją na górze.
  **Wyłączony Gutenberg dla stron** — to było krytyczne: w edytorze blokowym sekcje ACF lądowały w zwiniętym panelu „Metaboksy" na dole, Samanta zobaczyłaby pusty ekran z „Witaj w edytorze". Teraz klasyczny edytor, sekcje są jedyną rzeczą na ekranie; ukryte pole treści, adres strony (slug), atrybuty i opcje publikacji.
  **Infrastruktura:** Cache Enabler czyści cache po zapisie strony (było wyłączone — Samanta nie zobaczyłaby swoich zmian!) · `DISALLOW_FILE_EDIT` · **strona przeniesiona na HTTPS** (`siteurl`/`home`, `FORCE_SSL_ADMIN`, przekierowanie 301 w `.htaccess`, `wp search-replace` 26 podmian) — wcześniej logowanie szłoby po http jawnym tekstem · „Przykładowa strona" do kosza.
  **Backup:** `~/holi-acf-backup-samanta-20260910-132237/r6-panel/` (motyw sprzed zmian, meta 13 stron, `wp-config` przed i po, `.htaccess`, zrzut bazy `db-przed-https.sql`).
  **Test jako Samanta** (ciasteczko z wp-cli, 390×844 i 1440×950): menu ograniczone, 13 kafelków, 15 sekcji z 36 miniaturami, przycisk „Dodaj sekcję", pomoc 11 rozdziałów, blokady działają, zero błędów JS. Render nowych sekcji sprawdzony na stronie roboczej (potem skasowanej): zero przewijania poziomego, zdjęcia w pełnym kadrze, siatka 2/3 kolumny, film gra z proporcją z pliku.
- ✅ **10.09 (runda 4, 14:45–15:15) — audyt „czy coś nachodzi / czy widać całe zdjęcia"**. Sprawdzone programowo na 390×844 i 375×667, 26 przebiegów: **nachodzenie elementów** (parami, z `elementFromPoint` żeby odsiać ukryte), **tekst przycięty** przez `overflow:hidden`, **czcionki < 11,5 px**, **ile procent kadru zdjęcia widać** przy `object-fit:cover`, **stan filmów** (proporcja, odtwarzanie, `readyState`, przycisk dźwięku).
  Znalezione i naprawione: (1) na onkologii podpis galerii nachodził na notkę o zgodzie pacjentów → `margin-top` na notce; (2) hero na home pokazywał **29% kadru** (poziome 3:2 w pionowym kontenerze 404×913) i wyglądał jak brązowa plama → nowe zdjęcie 347 w proporcji **4:5**, widać 55% na telefonie i 50% na desktopie; (3) laseroterapia i operacje dostały kadry 4:5 (348, 349); (4) onkologia (plik 1179×771, nie da się poprawić proporcji) → `body.page-id-11 .subhero__img{object-position:25% 30%}`, dzięki czemu w wąskim kadrze widać całą sylwetkę; (5) czcionki 11 px → 12 px na telefonie (ścieżki hero, `.filar__tag`, `.tag`, podpisy galerii, `.eyebrow`).
  **Filmy: wszystkie 9 bez zarzutu** — grają, `readyState=4`, widać 100% kadru (JS ustawia `aspect-ratio` z pliku), przycisk dźwięku tylko na 4 z głosem (home, onkologia, dno ×2).
  Fałszywe alarmy, nie poprawiać: `a 11px` to breadcrumb `.crumb`, który na mobile ma `display:none`; `section.hero` „przycięte 25 px" to `hero__img` ze `scale(1.06)` z animacji, celowo cięty przez `overflow:hidden`.
- ✅ **10.09 (runda 3, 14:10–14:45)** — zdjęcia hero + QA mobilne. **9 nowych hero z Pexels** (darmowa licencja komercyjna, bez atrybucji), wybrane BEZ rozpoznawalnych twarzy: home 336 (dłonie na plecach), blizny 337, operacje 338 (drenaż nogi), fizjo 339, kosmetologia 340 (rękawiczka + urządzenie), technologie 341 (gabinet z aparaturą), INDIBA 342 (głowica na plecach), dno 343, kontakt 344. Wszystkie 1800×1200 (3:2 — mniej przycina na telefonie niż 5:2). Zdjęcie 307 (576 px, rozmyte) i 308/320 (pracownica) **nie są już nigdzie używane**. Feat: home author 345, proces 346, proces diagnostyka 324, dno wyróżnik 334. OG image = 336.
  **Naprawione błędy mobilne:** (1) baner cookie CookieYes zajmował 46–62% ekranu → 24–30%, przyciski w rzędzie, opis przewijalny; (2) menu mobilne na iPhone SE (667 px) nie mieściło się i **nie dawało się przewinąć** — `nav` miał `flex:1` + `justify:center` i przycinał listę zamiast rozpychać kontener → `flex:0 0 auto` + `margin:auto 0` + `overflow-y:auto` na `.mobile`; (3) „Specjalizacje" w menu mobilnym to martwy link `href="#"` → nieklikalny nagłówek grupy; (4) długi H1 na dnie miednicy wchodził pod menu → `.subhero` na mobile `align-items:flex-start` + `padding-top:104px`. Backup: `~/holi-acf-backup-samanta-20260910-132237/r3/` i `/r4/`.
  **QA:** 13 podstron × 2 rozmiary telefonu (390×844, 375×667) = 26 przebiegów, **0 uwag**: brak przewijania poziomego, brak zepsutych i za małych obrazów, po jednym H1, filmy mają źródło, brak błędów JS, CTA Booksy/telefon obecne.
- ✅ **10.09 (runda 2, 13:50–14:10)** po 4 nowych uwagach: **308/320 = PRACOWNICA z filmu, nie Samanta** — zdjęte ze wszystkich sekcji „Mgr Samanta Zioła” (home author, proces, fizjo, kosmetologia, kontakt hero+feat); zamiast tego **335** = kadr „terapia manualna blizny” (dłonie, bez twarzy) wycięty z makiety jej graficzki (`Grafiki od graficzki/…11.41.39.jpeg`). 307 (gabinet, też z makiety graficzki — AI) max 1× na stronę: home hero, blizny hero, proces feat, dno feat, fizjo hero, kontakt hero; reszta → 332 USG / 333 Dermapen / 334 biofeedback / 321 / 327. Blizny combined „Terapie łączone” = 335 (1:1 z jej makietą). Pacjentka onkologiczna (233) tylko w onkologii; modelowanie sylwetki (239/240) poza operacjami → 240 w INDIBA. Galerie: kafle ~200 px (`minmax(190px)`, max-width 1120). Home hero: treść od góry pod menu (H1 chował się pod logo), ścieżki w 2 równych kolumnach na desktopie. Backup: `~/holi-acf-backup-samanta-20260910-132237/r2/`.
- ✅ **10.09 (runda 1)** „nadal są błędy”: nagłówki podstron zaczynają się pod stałym menu (desktop H1 wjeżdżał pod logo/breadcrumb), H1 mniejsze; zdjęcia feat/author/combined w proporcji pliku (`--ar` z PHP, `holi_img_ar()`), plakietka POD zdjęciem; galerie 3–4 kolumny desktop / 2 mobile, kafle 4:5 contain; reel w proporcji filmu (slajdy Canva 4:5 nieobcinane), przycisk dźwięku tylko gdy audio; **CTA działają** (40× `#` → Booksy/tel), nav „Umów wizytę” + stopka z telefonem i godzinami; formularz kontaktu (wycinany przez `wp_kses_post`) zastąpiony kartą Booksy/tel/mail; opinie = 6 realnych z ZnanyLekarz + gwiazdki i źródło; 3 karty „Co nas wyróżnia” = copy Samanty; onkologia hero 130 i galeria bez zdjęcia piersi; blizny galeria = tylko blizny; kosmetologia hero 323 (ciemny, czytelny H1). Backup: `~/holi-acf-backup-samanta-20260910-132237` na serwerze (ACF JSON + `theme-before/`).
- ✅ 2.09 runda WA 26.08 (screeny + 7 filmów + 3 głosówki z `Downloads/samanta 2`); lokalne backupy ACF z 2.09/23.08 już nie istnieją.
- ✅ Kadry: hard-crop `sb_hero`/`sb_card` wyłączony w szablonach dziecka (pełny plik). Logo HOLIMEDICA ~72–96 px. Ścieżki na home w kolumnie.
- ✅ Hero/feat: brzuch-przed/po i Canva „CARE zapisz się” i cartoon plemniki zdjęte z nagłówków. Gabinet = **307** (AI z makiety graficzki). **308/320 = pracownica, NIE Samanta — nie używać jako jej portret.** Terapia manualna (dłonie, kadr z makiety) = **335** (tylko blizny + fizjo). Hero podstron = 336–344 (Pexels). Maszyna INDIBA = **331**. USG/Dermapen/biofeedback = **332–334**.
- ✅ Proces: 3 karty jej copy. Dno: kafelki Kobiety/Mężczyźni + rolka rozstępu tu (nie na fizjo). Laser: dermatozy w tytule i galerii. Kosmetologia: filar bez „leczenia dermatoz” (odesłanie na laser).
- ✅ Reel: przycisk „Włącz dźwięk” tylko na filmach z głosem (home, onkologia, dno, fizjo); autoplay nadal muted.
- ⛔ Brak talking-head: kosmetologia, proces, kontakt, menu; blizny/operacje/technologie mają tylko nieme slajdy Canva. Marka Holiestetyka vs Holimedica otwarta. Baner cookie (Cookie Law Info) zasłania pół ekranu na mobile — Samanta ogląda stronę przez niego.
- ⚠️ Telefon +48 668 492 862 i godziny (pon.–pt. 8–21, sob. 9–14) wzięte z publicznego profilu Fresha — potwierdzić z Samantą.
- ⛔ `Downloads/Samanta/holiestetyka-theme/` z 24.06 — nie wgrywać.

## Kluczowe decyzje i ustalenia
- **10.09 wieczór, Samanta: „Źle wszystko" + „Zdjęcia są złe".** Adrian: „Może sama wstawisz odpowiednie zdjęcia w odpowiednie miejsca? Dam Ci panel." Ona: „No! Mega". Prosiła o możliwość wstawiania **większej liczby zdjęć pomiędzy tekstami** — stąd sekcje „Zdjęcie" i „Zdjęcia obok siebie". Nie dobieramy już zdjęć za nią; ona układa, my dajemy narzędzie.
- Panel: pliki `holiestetyka/inc/{admin-panel,acf-ux,acf-layouts}.php` + `assets/css/{admin-acf,blocks}.css`, spięte w `functions.php` pętlą z `file_exists` (brak pliku nie wywala strony). Wdrożenie: `scratchpad/deploy-panel.sh` — najpierw pliki, `php -l` NA SERWERZE, dopiero potem `functions.php`.
- Layouty dokładane przez `acf/load_field` (priorytet 5, przed `acf-ux` na 10) **muszą przejść przez `acf_get_valid_field()`** i dostać `parent`/`parent_layout`/`_name` — inaczej SCF rzuca „Undefined array key _name" i nie mapuje wartości do wiersza.
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
Wysłać Samancie link z prośbą o sprawdzenie na telefonie po odświeżeniu i potwierdzenie telefonu/godzin (nie pisać „wszystko ogarnięte”). **Poprosić ją o własne zdjęcie (portret) i 2–3 zdjęcia gabinetu** — hero mają teraz stock z Pexels, jej własne zdjęcia byłyby mocniejsze — bez tego sekcje „Mgr Samanta Zioła” mają zdjęcie dłoni/terapii, a hero powtarzają jedną grafikę AI. Potem: brakujące filmiki (kosmetologia/proces/kontakt, talking-head o bliznach zamiast slajdów), decyzja o banerze cookie (zamienić na wąski pasek na dole). Marka — decyzja Adriana.

## Czego NIE robić
- Nie włączać z powrotem Gutenberga dla stron — sekcje ACF wpadają do zwiniętych „Metaboksów" i klientka widzi pusty ekran.
- Nie ukrywać pól ACF przez `return false` w `acf/prepare_field` — wartość ginie przy zapisie. Ukrywaj klasą CSS.
- Nie dawać Samancie roli administratora ani `manage_options`.
- Nie zmieniać kluczy `layout_holi_*` / `field_holi_*` — pod nimi siedzą jej treści.
- Nie rsync lokalnego `Downloads/Samanta/holiestetyka-theme/` na prod.
- Nie rebrandować na Holimedica bez „tak”.
- Nie publikować identyfikowalnych twarzy pacjentek ani surowych filmów z piersiami.
- Nie wciskać tej samej rolki (laser/home) na kilka zakładek jako „powitanie specjalisty”.
- Nie wracać do Elementora / Lovable.
- Nie kasować na serwerze bez kopii i zgody. Aktualny backup na serwerze: `~/holi-acf-backup-samanta-20260910-132237`. Cofnięcie: `cp -r theme-before/* wp-content/themes/holiestetyka/` + `wp post meta update` z `page-N.json` / `wp option update` z `options.json`.
- Nie wracać do 2-kolumnowej galerii ani plakietki NA zdjęciu — Samanta: „okropnie duże”, „nie widać zdjęcia”.
- Nie wstawiać brzuchów z modelowania do sekcji „blizny” ani „operacje” („Modelowanie sylwetki to jest”); 233 (klatka) = pacjentka onkologiczna → tylko onkologia.
- Nie podpisywać 308/320 jako Samanty („Ponownie to samo zdjęcie mojej pracownicy!!!”). Nie dawać tego samego zdjęcia dwa razy na jednej podstronie („To samo zdjęcie????”).
- Nie centrować treści hero w pionie — przy 7 ścieżkach wypycha H1 pod logo. To samo dotyczy `.subhero` na mobile (`align-items:flex-end` + długi H1 = tytuł pod menu).
- Nie dawać `nav` w menu mobilnym `flex:1` ani `justify-content:center` — przycina listę i blokuje przewijanie na telefonach 667 px.
- Nie używać 307 (576 px), 308 ani 320 (pracownica) — wycofane z całej strony.
- Zdjęcia hero rób w **4:5**, nie 3:2 ani 5:2. Kontener hero na telefonie jest wysoki (404×913), na desktopie szeroki (1440×900) — 4:5 to jedyna proporcja, przy której oba widoki pokazują ~50%+ kadru. Przy 3:2 na telefonie widać 29%.
- Sprawdzając stronę nie ufaj samemu „brak overflow" — licz też ile procent kadru zdjęcia widać (`object-fit:cover`), czy elementy z tekstem nie nachodzą na siebie i czy filmy mają `readyState>=3`. Skrypt: `scratchpad/qa2/check.js` w tej sesji.
- `window.scrollTo(0,0)` nie działa na tej stronie (Lenis) — zrzuty „od góry" rób na świeżo wczytanej stronie, bez przewijania.
- Nie committować materiałów klienta (gitignor `Klienci/`).

## Artefakty
- Live: https://holiestetyka.pl — dziecko na serwerze: `themes/holiestetyka/{functions.php,assets/css/overrides.css,assets/js/reel-sound.js,template-parts/content/content-*.php}`; filmy `uploads/holi/*.mp4`
- `/Users/adrianmacbook2/Downloads/Samanta/` — folder roboczy (theme 24.06 stale); `theme-prod/` = kopia dziecka z 10.09 (functions.php z `holi_img_ar`, content-feat/author/combined/reel/testimonials, overrides.css, reel-sound.js)
- `uwagi-samanty-2026-07.md`, `materialy-mapa.md`, `wdrozenie/WDROZENIE.md`
- `/Users/adrianmacbook2/Downloads/WhatsApp Chat - Samanta Zioła 2/` — pełniejszy czat
- `/Users/adrianmacbook2/Downloads/samanta 2/` — runda 26.08 (screeny, 7 filmów, 3 głosówki)
- Transkrypcje: `inbox/samanta-transkrypcje/` (folder już nie istnieje — głosówki 26.08 leżą w `Downloads/samanta 2/*.ogg`)
- ACF backup: serwer `~/holi-acf-backup-samanta-20260910-132237` (page-*.json, options*.json, theme-before/); lokalne z 2.09/23.08 skasowane
- Media 2.09: 331 maszyna INDIBA, 332 USG, 333 Dermapen, 334 biofeedback; 10.09: 335 terapia manualna blizny (kadr z makiety graficzki, 664×956)
- Makiety graficzki (źródło 307 i 335): `Downloads/Samanta/Grafiki od graficzki/WhatsApp Image 2026-06-12 at 11.41.39.jpeg` (Terapie łączone) i `…11.41.45.jpeg` (Co nas wyróżnia)

## Dziennik sesji
- 2026-09-10 (5) — panel w WP Admin dla Samanty: konto `samanta`/rola `holi_owner`, uproszczone menu, kokpit z kafelkami stron, instrukcja po polsku, czytelne sekcje z miniaturami, trzy nowe sekcje (Zdjęcie / Zdjęcia obok siebie / Film), klasyczny edytor zamiast Gutenberga. Przy okazji: cache po zapisie (był wyłączony), HTTPS na całej stronie, blokada edytora plików. Trzy agenty Opus 5 pisały równolegle, koordynacja i integracja po mojej stronie.
- 2026-09-10 (4) — audyt nachodzenia, czytelności i kadrowania na mobile (26 przebiegów, 2 rozmiary telefonu). Naprawione: nachodzenie podpisu na onkologii, hero home z 29% na 55% kadru, kadry lasera i operacji, kadr onkologii, czcionki 11→12 px. Filmy sprawdzone: 9/9 gra i widać cały kadr.
- 2026-09-10 (3) — 9 nowych hero z Pexels (bez twarzy, 3:2, 1800×1200) zamiast rozmytego 307 i pustych kadrów. Naprawiony baner cookie (62%→30% ekranu) i menu mobilne, które na iPhone SE nie dawało się przewinąć. QA: 26 przebiegów, 0 uwag. Brak klucza do generatora obrazów (GOOGLE_API_KEY) — stąd stock zamiast generowania.
- 2026-09-10 (2) — 4 uwagi WA 11:49–11:52: pracownica zamiast Samanty, powtórki 307, onkologiczna w bliznach, modelowanie w operacjach, „mega duże” zdjęcia. Podmiany zdjęć na 9 stronach, nowy kadr 335, galerie ~200 px, hero home pod menu. Brak zdjęcia Samanty — trzeba o nie poprosić.
- 2026-09-10 — „Nadal są błędy” (WA 26.08 + 2.09 + 10.09): nagłówki pod menu, mniejsze H1, zdjęcia bez cropu z plakietką pod spodem, galerie 3–4 kol., reel w proporcji, 40 CTA → Booksy/tel, kontakt z telefonem/godzinami, realne opinie ZnanyLekarz, copy Samanty w wyróżnikach, galerie/hero bez złych kadrów, kosmetologia hero ciemne. Formularz kontaktu okazał się wycinany przez kses → karta kontaktu.
- 2026-09-02 — WA 26.08: screeny + 7 filmów laptopa + 3 głosówki. Zdjęto ucięte/obrzydliwe kadry z hero, logo większe, H1 mniejsze, dźwięk na rolkach, dno K/M, rozstęp z fizjo na dno, dermatozy na laser, sprzęt USG/Dermapen/biofeedback na technologiach. Nie pisać jej „gotowe na 100%”.
- 2026-08-23 — WA 22.08 (filmy powitalne + 3 wzory + czcionki). Wdrożono nagłówki ze zdjęciem, H1 mobile, talking-head na głównej/dnie/fizjo/onko, stock laser, grafiki feat. Nie każda zakładka ma specjalistę. Nie pisać jej „wszystko ogarnięte”.
- 2026-08-20 — `/pickup samanta`: odtworzono HANDOFF po skasowaniu 11.08. CTA puste, decyzja marki otwarta.
- 2026-07-14 — produkcja: copy WA+maile, media, logo Holimedica.
