# Checklisty — bramki jakości po każdej fazie

Bramka to warunek przejścia do kolejnej fazy. Odhaczaj punkty świadomie — to nie formalność, tylko zabezpieczenie przed przeróbkami i wpadkami na produkcji. Bramki przed-wdrożeniowe są **sztywne**: każdy punkt musi być spełniony przed publikacją.

## Po briefie (Faza 0 → 1)

- [ ] Cel biznesowy i KPI ustalone (jedna główna akcja).
- [ ] Główne CTA zdefiniowane.
- [ ] Grupa docelowa opisana (kto, problem, język).
- [ ] Pełna lista podstron.
- [ ] Funkcje rozstrzygnięte (sklep / kursy / blog / rezerwacje — tak/nie).
- [ ] Marka/CI ustalone lub świadomie „do zaprojektowania".
- [ ] Referencje wizualne (2-3) zebrane.
- [ ] Ustalone kto i kiedy dostarcza treści.
- [ ] Język/i18n wybrany.
- [ ] Hosting, domena, dostępy potwierdzone.
- [ ] Deadline i budżet funkcji znane.
- [ ] Wymogi prawne (RODO, regulamin, cookies) zidentyfikowane.

## Po architekturze (Faza 1 → 2)

- [ ] Mapa stron pokrywa wszystkie cele z briefu, bez zbędnych podstron.
- [ ] Każda strona = jedna intencja + jedno główne CTA.
- [ ] Sekcje rozpisane per strona (wireframe treściowy).
- [ ] Framework copy dobrany (PAS/AIDA/4U).
- [ ] Wstępne słowa kluczowe przypisane (1 strona = 1 fraza główna).
- [ ] Ścieżki konwersji prześledzone, bez ślepych zaułków.

## Po designie (Faza 2 → 3)

- [ ] Zgodny z briefem i CI klienta.
- [ ] **Nie wygląda jak default AI** (przeszedł krytykę anti-slop).
- [ ] Element-sygnatura obecny (jeden mocny akcent, reszta spokojna).
- [ ] Spójny system tokenów (paleta, typografia, odstępy w `DESIGN.md`).
- [ ] Kontrast i dostępność — WCAG AA.
- [ ] Responsywność rozplanowana (desktop + mobile w makietach).
- [ ] **Klient zaakceptował projekt.** ← warunek otwarcia fazy 3.

## Po WordPressie (Faza 3 → 4)

- [ ] Custom classic theme — zero Elementora/page-buildera.
- [ ] Motyw zgodny z zaakceptowanymi makietami (desktop + mobile).
- [ ] Treści wgrane — **zero lorem ipsum / placeholderów**.
- [ ] Treść edytowalna przez klienta przez ACF (tam gdzie trzeba).
- [ ] Formularze działają (wysyłka + walidacja + zgody RODO).
- [ ] Poprawne 404 i przekierowania.
- [ ] Obrazy zoptymalizowane (rozmiar, format, lazy-load).
- [ ] Podstawy bezpieczeństwa: aktualizacje, role, ochrona logowania, backup skonfigurowany.
- [ ] Minimalny zestaw wtyczek (bez „na zapas").
- [ ] Wstępny pomiar wydajności (Lighthouse) wykonany.

### Funkcje warunkowe (odhacz tylko te z briefu)

- [ ] **Formularz → e-mail (SMTP):** skonfigurowany SMTP (np. WP Mail SMTP), wysłany **realny testowy e-mail** z formularza i potwierdzone dotarcie (nie tylko „formularz przyjął"). Bez tego maile lądują w spamie.
- [ ] **Rezerwacje / kalendarz:** pełna ścieżka rezerwacji przetestowana (wybór terminu → potwierdzenie → e-mail), tak jak checkout w sklepie.
- [ ] **Wielojęzyczność (i18n):** komplet tłumaczeń, działający przełącznik języka, poprawne `hreflang`.
- [ ] **Migracja starej strony:** mapa przekierowań **301** ze starych URL-i przygotowana (wdrożenie i test w fazie 5).

## Po SEO (Faza 4 → 5)

- [ ] Unikalne `title` i `meta description` na każdej podstronie.
- [ ] Jeden `H1` na stronę, poprawna hierarchia H2-H6.
- [ ] Semantyczny HTML5 (header/nav/main/article/section/footer).
- [ ] JSON-LD dopasowane do typów treści (Organization/Product/Course/Article/FAQ/Breadcrumb).
- [ ] Czyste, czytelne URL-e.
- [ ] Atrybuty `alt` na obrazach, sensowne nazwy plików.
- [ ] Canonical tam, gdzie ryzyko duplikacji.
- [ ] `sitemap.xml` + `robots.txt` przygotowane (indeksacja wciąż zablokowana do prod).
- [ ] Core Web Vitals zmierzone i w normie (LCP, INP, CLS).

## Przed wdrożeniem (Faza 5 — SZTYWNA, kolejność krytyczna)

Wykonuj po kolei, weryfikuj każdy punkt. Brak choćby jednego = stop.

- [ ] **1. BACKUP** bazy i plików wykonany **i zweryfikowany** (da się odtworzyć).
- [ ] **2. HTTPS** aktywne, wymuszone przekierowanie http→https.
- [ ] **3. Podmiana URL** staging→prod (search-replace z obsługą serializacji, np. WP-CLI).
- [ ] **4. Indeksacja włączona DOPIERO na produkcji** (zdjęty `noindex`/blokada robots ze stagingu).
- [ ] **5. Prawne**: polityka prywatności, regulamin (sklep), baner cookies/RODO obecne i podlinkowane.
- [ ] **6. DNS/domena** wskazuje docelowy serwer.
- [ ] **7. Przekierowania 301** ze starych URL-i wdrożone (jeśli migracja) — sprawdź kilka kluczowych ręcznie, by nie stracić SEO.

### Smoke-test po publikacji (na produkcji)

- [ ] Kluczowe ścieżki działają (strona główna, podstrony, formularz wysłany testowo).
- [ ] Screenshoty kluczowych podstron zrobione (dowód + porównanie z makietami).
- [ ] HTTPS i przekierowania działają na produkcyjnej domenie.
- [ ] `sitemap.xml` przyjęty w Google Search Console, brak krytycznych błędów.
- [ ] **Sklep**: pełna ścieżka checkout przetestowana; po teście bramki płatności przełączone na tryb live i sprawdzone jednym kontrolnym zakupem.
- [ ] **Formularze (SMTP)**: testowy e-mail z formularza dotarł na produkcyjną skrzynkę (nie w spamie).
- [ ] **Przekierowania 301**: kilka starych adresów testowo przekierowuje na nowe (jeśli migracja).
- [ ] **i18n**: przełącznik języka działa na produkcji (jeśli strona wielojęzyczna).

## Weryfikacja (zasada przez wszystkie fazy)

Nie ufaj „wygląda na skończone". Daj sobie dowód: build motywu bez błędów, Lighthouse, screenshot porównany z makietą, testowy lead z formularza, testowa transakcja. To Ty jesteś pętlą kontroli — wymagaj artefaktu, nie deklaracji.
