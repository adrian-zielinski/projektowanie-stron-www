# Jak Anthropic buduje świetne skille i projekty dla Claude Code

> SOP do zbudowania naszego systemu Claude Code (projektowanie i wdrażanie stron WordPress) zgodnie z najlepszymi praktykami Anthropic. Oparty na oficjalnej dokumentacji, engineering blogu Anthropic, repo `anthropics/skills` i lokalnym skillu `skill-creator`.
>
> Data researchu: 22.06.2026. Źródła na końcu.

---

## TL;DR — 12 zasad, które realnie podnoszą jakość

1. **Skill = onboarding nowego pracownika.** Pakujesz wiedzę proceduralną (instrukcje + skrypty + materiały), nie encyklopedię. Claude i tak dużo umie — w skillu zapisuj tylko to, co **odpycha go od domyślnych zachowań**.
2. **`description` to wyzwalacz (trigger), nie opis.** Decyduje, czy Claude w ogóle sięgnie po skill. Pisz: *co robi* + *kiedy użyć* (konkretne frazy/konteksty). Bądź lekko „nachalny", bo Claude domyślnie **niedotryguje** skille.
3. **Progressive disclosure (ujawnianie stopniowe).** Trzy poziomy ładowania: metadane → ciało `SKILL.md` → pliki `references/`. Krótki rdzeń, reszta na żądanie. Kontekst to zasób skończony.
4. **`SKILL.md` < ~500 linii.** Gdy puchnie — tnij na `references/` i wskazuj, kiedy je czytać.
5. **CLAUDE.md zwięzły i karny.** Test każdej linijki: *„Czy jej usunięcie spowoduje błąd Claude'a?"* Jeśli nie — wytnij. Przeładowany CLAUDE.md sprawia, że Claude **ignoruje połowę reguł**.
6. **Skrypt > generowanie tokenami** dla rzeczy deterministycznych (sortowanie, walidacja, generowanie plików). Napisz raz, wsadź do `scripts/`.
7. **Wyjaśniaj DLACZEGO, nie waląc CAPS-ami.** Modele są mądre, mają theory of mind. Twarde `ZAWSZE`/`NIGDY` to żółta flaga — przeramuj na powód.
8. **„Right altitude" instrukcji.** Nie hardkoduj kruchej logiki krok-po-kroku ani nie dawaj mglistych ogólników. Cel: dość konkretne, by sterować, dość elastyczne, by dać heurystyki.
9. **Ewaluacja najpierw.** Buduj skille na podstawie zaobserwowanych braków (puść Claude'a na realne zadania, patrz gdzie się wykłada), nie z wyobrażeń.
10. **Daj Claude'owi sposób na weryfikację.** Test, build, screenshot do porównania. Bez tego „wygląda na skończone" to jedyny sygnał, a Ty jesteś pętlą kontroli.
11. **Subagenci do researchu.** Czytają dużo plików w osobnym oknie kontekstu i zwracają podsumowanie — Twój główny kontekst zostaje czysty.
12. **Iteruj na kilku przykładach, ale generalizuj.** Skill ma działać na tysiącach przyszłych zleceń, nie na 3 testowych. Unikaj przeuczenia (overfittu).

---

## Część 1 — Anatomia świetnego `SKILL.md`

### 1.1 Struktura folderu skilla

```
nazwa-skilla/
├── SKILL.md            (wymagany)
│   ├── frontmatter YAML (name, description — wymagane)
│   └── instrukcje Markdown
└── zasoby (opcjonalne)
    ├── scripts/        — kod wykonywalny do zadań deterministycznych/powtarzalnych
    ├── references/     — dokumenty ładowane do kontekstu na żądanie
    └── assets/         — pliki używane w wyniku (szablony, ikony, fonty)
```

Skill jest **samowystarczalny** — jeden folder, wszystko w środku. W Claude Code wrzucasz go do `.claude/skills/`.

### 1.2 Frontmatter — dwa pola, które decydują o wszystkim

```yaml
---
name: nazwa-skilla            # małe litery, myślniki zamiast spacji
description: Co robi skill ORAZ kiedy go użyć (konkretne triggery).
---
```

**`name`** — unikalny identyfikator, `lowercase-z-myslnikami`.

**`description`** — to **podstawowy mechanizm tryggerowania**. Tylko `name` + `description` są zawsze w kontekście (ładowane do system promptu na starcie). Na tej podstawie Claude decyduje, czy w ogóle otworzyć skill. Dlatego `description` musi zawierać:
- **co** skill robi,
- **kiedy** go użyć — konkretne frazy użytkownika i konteksty.

Cała wiedza „kiedy używać" idzie do `description`, nie do ciała.

**Zasada „lekkiej nachalności".** Claude ma tendencję do *niedotryggerowania* skilli (nie używa ich, gdy by się przydały). Walcz z tym:

> ❌ Słabo: `How to build a simple fast dashboard to display internal data.`
>
> ✅ Dobrze: `How to build a simple fast dashboard... Make sure to use this skill whenever the user mentions dashboards, data visualization, internal metrics, or wants to display any kind of company data, even if they don't explicitly ask for a 'dashboard.'`

**Ważny niuans triggerowania:** Claude sięga po skill tylko do zadań, z którymi sam łatwo nie da rady. Proste, jednokrokowe polecenia („odczytaj ten PDF") mogą **nie** odpalić skilla, choćby opis pasował idealnie — bo Claude zrobi to z marszu. Złożone, wieloetapowe, specjalistyczne zadania tryggerują skille niezawodnie. To znaczy, że projektując skill, celuj w zadania, na których Claude faktycznie zyskuje na sięgnięciu po procedurę.

### 1.3 Progressive disclosure — trzy poziomy ładowania

To rdzeń projektowania skilli. Jak „dobrze zorganizowany podręcznik: najpierw spis treści, potem rozdziały, na końcu szczegółowy aneks".

| Poziom | Co | Kiedy ładowane | Budżet |
|---|---|---|---|
| **1. Metadane** | `name` + `description` | Zawsze w kontekście | ~100 słów |
| **2. Ciało `SKILL.md`** | Pełne instrukcje | Gdy Claude uzna skill za trafny | < ~500 linii |
| **3+. Zasoby** | `references/`, `scripts/`, `assets/` | Tylko gdy potrzebne | praktycznie bez limitu |

Dlaczego to działa: **kontekst to zasób skończony z malejącym zwrotem.** Model ma „budżet uwagi" — im więcej go zapchasz, tym gorzej parsuje. Cel: *„najmniejszy zbiór tokenów o wysokim sygnale, który maksymalizuje szansę na pożądany wynik."* Skrypty w `scripts/` w ogóle nie muszą wchodzić do kontekstu — Claude je po prostu uruchamia.

**Reguły:**
- Trzymaj `SKILL.md` < ~500 linii. Zbliżasz się do limitu → dodaj warstwę hierarchii (`references/`) i jasno wskaż, do którego pliku iść.
- Dla dużych plików referencyjnych (>300 linii) dodaj spis treści na górze.
- Konteksty wzajemnie wykluczające się lub rzadko używane razem trzymaj w osobnych plikach — oszczędzasz tokeny.

**Organizacja per wariant** (gdy skill obsługuje wiele ścieżek):

```
deploy-strony/
├── SKILL.md            (workflow + wybór ścieżki)
└── references/
    ├── wordpress-com.md
    ├── hosting-shared.md
    └── vps-cloud.md
```

Claude czyta tylko ten plik, którego akurat potrzebuje.

### 1.4 Co realnie wsadzać do skilla (a co nie)

**Złota zasada Anthropic:** *„Jedyne, co warto wsadzać do skilla, to informacja, która odpycha Claude'a od jego domyślnych zachowań."*

Przykład wzorcowy — skill `frontend-design` Anthropic: nie tłumaczy „co to CSS", tylko jawnie **nazywa domyślne wzorce AI i każe ich unikać** (np. „warm cream + serif + terracotta", „prawie-czarne tło + kwaśna zieleń"), bo to „defaulty, nie wybory". To esencja: skill = lista rzeczy, których Claude domyślnie **nie zrobi** lub zrobi źle.

| ✅ Wsadzaj | ❌ Pomijaj |
|---|---|
| Procedury i kolejność kroków specyficzne dla Was | To, co Claude wie z marszu (składnia, ogólny CSS) |
| Wzorce, których chcecie, + antywzorce do unikania | Generyczne „pisz czysty kod" |
| Komendy/CLI, których nie zgadnie | Pełna dokumentacja API (lepiej link) |
| Format wyjścia (szablon) | Długie tutoriale |
| Skrypty deterministyczne | Logikę, którą lepiej zostawić modelowi |

### 1.5 Styl pisania instrukcji

- **Tryb rozkazujący.** „Przeczytaj X", „Wygeneruj Y".
- **Wyjaśniaj DLACZEGO.** Zamiast `NIGDY nie używaj inline CSS` → `Unikaj inline CSS — łamie spójność z systemem tokenów i utrudnia późniejszą edycję motywu`. Model zrozumie i uogólni regułę zamiast ją obchodzić.
- **CAPS i twarde MUST to żółta flaga.** Jeśli łapiesz się na pisaniu `ZAWSZE`/`NIGDY` wersalikami — przeramuj na powód. Wyjątek: pojedyncze, krytyczne bezpieczeństwo/nieodwracalne akcje, gdzie nacisk jest uzasadniony.
- **Przykłady > reguły.** „Obrazek wart tysiąca słów". Format Input → Output działa świetnie.
- **Sekcje przez nagłówki/XML.** `## Tool guidance`, `## Output description`, `<background_information>` — czytelna struktura pomaga modelowi.

**Wzór definiowania formatu wyjścia:**

```markdown
## Struktura raportu
Użyj DOKŁADNIE tego szablonu:
# [Tytuł]
## Podsumowanie
## Kluczowe ustalenia
## Rekomendacje
```

**Wzór przykładu:**

```markdown
## Format komunikatu commita
Przykład 1:
Wejście: Dodano logowanie przez Google OAuth
Wyjście: feat(auth): logowanie OAuth Google
```

### 1.6 Kiedy skill ma być sztywny (rigid), a kiedy elastyczny

| Sztywny (rigid) | Elastyczny |
|---|---|
| Krytyczne kroki, których pominięcie psuje wynik (kolejność deployu, backup przed migracją, walidacja zgody RODO) | Decyzje twórcze (kierunek wizualny, dobór typografii, copy) |
| Format wyjścia, który konsumuje kolejny etap/skill | Dobór rozwiązania pod konkretny brief |
| Compliance/bezpieczeństwo/nieodwracalne operacje | Eksploracja, propozycje wariantów |
| Deterministyczne (→ skrypt) | Heurystyczne (→ opis + przykłady) |

Reguła kciuka: im wyższa cena błędu i im mniej kreatywności wymaga krok, tym sztywniej. Reszta — elastycznie, z wyjaśnionym „dlaczego".

---

## Część 2 — Najlepsze praktyki `CLAUDE.md`

`CLAUDE.md` Claude czyta **na starcie każdej rozmowy**. Dlatego wrzucaj tylko to, co dotyczy szeroko. Wiedza domenowa „czasem potrzebna" → **skill**, nie CLAUDE.md (skill ładuje się na żądanie, nie puchnie każda rozmowa).

### 2.1 Zwięzłość ponad wszystko

**Test każdej linii:** *„Czy jej usunięcie spowodowałoby, że Claude popełni błąd?"* Nie → wytnij.

> *„Przeładowane pliki CLAUDE.md sprawiają, że Claude ignoruje Twoje faktyczne instrukcje!"*

Objawy choroby:
- Claude robi coś wbrew regule → plik za długi, reguła ginie w szumie. **Lekarstwo: bezwzględnie tnij.**
- Claude pyta o rzecz opisaną w CLAUDE.md → sformułowanie dwuznaczne. **Doprecyzuj.**
- Claude już robi coś dobrze bez instrukcji → **skasuj instrukcję** albo zamień na hook.

### 2.2 Co wsadzić, czego nie

| ✅ Wsadź | ❌ Wyklucz |
|---|---|
| Komendy Bash, których nie zgadnie | Cokolwiek wyczyta z kodu |
| Reguły stylu różne od domyślnych | Standardowe konwencje języka |
| Instrukcje testowania, preferowany runner | Szczegółowa dokumentacja API (linkuj) |
| Etykieta repo (nazwy gałęzi, konwencje PR) | Informacje często się zmieniające |
| Decyzje architektoniczne projektu | Opisy plik-po-pliku |
| Kwirki środowiska (wymagane zmienne env) | Oczywistości („pisz czysty kod") |
| Częste pułapki / nieoczywiste zachowania | Długie wyjaśnienia i tutoriale |

### 2.3 Struktura i „kiedy co wołać"

- **Bez wymaganego formatu**, ale krótko i czytelnie dla człowieka. Sekcje typu `# Styl kodu`, `# Workflow`, `# Git`.
- **Sekcja „kiedy co wołać"** — krótki routing: kiedy skill, kiedy subagent, kiedy hook, kiedy slash-command (patrz Część 3).
- **Priorytety / nacisk:** dostrajaj przez `IMPORTANT` / `YOU MUST` przy regułach, które się najczęściej łamią — ale oszczędnie, bo nadużycie znieczula.
- **Importy:** `CLAUDE.md` może wciągać inne pliki przez `@ścieżka/do/pliku`:
  ```markdown
  Zob. @README.md (przegląd) i @package.json (komendy).
  - Workflow gita: @docs/git.md
  ```
- **Lokalizacje:** `~/.claude/CLAUDE.md` (globalny, wszystkie projekty) · `./CLAUDE.md` (projekt, do gita) · `./CLAUDE.local.md` (osobiste, do `.gitignore`) · podkatalogi (wciągane na żądanie — dobre w monorepo).

### 2.4 Traktuj CLAUDE.md jak kod

Rewiduj, gdy coś idzie źle. Przycinaj regularnie. Testuj zmiany obserwując, czy zachowanie Claude'a faktycznie się zmienia. Wrzuć do gita, żeby zespół dorzucał swoje. Plik **zyskuje na wartości z czasem.**

---

## Część 3 — Struktura projektu i: skill vs SOP vs slash-command vs subagent vs hook

### 3.1 Foldery projektu Claude Code

```
projekt/
├── CLAUDE.md                 ← reguły zawsze w kontekście (krótkie!)
├── .claude/
│   ├── skills/               ← skille (wiedza/workflow na żądanie)
│   │   └── nazwa/SKILL.md
│   ├── agents/               ← definicje subagentów
│   ├── commands/             ← slash-commands (alternatywnie skill z disable-model-invocation)
│   └── settings.json         ← hooki, uprawnienia, env
├── wiedza/                   ← dokumenty SOP/referencyjne (nasze, np. ten plik)
├── briefy/                   ← wejścia: brief klienta
└── szablony-startowe/        ← assety/szablony startowe
```

### 3.2 Co wybrać do czego

| Mechanizm | Kiedy | Charakter |
|---|---|---|
| **CLAUDE.md** | Reguły dotyczące każdej rozmowy w projekcie | Doradczy, zawsze w kontekście |
| **Skill** (`.claude/skills/`) | Wiedza domenowa / workflow potrzebny *czasem*; ma się odpalać automatycznie po triggerze | Doradczy, ładowany na żądanie, z `references/`+`scripts/` |
| **SOP / dokument wiedzy** (`wiedza/*.md`) | Dłuższa wiedza referencyjna dla ludzi i jako `references/` skilla | Pasywny, czytany gdy wskazany |
| **Slash-command** (`/nazwa`) | Powtarzalny workflow, który **Ty** odpalasz ręcznie (zwł. z efektami ubocznymi) | Skill z `disable-model-invocation: true`, przyjmuje `$ARGUMENTS` |
| **Subagent** (`.claude/agents/`) | Zadanie czytające dużo plików / wymagające izolacji (research, review) | Osobne okno kontekstu, własne narzędzia, zwraca podsumowanie |
| **Hook** (`settings.json`) | Akcja, która MUSI się wykonać za każdym razem, zero wyjątków (lint po edycji, blokada zapisu do `migrations/`) | Deterministyczny, nie doradczy |

Reguła: **doradcze** (osąd, styl, architektura) → CLAUDE.md / skill. **Deterministyczne** (musi się stać zawsze) → hook. **Izolacja kontekstu** → subagent. **Ręczny wyzwalacz** → slash-command.

### 3.3 Przykład slash-command (skill ręczny)

```markdown
---
name: wdroz-strone
description: Wdrożenie gotowej strony WP na produkcję
disable-model-invocation: true
---
Wdróż projekt: $ARGUMENTS

1. Backup bazy i plików (weryfikuj, że backup powstał)
2. Migracja URL (staging → prod)
3. Sanity-check: HTTPS, robots, mapa strony, formularze
4. Smoke test kluczowych podstron + screenshoty
5. Raport wdrożenia
```

Wywołanie: `/wdroz-strone klient-kowalski`.

---

## Część 4 — Workflow Anthropic (jak realnie pracować)

### 4.1 Explore → Plan → Code → Commit

1. **Explore (tryb plan):** Claude czyta pliki, nie zmienia nic. „Przeczytaj `/wp-content/themes/...` i zrozum, jak zbudowany jest motyw."
2. **Plan:** „Co trzeba zmienić? Jaki jest przepływ? Stwórz plan." Plan można edytować ręcznie przed startem.
3. **Code:** wyjdź z trybu plan, implementuj wg planu, weryfikuj.
4. **Commit:** opisowy commit + PR.

Pomijaj planowanie, gdy zakres jasny i fix mały (literówka, log). Planuj, gdy niepewny kierunek, zmiana dotyka wielu plików albo nie znasz kodu.

### 4.2 Daj sposób na weryfikację

Bez checka „wygląda na skończone" to jedyny sygnał — i to **Ty** jesteś pętlą kontroli. Dla stron: test buildu motywu, lint, **screenshot strony porównany z projektem**, Lighthouse, walidator HTML, smoke-test formularzy. Każ Claude'owi pokazać dowód (output, screenshot), nie deklarować sukcesu.

### 4.3 Ewaluacja najpierw przy budowie skilli (pętla `skill-creator`)

Z lokalnego `skill-creator` Anthropic — najważniejsze wskazówki:

- **Pętla:** zdecyduj co skill ma robić → napisz draft → 2–3 realistyczne prompty testowe → uruchom Claude'a z-skillem i baseline (bez) → oceń jakościowo i ilościowo → przepisz → powtórz → rozszerz zbiór testów.
- **Generalizuj z feedbacku.** Skill ma działać na milionach przyszłych zleceń, nie na 3 testowych. Unikaj „fiddly overfitty" poprawek i dławiących MUST-ów.
- **Trzymaj prompt szczupły.** Czytaj transkrypty (nie tylko wyniki) — jeśli skill każe modelowi marnować czas, usuń ten fragment i sprawdź, co się stanie.
- **Wyłapuj powtarzaną pracę.** Jeśli w każdym teście subagent pisze podobny helper (`create_docx.py`, `build_chart.py`) — to sygnał, żeby raz wsadzić skrypt do `scripts/`.
- **Optymalizacja `description`.** Po skończeniu skilla optymalizuj opis pod tryggerowanie: zestaw ~20 realistycznych zapytań (połowa should-trigger, połowa near-misses, które NIE powinny tryggerować), zmierz trafność, popraw opis. Najcenniejsze są „bliskie pudła" — zapytania dzielące słowa kluczowe, ale wymagające czegoś innego.
- **Komunikacja:** dobieraj żargon do odbiorcy (nie każdy wie, co to „asercja" czy „JSON").
- **Zasada braku zaskoczenia:** skill nie może zawierać malware ani działać wbrew deklarowanej intencji.

### 4.4 Subagenci i kontekst

- Research/eksplorację deleguj subagentom — czytają dużo, zwracają streszczenie, główny kontekst zostaje czysty.
- `/clear` między niepowiązanymi zadaniami. Po >2 nieudanych korektach: `/clear` i lepszy prompt — czysta sesja bije długą zaśmieconą.
- Wzorzec Writer/Reviewer: jedna sesja pisze, druga (świeży kontekst) recenzuje diff — mniej stronniczości.

---

## Część 5 — Architektura skilli dla NASZEGO systemu (strony WordPress)

Wzorzec: **jeden skill-dyrygent (orkiestrator od briefu do wdrożenia) + skille-specjaliści.** Dyrygent prowadzi proces i w odpowiednich fazach deleguje/wywołuje specjalistów. Brief jest jedynym wejściem; każdy etap kończy się artefaktem i checklistą; przez cały czas obowiązuje podejście anti-slop.

### 5.1 Mapa systemu

```
.claude/skills/
├── strona-od-briefu/          ← DYRYGENT (orkiestrator end-to-end)
│   ├── SKILL.md
│   └── references/
│       ├── faza-0-brief.md
│       ├── faza-1-architektura-tresci.md
│       ├── faza-2-design.md
│       ├── faza-3-wordpress.md
│       ├── faza-4-seo.md
│       ├── faza-5-qa-wdrozenie.md
│       └── checklisty.md
├── web-design-anti-slop/      ← specjalista: kierunek wizualny
├── seo-techniczne-onpage/     ← specjalista: SEO
├── wordpress-budowa/          ← specjalista: implementacja WP
├── woocommerce-sklep/         ← specjalista: sklep
└── kursy-lms/                 ← specjalista: kursy/LMS
```

`wiedza/` trzyma dłuższe SOP-y (jak ten plik) — skille linkują do nich w `references/`. `briefy/` to wejścia. `szablony-startowe/` to assety.

### 5.2 Skill-dyrygent — propozycja

```yaml
---
name: strona-od-briefu
description: >
  Prowadzi pełen proces tworzenia strony WWW na WordPress od briefu do wdrożenia:
  brief → architektura treści → projekt → implementacja WP → SEO → QA → publikacja.
  Użyj ZAWSZE, gdy użytkownik chce nową stronę, landing, sklep, stronę firmową/portfolio
  albo wrzuca brief klienta, mówi "zróbmy stronę dla...", "potrzebuję strony", "wdróżmy
  witrynę", nawet jeśli nie nazwie tego wprost procesem. Orkiestruje skille-specjalistów
  (design, SEO, WordPress, sklep, kursy).
---
```

**Ciało (szkic):** krótki opis pętli faz, kryteria przejścia między fazami, kiedy wywołać którego specjalistę, gdzie szukać checklist. Szczegóły każdej fazy → `references/faza-*.md` (progressive disclosure).

**Bramka briefu (rigid):** jeśli brief niekompletny — dyrygent przeprowadza krótki wywiad (cel biznesowy, grupa docelowa, zakres stron, konkurencja/referencje, CI/marka, budżet funkcji: sklep/kursy/blog, język/i18n, hosting/domena, deadline) i dopiero potem rusza. Wzór: „zinterwiuj mnie, spisz spec do briefu".

### 5.3 Skille-specjaliści — nazwy, triggery, rola

| Skill (`name`) | `description` (trigger — skrót) | Rola / wyjście |
|---|---|---|
| **`web-design-anti-slop`** | „Kierunek wizualny strony bez szablonowości. Użyj przy projektowaniu wyglądu, doborze palety/typografii/layoutu, redesignie, gdy mowa o 'wyglądzie', 'designie', 'makiecie', 'stylu'. Unikaj defaultów AI." | System tokenów (paleta, fonty, layout, element-sygnatura), makiety; faza krytyki anti-slop |
| **`seo-techniczne-onpage`** | „SEO techniczne i on-page dla stron WP. Użyj przy strukturze URL, meta, nagłówkach, mapie strony, schema, Core Web Vitals, indeksacji, gdy mowa o 'SEO', 'pozycjonowaniu', 'widoczności w Google'." | Mapa słów kluczowych, struktura URL/nagłówków, schema, checklista CWV |
| **`wordpress-budowa`** | „Budowa strony na WordPress: motyw, bloki/Gutenberg lub builder, CPT, pola, wydajność, bezpieczeństwo. Użyj przy implementacji WP, instalacji wtyczek, tworzeniu szablonów, gdy mowa o 'WordPress', 'WP', 'motywie', 'wtyczce', 'Elementorze/Gutenbergu'." | Działający motyw/strony, konfiguracja wtyczek, checklista bezpieczeństwa WP |
| **`woocommerce-sklep`** | „Sklep na WooCommerce: produkty, koszyk, płatności, wysyłka, podatki, RODO. Użyj przy sklepie internetowym, e-commerce, płatnościach, gdy mowa o 'sklepie', 'WooCommerce', 'produktach', 'koszyku', 'płatnościach'." | Skonfigurowany sklep, bramki płatności, checklista zgodności sprzedaży |
| **`kursy-lms`** | „Platforma kursów/LMS na WordPress (np. LearnDash/TutorLMS): kursy, lekcje, quizy, dostęp/membership, certyfikaty. Użyj przy kursach online, szkoleniach, strefie członkowskiej, gdy mowa o 'kursach', 'LMS', 'szkoleniach online', 'membership'." | Struktura kursów, kontrola dostępu, checklista LMS |

Każdy specjalista: krótki `SKILL.md` + `references/` (warianty, np. Gutenberg vs builder; Stripe vs Przelewy24) + `scripts/` na powtarzalne czynności (np. generator `child theme`, eksport ustawień). Anti-slop jako stała zasada w design/copy.

### 5.4 Brief jako wejście — wzór

Trzymaj szablon briefu w `briefy/SZABLON-BRIEFU.md`, a wypełnione briefy w `briefy/<klient>.md`. Minimalny zestaw pól: cel biznesowy · KPI/CTA · grupa docelowa · zakres (lista podstron + funkcje: blog/sklep/kursy/rezerwacje) · konkurencja i referencje wizualne · marka/CI (logo, kolory, fonty, ton) · treści (kto dostarcza) · język/i18n · hosting/domena/dostępy · budżet i deadline · wymogi prawne (RODO, regulamin, polityka cookies).

### 5.5 Checklisty (bramki jakości)

W `references/checklisty.md` dyrygenta — bramka po każdej fazie. Szkic:

- **Po designie:** zgodność z briefem · element-sygnatura obecny · nie wygląda jak default AI · kontrast/dostępność (WCAG AA) · spójny system tokenów · responsywność.
- **Po WordPressie:** szybkość (Lighthouse/CWV) · bezpieczeństwo (aktualizacje, role, login, backup) · brak treści lorem · poprawne 404/przekierowania · formularze działają.
- **Po SEO:** unikalne title/description · jeden H1/strona · mapa strony + robots · schema · czyste URL-e · alt-y obrazów · canonical.
- **Przed wdrożeniem (rigid):** backup wykonany i zweryfikowany · HTTPS · podmiana URL staging→prod · indeksacja włączona dopiero na prod · cookies/RODO · smoke-test + screenshoty · testy płatności (jeśli sklep).

### 5.6 Anti-slop — wbudowane w cały system

Wzór z `frontend-design` Anthropic i Waszego globalnego `stop-slop`:
- **Design:** nazwij defaulty AI i każ ich unikać; szukaj wyróżnika w świecie klienta (branża, materiały, język); „odwagę wydaj w jednym miejscu" (jeden mocny element-sygnatura, reszta spokojna i zdyscyplinowana); dwufazowo: burza pomysłów → krytyka względem briefu, popraw to, co czyta się jak default.
- **Copy/proza:** stosuj skill `stop-slop` — tnij frazy-wypełniacze, schematy (binarne kontrasty, listy negacji), stronę bierną; aktywny głos, konkret.

---

## Część 6 — Lokalny `skill-creator` (referencja Anthropic)

Macie go lokalnie (`~/.claude/plugins/.../skill-creator`). Najcenniejsze, czego uczy poza tym, co wyżej:

- **Capture Intent → Interview → Write → Test → Iterate.** Najpierw wyciągnij intencję (często już jest w rozmowie: „zrób z tego skill"), dopytaj o edge case'y, formaty wejścia/wyjścia, kryteria sukcesu, zależności.
- **Test cases do `evals/evals.json`**, wyniki w `<skill>-workspace/iteration-N/`. Każdy test odpalany z-skillem i baseline w tym samym turze.
- **Asercje obiektywne i nazwane** (czytelne w viewerze). Subiektywne skille (styl, design) oceniaj jakościowo — nie wciskaj asercji na siłę.
- **Generuj viewer (`generate_review.py`) PRZED własną oceną** — najpierw pokaż człowiekowi przykłady.
- **Skrypt do rzeczy sprawdzalnych programowo** zamiast oczu — szybciej, pewniej, wielokrotnego użytku.
- **Po skończeniu:** optymalizuj `description` (`run_loop.py`), spakuj `package_skill.py`.

Polecenie praktyczne: zbuduj nasze skille **właśnie tym skillem** — odpali pętlę draft→test→iter i zoptymalizuje triggery, zamiast pisać je „na czuja".

---

## Plan startowy (kolejność robót)

1. Napisz krótki **`CLAUDE.md`** projektu (reguły, „kiedy co wołać", routing do skilli) — przejdź testem „czy usunięcie tej linii spsuje zachowanie".
2. Zbuduj **dyrygenta `strona-od-briefu`** (szkielet faz + bramka briefu + linki do `references/`), używając `skill-creator`.
3. Dodawaj **specjalistów** jeden po drugim, każdy z 2–3 testami i optymalizacją `description`.
4. Wpnij **anti-slop** (design + `stop-slop`) jako stałe zasady.
5. Dorób **checklisty** jako bramki jakości i **weryfikację** (screenshot/Lighthouse/smoke-test), żeby sesje domykały się same.
6. Iteruj na realnych briefach, czytaj transkrypty, wyłapuj powtarzaną pracę → wsadzaj do `scripts/`.

---

## Załącznik — szablon `SKILL.md` (gotowy do kopiowania)

```markdown
---
name: nazwa-skilla
description: >
  Co skill robi ORAZ kiedy go użyć — konkretne triggery (frazy/konteksty użytkownika).
  Bądź lekko "nachalny": "Użyj ZAWSZE, gdy użytkownik mówi X, Y, Z, nawet jeśli nie
  nazwie tego wprost." Cała wiedza "kiedy używać" idzie tutaj, nie do ciała.
---

# Nazwa skilla

Jedno-dwa zdania: po co to i jaki problem rozwiązuje (kontekst dla modelu).

## Kiedy i jak działać
- Krok / heurystyka 1 (tryb rozkazujący, z krótkim "dlaczego")
- Krok / heurystyka 2
- Kiedy sięgnąć do references/ (wskaż plik) — progressive disclosure

## Antywzorce (czego unikać)
- Default, który Claude zrobiłby sam, a Wy go NIE chcecie — z powodem

## Format wyjścia
Użyj dokładnie tego szablonu:
# [Tytuł]
## ...

## Przykłady
Przykład 1:
Wejście: ...
Wyjście: ...

## Materiały
- references/wariant-a.md — czytaj, gdy [warunek]
- scripts/narzedzie.py — uruchom do [zadanie deterministyczne]
- assets/szablon.html — użyj jako baza wyniku
```

Zasady przy wypełnianiu: `SKILL.md` < ~500 linii; konkret > ogólnik; wyjaśniaj „dlaczego"; tnij wszystko, co nie odpycha Claude'a od defaultu.

---

## Źródła

- [Equipping agents for the real world with Agent Skills — Anthropic Engineering](https://www.anthropic.com/engineering/equipping-agents-for-the-real-world-with-agent-skills)
- [Best practices for Claude Code — dokumentacja](https://code.claude.com/docs/en/best-practices)
- [Effective context engineering for AI agents — Anthropic Engineering](https://www.anthropic.com/engineering/effective-context-engineering-for-ai-agents)
- [anthropics/skills — repozytorium Agent Skills (README)](https://github.com/anthropics/skills/blob/main/README.md)
- [anthropics/skills — `skill-creator/SKILL.md`](https://github.com/anthropics/skills/blob/main/skills/skill-creator/SKILL.md)
- [anthropics/skills — `frontend-design/SKILL.md`](https://github.com/anthropics/skills/blob/main/skills/frontend-design/SKILL.md)
- [CLAUDE.md / pamięć — dokumentacja](https://code.claude.com/docs/en/memory)
- [Skills w Claude Code — dokumentacja](https://code.claude.com/docs/en/skills)
- [Sub-agents — dokumentacja](https://code.claude.com/docs/en/sub-agents)
- Lokalny `skill-creator` (Anthropic, plugin oficjalny): `~/.claude/plugins/marketplaces/claude-plugins-official/plugins/skill-creator/skills/skill-creator/SKILL.md`
- [The Complete Guide to Building Skills for Claude (PDF, Anthropic)](https://resources.anthropic.com/hubfs/The-Complete-Guide-to-Building-Skill-for-Claude.pdf)
