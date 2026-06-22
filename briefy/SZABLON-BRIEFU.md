# Brief projektu strony WWW

> Jedyne wejście do procesu „od briefu do wdrożenia". Im konkretniej wypełnisz, tym mniej domysłów na etapie designu i kodu. Pola puste = pytania, które i tak padną później — lepiej zamknąć je teraz.
>
> Jak wypełniać: zostaw kursywowe wskazówki jako podpowiedź, wpisuj odpowiedzi pod nimi lub w miejsce `…`. Czego nie wiesz — zaznacz `DO USTALENIA` (a nie zostawiaj puste, bo puste znaczy „pominięte").
>
> Twarda zasada techniczna projektu: strona powstaje jako **custom classic theme WordPress** (PHP + ACF + Tailwind/Vite). **Zero Elementora i builderów wizualnych.** Brief nie zmienia tej zasady — opisuje, CO budujemy, nie CZYM.

---

## 0. Metryczka

- **Klient / nazwa firmy:** …
- **Osoba kontaktowa + rola:** …  *(kto zatwierdza decyzje i odbiera etapy)*
- **Mail / telefon:** …
- **Data briefu:** …
- **Autor briefu (Ty):** …

---

## 1. Dla kogo — firma i kontekst

### 1.1 Firma
> Czym firma się zajmuje w jednym zdaniu, tak jak powiedziałby to klientowi przy stoliku. Bez żargonu.

…

### 1.2 Branża / nisza
> Konkret, nie kategoria ogólna. Nie „uroda", tylko „gabinet kosmetologii estetycznej, zabiegi na twarz". Branża wybiera checklistę konwersji (patrz `wiedza/03-ecommerce-wg-branz.md` dla sklepów, `wiedza/02-landing-page-konwersja.md`, `wiedza/04-sprzedaz-kursow-lms.md`).

…

### 1.3 Konkurencja
> 2–4 realnych konkurentów + link. Przy każdym jedno zdanie: co robią lepiej, co gorzej. To kalibruje poprzeczkę i pomaga nie wyglądać jak oni.

- …
- …

---

## 2. Typ strony i zakres

### 2.1 Typ strony
> Zaznacz jeden główny (`[x]`). Decyduje, którego skilla-specjalistę uruchamiamy i jakie wtyczki wchodzą.

- [ ] **Wizytówka / strona usług** — prezentacja oferty, leady przez formularz/telefon (bez sprzedaży online)
- [ ] **Sklep WooCommerce** — sprzedaż produktów/usług online (koszyk, płatności, dostawa)
- [ ] **Platforma kursowa / LMS** — kursy online, lekcje, dostęp dla zalogowanych (LearnDash / Tutor LMS / Sensei LMS / LifterLMS)
- [ ] **Hybryda** — opisz: …  *(np. usługi + mały sklep, albo strona firmowa + kursy)*

### 2.2 Skala
> Orientacyjnie. „Mała" do ~7 podstron, „średnia" do ~15, „duża" więcej / z katalogiem produktów/kursów.

Rozmiar: …  ·  Szacowana liczba podstron: …  ·  Liczba produktów/kursów (jeśli sklep/LMS): …

---

## 3. Cel biznesowy, CTA i KPI

### 3.1 Główny cel biznesowy
> Po co ta strona istnieje — jedno zdanie. Np. „Generować zapytania o wycenę montażu fotowoltaiki na terenie woj. śląskiego". Nie „mieć ładną stronę".

…

### 3.2 Główne CTA (akcja #1)
> Jedna akcja, którą strona ma wyciskać przede wszystkim. Reszta jest poboczna. Np. „Umów bezpłatną konsultację", „Dodaj do koszyka", „Zapisz się na kurs".

Główne CTA: …
Drugorzędne CTA (max 1–2): …

### 3.3 KPI — jak zmierzymy sukces
> Liczby, nie wrażenia. Np. „min. 30 zapytań z formularza / mies.", „konwersja sklepu ≥ 2%", „100 zapisów na kurs w pierwszym miesiącu". Jak nie ma danych historycznych — wpisz cel docelowy.

- …
- …

### 3.4 Co ma się dziać po konwersji
> Gdzie ląduje lead/zamówienie i kto go obsługuje. Np. „mail na biuro@ + wpis w CRM", „zamówienie → Fakturownia + powiadomienie kuriera". Determinuje integracje.

…

---

## 4. Grupa docelowa

> Kto realnie kupuje/pyta. Im ostrzej, tym lepiej dobierzemy ton, dowody i język korzyści.

- **Kto to (1–2 persony):** …  *(wiek, sytuacja, rola — np. „właścicielki małych firm 30–45, ogarniają same marketing")*
- **Jaki problem rozwiązują u Ciebie:** …
- **Główne obiekcje / lęki przed zakupem:** …  *(cena? zaufanie? „czy zadziała u mnie"? — to wprost trafia w copy i sekcję dowodów)*
- **Skąd przychodzą na stronę:** …  *(Google, IG/FB, polecenia, reklama płatna — wpływa na hero i SEO)*
- **Mobile czy desktop:** …  *(większość branż B2C = mobile-first; potwierdź)*

---

## 5. USP — czym się wyróżniacie

> 3 powody, dla których klient wybierze tę firmę, a nie konkurenta. Konkretne i sprawdzalne, nie „jakość i profesjonalizm". Np. „montaż w 48 h", „14 lat na rynku, 2000 realizacji", „jedyni w mieście z certyfikatem X". To rdzeń hero i sekcji „dlaczego my".

1. …
2. …
3. …

---

## 6. Ton komunikacji

> Jak strona ma „brzmieć". Zaznacz 2–3 cechy i podaj kontrprzykład (czego unikać). Np. „ciepły i bezpośredni, na Ty — NIE korporacyjny i sztywny".

- **Ton (2–3 słowa):** …
- **Forma:** [ ] na Ty  [ ] na Pan/Pani  [ ] zależnie od sekcji
- **Czego unikać w języku:** …  *(branżowy żargon? nachalna sprzedaż? zdrobnienia?)*
- **Przykład zdania „w głosie marki":** …  *(jeśli masz — wklej fragment z ich social/maila)*

---

## 7. Marka / CI (identyfikacja wizualna)

> Jeśli klient ma księgę znaku — podpnij i resztę pól pomiń. Jeśli nie ma — wypełnij, co jest; brakujące oznacz `DO ZAPROJEKTOWANIA` (wtedy kierunek dobiera skill `web-design-anti-slop`).

- **Logo:** …  *(link/plik; format — najlepiej SVG lub PNG na przezroczystym tle; wersje: poziom/pion/sygnet, jasna/ciemna)*
- **Kolory marki:** …  *(HEX-y; który wiodący, który akcentowy/CTA. Jak brak — `DO ZAPROJEKTOWANIA`)*
- **Fonty:** …  *(nazwy; czy są licencje na web; jak brak — dobierzemy parę nagłówek/tekst, hostowaną lokalnie wg `wiedza/06`)*
- **Księga znaku / brandbook:** …  *(link/plik — `tak / nie`)*
- **Czego marka NIE chce wizualnie:** …  *(np. „bez stocków z uśmiechniętymi ludźmi w garniturach", „nie chcemy ciemnego motywu") — chroni przed AI-slopem i niepotrzebnymi rundami)*

---

## 8. Referencje i inspiracje wizualne

> 3–6 stron/realizacji, które się podobają (link + jedno zdanie: CO konkretnie — layout? animacje? typografia? nastrój?). Plus to, co odrzuca. Pliki od graficzki (mockupy, moodboardy) podpnij tutaj.

**Podoba się:**
- … — bo: …
- … — bo: …

**Odrzuca / „tak nie":**
- … — bo: …

**Pliki od graficzki / moodboard (ścieżki lub linki):** …

---

## 9. Lista podstron (mapa strony)

> Wypisz wszystkie podstrony w docelowej strukturze menu. Zaznacz, które w menu głównym, które w stopce. To szkielet architektury treści.

| Podstrona | W menu gł.? | Cel podstrony (1 zdanie) | Główne CTA na niej |
|---|---|---|---|
| Strona główna | tak | … | … |
| O nas / O mnie | … | … | … |
| Oferta / Usługi | … | … | … |
| … | … | … | … |
| Kontakt | … | … | … |
| Blog (jeśli) | … | … | … |
| Polityka prywatności | stopka | wymóg prawny | — |
| Regulamin (jeśli sklep/LMS) | stopka | wymóg prawny | — |

---

## 10. Oferta — usługi / produkty / kursy

> Pełna lista tego, co strona prezentuje lub sprzedaje. Wybierz właściwą tabelę wg typu strony, resztę usuń.

**Usługi (wizytówka):**

| Usługa | Krótki opis | Cena / widełki / „od X" | Jest dowód (realizacje/opinie)? |
|---|---|---|---|
| … | … | … | … |

**Produkty (sklep):**
> Skąd dane produktów: plik / arkusz / hurtownia / klient wpisze sam? Ile wariantów (rozmiar×kolor)? Atrybuty do filtrów?

- Liczba produktów: …  ·  Źródło danych: …  ·  Warianty: …  ·  Atrybuty/filtry: …

**Kursy (LMS):**
> Struktura: kursy → moduły → lekcje. Format lekcji (wideo/tekst/quiz)? Dostęp: jednorazowy zakup / subskrypcja / membership? Certyfikaty?

- Lista kursów: …  ·  Model dostępu: …  ·  Format lekcji: …  ·  Certyfikaty: `tak / nie`

---

## 11. Funkcje

> Zaznacz, co strona musi umieć. Każda funkcja `tak` to wtyczka/integracja/konfiguracja — bądź selektywny (mniej = szybciej i bezpieczniej, patrz `wiedza/06` §8).

- [ ] **Formularz kontaktowy** — pola: …  ·  gdzie trafia (mail/CRM): …
- [ ] **Rezerwacja / kalendarz terminów** — co rezerwujemy: …  ·  płatność z góry / zaliczka / bez: …
- [ ] **Sklep (WooCommerce)** — szczegóły w §10 i §12
- [ ] **Kursy / LMS** — szczegóły w §10
- [ ] **Blog** — kto pisze i jak często: …
- [ ] **Newsletter / zapis na listę** — narzędzie (Mailchimp/MailerLite/…): …
- [ ] **Wielojęzyczność (i18n)** — języki: …  ·  wtyczka (WPML / Polylang): …  *(uwaga: i18n mocno zwiększa zakres — potwierdź, że naprawdę potrzebne)*
- [ ] **Strefa klienta / logowanie** — po co: …
- [ ] **Inne:** …

---

## 12. Płatności i dostawa  *(tylko sklep / kursy płatne / rezerwacja z płatnością)*

> BLIK to ~48% płatności online w PL — bez niego nie startujemy (patrz `wiedza/03` §3.2).

- **Bramka płatności:** …  *(P24 / PayU / Tpay = natywny BLIK; Stripe dla kart/zagranicy. Kto ma konto u operatora?)*
- **Metody:** [ ] BLIK  [ ] karta  [ ] przelew  [ ] Apple/Google Pay  [ ] za pobraniem  [ ] raty
- **Dostawa / kurierzy:** …  *(InPost Paczkomaty? DPD/DHL? integracja Furgonetka? darmowa wysyłka od kwoty X?)*
- **Faktury:** …  *(Fakturownia / wFirma / iFirma — automatycznie po zamówieniu? kto ma konto?)*
- **Podatki / VAT:** …  *(płatnik VAT? stawki?)*

---

## 13. Treści

> Bez treści nie ma strony — to najczęstszy hamulec terminu. Ustal jasno, kto i kiedy dostarcza.

- **Teksty:** …  *(klient dostarcza gotowe / dostarcza surowe do obróbki / piszemy my na podstawie wywiadu)*
- **Stan na dziś:** …  *(są / będą do DD.MM / brak — wtedy lorem na makiety i czekamy)*
- **Gdzie są:** …  *(link do dysku/dokumentu)*
- **Kto zatwierdza copy:** …
- **Dane do stopki/kontaktu:** …  *(nazwa firmy, adres, NIP, telefon, mail, godziny, social, mapa)*

---

## 14. Zdjęcia i assety

> Dobre zdjęcia robią połowę wrażenia. Słabe — psują nawet świetny layout.

- **Zdjęcia:** …  *(klient ma własne / sesja zaplanowana / bierzemy stocki — jakie? / brak)*
- **Gdzie są pliki:** …  *(link do dysku; rozdzielczość — dla sklepu min. 2000 px dłuższy bok)*
- **Logo i grafiki marki:** …  *(patrz §7 — tu wklej ścieżki)*
- **Wideo (jeśli):** …  *(hero-wideo? prezentacje? skąd?)*
- **Ikony / ilustracje:** …  *(styl: linie / wypełnione / custom?)*
- **Prawa do materiałów:** …  *(czy klient ma licencje na wszystko, co podsyła?)*

---

## 15. Domena i hosting

> Domyślny hosting projektu: **LH.pl, plan Mango** (LiteSpeed, NVMe, SSH, Redis — patrz `wiedza/06` §5 i §7). Jeśli inny — zaznacz, bo zmienia procedurę cache i deployu.

- **Domena:** …  *(jaka; czy już kupiona; u kogo zarejestrowana; czy mamy dostęp do DNS)*
- **Hosting:** [ ] LH Mango (domyślny)  [ ] inny: …
- **Czy jest stara strona:** …  *(do migracji treści? przekierowania starych URL-i? termin wyłączenia?)*
- **Dostępy potrzebne od klienta:**
  - [ ] Panel hostingu (DirectAdmin/LH) lub dane FTP/SSH
  - [ ] Dostęp do DNS / domeny
  - [ ] Konto u operatora płatności (jeśli sklep)
  - [ ] Konta integracji (Fakturownia, newsletter, kurierzy)
  - [ ] Maile firmowe (do konfiguracji SMTP dla formularzy)
- **Mail do wysyłki z formularzy (SMTP):** …  *(często pomijane — bez tego maile z formularza wpadają w spam)*

---

## 16. Deadline i budżet zakresu

- **Termin oczekiwany (data):** …
- **Twardy deadline (event, kampania)?** …  *(jeśli tak — co i kiedy; to ustawia priorytety zakresu)*
- **Kamienie milowe:** …  *(np. „makieta do DD.MM", „strona na stage do DD.MM", „prod do DD.MM")*
- **Funkcje must-have vs nice-to-have:** …  *(co wchodzi na pewno, co tylko jak starczy czasu — ratuje termin przy poślizgu treści)*

---

## 17. Wymogi prawne

> W Polsce/UE nieobowiązkowe pominięcie = realne ryzyko prawne klienta. Domyślnie wszystkie na `tak`, chyba że ewidentnie nie dotyczy.

- [ ] **Polityka prywatności (RODO)** — kto dostarcza treść: …  *(prawnik klienta / generator / my z szablonu)*
- [ ] **Baner cookies + zgody** — narzędzie: …  *(np. CookieYes/Complianz; blokada skryptów marketingowych do zgody)*
- [ ] **Regulamin** — wymagany przy sklepie/kursach/rezerwacji online; kto dostarcza: …
- [ ] **Obowiązek informacyjny / prawo odstąpienia** — przy sprzedaży konsumenckiej (14 dni)
- [ ] **Dane firmy w stopce** — NIP, adres, forma prawna
- [ ] **Dostępność (WCAG)** — wymagana umownie? branża publiczna? …
- **Specyficzne ograniczenia branżowe:** …  *(np. kosmetyki/suplementy — zakaz obietnic leczniczych; medycyna; finanse — patrz §6 ton)*

---

## 18. Notatki dodatkowe

> Wszystko, co nie weszło wyżej, a może wpłynąć na projekt: oczekiwania klienta, historia poprzednich prób, „święte krowy", osoby decyzyjne w tle, znane ryzyka.

…

---

### Checklista kompletności briefu (odhacz przed startem prac)

```
[ ] Typ strony jednoznacznie wybrany (§2.1)
[ ] Główny cel + jedno główne CTA + KPI (§3)
[ ] Grupa docelowa i jej obiekcje opisane (§4)
[ ] 3 USP konkretne i sprawdzalne (§5)
[ ] Ton komunikacji z kontrprzykładem (§6)
[ ] Marka/CI: logo, kolory, fonty (lub jasne „DO ZAPROJEKTOWANIA") (§7)
[ ] 3+ referencje wizualne + „tak nie" (§8)
[ ] Pełna lista podstron (§9)
[ ] Lista usług/produktów/kursów ze źródłem danych (§10)
[ ] Funkcje zaznaczone, i18n świadomie potwierdzone/odrzucone (§11)
[ ] Płatności z BLIK + dostawa + faktury (jeśli sklep) (§12)
[ ] Treści: kto, kiedy, gdzie (§13)
[ ] Zdjęcia i assety: źródło i prawa (§14)
[ ] Domena + hosting + lista dostępów + SMTP (§15)
[ ] Deadline + must-have/nice-to-have (§16)
[ ] Wymogi prawne: RODO, cookies, regulamin (§17)
```

Brief z brakami w sekcjach 2–5 i 15 nie nadaje się do startu — uzupełnij albo zrób wywiad z klientem.
