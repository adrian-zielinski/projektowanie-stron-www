# 🧑‍💻 Projektowanie stron WWW — instrukcja projektu

System Claude Code do projektowania i wdrażania wysoko konwertujących stron na WordPress jako **custom classic theme** (zero Elementora), od briefu do publikacji. Dla web-designerów robiących strony swoim klientom.

## Złota zasada

Pracujesz w pętli: **brief → architektura treści → design (akceptacja) → budowa motywu WordPress → SEO → QA → wdrożenie.** Najpierw odpala się dyrygent, skill `strona-od-briefu`, i prowadzi przez cały proces.

Zawsze pokaż projekt (sekcje + system wizualny) i uzyskaj akceptację, zanim zaczniesz kodować. Implementacja bez zaakceptowanego designu to zmarnowana praca.

## Jak zacząć (dla użytkownika)

> **Dwa środowiska agenta:** kursanci pracują w **Google Antigravity** (darmowe; jego instrukcje = `AGENTS.md`, design robią w **Google Stitch**). Ten plik (`CLAUDE.md`) czyta Claude Code. Oba pliki opisują TEN SAM proces — zmiany w regułach wprowadzaj w obu.

Użytkownicy to często **początkujący, nietechniczni** ludzie (kursanci). Prosty przewodnik dla nich to **`START-TUTAJ.md`** — trzymaj się jego języka i kolejności, gdy ktoś jest zagubiony. Są dwie drogi wejścia:

