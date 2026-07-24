# Projektowanie stron WWW — system dla web-designera

> 👉 **Początkujący? Zacznij od [`START-TUTAJ.md`](START-TUTAJ.md)** — prosty przewodnik krok po kroku, bez żargonu. Ten README jest bardziej szczegółowy.

System dla agenta AI, który prowadzi Cię od projektu graficznego (lub briefu klienta) do wdrożonej strony na WordPressie. Działa z **Google Antigravity (darmowy — instrukcje agenta w `AGENTS.md`)** oraz z **Claude Code (instrukcje w `CLAUDE.md`)**. Wygląd projektujesz za darmo w **Google Stitch** (albo w Claude/Lovable). Strona powstaje jako **własny motyw (custom classic theme)** — czysty kod PHP/HTML/CSS/JS, bez Elementora i innych page-builderów. Masz pełną kontrolę nad wyglądem, animacjami i wydajnością.

## Co to jest i co daje

To zestaw wiedzy i automatyzacji, który zamienia Claude Code w Twojego asystenta-projektanta. Wpisujesz brief, mówisz „zaprojektuj stronę" — i Claude prowadzi Cię przez cały proces: układa treść, projektuje wygląd do akceptacji, koduje motyw WordPress, dba o SEO i pomaga wdrożyć.

Co zyskujesz:
- **Powtarzalny proces** zamiast zaczynania za każdym razem od zera.
- **Strony, które konwertują** — wbudowana wiedza o hierarchii, hero, CTA, lejku.
- **Wygląd bez szablonowości** — system pilnuje, żeby strona nie wyglądała jak generyczny szablon AI.
- **Czysty kod do oddania** — custom theme, który łatwo utrzymać i rozbudować.

## Dla kogo

Dla początkującego web-designera, który robi strony klientom (firmowe, landingi, sklepy, kursy) i chce pracować szybciej oraz na wyższym poziomie. Nie musisz być programistą — Claude pisze kod, Ty podejmujesz decyzje i akceptujesz efekty. Przyda się podstawowa znajomość WordPressa.

## Jak zacząć — krok po kroku

1. **Skopiuj cały ten folder do siebie** (np. do katalogu z projektami). To Twoja kopia robocza — pracujesz na niej, oryginał zostaje czysty.
2. **Otwórz folder w Claude Code** (`claude` w terminalu, w katalogu projektu, lub przez interfejs).
3. **Wypełnij brief.** Skopiuj `briefy/SZABLON-BRIEFU.md` w folderze `briefy/` jako np. `briefy/klient-kowalski.md` i uzupełnij: cel strony, grupę docelową, zakres podstron, markę, referencje, hosting, deadline. Im konkretniej, tym lepszy efekt.
4. **Powiedz Claude:** „zaprojektuj stronę wg briefu". Odpali się skill `strona-od-briefu`, który poprowadzi resztę. Jeśli czegoś w briefie zabraknie — Claude dopyta, zanim ruszy.

> Nie masz pełnego briefu? Napisz po prostu „zróbmy stronę dla [klient]" — Claude przeprowadzi Cię przez krótki wywiad i spisze brief za Ciebie.

## Jak wygląda proces

```
Brief  →  Design do akceptacji  →  Custom theme WordPress  →  SEO  →  Wdrożenie
```

1. **Brief** — Claude czyta Twój brief (albo przeprowadza wywiad) i ustala cel oraz zakres.
2. **Design do akceptacji** — najpierw struktura i hierarchia treści, potem kierunek wizualny (paleta, typografia, układ, makieta). **Akceptujesz, zanim powstanie kod** — żadnego marnowania czasu na coś, co nie pasuje.
3. **Custom theme WordPress** — Claude koduje motyw: szablony, sekcje, pola edytowalne dla klienta, animacje. Wszystko w kodzie, zero buildera.
4. **SEO** — meta, nagłówki, struktura URL, mapa strony, schema, optymalizacja pod Core Web Vitals.
5. **Wdrożenie** — przeniesienie na hosting, podmiana adresów, testy, włączenie indeksacji. Z checklistą bezpieczeństwa i backupu. Na **LH.pl** idzie to prosto i szybko: włączasz SSH w panelu i wpuszczasz Claude **jednym wklejeniem komendy z kluczem** — całą stronę wgrywa za Ciebie, bez ręcznego dłubania w terminalu. Instrukcja krok po kroku (co kliknąć w panel.lh.pl, jakie dane podać): **`wiedza/09-wdrozenie-produkcja-lh-ssh.md`**. Zasada bezpieczeństwa: **nigdy nie podajesz hasła** — tylko host, port i login; resztę załatwia klucz.

