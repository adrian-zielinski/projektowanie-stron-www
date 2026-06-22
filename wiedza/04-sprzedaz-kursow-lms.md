# 04 — Sprzedaż kursów i platformy LMS na WordPress (custom theme)

SOP dla web-designera, który na podstawie briefu buduje stronę sprzedaży kursu i platformę kursową na WordPress — custom theme, bez Elementora. Prowadzi przez całość: od struktury strony sprzedaży, przez lejek, po wybór i integrację LMS-a z własnym motywem.

Założenie robocze: klient sprzedaje kurs online (info-produkt) i chce stronę, która zamienia ruch w kupujących, oraz platformę, na której uczeń ogląda lekcje. To dwie różne rzeczy — **strona sprzedaży** przekonuje, **platforma LMS** dostarcza. Buduj je osobno i świadomie.

---

## 1. Strona sprzedaży kursu (sales page)

Strona sprzedaży to jedna długa strona z jednym celem: kliknięcie „Kup". Nie rozprasza menu, nie linkuje na zewnątrz, nie sprzedaje pięciu rzeczy naraz. Czytelnik scrolluje w dół przez logiczny ciąg argumentów i na każdym ekranie dostaje powód, by zostać.

### 1.1 Kolejność sekcji (sprawdzony układ od góry do dołu)

Trzymaj się tej sekwencji — odpowiada na pytania w kolejności, w jakiej rodzą się w głowie czytelnika:

