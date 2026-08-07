---
kind: handoff-topic
topic: agent-ai-dashboard-klienci
status: in-progress
updated: 2026-08-07
---

# Dashboard SaaS z agentem AI edytującym stronę WP klienta (subskrypcja)

> Zakres: walidacja pomysłu — nowa linia biznesowa dla agencji: klienci mają agenta AI, który wprowadza zmiany na ich stronie WordPress (custom classic theme + ACF) w modelu abonamentowym, zamiast ręcznego zlecania zmian. Obejmuje architekturę bezpieczeństwa, ekonomię jednostkową, research konkurencji i popytu. NIE obejmuje budowy/wdrożenia konkretnej strony klienta (to osobne wątki, np. Holiestetyka) — tylko sam pomysł na produkt/usługę.

## Aktualny stan
- ✅ Walidacja pomysłu zakończona: koncepcja dobra, ale wymaga przeprojektowania (patrz decyzje niżej).
- ✅ Policzona ekonomia jednostkowa na aktualnym cenniku Claude API.
- ✅ Research rynkowy wykonany (5 agentów, 51 web searchy) — produkty, ceny, architektura/bezpieczeństwo, ryzyka, popyt. Wyniki zsyntetyzowane ręcznie w tej sesji (workflow-owa synteza padła — patrz „Czego NIE robić").
- 🔄 Brak jeszcze rozpisanej konkretnej architektury MVP pod stack agencji (LH.pl + custom theme + ACF) — to następny krok.

## Kluczowe decyzje i ustalenia

- **Nie dawać klientowi surowego SSH do agenta.** To był błąd w pierwotnej wizji usera. SSH = pełna powłoka = agent może zrobić wszystko, łącznie z `rm -rf`, przez literówkę albo prompt injection z pliku klienta. Zamiast tego: zawężony zestaw narzędzi (edytuj tekst, podmień link, ustaw pole ACF, wgraj media, ustaw meta SEO) przez WP REST API / WP-CLI / (docelowo) WordPress MCP Adapter.
- **Hierarchia bezpieczeństwa dostępu (od najlepszej):** MCP Adapter/Abilities API (WP 6.9+, permission_callback per capability) → REST API + Application Passwords na koncie o wąskiej roli (Editor, nie Admin) → WP-CLI tylko do deployu w kontrolowanym kontekście (CI/CD, staging) → surowy SSH tylko w ostateczności, z kluczem ograniczonym `command=` w authorized_keys.
- **Podział zadań wg ryzyka:** zmiany treści (teksty, linki, SEO, media — 90% zleceń) → bezpieczne, przez API, odwracalne (rewizje WP). Zmiany designu/struktury (10%) → dotykają kodu motywu, idą przez staging + akceptację agencji, nie przez samoobsługowego agenta.
- **Staging-first + snapshot przed każdą zmianą + bramka zatwierdzenia** dla operacji nieodwracalnych/ryzykownych (human-in-the-loop). Rutynowe zmiany treści mogą iść bez bramki, bo są odwracalne.
- **Niezależne backupy POZA systemem, do którego agent ma dostęp** — potwierdzone realnym incydentem (PocketOS/Cursor, kwiecień 2026: agent skasował bazę + backupy trzymane w tym samym wolumenie).
- **Model biznesowy — zmiana strategii po researchu:** rynek NIE potwierdza popytu na „klient sam czatuje z agentem". Dowody wskazują odwrotnie — mali właściciele nie chcą dotykać strony, wolą delegować (bariera to nie technika, tylko „kolejna rzecz na liście" + strach że coś zepsuję). Silniejszy, potwierdzony model: **„AI-powered done-for-you"** — klient pisze/mówi czego chce, AGENCJA (przez agenta AI) robi zmianę w 24h, klient płaci abonament. Samoobsługowy czat dla klienta = opcja dla nielicznych, nie rdzeń oferty (inaczej konkurujesz za darmo z Wix/Hostinger AI).
- **Odpowiedzialność prawna spada na deployera** (tego, kto uruchamia/konfiguruje agenta) — czyli najpewniej na agencję, nie na dostawcę modelu. Trzeba jasnej granicy w umowie z klientem + wymienić ograniczenia agenta w dokumentacji (failure-to-warn).
- **Gotowy klocek do przyspieszenia MVP:** AI Engine (Meow Apps) — zamienia self-hosted WP (też custom classic theme) w serwer MCP, darmowy serwer MCP + Pro $59-149/rok. Alternatywa/uzupełnienie: oficjalny WordPress/mcp-adapter (Automattic, open source, framework deweloperski). Też: Anthropic Managed Agents (hostowana pętla agenta + sandbox + vault na poświadczenia) jako skrót zamiast budowy własnego orkiestratora od zera.

