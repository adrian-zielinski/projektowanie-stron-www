# Brief projektu strony WWW — PRZYKŁAD (fikcyjny)

> ⚠️ **TO JEST FIKCYJNY PRZYKŁAD POGLĄDOWY.** Firma „Studio Lema", osoby, ceny, linki i dane kontaktowe są zmyślone i służą wyłącznie pokazaniu, jak wypełnić `SZABLON-BRIEFU.md`. Nie traktuj tych danych jako prawdziwego zlecenia. Twój brief twórz z czystego szablonu.
>
> Przykład celowo pokazuje **hybrydę** (usługi + rezerwacja online + mały sklep z kosmetykami), żeby zilustrować większość pól w akcji.

---

## 0. Metryczka

- **Klient / nazwa firmy:** Studio Lema — kosmetologia estetyczna
- **Osoba kontaktowa + rola:** Marta Sienkiewicz, właścicielka (zatwierdza wszystko)
- **Mail / telefon:** marta@studiolema.example · 600 000 000
- **Data briefu:** 22.06.2026
- **Autor briefu (Ty):** Kamil, web-designer

---

## 1. Dla kogo — firma i kontekst

### 1.1 Firma
Kameralny gabinet kosmetologii estetycznej w centrum Wrocławia — zabiegi na twarz, peelingi, mezoterapia, prowadzony przez jedną kosmetolożkę z 8-letnim stażem.

### 1.2 Branża / nisza
Kosmetologia estetyczna premium (twarz, anti-aging), klientela lokalna wrocławska. Checklisty: usługi (`wiedza/03` §2.1), „zdrowie i uroda" dla części sklepowej (`wiedza/03` §2.4), landing/konwersja (`wiedza/02`).

