---
name: kursy-lms
description: >
  Buduje stronę sprzedaży kursu, lejek (lead magnet → mail → webinar/VSL → oferta)
  i platformę LMS na WordPress jako custom classic theme (zero Elementora/builderów).
  Pomaga wybrać LMS (LearnDash / Tutor LMS / Sensei / LifterLMS) i zintegrować go
  z motywem przez override szablonów. Użyj ZAWSZE, gdy klient sprzedaje kurs online,
  szkolenie, info-produkt, robi strefę członkowską lub membership — i gdy padają
  słowa "kurs", "kursy online", "LMS", "szkolenie online", "platforma kursowa",
  "strefa członkowska", "membership", "LearnDash", "Tutor LMS", "Sensei", "LifterLMS",
  "sprzedaż wiedzy", "sales page kursu", nawet jeśli klient nie nazwie tego wprost LMS-em.
---

# Kursy i LMS na WordPress (custom theme)

Strona sprzedaży i platforma kursowa to **dwie różne rzeczy**: sales page przekonuje (jedna długa strona, jeden cel — „Kup"), LMS dostarcza (uczeń ogląda lekcje). Buduj je osobno i świadomie. Wszystko jako custom classic theme — override szablonów w kodzie, nie Elementor.

Zanim cokolwiek zaczniesz, wyciągnij z briefu cztery rzeczy: **cena kursu**, **model lejka**, **skala** (ilu uczniów docelowo) i **czy potrzebny membership/społeczność/sklep**. Od ceny zależy lejek, od skali — wybór LMS-a. Bez tego projektujesz w ciemno.

## Strona sprzedaży — kolejność sekcji (nie zmieniaj)

Sekwencja odpowiada na pytania w kolejności, w jakiej rodzą się w głowie czytelnika. Trzymaj ten porządek:

1. **Hero z transformacją** — nagłówek = stan PO, nie „czym jest kurs". Pod nim jedno zdanie + pierwsze CTA. (Źle: „Kurs Excela dla początkujących". Dobrze: „W 6 tygodni Excel zrobi raporty za Ciebie".)
2. **Problem i agitacja** — ból słowami odbiorcy + co już próbował i zawiodło (YouTube, książki, kombinowanie sam).
3. **Wizja stanu PO** — konkretnie, jak wygląda życie po kursie.
4. **Dla kogo (i dla kogo NIE)** — sekcja „nie jest dla Ciebie, jeśli…" podnosi konwersję: sygnał uczciwości, odsiewa zwroty.
5. **Program (moduły → efekt)** — każdy moduł z 1 zdaniem „co uczeń BĘDZIE UMIAŁ". Pokaż liczby (X modułów, Y lekcji, Z godzin) + „peek inside" (zrzut platformy / fragment lekcji).
6. **Sylwetka prowadzącego** — kim jest, czemu ma prawo uczyć (wyniki, droga), zdjęcie twarzy.
7. **Dowód społeczny** — najmocniejsza dźwignia, daj jej dużo miejsca. Trzy typy: opinie z twarzą i nazwiskiem + konkretnym wynikiem, liczby uczniów, logotypy/media/certyfikaty.
8. **Pricing** — 3 warianty (zakotwiczenie), gwarancja zwrotu tuż pod cennikiem.
9. **Bonusy** — każdy z przypisaną wartością w zł (puchnie postrzegana wartość pakietu).
10. **FAQ** — rozbij ostatnie obiekcje.
11. **Domknięcie + ostatnie CTA** — podsumowanie obietnicy, przypomnienie gwarancji, ostatni przycisk.

Pełne uzasadnienie i niuanse copy każdej sekcji → `references/sales-page.md`.

### Elementy konwersji — twarde reguły

- **Pricing = 3 warianty.** Basic (rdzeń) · Standard z plakietką „Najpopularniejszy" (rdzeń + bonusy — ma się sprzedawać, zaprojektuj go jako wybór domyślny) · Premium (+ społeczność/konsultacje). Od ~2000 zł pokaż **plan ratalny** — widoczna rata podnosi konwersję premium 1,5–2×, bo obniża barierę pierwszej decyzji.
- **Gwarancja zwrotu** bezpośrednio pod cennikiem (tam wzbiera lęk zakupowy). 14/30 dni „bez pytań", śmiało, nie drobnym druczkiem — realny koszt zwykle <3% zwrotów, a konwersję podbija ~30%.
- **CTA: 3–4 przyciski**, ten sam tekst i kolor wszędzie (rozpoznawalność akcji). Tekst korzyściowy („Chcę zacząć"), nie „Wyślij". Rozmieść: hero, po programie, po dowodzie społecznym, na dole.
- **Etyczne urgency** — pilność tak, fałszywa nie. Etyczne: realne zamknięcie zapisów (kohorta), prawdziwie limitowane miejsca, znikający bonus do daty, rosnąca cena po premierze. Licznik czasu tylko do realnego zdarzenia (np. Deadline Funnel per-lead), nigdy resetujący się przy każdym wejściu.

### Sales page jako template (custom theme)

- Osobny **template bez sidebaru i bez głównego menu** (`page-sales.php` lub szablon przez nagłówek `Template Name`). Menu rozprasza i prowadzi poza lejek.
- Sekcje jako modularne `template-parts` — przestawialne i recyklowalne na kolejnych lejkach.
- **Jedno źródło prawdy dla ceny i CTA** (pola ACF), żeby zmiana ceny nie wymagała edycji 4 miejsc.
- Sticky CTA na mobile (pasek z przyciskiem na dole). **Mobile-first** — ruch z reklam jest mobilny, testuj na telefonie przed desktopem.
- Piksele/eventy (Meta, GA4) na widok strony i klik CTA — bez tego lejek jest ślepy.

## Lejek — dobierz pod cenę

Strona sprzedaży rzadko sprzedaje „z zimna". Twoja rola: zbudować strony-klocki lejka i zadbać o płynne przekazanie między nimi.

```
Ruch (reklama / social / SEO)
  → Lead magnet (darmowa wartość) → zapis e-mail
  → Sekwencja e-mail (4–6 maili: wartość, historia, obiekcje, kurs)
  → Webinar / VSL (sprzedaż na ciepło)
  → STRONA SPRZEDAŻY → checkout → onboarding na LMS
```

- **Lead magnet** — rozwiązuje jeden mały, konkretny problem i prowadzi do kursu (mini-kurs 3–5 lekcji, checklista, szablon, webinar). Nie oddawaj najlepszego materiału. Strona: **opt-in / squeeze page** (krótka, jedno pole + jeden przycisk).
- **Sekwencja e-mail** — welcome series 4–6 maili; tu dzieje się większość pracy zanim ktoś zobaczy cenę. Twoja rola: podpiąć formularz opt-in do narzędzia mailingowego (Kit / MailerLite / ActiveCampaign) + tagowanie.
- **Webinar / VSL** — 60–90 min nauczania kończące się ofertą przy najwyższym zaufaniu; VSL = ta sama funkcja w nagranym wideo. Strony: rejestracja na webinar + strona „live"/odtworzenia (często z ofertą i licznikiem).

**Dobór lejka pod cenę** (ustal cenę z klientem ZANIM zaczniesz robić strony):

| Cena kursu | Model | Strony do zbudowania |
|---|---|---|
| do ~400 zł | prosta landing + checkout | sales page, checkout, podziękowanie |
| ~400–4000 zł | webinar / VSL | opt-in, rejestracja webinar, sales page, checkout |
| powyżej ~4000 zł | aplikacja / rozmowa | opt-in, strona aplikacji, kalendarz, (opcjonalnie) sales page |

## Wybór LMS — decyzja przed instalacją

Cztery wtyczki warte znajomości. **Nie wybieraj pod cenę licencji w oderwaniu od skali** — tani LMS na 5000 uczniów wygeneruje koszt w godzinach optymalizacji. Ceny zmieniają się co roku — sprawdź aktualny cennik producenta przed rekomendacją (stan orientacyjny 2026).

| Kryterium | LearnDash | Tutor LMS | Sensei LMS | LifterLMS |
|---|---|---|---|---|
| **Cena (1 strona / rok)** | od ~199 USD (brak free) | free core + Pro od ~199 USD | free core + Pro od ~179 USD | free core + od ~149,50 USD |
| **Wersja darmowa** | nie | tak | tak | tak |
| **Model danych** | **własne tabele** (10k+ uczniów) | mieszany | mieszany (na WooCommerce) | głównie post-meta (komfort ~2000 uczniów) |
| **Quizy** | najbogatsze (banki pytań, timery, AI builder) | dobre | podstawowe–dobre | dobre |
| **Membership / subskrypcje** | przez dodatki | Pro odblokowuje | przez WooCommerce | **wbudowane** |
| **Płatności** | integracje (Stripe/PayPal) | Stripe, PayPal, Woo | przez WooCommerce | **wbudowane Stripe + PayPal** |
| **Krzywa wejścia** | średnia–wysoka | niska (najłatwiejszy) | niska, jeśli znasz Woo | niska–średnia |
| **Najlepszy do** | duże platformy, quiz-heavy, skala | freelancer/MŚP, cena/funkcje | strony już na WooCommerce | kursy + membership + społeczność |

**Szybka decyzja:**
- Budżet napięty, prosty kurs, początkujący klient → **Tutor LMS**.
- Duża platforma, dużo quizów, zaawansowane oceny, skala → **LearnDash**.
- Strona już na WooCommerce / sklep + kursy → **Sensei LMS**.
- Kursy + membership + społeczność jako jeden produkt subskrypcyjny → **LifterLMS**.

**Skala — pamiętaj o modelu danych** (najczęściej pomijane kryterium): LearnDash trzyma dane w dedykowanych tabelach → znosi 10k+ uczniów. LifterLMS opiera się na post-meta → komfortowo do ~2000, wyżej wymaga optymalizacji bazy. Próg bólu każdego LMS-a: powyżej ~100 aktywnych uczniów naraz albo przy kursach quiz-heavy przejdź na VPS / managed WordPress — współdzielony hosting padnie. Niezależnie od wyboru: cache stron, Redis (object cache), CDN. Szczegóły wydajności i monetyzacji → `references/wybor-lms.md`.

## LMS + custom theme — integracja wizualna

Domyślne szablony lekcji wyglądają generycznie. Spójność robisz przez **override szablonów w child theme** (lub w głównym custom theme, jeśli to on jest produktem), nie przez grzebanie w plikach wtyczki — edycja plików wtyczki znika przy aktualizacji i potrafi unieważnić licencję/wsparcie.

**Zasada nadrzędna:**
1. Pracuj w child theme / custom theme.
2. Nadpisuj szablony kopiując do motywu z zachowaniem struktury katalogów.
3. Wygląd zmieniaj przez **hooki** (action/filter), gdy tylko się da — przeżywają aktualizacje lepiej niż kopia całego szablonu.
4. Po każdej większej aktualizacji LMS-a porównaj swoje nadpisane szablony z nowymi oryginałami (override się dezaktualizuje i gubi nowe funkcje).

**Katalogi override per LMS** (kopiujesz z folderu `templates` wtyczki, zachowując podścieżkę):
- **LearnDash** → `learndash/ld30/` w motywie (bez segmentu `/templates/`). Filtr `learndash_template` + hooki, np. `learndash-course-payment-buttons-before/after`.
- **LifterLMS** → `lifterlms/`. Bogaty zestaw hooków do wstrzykiwania treści bez kopiowania plików.
- **Tutor LMS** → `tutor/`. Dużo ustawień wyglądu z panelu, część zmienisz bez kodu.
- **Sensei LMS** → `sensei/`. Trzyma się konwencji WooCommerce — jeśli znasz override Woo, jesteś w domu.

**Panel studenta** (dashboard: moje kursy, postęp, certyfikaty) to najbardziej „obcy" wizualnie element. Nadpisz jego szablon, owiń w layout motywu (ten sam header/footer/kontener), ostyluj przez **własne klasy i zmienne CSS motywu** — nie przez zalewanie selektorów wtyczki `!important`. Player wideo i listę lekcji potraktuj priorytetowo — tam uczeń spędza najwięcej czasu. Szczegóły override, mapowanie klas i ścieżki dashboardu per LMS → `references/integracja-theme.md`.

## Antywzorce (czego unikać)

- **Elementor / builder wizualny** — twarda zasada projektu. Wszystko jako custom classic theme w kodzie: template, template-parts, override LMS-a. Builder łamie spójność, wagę strony i kontrolę nad lejkiem.
- **Edycja plików wtyczki LMS** — aktualizacja kasuje pracę. Zawsze override w motywie.
- **Hosting wideo lekcji na WordPressie** — zabije transfer i wydajność. Vimeo / Bunny / Cloudflare Stream, osadzaj embed.
- **Wybór LMS-a pod cenę licencji bez patrzenia na skalę** — model danych (post-meta vs własne tabele) decyduje przy 2000+ uczniach.
- **Mieszanie dwóch LMS-ów** na jednej stronie — migracja danych między nimi bolesna.
- **Domyślny branding na checkoucie i e-mailach transakcyjnych** — to wciąż ścieżka klienta, ostyluj.
- **Domyślny `wp-login`** dla logowania/rejestracji/konta ucznia — ostyluj pod motyw.
- **Sales page z menu i sidebarem** — rozprasza, prowadzi poza lejek. Osobny template, jeden cel.
- **Sprzedaż „zawartości"** zamiast transformacji — nagłówek to stan PO, nie spis lekcji.
- **Copy w stylu AI-slop** — przy nagłówkach, opisach modułów, mailach stosuj skill `stop-slop`: tnij frazy-wypełniacze, binarne kontrasty, stronę bierną. Aktywny głos, konkret, język odbiorcy.

## Checklista QA (bramka przed oddaniem)

- [ ] Sales page: osobny template bez menu/sidebaru, sekcje w kolejności, jedno źródło ceny/CTA, sticky CTA mobile, piksele/GA4.
- [ ] Lejek dobrany pod cenę; formularz opt-in podpięty do mailingu + tagowanie; przejścia między stronami płynne.
- [ ] LMS wybrany pod skalę i potrzebę membershipu; cache + CDN wideo skonfigurowane.
- [ ] Spójność wizualna: typografia/kolory/odstępy lekcji = zmienne `:root`; przyciski LMS w stylu motywu; pasek postępu, karty kursów, certyfikaty zgodne z brandem; ten sam header/footer wewnątrz platformy; logowanie/konto ostylowane.
- [ ] Responsywność lekcji i playera sprawdzona na telefonie.
- [ ] Test pełnej ścieżki: reklama → opt-in → mail → sales page → checkout → onboarding → pierwsza lekcja.
- [ ] Po aktualizacji LMS-a: regresja wizualna lekcji, dashboardu i checkoutu.
- [ ] Gdy potrzebna społeczność/gamifikacja ponad LMS → rozważ **BuddyBoss** (nadpisuje wiele szablonów LearnDash/LifterLMS/Tutor + punkty, odznaki, rangi, feed) zamiast budować od zera.

## Materiały

- `references/sales-page.md` — czytaj przy projektowaniu/copy strony sprzedaży: uzasadnienie każdej sekcji, elementy konwersji, checklista template.
- `references/wybor-lms.md` — czytaj przy rekomendacji LMS-a: pełna tabela, modele płatności i subskrypcji per LMS, wydajność i progi skali.
- `references/integracja-theme.md` — czytaj przy integracji LMS-a z motywem: override per LMS, panel studenta, mapowanie klas, pułapki.
- Bazowa wiedza: `wiedza/04-sprzedaz-kursow-lms.md`.