1. **Hero z obietnicą/transformacją** — nagłówek mówi, dokąd kurs zaprowadzi (stan PO), nie czym jest kurs. Pod nagłówkiem jedno zdanie doprecyzowujące + pierwsze CTA. Zła wersja: „Kurs Excela dla początkujących". Dobra: „W 6 tygodni przestaniesz tracić wieczory na ręczne raporty — Excel zrobi je za Ciebie".
2. **Problem i agitacja** — nazwij ból odbiorcy jego słowami. Wymień rozwiązania, które już próbował i które zawiodły (darmowe YouTube, książki, kombinowanie samemu). Buduje to świadomość, że potrzebny jest system, nie kolejny przypadkowy tutorial.
3. **Wizja stanu PO** — namaluj konkretnie, jak wygląda życie po ukończeniu kursu. Konkret, nie ogólniki.
4. **Dla kogo (i dla kogo nie) jest kurs** — kwalifikacja. „Ten kurs jest dla Ciebie, jeśli…" + „Ten kurs NIE jest dla Ciebie, jeśli…". Sekcja „dla kogo nie" paradoksalnie podnosi konwersję — sygnalizuje uczciwość i odsiewa zwroty.
5. **Program (moduły/lekcje)** — rozbicie na moduły z 1-zdaniowym efektem każdego modułu. Nie listuj samych tytułów lekcji — przy każdym module dopisz, co uczeń BĘDZIE UMIAŁ po jego ukończeniu. Pokaż liczby: X modułów, Y lekcji, Z godzin materiału.
6. **Sylwetka prowadzącego** — kim jest, dlaczego ma prawo uczyć tego tematu (wyniki, doświadczenie, droga). Zdjęcie twarzy. Historia osobista buduje zaufanie szybciej niż lista tytułów.
7. **Dowód społeczny i wyniki uczniów** — opinie z imieniem, zdjęciem, najlepiej konkretnym rezultatem („zwiększyłam sprzedaż o 30%"). Screeny wiadomości, metryki, case studies. To najmocniejsza dźwignia konwersji — daj jej dużo miejsca.
8. **Pricing** — warianty cenowe + gwarancja zwrotu tuż pod cennikiem.
9. **Bonusy** — co dostają ekstra (szablony, nagrania, dostęp do grupy). Każdy bonus z przypisaną wartością w zł, by spuchła postrzegana wartość pakietu.
10. **FAQ** — rozbij ostatnie obiekcje.
11. **Domknięcie + ostatnie CTA** — podsumowanie obietnicy, przypomnienie gwarancji, ostatni przycisk.

### 1.2 Elementy konwersji — co musi się znaleźć

**Obietnica/transformacja.** Sprzedajesz zmianę, nie zawartość. Nagłówek = stan docelowy. Cała góra strony krąży wokół jednej transformacji.

**Program kursu.** Pokazuje, że za obietnicą stoi konkretny system. Format: moduł → efekt. Dodaj „peek inside" (zrzut platformy albo krótki fragment lekcji), by zdjąć lęk „a co tam właściwie jest".

**Dowód społeczny.** Trzy typy, użyj wszystkich, jakie masz: opinie tekstowe (z twarzą i nazwiskiem), wyniki liczbowe uczniów, logotypy/media/certyfikaty. Im wyższa cena, tym więcej dowodu strona musi unieść.

**Pricing — warianty.** Daj 3 warianty, nie jeden (efekt zakotwiczenia):
- **Basic** — same moduły rdzeniowe.
- **Standard** (oznacz „Najpopularniejszy") — moduły + bonusy. To ten ma się sprzedawać; zaprojektuj go wizualnie jako domyślny wybór.
- **Premium** — moduły + bonusy + społeczność/konsultacje/case studies.

Przy cenie od ~2000 zł w górę pokaż **plan ratalny** (np. 3 raty). Widoczna rata potrafi podnieść konwersję ofert premium 1,5–2×, bo obniża barierę pierwszej decyzji.

**Gwarancja zwrotu.** Umieść ją bezpośrednio pod cennikiem — tam, gdzie wzbiera lęk zakupowy. 14 lub 30 dni „bez pytań". Realny koszt to zwykle poniżej 3% zwrotów, jeśli kurs dowozi obietnicę, a sama gwarancja potrafi podbić konwersję o ~30%. Sformułuj ją śmiało i konkretnie, nie drobnym druczkiem.

**FAQ.** Odpowiadaj na PRAWDZIWE pytania kupujących, nie na wygodne dla Ciebie. Standardowy zestaw: ile trwam dostęp, czy dla początkujących, ile czasu tygodniowo, czy będzie aktualizowany, jak płacę, czy faktura, co jeśli nie mam czasu teraz. Każde FAQ to rozbrojona obiekcja.

**CTA.** 3–4 przyciski rozłożone po stronie: jeden w hero (dla zdecydowanych), 1–2 w środku (po dowodzie społecznym i programie), jeden na dole (po FAQ i gwarancji). Ten sam tekst i kolor na wszystkich — spójność buduje rozpoznawalność akcji. Tekst zorientowany na korzyść („Chcę zacząć"), nie generyczne „Wyślij".

**Bonusy.** Działają jak dokładka, która przeważa decyzję. Każdy z konkretną wartością i krótkim uzasadnieniem, po co uczniowi.

**Etyczne urgency.** Pilność tak — fałszywa pilność nie. Etyczne: realne zamknięcie zapisów (kohorta startuje w dacie X), prawdziwie limitowane miejsca (bo jest mentoring), znikający bonus za zapis do określonej daty, rosnąca cena po premierze. Nieetyczne i ryzykowne prawnie: fałszywy licznik resetujący się przy każdym wejściu, „ostatnie 3 miejsca" od pół roku, wymyślone rabaty. Jeśli używasz licznika czasu — niech odlicza do realnego zdarzenia (np. przez Deadline Funnel z prawdziwym deadline'em per-lead), nie do niczego.

### 1.3 Checklista wdrożenia strony sprzedaży (custom theme)

- [ ] Strona jako osobny **template** w motywie (`page-sales.php` lub szablon przez nagłówek `Template Name`), bez sidebaru i bez głównego menu.
- [ ] Sekcje jako modularne `template-parts` — łatwiej je przestawiać i recyklować na kolejnych lejkach.
- [ ] Jedno źródło prawdy dla ceny i CTA (np. pola ACF), żeby przy zmianie ceny nie edytować 4 miejsc.
- [ ] Sticky CTA na mobile (pasek z przyciskiem na dole ekranu).
- [ ] Mobile-first — większość ruchu z reklam jest mobilna; testuj na telefonie zanim na desktopie.
- [ ] Szybkość: lazy-load wideo/opinii, brak ciężkich bibliotek tylko pod jedną animację, obrazy w WebP.
- [ ] Piksele/eventy (Meta, GA4) na widok strony i klik CTA — bez tego lejek jest ślepy.

---

## 2. Lejek sprzedaży kursu

Strona sprzedaży rzadko sprzedaje „z zimna". Wpina się w lejek, który najpierw buduje zaufanie. Twoja rola jako designera: zbudować strony-elementy lejka i zadbać, by płynnie się przekazywały.

### 2.1 Schemat lejka

```
Ruch (reklama / social / SEO)
   ↓
Lead magnet (darmowa wartość) → zapis e-mail
   ↓
Sekwencja e-mail (nurturing 4–6 maili)
   ↓
Webinar / VSL (sprzedaż na ciepło)
   ↓
STRONA SPRZEDAŻY → checkout → onboarding na platformie LMS
```

### 2.2 Elementy lejka

**Lead magnet.** Darmowy zasób rozwiązujący jeden mały, konkretny problem — i naturalnie prowadzący do kursu. Dobre formaty: mini-kurs (3–5 lekcji), checklista, szablon, webinar. Nie oddawaj najlepszego materiału; pokaż, jak to jest uczyć się od tego prowadzącego. Cel: zdobyć e-mail. Strona do zbudowania: **opt-in / squeeze page** (krótka, jedno pole + jeden przycisk).

**Sekwencja e-mail.** Welcome series 4–6 maili: dostarcza wartość, opowiada historię prowadzącego, rozbraja obiekcje i wprowadza płatny kurs. To tu dzieje się większość pracy zanim ktokolwiek zobaczy cenę. Integracja: formularz na opt-in page → narzędzie mailingowe (np. Kit/MailerLite/ActiveCampaign). Twoja rola: podpiąć formularz i tagowanie.

**Webinar / VSL.** Webinar = 60–90 min nauczania, dowodzi eksperckości, rozbraja obiekcje, kończy się ofertą, gdy zaufanie jest najwyższe. VSL (video sales letter) pełni tę samą funkcję w formie nagranego wideo na stronie. Strony do zbudowania: **rejestracja na webinar** + **strona „live"/odtworzenia**, często z ofertą i licznikiem.

**Strona sprzedaży.** Domyka. W zimnym ruchu musi unieść cały ciężar przekonywania sama; w ciepłym (po webinarze) może być krótsza, bo zaufanie już jest.

### 2.3 Jaki lejek pod jaką cenę

| Cena kursu | Model lejka | Strony do zbudowania |
|---|---|---|
| do ~400 zł | prosta landing + checkout | sales page, checkout, podziękowanie |
| ~400–4000 zł | lejek webinarowy / VSL | opt-in, rejestracja webinar, sales page, checkout |
| powyżej ~4000 zł | aplikacja / rozmowa sprzedażowa | opt-in, strona aplikacji, kalendarz, (opcjonalnie) sales page |

Wniosek dla designera: zanim zaczniesz, ustal z klientem cenę i model lejka — od tego zależy, ile i jakich stron robisz. Strona sprzedaży to jeden klocek, nie całość.

---

## 3. Platformy LMS na WordPress — porównanie

Po sprzedaży uczeń ląduje na platformie, gdzie ogląda lekcje. Na WordPressie robi to wtyczka LMS. Czwórka, którą warto znać: **LearnDash**, **Tutor LMS**, **Sensei LMS**, **LifterLMS**.

> Ceny zmieniają się co roku i zależą od liczby stron oraz promocji — zawsze sprawdź aktualny cennik na stronie producenta przed rekomendacją klientowi. Poniższe to stan orientacyjny na 2026.

### 3.1 Tabela porównawcza

| Kryterium | LearnDash | Tutor LMS | Sensei LMS | LifterLMS |
|---|---|---|---|---|
| **Cena (1 strona, rocznie)** | od ~199 USD (brak darmowej wersji) | darmowy core + Pro od ~199 USD | darmowy core + Sensei Pro od ~179 USD | darmowy core + od ~149,50 USD |
| **Wersja darmowa** | nie | tak | tak | tak |
| **Model przechowywania danych** | **własne tabele** (skaluje się do 10k+ uczniów) | mieszany | mieszany (oparty na WooCommerce) | głównie post-meta (komfortowo do ~2000 uczniów) |
| **Drip content** | tak | tak | tak | tak |
| **Quizy** | najbogatsze (banki pytań, wiele typów, AI quiz builder, timery) | dobre (timery, oceny) | podstawowe–dobre | dobre |
| **Certyfikaty** | bardzo rozbudowany kreator | tak (Pro) | tak | tak |
| **Gamifikacja** | przez dodatki (GamiPress, BuddyBoss) | wbudowane elementy + dodatki | przez dodatki | mocny nacisk na zaangażowanie + dodatki |
| **Membership / subskrypcje** | przez dodatki / integracje | Pro odblokowuje membership | przez WooCommerce (Subscriptions) | **wbudowane** (membership, plany płatności, subskrypcje) |
| **Płatności wbudowane** | przez integracje | Stripe, PayPal, WooCommerce | przez WooCommerce | **wbudowane Stripe + PayPal** + dodatek WooCommerce |
| **Integracja WooCommerce** | dodatek | tak | natywna (rdzeń ekosystemu) | dodatek |
| **Wydajność** | bardzo dobra na dużej skali (własne tabele) | dobra, nowoczesny UI | zależna od WooCommerce | dobra do średniej skali, potem wymaga optymalizacji |
| **Krzywa wejścia** | średnia–wysoka | niska (najłatwiejszy) | niska, jeśli znasz WooCommerce | niska–średnia |
| **Najlepszy do** | duże, zaawansowane platformy, kursy quiz-heavy | freelancer/MŚP, najlepszy stosunek funkcji do ceny i prostoty | strony już oparte na WooCommerce | kursy + membership + społeczność w jednym |

### 3.2 Modele płatności i subskrypcji — szczegóły

- **LifterLMS** ma najwięcej z pudełka: wbudowane bramki Stripe i PayPal, membership, plany ratalne i subskrypcje bez WooCommerce. Z dodatkiem WooCommerce możesz spiąć produkt WooCommerce z planem dostępu — po zakupie produktu uczeń zapisuje się automatycznie do kursu/membershipu.
- **Sensei LMS** monetyzuje przez WooCommerce — naturalny wybór, gdy strona i tak stoi na WooCommerce (produkty, subskrypcje, płatności w jednym ekosystemie).
- **Tutor LMS** wspiera Stripe, PayPal i WooCommerce; Pro odblokowuje membership i dodatkowe bramki.
- **LearnDash** sam w sobie obsługuje proste płatności i subskrypcje (Stripe/PayPal), a pełną elastyczność (kupony, membership, bundling) daje przez WooCommerce i dodatki.

### 3.3 Wydajność — co musisz wiedzieć

- **LearnDash** trzyma dane w dedykowanych tabelach, nie w `wp_postmeta` — dlatego radzi sobie na dużej skali (10k+ uczniów, ~1,2 s ładowania lekcji na przyzwoitym hostingu). Mimo to generuje personalizowane strony (postęp, wyniki) = sporo zapytań; cache i dobry hosting obowiązkowe.
- **LifterLMS** opiera się mocno na post-meta — działa komfortowo do ~2000 uczniów, powyżej wymaga optymalizacji bazy lub custom dev.
- **Próg bólu** dla każdego LMS-a: powyżej ~100 aktywnych uczniów jednocześnie albo przy kursach quiz-heavy przejdź na VPS / managed WordPress. Współdzielony hosting padnie.
- Niezależnie od wyboru: cache stron, obiektowy cache (Redis), CDN na wideo (nie hostuj wideo lekcji na WordPressie — wrzuć na Vimeo/Bunny/Cloudflare Stream i osadzaj).

### 3.4 Kiedy który — szybka decyzja

- **Budżet napięty, prosty kurs, początkujący klient** → Tutor LMS (darmowy start, najłatwiejszy, najlepszy stosunek ceny do funkcji).
- **Duża platforma, dużo quizów, zaawansowane oceny, skala** → LearnDash.
- **Strona już na WooCommerce / sklep + kursy** → Sensei LMS.
- **Kursy + membership + społeczność jako jeden produkt subskrypcyjny** → LifterLMS.

---

## 4. LMS a custom theme — integracja wizualna

Domyślne szablony lekcji każdego LMS-a wyglądają generycznie i rzadko pasują do custom theme. Spójność robisz przez **nadpisywanie szablonów (template override)** w child theme, nie przez grzebanie w plikach wtyczki — edycja plików wtyczki znika przy aktualizacji i potrafi unieważnić licencję/wsparcie.

### 4.1 Zasada nadrzędna

1. Pracuj zawsze w **child theme** (lub w głównym custom theme, jeśli to on jest produktem).
2. Nadpisuj szablony przez kopiowanie do motywu z zachowaniem struktury katalogów.
3. Wygląd zmieniaj przez **hooki** (action/filter) zawsze, gdy się da — to przeżywa aktualizacje lepiej niż kopia całego szablonu.
4. Po każdej większej aktualizacji LMS-a porównaj swoje nadpisane szablony z nowymi oryginałami wtyczki (override może się zdezaktualizować i zgubić nowe funkcje).

### 4.2 Override szablonów — per LMS

**LearnDash (motyw LD30).** Kopiujesz szablon z `wp-content/plugins/sfwd-lms/themes/ld30/templates/lekcja.php` do `wp-content/themes/twoj-child/learndash/ld30/lekcja.php` — czyli do katalogu `learndash/` w motywie, z zachowaniem podścieżki, ale bez segmentu `/templates/`. Do drobnych zmian używaj filtra `learndash_template` (podmienia ścieżkę szablonu) oraz licznych hooków, np. `learndash-course-payment-buttons-before/after`, `ld_after_course_status_template_container`.

**LifterLMS.** Kopiujesz szablony do katalogu `lifterlms/` w motywie, zachowując strukturę z folderu `templates` wtyczki. Tak nadpiszesz np. karty kursów w katalogu, layout pojedynczej lekcji czy pasek postępu. LifterLMS ma też bogaty zestaw hooków do wstrzykiwania treści bez kopiowania całych plików.

**Tutor LMS.** Override przez katalog `tutor/` w motywie (analogicznie — kopia z folderu szablonów wtyczki). Nowoczesny front i dużo ustawień wyglądu z panelu, więc część rzeczy zmienisz bez kodu.

**Sensei LMS.** Override przez katalog `sensei/` w motywie; mocno trzyma się konwencji WooCommerce, więc jeśli znasz nadpisywanie szablonów Woo, jesteś w domu.

### 4.3 Własny wygląd panelu studenta

Panel ucznia (dashboard: moje kursy, postęp, certyfikaty) to najczęściej najbardziej „obcy" wizualnie element. Plan działania:

1. Zlokalizuj szablon dashboardu w danym LMS-ie i nadpisz go w motywie (LifterLMS: `lifterlms/myaccount/` / `dashboard`; LearnDash: bloki/skróty profilu; Tutor/Sensei: odpowiednie pliki dashboardu).
2. Owiń panel w layout motywu (ten sam header/footer, kontener, siatka), żeby uczeń nie czuł, że wyszedł ze strony.
3. Ostyluj przez **własne klasy i zmienne CSS motywu**, nie przez nadpisywanie dziesiątek selektorów wtyczki `!important`. Najpierw zmapuj klasy LMS-a, potem dopnij je do swojego design-systemu.
4. Player wideo i listę lekcji potraktuj priorytetowo — tu uczeń spędza najwięcej czasu.

### 4.4 Spójność wizualna — checklista

- [ ] Typografia, kolory i odstępy lekcji = zmienne design-systemu motywu (jedno źródło prawdy w `:root`).
- [ ] Przyciski LMS (zapisz się, dalej, ukończ) przejmują styl przycisków motywu.
- [ ] Pasek postępu, karty kursów, certyfikaty zgodne z brandem.
- [ ] Header/footer i kontener takie same na stronie marketingowej i wewnątrz platformy.
- [ ] Strony logowania/rejestracji/konta ostylowane (nie domyślny `wp-login`).
- [ ] Responsywność lekcji i playera sprawdzona na telefonie.
- [ ] Po aktualizacji LMS-a: regresja wizualna lekcji, dashboardu i checkoutu.
- [ ] Gdy potrzebna społeczność/gamifikacja ponad to, co daje LMS → rozważ **BuddyBoss** (nadpisuje wiele szablonów LearnDash/LifterLMS/Tutor i dorzuca punkty, odznaki, rangi, feed) zamiast budować to od zera.

### 4.5 Pułapki, których unikać

- **Nie edytuj plików wtyczki** — zawsze override w motywie. Inaczej aktualizacja kasuje pracę.
- **Nie hostuj wideo lekcji na WordPressie** — zabije transfer i wydajność. Vimeo/Bunny/Cloudflare Stream.
- **Nie wybieraj LMS-a pod cenę licencji w oderwaniu od skali** — tani LMS na 5000 uczniów wygeneruje koszt w godzinach optymalizacji.
- **Nie mieszaj dwóch LMS-ów** na jednej stronie — migracja danych między nimi bywa bolesna.
- **Nie zostawiaj domyślnego brandingu** na checkoucie i e-mailach transakcyjnych — to wciąż ścieżka klienta.

---

## 5. Skrócony przebieg projektu (od briefu do wdrożenia)

1. **Brief** — ustal: cena kursu, model lejka, skala (liczba uczniów), potrzeba membershipu/społeczności, czy będzie sklep (WooCommerce).
2. **Wybór LMS-a** — wg sekcji 3.4 i wymagań z briefu.
3. **Architektura stron** — strona sprzedaży + elementy lejka (sekcja 2) + platforma LMS.
4. **Sales page** — zbuduj wg sekcji 1, jako osobny template bez menu.
5. **Lejek** — opt-in, mailing, webinar/VSL wg ceny i modelu.
6. **LMS + custom theme** — instalacja, override szablonów, panel studenta, spójność wizualna (sekcja 4).
7. **Płatności** — Stripe/WooCommerce wg wybranego LMS-a; test pełnej ścieżki zakup → zapis → dostęp.
8. **Wydajność i tracking** — cache, CDN wideo, piksele/GA4, test mobilny.
9. **QA** — pełna ścieżka: reklama → opt-in → mail → sales page → checkout → onboarding → pierwsza lekcja.

---

## Źródła

- [Tutor LMS vs LearnDash vs LifterLMS — Detailed Comparison 2026 (WP Discounts)](https://wpdiscounts.io/blog/tutor-lms-vs-learndash-vs-lifterlms/)
- [LearnDash Alternatives: LifterLMS, Tutor LMS & More 2026 (FatLab)](https://fatlabwebsupport.com/blog/website-support/learndash-alternatives/)
- [WordPress LMS Comparison: Top 3 Plugins for 2026 (LD Ninjas)](https://ldninjas.com/wordpress-lms-comparison-learndash-vs-tutorlms-vs-lifterlms-in-2026/)
- [We tested all 11 "best" WordPress LMS plugins (LifterLMS)](https://lifterlms.com/blog/best-wordpress-lms-plugins/)
- [Best WordPress LMS Plugin for 2026: Comparison & Buying Guide (Academy LMS)](https://academylms.net/best-lms-plugins-for-wordpress-compared/)
- [Best LMS Plugins for WordPress Sites (BuddyBoss)](https://buddyboss.com/blog/best-lms-plugins-for-wordpress-sites/)
- [LearnDash Slow Database Queries and Poor Database Design (Managing WP)](https://managingwp.io/live-blog/learndash-slow-database-queries-and-poor-database-design/)
- [How We Made LearnDash 75 Times Faster (Uncanny Owl)](https://www.uncannyowl.com/how-we-made-learndash-75-times-faster/)
- [LifterLMS WooCommerce Integration](https://lifterlms.com/product/woocommerce-extension/)
- [Overriding LearnDash Templates (WisdmLabs Docs)](https://docs.wisdmlabs.com/article/wisdm-elumine-theme/for-developers/overriding-learndash-templates/)
- [learndash_template hook (LearnDash Dev Docs)](https://developers.learndash.com/hook/learndash_template/)
- [How to Customize LifterLMS Templates (LifterLMS Docs)](https://lifterlms.com/docs/lifterlms-templates/)
- [How to Customize a LearnDash Template in your Child Theme (Divi Engine)](https://diviengine.com/how-to-customize-a-learndash-template-in-your-child-theme/)
- [BuddyBoss + LifterLMS integration](https://buddyboss.com/integrations/lifterlms/)
- [Online Course Sales Page: 17 Examples, Tips & Funnel Guide (Kit)](https://kit.com/resources/blog/online-course-sales-page)
- [How to Create an Online Course Sales Page that Converts (Thrive Themes)](https://thrivethemes.com/online-course-sales-page-template/)
- [15 Steps to an Online Course Sales Page That Converts (Data Driven Marketing)](https://datadrivenmarketing.co/blog/online-course-sales-page/)
- [Sales Funnel for Online Courses: The Complete Playbook (ClickFunnels)](https://www.clickfunnels.com/blog/sales-funnel-online-courses/)
- [Lead Magnet Funnel: Step-by-Step Template (Newzenler)](https://www.newzenler.com/blog/lead-magnet-funnel-step-by-step-template-that-converts)
- [Webinar Funnel Guide (Newzenler)](https://www.newzenler.com/blog/webinar-funnel-guide-how-to-build-live-automated-webinar-funnels-that-sell)