## Ekonomia jednostkowa (policzone, czerwiec 2026 cennik)
- Opus 4.8: $5/$25 za 1M tokenów (wejście/wyjście). Sonnet 4.6: $3/$15. Prompt caching tnie powtarzalny kontekst do ~0,1× po pierwszym wywołaniu.
- Prosta zmiana (link, kilka akapitów): ~$0,10-0,20 na Opus, ~$0,06-0,12 na Sonnet.
- Cięższa zmiana (przepisanie podstrony, wieloetapowa): ~$0,50-0,90 na Opus, ~$0,30-0,50 na Sonnet.
- Klient robiący 10-30 zmian/mc: $2-25 kosztu API na Opus, mniej na Sonnet. Przy abonamencie kilkudziesiąt-kilkaset zł/mc marża zdrowa.
- Rekomendacja: Sonnet jako domyślny model do rutynowych zmian treści, Opus do trudnych/wieloetapowych zadań (nie „zawsze Opus" mimo globalnej preferencji usera dla innych zadań — tu wolumen/koszt ma znaczenie).

## Benchmarki cenowe z researchu
- Plany opieki PL (mainstream): 100-500 PLN/mc, ogon do ~1000 (WooCommerce drożej).
- Plany opieki US (mid-tier): $100-300/mc, średnia ~$246 (~980 PLN).
- SaaS-y AI do stron (kotwica taniości): $10-25/mc (40-180 PLN) — 10Web, Hostinger AI, Wix AI, Durable.
- Hybryda AI+człowiek (B12): do $399/mc.
- **Rekomendowane pozycjonowanie usługi „done-for-you przez AI": ~200-700 PLN/mc** dla małej/średniej strony, premium 1000+ PLN/mc przy WooCommerce/SLA. Wnioskowanie przez analogię — brak twardego cennika dla tej dokładnej kategorii (jeszcze nie istnieje jako nazwany produkt na rynku).

## Następny krok
Rozpisać konkretną architekturę MVP pod stack agencji (LH.pl + custom theme + ACF): decyzja AI Engine MCP vs własny orkiestrator vs Anthropic Managed Agents; lista narzędzi agenta (co dokładnie może robić); model bramki zatwierdzeń; szacunek kosztu/klienta w praktyce.

## Czego NIE robić
- Nie dawać klientowi bezpośredniego dostępu SSH do serwera — patrz decyzje wyżej.
- Nie budować głównej oferty wokół „klient sam czatuje z agentem" — research nie potwierdza na to popytu; to opcja dodatkowa, nie rdzeń.
- Nie używać Workflow tool z wymuszonym schematem strukturalnym do syntezy raportu tekstowego — w tej sesji dwa razy zawiodło: pierwszy raz `StructuredOutput retry cap exceeded` (agenci nie potrafili dopasować się do sztywnego schematu), drugi raz agent syntezy „ukończył" pracę, ale finalna odpowiedź została skażona nieistniejącym promptem fp-check/security-review (agent zaczął odpowiadać „approve" jakby weryfikował kod, mimo że robił market research) — mechanizm najwyraźniej dziedziczy jakiś system prompt z niewłaściwego kontekstu. Surowe dane z 5 agentów wyszukujących (WebSearch) były jednak w transkryptach dobre i użyteczne — trzeba je było ręcznie wyciągnąć z plików `.jsonl` w folderze `subagents/workflows/<run-id>/agent-*.jsonl` i zsyntetyzować samodzielnie zamiast ufać zwróconemu `result`.

## Artefakty
- Ta sesja nie zapisała żadnych plików projektowych (research + analiza były tylko w rozmowie) — cała wiedza jest skondensowana w tym pliku handoff.
- Surowe transkrypty researchu (do wglądu, jeśli trzeba oryginalnych cytatów/URL): `/Users/adrianmacbook2/.claude/projects/-Users-adrianmacbook2-Library-Mobile-Documents-com-apple-CloudDocs-Claude-Code-------Projektowanie-stron-WWW/75eab15f-c17c-4871-b058-45e33d00c62d/subagents/workflows/wf_a0810c8a-217/agent-*.jsonl` (5 plików, jeden na kąt: produkty, ceny, architektura, ryzyka, trakcja/popyt).

## Dziennik sesji
- 2026-08-07 — Pierwsza sesja tematu. Brainstorming pomysłu, przeprojektowanie architektury (SSH → zawężone API), policzona ekonomia jednostkowa, wykonany i ręcznie zsyntetyzowany research rynkowy (produkty/ceny/bezpieczeństwo/ryzyka/popyt). Zmiana modelu biznesowego na „done-for-you" po sygnale z researchu o braku popytu na samoobsługę.
