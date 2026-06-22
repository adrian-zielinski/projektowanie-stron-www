# 🧑‍💻 Projektowanie stron WWW — instrukcja projektu

System Claude Code do projektowania i wdrażania wysoko konwertujących stron na WordPress jako **custom classic theme** (zero Elementora), od briefu do publikacji. Dla web-designerów robiących strony swoim klientom.

## Złota zasada

Pracujesz w pętli: **brief → architektura treści → design (akceptacja) → budowa motywu WordPress → SEO → QA → wdrożenie.** Najpierw odpala się dyrygent, skill `strona-od-briefu`, i prowadzi przez cały proces.

Zawsze pokaż projekt (sekcje + system wizualny) i uzyskaj akceptację, zanim zaczniesz kodować. Implementacja bez zaakceptowanego designu to zmarnowana praca.

## Jak zacząć (dla użytkownika)

1. Wypełnij brief: skopiuj `briefy/SZABLON-BRIEFU.md` i zapisz jako `briefy/<klient>.md`.
2. Powiedz: „zaprojektuj stronę wg briefu `briefy/<klient>.md`".
3. Reszta dzieje się fazami. Akceptujesz design, potem powstaje motyw i wdrożenie.

## Twarde reguły

- **Zero Elementora i builderów wizualnych.** Wygląd piszemy w kodzie (szablony PHP + HTML/CSS/JS). To cały sens projektu.
- **Design przed implementacją.** Sekcje, paleta, typografia, animacje, potem akceptacja, dopiero kod.
- **Copy przez `stop-slop`.** Każdy tekst na stronie i w komunikacji bez frazesów AI.
- **SEO wbudowane od startu**, nie doklejane na końcu: jedno H1 na stronę, semantyczny HTML, meta, schema JSON-LD.
- **Mobile-first, dostępność (WCAG AA), Core Web Vitals.** Animacje za bramką `prefers-reduced-motion`.
- **Weryfikuj, nie deklaruj.** Build motywu, screenshot porównany z projektem, Lighthouse, smoke-test formularzy. Pokaż dowód.

## Stack

WordPress (custom classic theme) · ACF (pola + Flexible Content zamiast buildera) · Tailwind CSS + Vite · animacje: GSAP + ScrollTrigger + Lenis + Lottie · cache: LiteSpeed · hosting domyślny: LH.pl (plan Mango: NVMe, SSH, LiteSpeed), działa też gdzie indziej. Local dev: LocalWP albo wp-env.

## Kiedy co wołać

| Sytuacja | Skill |
|---|---|
| Nowa strona / landing / sklep / portfolio; wrzucony brief | **`strona-od-briefu`** (dyrygent prowadzi cały proces) |
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

## Struktura

```
CLAUDE.md            ← ten plik (reguły + routing)
README.md            ← jak zacząć (dla użytkownika)
.claude/skills/      ← dyrygent + 5 specjalistów
briefy/              ← brief klienta (wejście)
wiedza/              ← SOP-y (źródło wiedzy)
szablony-startowe/   ← startowy custom theme
```