### 1.3 Konkurencja
- studio-uroda-wroclaw.example — silne portfolio before/after, ale strona wolna i przeładowana; rezerwacja tylko telefoniczna.
- klinika-xyz.example — świetna marka wizualna i ceny jawne, lecz bezosobowa (sieć, nie „moja kosmetolożka").
- derm\&beauty.example — dobry blog edukacyjny (ruch z Google), słaby mobile i brak opinii z twarzą.

---

## 2. Typ strony i zakres

### 2.1 Typ strony
- [ ] Wizytówka / strona usług
- [ ] Sklep WooCommerce
- [ ] Platforma kursowa / LMS
- [x] **Hybryda** — opisz: strona usług z **rezerwacją online** zabiegów + **mały sklep** (8–12 kosmetyków do pielęgnacji domowej, sprzedaż uzupełniająca)

### 2.2 Skala
Rozmiar: średnia  ·  Szacowana liczba podstron: ~9  ·  Liczba produktów/kursów: ~10 produktów (kosmetyki)

---

## 3. Cel biznesowy, CTA i KPI

### 3.1 Główny cel biznesowy
Wypełnić kalendarz zabiegów — pozyskiwać rezerwacje online 24/7 od nowych klientek z Wrocławia i okolic, zwłaszcza poza godzinami pracy gabinetu.

### 3.2 Główne CTA (akcja #1)
Główne CTA: „Zarezerwuj wizytę"
Drugorzędne CTA: „Zadzwoń" (mobile, sticky) · „Dodaj do koszyka" (na kartach kosmetyków)

### 3.3 KPI — jak zmierzymy sukces
- Min. 25 rezerwacji online / mies. po 2 miesiącach od startu.
- ≥ 40% rezerwacji poza godzinami pracy gabinetu (dowód, że 24/7 robi robotę).
- Sklep: ≥ 8 zamówień kosmetyków / mies. (sprzedaż uzupełniająca, nie główny cel).

### 3.4 Co ma się dziać po konwersji
Rezerwacja → wpis w kalendarzu online + mail potwierdzający do klientki i do Marty + SMS-przypomnienie 24 h przed. Zamówienie sklepowe → mail + automatyczna faktura w Fakturowni + etykieta InPost.

---

## 4. Grupa docelowa

- **Kto to (persony):** Kobiety 30–50 lat, Wrocław i okolice, dbające o siebie, gotowe zapłacić za jakość; często rezerwują wieczorem po pracy z telefonu.
- **Jaki problem rozwiązują:** pierwsze oznaki starzenia, kondycja skóry, chcą zaufanego specjalisty „dla siebie", nie sieciówki.
- **Główne obiekcje / lęki:** „czy to bezpieczne i czy zobaczę efekt", „czy kosmetolożka ma kwalifikacje", „czy nie przepłacę bez wiedzy co dostaję".
- **Skąd przychodzą:** Instagram (główne), Google „kosmetolog Wrocław", polecenia.
- **Mobile czy desktop:** mobile-first (szacunkowo ~75% ruchu z telefonu z IG).

---

## 5. USP — czym się wyróżniacie

1. Jedna kosmetolożka prowadzi cały zabieg od początku do końca — relacja, nie taśma (w sieciówkach klientka trafia za każdym razem do kogoś innego).
2. Indywidualny plan pielęgnacji domowej dobrany do skóry, z konkretnymi produktami (które można dokupić w sklepie).
3. Jawne ceny wszystkich zabiegów + bezpłatna konsultacja wstępna z analizą skóry.

---

## 6. Ton komunikacji

- **Ton (2–3 słowa):** ciepły, ekspercki, spokojny
- **Forma:** [x] na Ty  *(klientki z IG, relacja bezpośrednia)*
- **Czego unikać w języku:** medycznego żargonu bez wyjaśnienia; nachalnej sprzedaży i sztucznej pilności; obietnic typu „cofnie zmarszczki na zawsze" (zakazane prawnie — patrz §17).
- **Przykład zdania „w głosie marki":** „Zanim cokolwiek zaproponuję, najpierw przyjrzymy się Twojej skórze — bez tego nie ma sensownego planu."

---

## 7. Marka / CI

- **Logo:** ma sygnet + wersję poziomą, plik SVG na przezroczystym tle (dysk: `/Klienci/StudioLema/logo/`). Brak wersji na ciemne tło — `DO ZAPROJEKTOWANIA`.
- **Kolory marki:** wiodący ciepły beż `#E8DCCB`, akcent/CTA głęboka terakota `#B0654A`, tekst grafit `#2B2B2B`. *(Uwaga anti-slop: „beż + terakota" bywa AI-defaultem dla beauty — skill `web-design-anti-slop` ma świadomie poszukać wyróżnika, nie zatrzymać się na tej palecie z marszu.)*
- **Fonty:** marka używa „Fraunces" (nagłówki) + „Inter" (tekst), oba dostępne na licencji open — hostujemy lokalnie (`wiedza/06` §5.2).
- **Księga znaku:** nie
- **Czego marka NIE chce wizualnie:** bez stockowych zdjęć „uśmiechniętych modelek z kremem na nosie"; bez ciemnego/klinicznego, sterylnego klimatu — ma być ciepło i ludzko.

---

## 8. Referencje i inspiracje wizualne

**Podoba się:**
- studio-aesthete.example — bo: spokojny, dużo powietrza, duża typografia serif, delikatne animacje wejścia sekcji.
- gabinet-northlight.example — bo: świetne before/after w siatce z subtelnym hoverem; jawny cennik w czytelnej tabeli.

**Odrzuca / „tak nie":**
- mega-klinika.example — bo: przeładowane, agresywne pop-upy z rabatami, wygląda jak supermarket.

**Pliki od graficzki / moodboard:** `/Klienci/StudioLema/moodboard.pdf` (paleta + przykłady kadrów zdjęć z sesji).

---

## 9. Lista podstron (mapa strony)

| Podstrona | W menu gł.? | Cel podstrony | Główne CTA |
|---|---|---|---|
| Strona główna | tak | Zbudować zaufanie + pchnąć do rezerwacji | Zarezerwuj wizytę |
| Zabiegi | tak | Lista zabiegów z opisem i ceną | Zarezerwuj zabieg |
| Zabieg — pojedynczy | (z listy) | Szczegóły + efekt + before/after | Zarezerwuj ten zabieg |
| O mnie | tak | Kosmetolożka: kwalifikacje, podejście | Zarezerwuj konsultację |
| Cennik | tak | Pełne, jawne ceny | Zarezerwuj |
| Sklep | tak | Kosmetyki do pielęgnacji domowej | Dodaj do koszyka |
| Blog | tak | Edukacja + SEO (ruch z Google) | Zapisz się na newsletter |
| Kontakt | tak | Adres, mapa, godziny, kontakt | Zadzwoń / Napisz |
| Polityka prywatności | stopka | wymóg prawny | — |
| Regulamin sklepu + rezerwacji | stopka | wymóg prawny | — |

---

## 10. Oferta — usługi / produkty / kursy

**Usługi (zabiegi):**

| Usługa | Krótki opis | Cena | Dowód? |
|---|---|---|---|
| Konsultacja + analiza skóry | Wywiad i dobór planu | 0 zł (bezpłatna) | opinie |
| Mezoterapia igłowa | Nawilżenie i odbudowa | od 350 zł | before/after + opinie |
| Peeling chemiczny | Rozświetlenie, wygładzenie | od 250 zł | before/after |
| Zabieg anti-aging premium | Kompleksowy, ~90 min | 600 zł | before/after + opinie |

**Produkty (sklep):**
- Liczba produktów: ~10 kosmetyków  ·  Źródło danych: Marta dostarczy arkusz (nazwa, opis, skład, cena, zdjęcie)  ·  Warianty: pojemność (30/50 ml) przy 3 produktach  ·  Atrybuty/filtry: typ skóry, kategoria (serum/krem/peeling)

**Kursy (LMS):** nie dotyczy.

---

## 11. Funkcje

- [x] **Formularz kontaktowy** — pola: imię, telefon, mail, wiadomość  ·  trafia na: marta@studiolema.example
- [x] **Rezerwacja / kalendarz terminów** — rezerwujemy: zabiegi i konsultacje  ·  płatność: bez płatności online, potwierdzenie ręczne + przypomnienie SMS  *(zaliczka rozważana w przyszłości)*
- [x] **Sklep (WooCommerce)** — szczegóły w §10 i §12
- [ ] Kursy / LMS
- [x] **Blog** — pisze Marta, ~2 wpisy/mies. (edukacja o pielęgnacji)
- [x] **Newsletter** — narzędzie: MailerLite (Marta ma konto)
- [ ] **Wielojęzyczność** — nie (rynek lokalny PL; świadomie odrzucone, żeby nie rozdmuchać zakresu)
- [ ] Strefa klienta / logowanie
- [x] **Inne:** galeria before/after z subtelnym suwakiem porównania

---

## 12. Płatności i dostawa

- **Bramka płatności:** Tpay (natywny BLIK, niska prowizja — Marta zakłada konto)
- **Metody:** [x] BLIK  [x] karta  [x] przelew  [ ] Apple/Google Pay  [ ] za pobraniem  [ ] raty
- **Dostawa / kurierzy:** InPost Paczkomaty (mapa wyboru w checkoucie) + kurier InPost; integracja przez Furgonetka. Darmowa wysyłka od 200 zł.
- **Faktury:** Fakturownia, automatycznie po opłaceniu zamówienia (Marta ma konto).
- **Podatki / VAT:** Marta jest płatnikiem VAT, stawka 23% na kosmetyki.

---

## 13. Treści

- **Teksty:** Marta dostarcza surowe (notatki, opisy zabiegów), my redagujemy sprzedażowo i anti-slop.
- **Stan na dziś:** opisy zabiegów są, opisy kosmetyków będą do 05.07; teksty „O mnie" i blog — piszemy z wywiadu.
- **Gdzie są:** `/Klienci/StudioLema/tresci/` (Dysk Google).
- **Kto zatwierdza copy:** Marta.
- **Dane do stopki/kontaktu:** Studio Lema, ul. Przykładowa 12, 50-001 Wrocław · NIP 000-000-00-00 · 600 000 000 · marta@studiolema.example · pon–pt 9–19 · IG @studiolema · mapa Google.

---

## 14. Zdjęcia i assety

- **Zdjęcia:** sesja zaplanowana na 28.06 (wnętrze gabinetu, portret Marty, kadry zabiegów); before/after — Marta ma archiwum (zgody klientek do potwierdzenia, patrz §17).
- **Gdzie są pliki:** po sesji w `/Klienci/StudioLema/foto/`; produktowe min. 2000 px dłuższy bok.
- **Logo i grafiki marki:** `/Klienci/StudioLema/logo/`
- **Wideo:** krótkie hero-wideo z wnętrza gabinetu (z sesji), max 8 s, wyciszone, lekkie.
- **Ikony / ilustracje:** delikatne linie (line icons), spójne z typografią serif.
- **Prawa do materiałów:** sesja na licencji klienta; before/after wymaga pisemnych zgód klientek — Marta zbiera.

---

## 15. Domena i hosting

- **Domena:** studiolema.pl — już kupiona, zarejestrowana w nazwa.pl, klient da dostęp do DNS.
- **Hosting:** [x] LH Mango (domyślny)
- **Czy jest stara strona:** tak, prosty one-page na kreatorze — bez migracji treści, tylko 3 przekierowania starych URL-i; wyłączenie po starcie nowej.
- **Dostępy potrzebne od klienta:**
  - [x] Panel hostingu (LH/DirectAdmin)
  - [x] Dostęp do DNS (nazwa.pl)
  - [x] Konto u operatora płatności (Tpay)
  - [x] Konta integracji (Fakturownia, MailerLite, Furgonetka)
  - [x] Maile firmowe (SMTP do formularzy)
- **Mail do wysyłki z formularzy (SMTP):** no-reply@studiolema.pl (utworzyć w panelu LH, skonfigurować Fluent SMTP).

---

## 16. Deadline i budżet zakresu

- **Termin oczekiwany:** start produkcyjny 31.07.2026.
- **Twardy deadline:** tak — Marta startuje kampanię IG 01.08, strona musi być live wcześniej.
- **Kamienie milowe:** makieta strony głównej + zabiegu → 04.07 · strona na stage → 21.07 · treści+zdjęcia komplet → 18.07 · prod → 30.07.
- **Funkcje must-have vs nice-to-have:** must — rezerwacja, zabiegi, cennik, kontakt, before/after. nice — sklep i blog (jeśli treści zdążą; mogą dojść tydzień po starcie).

---

## 17. Wymogi prawne

- [x] **Polityka prywatności (RODO)** — treść: z szablonu, dostosujemy do rezerwacji + sklepu + newslettera.
- [x] **Baner cookies + zgody** — Complianz; blokada Pixela IG i analityki do zgody.
- [x] **Regulamin** — wymagany (sklep + rezerwacja); Marta dostarcza wzór od księgowej, my składamy na stronie.
- [x] **Obowiązek informacyjny / prawo odstąpienia** — sprzedaż kosmetyków konsumentom (14 dni).
- [x] **Dane firmy w stopce** — NIP, adres, forma prawna.
- [ ] **Dostępność (WCAG)** — nieobowiązkowa umownie; mimo to trzymamy kontrast WCAG AA jako standard jakości.
- **Specyficzne ograniczenia branżowe:** kosmetyki — **zakaz przypisywania właściwości leczniczych** i obietnic „cofnięcia zmarszczek/wyleczenia"; opisy zabiegów i produktów trzymane w ryzach oświadczeń kosmetycznych (`wiedza/03` §2.4). Before/after tylko za pisemną zgodą klientek.

---

## 18. Notatki dodatkowe

- Marta sama prowadzi IG i zna swoją grupę — warto wyciągnąć z niej język, jakim mówią klientki (do copy).
- Poprzednia próba (kreator) odpadła, bo „wyglądała jak wszystkie" — silny sygnał, że anti-slop i wyróżnik wizualny są tu kluczowe.
- Sklep to świadomie funkcja drugorzędna: gdyby termin był zagrożony, wchodzimy z usługami+rezerwacją, sklep dokładamy po starcie.

---

### Checklista kompletności briefu

```
[x] Typ strony jednoznacznie wybrany (§2.1)
[x] Główny cel + jedno główne CTA + KPI (§3)
[x] Grupa docelowa i jej obiekcje opisane (§4)
[x] 3 USP konkretne i sprawdzalne (§5)
[x] Ton komunikacji z kontrprzykładem (§6)
[x] Marka/CI: logo, kolory, fonty (lub jasne „DO ZAPROJEKTOWANIA") (§7)
[x] 3+ referencje wizualne + „tak nie" (§8)
[x] Pełna lista podstron (§9)
[x] Lista usług/produktów/kursów ze źródłem danych (§10)
[x] Funkcje zaznaczone, i18n świadomie odrzucone (§11)
[x] Płatności z BLIK + dostawa + faktury (§12)
[x] Treści: kto, kiedy, gdzie (§13)
[x] Zdjęcia i assety: źródło i prawa (§14)
[x] Domena + hosting + lista dostępów + SMTP (§15)
[x] Deadline + must-have/nice-to-have (§16)
[x] Wymogi prawne: RODO, cookies, regulamin (§17)
```

Brief kompletny — gotowy do startu prac (architektura treści → design).
