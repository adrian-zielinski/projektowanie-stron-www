---
kind: handoff-topic
topic: samanta
status: in-progress
updated: 2026-08-20
---

# Holiestetyka — strona Samanty Zioły na WordPressie

> Zakres: motyw-dziecko, treści, media, logo, produkcja na LH. NIE obejmuje: Logistiq / Stitch B2B (`Klienci/STRONKA NOWA`).

## Aktualny stan
- ✅ Produkcja [holiestetyka.pl](https://holiestetyka.pl) działa (motyw `holiestetyka` + baza `studio-base`).
- ✅ Copy z maili i WhatsAppa (runda 29.06–10.07) wgrane: pinezkowanie, dno miednicy damskie i męskie, laseroterapia + dermatozy, INDIBA® 448 kHz, onkologia bez K-Laser/karboksy/Dermapen, pełne bio, fizjoterapia i kosmetologia z maili, galerie i reelsy.
- ✅ Logo z WhatsAppa 29.06 live w nagłówku (`custom_logo`, plik `holimedica-logo.png`) — to **HOLIMEDICA**, nie Holiestetyka.
- 🔄 Pickup 20.08: w tym repo nie było `HANDOFF/`; stan odtworzony z sesji Claude 14.07 + folderu roboczego. Czeka na decyzję marki.
- ⛔ Brak Booksy, telefonu, godzin. CTA „Umów konsultację” → `href="#"`. Opinie generyczne. Fonty z Google CDN.
- ⛔ Lokalny motyw w Downloads jest z **24.06** — starszy niż produkcja (lipiec). Nie wgrywać go na serwer.

## Kluczowe decyzje i ustalenia
- Źródło prawdy treści: maile + WhatsApp (eksport „Zioła 2” jest pełniejszy) + `uwagi-samanty-2026-07.md`.
- 10.07 Samanta: „Mamy komplet” / „Tak, odpalamy!”. Adrian wdrażał 14.07.
- Logo 00000649 to Holimedica — Instytut Zdrowia i Urody. Domena i copy = Holiestetyka. 14.07 na polecenie Adriana wpięto to logo 1:1 (docięta tylko pusta ramka).
- Zdjęcia twarzy pacjentek wymagają pisemnej zgody Samanty. Ciało/blizny bez twarzy: OK.
- `Klienci/Samanta/` z `wiedza/08` **nie istnieje**. Materiały: `/Users/adrianmacbook2/Downloads/Samanta/`. `Klienci/` jest w `.gitignore`.
- SSH produkcji: `ssh -i ~/.ssh/holi_lh_deploy -p 40022 serwer426465@serwer426465.lh.pl`. WP: `/home/platne/serwer426465/public_html/autoinstalator/holiestetyka.pl/wordpress154120`. Hasła nie prosić i nie zapisywać.
- Na zdjęciu `njnj/IMG_4484.jpeg` było hasło w kadrze — nie używać, Samanta ma zrotować.

## Następny krok
Decyzja Adriana: zostaje Holiestetyka w treści i domenie z logo Holimedica, czy strona idzie w rebrand na Holimedica? Potem: Booksy URL, telefon, godziny (CTA nadal martwe).

## Czego NIE robić
- Nie rsync/deploy lokalnego `Downloads/Samanta/holiestetyka-theme/` — nadpisze nowszą produkcję.
- Nie wstawiać Holimedica jako pełnego rebrandu (tytuł, schema, teksty) bez „tak”.
- Nie publikować identyfikowalnych twarzy bez zgody.
- Nie wracać do Elementora / przebudowy z Lovable. Kod Lovable to archiwum.
- Nie kasować nic na serwerze bez kopii i zgody.
- Nie committować materiałów klienta do tego repo (gitignor `Klienci/`, zdjęcia medyczne, czaty).

## Artefakty
- `/Users/adrianmacbook2/Downloads/Samanta/` — folder roboczy
- `/Users/adrianmacbook2/Downloads/Samanta/uwagi-samanty-2026-07.md` — poprawki WA + głosówki
- `/Users/adrianmacbook2/Downloads/Samanta/materialy-mapa.md` — media, zgody, wrażliwość
- `/Users/adrianmacbook2/Downloads/Samanta/wdrozenie/WDROZENIE.md` — paczka WP (zipy lokalne)
- `/Users/adrianmacbook2/Downloads/Samanta/holiestetyka-theme/` — dziecko, kopia 24.06 (stale vs prod)
- `/Users/adrianmacbook2/Downloads/Samanta/holi-importer/` — import 13 stron
- `/Users/adrianmacbook2/Downloads/Samanta/podglad-design/` — HTML podglądu
- `/Users/adrianmacbook2/Downloads/WhatsApp Chat - Samanta Zioła 2/` — pełniejszy czat (logo + głosówki do 10.07)
- Live: https://holiestetyka.pl
- Sesja Claude 14.07: `721b9915-5e22-4886-b384-43d01ff7243a` (ostatnie: logo live, pytanie „daj to logo”)
- Brak: `Klienci/Samanta/` (ścieżka z wiedzy systemu)

## Dziennik sesji
- 2026-08-20 — `/pickup samanta`: brak INDEX w repo (HANDOFF skasowany 11.08). Odtworzono stan z sesji 14.07 i Downloads. Live: logo Holimedica, copy OK, CTA puste. Czeka decyzja marki. Ten plik założony przy `/handoff`.
- 2026-07-14 — produkcja: copy WA+maile, media, potem logo Holimedica w nagłówku (desktop + mobile).