Każdy etap kończy się efektem do akceptacji i checklistą jakości — nie przeskakujesz dalej, dopóki bramka nie jest zaliczona.

## Co trzeba mieć

- **Lokalny WordPress** do pracy nad stroną przed wdrożeniem:
  - **LocalWP** — najprostszy start, klik i gotowe (polecane na początek).
  - **wp-env** — dla bardziej zaawansowanych, sterowane z linii poleceń.
- **Node.js** — do budowania motywu (Claude używa go do kompilacji CSS/JS, np. Tailwind + Vite).
- **Hosting WordPress** na publikację — sprawdza się np. **LH.pl plan Mango** (NVMe, SSH, LiteSpeed), pod który system jest dostrojony. Każdy hosting WordPress z SSH zadziała.

To wszystko możesz doinstalować po drodze — Claude podpowie, kiedy czego potrzebujesz.

## Struktura folderu

| Element | Co zawiera |
|---|---|
| `CLAUDE.md` | Reguły projektu, które Claude czyta na starcie każdej rozmowy (m.in. zasada: zero Elementora, custom theme). |
| `.claude/skills/` | Skille — automatyzacje procesu. Główny to `strona-od-briefu` (dyrygent) plus specjaliści: design, SEO, WordPress, sklep, kursy. |
| `briefy/` | Szablon `SZABLON-BRIEFU.md` oraz wypełnione briefy klientów. Wejście do całego procesu. |
| `wiedza/` | Dokumenty SOP — z nich Claude czerpie reguły (web design, landing, e-commerce, kursy, SEO, stack, budowa skilli). |
| `szablony-startowe/` | Startowy custom theme (motyw WordPress) do skopiowania jako baza nowego projektu. |

## Gdzie szukać wiedzy

Wszystkie przewodniki SOP są w folderze `wiedza/`:

- `01-web-design-best-practices.md` — projektowanie wysoko konwertujących stron.
- `02-landing-page-konwersja.md` — landing page krok po kroku.
- `03-ecommerce-wg-branz.md` — sklepy WooCommerce wg branż.
- `04-sprzedaz-kursow-lms.md` — sprzedaż kursów i platformy LMS.
- `05-seo-on-page.md` — SEO on-page dla custom theme.
- `06-stack-technologiczny.md` — stack: custom theme, ACF, Tailwind, animacje, hosting.
- `07-jak-anthropic-buduje-skille.md` — jak rozwijać ten system.
- `08-praktyka-wp-narzedzia-workflow.md` — lekcje z praktyki: motyw baza+dziecko, Playground, workflow.
- `09-wdrozenie-produkcja-lh-ssh.md` — wdrożenie przez SSH na LH.pl.
- `10-migracja-z-generatora-na-wordpress.md` — przeniesienie strony z Claude design / Lovable na WP.

> ⚠️ **Te dokumenty są pisane dla Claude, nie dla Ciebie.** Są gęste i techniczne — Claude sięga do nich sam w trakcie pracy. **Nie musisz ich czytać.** Zajrzyj tylko, gdy z ciekawości chcesz zrozumieć „dlaczego" za jakąś decyzją. Jako początkujący trzymaj się [`START-TUTAJ.md`](START-TUTAJ.md).

---

**Zasada nadrzędna projektu:** każda strona powstaje jako custom classic theme WordPress, w kodzie. Bez Elementora, bez page-builderów wizualnych.
