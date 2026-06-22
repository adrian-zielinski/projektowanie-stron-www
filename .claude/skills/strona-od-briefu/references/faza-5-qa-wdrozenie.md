# Faza 5 — QA i wdrożenie (sztywna)

Domykasz projekt i publikujesz. Ta faza jest sztywna: pominięcie kroku grozi utratą danych (brak backupu), zaindeksowaniem stagingu (staging w Google) albo zepsutymi linkami (URL nie podmienione). Kolejność kroków jest krytyczna — wykonuj po kolei i weryfikuj każdy.

## Część A — QA przed wdrożeniem

Na staging/lokalnie, zanim cokolwiek pójdzie na prod:

1. **Przegląd treści** — zero lorem ipsum, literówek, placeholderów; teksty od klienta zatwierdzone.
2. **Responsywność** — sprawdź na mobile/tablet/desktop kluczowe podstrony.
3. **Formularze** — wysyłka dochodzi, walidacja działa, zgody RODO obecne, autoresponder (jeśli jest).
4. **Linki i nawigacja** — brak 404, menu działa, CTA prowadzą gdzie trzeba.
5. **Cross-browser** — Chrome, Safari, Firefox; co najmniej smoke na każdym.
6. **Wydajność** — Lighthouse/PageSpeed, CWV w normie (domknięcie faz 3-4).
7. **Sklep (jeśli jest)** — pełna ścieżka produkt → koszyk → checkout w trybie testowym płatności.

## Część B — Wdrożenie (kolejność krytyczna, sztywna)

Wykonuj dokładnie w tej kolejności:

1. **BACKUP** bazy i plików — wykonaj i **zweryfikuj, że backup faktycznie powstał i da się odtworzyć**. To pierwszy krok, nie ostatni. Bez zweryfikowanego backupu nie ruszaj dalej.
2. **HTTPS** — certyfikat aktywny, wymuszone przekierowanie http→https.
3. **Podmiana URL** staging → prod — search-replace w bazie (z obsługą serializacji, np. WP-CLI `search-replace`), nie ręczny SQL na ślepo.
4. **Indeksacja — włącz DOPIERO TERAZ, na produkcji.** Zdejmij `noindex`/blokadę robots ze stagingu. Ustaw poprawny `robots.txt`, prześlij `sitemap.xml` do Google Search Console. Nigdy wcześniej — inaczej staging trafia do indeksu.
5. **Prawne** — polityka prywatności, regulamin (zwł. sklep), baner cookies/zgody RODO obecne i podlinkowane.
6. **DNS / domena** — przełącz domenę na docelowy serwer, jeśli jeszcze nie wskazuje.

## Część C — Smoke-test po wdrożeniu (na produkcji)

Po publikacji, na żywej stronie:

1. **Kluczowe ścieżki** — strona główna, główne podstrony, formularz kontaktowy (wyślij testowo), checkout (jeśli sklep, tryb testowy → potem przełącz na live).
2. **Screenshoty** kluczowych podstron — dowód stanu wdrożenia, porównaj z makietami.
3. **HTTPS i przekierowania** — działają na produkcyjnej domenie.
4. **Search Console** — sitemap przyjęty, brak krytycznych błędów indeksacji.
5. **Płatności live (sklep)** — po teście przełącz bramki na tryb produkcyjny i zrób jeden kontrolny test.

## Antywzorce

- Wdrożenie bez backupu albo z backupem „chyba się zrobił" (niezweryfikowanym).
- Włączona indeksacja na stagingu → staging w Google, duplikacja, kara.
- Ręczna podmiana URL w SQL bez obsługi serializacji → rozsypane meta/widgety.
- „Wygląda na skończone" zamiast smoke-testu z dowodem (screenshot, testowy lead).
- Płatności zostawione w trybie testowym na żywym sklepie.

## Artefakt fazy

Opublikowana strona na produkcji + raport wdrożenia: co zrobione, screenshoty, wynik smoke-testu, link do backupu.

## Bramka — patrz checklisty

Pełna, sztywna bramka przed-wdrożeniowa: `references/checklisty.md` (sekcja „Przed wdrożeniem"). Odhacz każdy punkt przed publikacją.