- **Droga A — gotowy wygląd (ZIP / „Claude design" / Lovable):** użytkownik ma już design i chce go na WordPressie. Prowadź migrację na silnik `studio-base` wg `wiedza/10` (nie odpytuj z pełnego briefu; strukturę bierzesz z designu). Dyrygent `strona-od-briefu` rozpoznaje to wejście.
- **Droga B — od zera:** brief (`briefy/SZABLON-BRIEFU.md` → `briefy/<klient>.md`) albo krótki wywiad, potem „zaprojektuj stronę wg briefu…". Reszta dzieje się fazami: akceptujesz design, potem powstaje motyw i wdrożenie.

W obu drogach: motywu nie budujemy od zera — dostrajamy gotowy `studio-base` przez tokeny motywu-dziecka.

## Twarde reguły

- **Kod z generatora (Stitch `code.html`) = źródło prawdy — odwzoruj 1:1.** Nie wciskaj designu w sekcje bazy, gdy układ się nie zgadza — pisz szablony w motywie-dziecku. Każda sekcja i każdy tekst przeniesione; kolory/typografia z `tailwind.config` źródła; zdjęcia z CDN pobrane od razu (`szablony-startowe/narzedzia/stitch-assety.sh`); ikony identyczne; na końcu audyt 1:1 (zrzut vs `screen.png`). Pełny protokół: `wiedza/10`, reguła 0 w `AGENTS.md`.
- **Zero Elementora i builderów wizualnych.** Wygląd piszemy w kodzie (szablony PHP + HTML/CSS/JS). To cały sens projektu.
- **Design przed implementacją.** Sekcje, paleta, typografia, animacje, potem akceptacja, dopiero kod.
- **Copy przez `stop-slop`.** Każdy tekst na stronie i w komunikacji bez frazesów AI.
- **SEO wbudowane od startu**, nie doklejane na końcu: jedno H1 na stronę, semantyczny HTML, meta, schema JSON-LD.
- **Mobile-first, dostępność (WCAG AA), Core Web Vitals.** Animacje za bramką `prefers-reduced-motion`.
- **Weryfikuj, nie deklaruj.** Build motywu, screenshot porównany z projektem, Lighthouse, smoke-test formularzy. Pokaż dowód. Podgląd statyczny: walidacja strukturalna w Bash (jeden H1, martwe linki, emoji), audyt overflow przez `preview_eval`, cache-busting `?v=N`. Motyw WP: weryfikuj lokalnie na WordPress Playground (`wiedza/08`).
- **Reużywalny motyw baza+dziecko.** Marka (paleta/fonty/zdjęcia/treść) żyje TYLKO w motywie-dziecku; baza zostaje neutralna i wielokrotnego użytku → minimalizacja tokenów u kolejnego klienta. Szczegóły: `wiedza/08`.
- **Materiały klienta przerób w całości najpierw.** Czat + WSZYSTKIE głosówki (`.opus` → `afconvert` + `whisper-cli`, bo `ffmpeg` bywa zepsuty) + zdjęcia (klasyfikacja z flagą wrażliwości) — tam są realne ustalenia i akceptacje. Przepis: `wiedza/08`.
- **Wdrożenie = SSH kluczem, nie hasłem.** NIGDY nie wpisuj hasła klienta (SSH/FTP/baza/panel) — dostęp wyłącznie przez klucz SSH; klient nie wkleja hasła do czatu, podaje tylko host/port/login. Daj klientowi spersonalizowaną instrukcję „włącz SSH (panel.lh.pl → Serwery → Ustawienia → dostęp SSH) + wklej jedną komendę z kluczem", potem wgrywaj wp-cli wg sprawdzonej sekwencji. Produkcja po wyraźnym „tak". Cała procedura + pułapki: `wiedza/09`.

## Stack

WordPress (custom classic theme) · pola + Flexible Content zamiast buildera: **Secure Custom Fields (SCF) — DARMOWY** (oficjalny fork WordPress.org z funkcjami dawnego ACF Pro: Flexible Content, Repeater, strony opcji; API zgodne `acf_*`/`get_field`) lub ACF Pro; darmowe „Advanced Custom Fields" NIE wystarcza (brak flexible/repeater). **Pola „obraz" podpinaj po attachment ID** (SCF/Pro je przetwarza), nie po URL. · Tailwind CSS + Vite **lub** bespoke CSS (gdy design jest hand-coded, Tailwind to zbędny refaktor) · animacje: GSAP + ScrollTrigger + Lenis + Lottie (gotowy toolkit „motion" → `wiedza/08`) · cache: LiteSpeed · hosting domyślny: LH.pl (plan Mango: NVMe, SSH, LiteSpeed), działa też gdzie indziej. Local dev: LocalWP albo wp-env, a gdy ich brak — **WordPress Playground** (`npx @wp-playground/cli server`, lokalny WP bez Dockera; przepis w `wiedza/08`).

**Reużywalność — model domyślny (NIE buduj motywu od zera per klient):** **motyw-baza** brandless (silnik + biblioteka sekcji ACF Flexible Content + CSS ze zmiennymi semantycznymi `--c-*`/`--font-*` w neutralnych defaultach + JS toolkit) → `szablony-startowe/studio-base/`; **motyw-dziecko per klient** = tylko tokeny marki (`tokens.css`) + treść przez ACF. Pełny opis: `wiedza/08`.

## Kiedy co wołać

| Sytuacja | Skill |
|---|---|
| Nowa strona / landing / sklep / portfolio; wrzucony brief | **`strona-od-briefu`** (dyrygent prowadzi cały proces) |
| Przeniesienie istniejącej strony (Claude design / Lovable / inny generator) na WP | **`wordpress-budowa`** + wiedza `10-migracja-z-generatora-na-wordpress.md` |
| Wygląd, makieta, paleta, typografia, animacje | **`web-design-anti-slop`** |
| Nagłówki H1–H6, meta, schema, widoczność w Google | **`seo-techniczne-onpage`** |
| Budowa motywu, ACF, Tailwind/Vite, deploy na WordPress | **`wordpress-budowa`** |
| Sklep internetowy | **`woocommerce-sklep`** |
| Kursy online / platforma / membership | **`kursy-lms`** |

Skille globalne Claude Code, które włączasz w fazie projektu i copy:
- Design: `frontend-design`, `ui-ux-pro-max`, `design-taste-frontend`, `theme-factory`. Przeróbki istniejących stron: `redesign-existing-projects`.
- Tekst: `stop-slop`. Testy w przeglądarce: `webapp-testing`. Rozwój własnych skilli: `skill-creator`.

## Wiedza (SOP-y)

Szczegóły każdego tematu w `wiedza/`:
- `01-web-design-best-practices.md` — zasady wysoko konwertującego designu + anti-slop
- `02-landing-page-konwersja.md` — landing page i CRO
- `03-ecommerce-wg-branz.md` — sklepy wg branż + WooCommerce
- `04-sprzedaz-kursow-lms.md` — sprzedaż kursów + wybór LMS
- `05-seo-on-page.md` — SEO on-page i techniczne
- `06-stack-technologiczny.md` — custom theme, Tailwind/Vite, animacje, deploy
- `07-jak-anthropic-buduje-skille.md` — jak rozwijać ten system
- `08-praktyka-wp-narzedzia-workflow.md` — **lekcje z praktyki**: reużywalny motyw baza+dziecko, WordPress Playground (lokalny WP bez Dockera), transkrypcja głosówek klienta, wielo-agentowe workflow, toolkit animacji, QA podglądu (overflow/cache-busting), galerie efektów + wrażliwość
- `09-wdrozenie-produkcja-lh-ssh.md` — **wdrożenie na LH przez SSH krok po kroku**: instrukcja DLA KLIENTA (włącz SSH w panel.lh.pl + wpuść asystenta kluczem), sprawdzona sekwencja wp-cli (motyw→ACF→importer→permalinki→media), weryfikacja z zewnątrz, pułapki (rozjechane hasło bazy = 500, DirectAdmin :2222 zablokowany, PHP z phpMyAdmin ≠ PHP strony, ffmpeg/libx265, ścieżka WP w autoinstalatorze)
- `10-migracja-z-generatora-na-wordpress.md` — **przeniesienie gotowej strony** z Claude design / Lovable / v0 / Bolt na silnik `studio-base` (baza+dziecko): ekstrakcja tokenów → mapowanie sekcji → treść do SCF/ACF → przekierowania 301 → deploy
- `11-rezerwacje-ical-booking.md` — **rezerwacje + synchronizacja kalendarza z Booking.com** (iCal, dwukierunkowo): gotowa wtyczka w `szablony-startowe/wtyczki/rezerwacje-ical/`

## Struktura

```
CLAUDE.md            ← ten plik (reguły + routing)
README.md            ← jak zacząć (dla użytkownika)
.claude/skills/      ← dyrygent + 5 specjalistów
briefy/              ← brief klienta (wejście)
wiedza/              ← SOP-y (źródło wiedzy)
szablony-startowe/   ← startowy custom theme
```
