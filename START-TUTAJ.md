# 🟢 START TUTAJ — przewodnik krok po kroku

Ten przewodnik przeprowadzi Cię od pomysłu do gotowej strony na WordPressie. Jest napisany dla osoby **nietechnicznej** — nie musisz umieć programować. Używamy **dwóch darmowych narzędzi od Google**:

- **Google Stitch** — projektuje wygląd strony (mówisz mu, co chcesz — on rysuje).
- **Google Antigravity** — wykonuje robotę (bierze Twój wygląd i buduje z niego prawdziwą stronę WordPress, a potem wgrywa ją do internetu).

Zapamiętaj tę parę tak: **Stitch to projektant, Antigravity to wykonawca.** Ty jesteś szefem — mówisz, czego chcesz, i akceptujesz efekty.

Zasada na całą drogę: **jak czegoś nie wiesz — zapytaj agenta w Antigravity.** Napisz „nie rozumiem tego kroku, wytłumacz prościej". Odpowie i poczeka na Ciebie. Nie ma głupich pytań.

---

## Najpierw zrozum, jak to działa (2 minuty czytania)

W tym projekcie jest **gotowy szablon strony** (nazywa się `studio-base`). To silnik: ma zaprogramowane wszystkie klocki — nagłówek, sekcje, galerię, opinie, stopkę, przyciski. Jest celowo „bezbarwny", żeby dało się go ubrać w dowolny wygląd.

Ty **nie budujesz strony od zera.** Dajesz agentowi swój wygląd ze Stitcha, a on **przemalowuje gotowy szablon**: Twoje kolory, czcionki, układ, teksty. Dlatego jest szybko i za darmo — nikt nie tworzy motywu, tylko dostraja gotowca.

---

## Krok 0 — Trzy konta i Twoja kopia projektu (raz, na początku)

### 0a. Konto Google i konto GitHub

- **Konto Google** — pewnie już masz (Gmail). Będzie potrzebne do Stitcha i Antigravity.
- **Konto GitHub** — załóż na [github.com](https://github.com) (darmowe: Sign up → e-mail → hasło → nazwa użytkownika).

**Co to GitHub?** To taki dysk Google, ale dla projektów stron. Trzymasz na nim swój projekt, a każda zmiana jest zapisywana z historią — nic nigdy nie przepada. Tu będzie mieszkał Twój warsztat i strony Twoich klientów.

### 0b. Zrób WŁASNĄ kopię tego projektu

Nie pracujesz na cudzym projekcie — robisz swoją kopię, jednym przyciskiem:

1. Wejdź na stronę tego projektu na GitHubie (link dostałeś od prowadzącego).
2. Kliknij zielony przycisk **„Use this template"** → **„Create a new repository"**.
3. Nazwij swoją kopię (np. `moje-strony-www`) i **koniecznie zaznacz „Private"** — w tym projekcie będą strony Twoich klientów, nikt obcy nie ma ich widzieć.
4. Kliknij **„Create repository"**. Gotowe — masz własny, prywatny warsztat.
5. Na stronie swojej kopii kliknij zielony przycisk **„Code"** i **skopiuj adres** (ten z `https://github.com/...`). Przyda się za chwilę.

### 0c. Zainstaluj Antigravity i pobierz swój projekt

1. **Pobierz Google Antigravity** — darmowy program od Google (Mac/Windows). Wpisz w Google „Antigravity download", pobierz ze strony Google, zainstaluj (pobierz → otwórz → dalej/dalej), zaloguj się kontem Google.
2. W Antigravity napisz do agenta:

   > **„Pobierz mój projekt z GitHuba na komputer i otwórz go. Adres: [wklej skopiowany adres]. Prowadź mnie, jestem początkujący."**

   Agent poprowadzi Cię przez pobranie (może poprosić o jednorazowe zalogowanie do GitHuba — to normalne, loguj się śmiało w oknie GitHuba).
3. Po otwarciu zobaczysz z boku listę plików projektu, a do agenta piszesz po polsku.

> Utknąłeś? Otwórz [gemini.google.com](https://gemini.google.com) i napisz: „prowadź mnie krok po kroku, jak zainstalować Google Antigravity i pobrać projekt z GitHuba". Wróć tu, gdy zobaczysz pliki projektu.

**Test na dowód:** napisz do agenta: *„przywitaj się i powiedz, co widzisz w tym folderze"*. Jak odpowie i wymieni pliki (m.in. `START-TUTAJ.md`) — działa, jedziemy dalej.

### 0d. Nawyk na zawsze: zapisuj pracę na GitHubie

Po każdej większej zmianie (np. skończony etap strony klienta) napisz agentowi:

> **„Zapisz wszystkie zmiany i wyślij je na mojego GitHuba."**

To Twoja kopia zapasowa. Komputer może paść — projekt na GitHubie przeżyje.

### 0e. Jak dostawać ulepszenia od prowadzącego

Twoja kopia projektu jest **od tej chwili osobna** — działa u Ciebie i nikt jej nie rusza. To dobrze (nikt Ci nic nie zepsuje), ale ma jeden skutek: **gdy prowadzący ulepszy system, Twoja kopia sama się nie zaktualizuje.**

**Dobra wiadomość: agent pilnuje tego za Ciebie.** Na początku każdej rozmowy sam sprawdza, czy prowadzący wydał nowszą wersję. Jeśli tak — powie Ci o tym i zapyta, czy zaktualizować. Odpisujesz „tak" i po sprawie.

Ręcznie robisz to tylko wtedy, gdy chcesz sam sprawdzić albo agent o tym nie wspomniał (np. masz starszą kopię projektu). Wtedy wklej mu to:

**Skopiuj i wklej agentowi dokładnie to:**

```
Zaktualizuj mój projekt do najnowszej wersji systemu.

1. Sprawdź, czy w głównym folderze projektu jest plik aktualizuj.sh.
   Jeśli GO NIE MA, najpierw go pobierz:
   curl -fsSL https://raw.githubusercontent.com/adrian-zielinski/projektowanie-stron-www/main/aktualizuj.sh -o aktualizuj.sh
2. Uruchom: bash aktualizuj.sh
   (Jeśli nie możesz uruchomić basha — np. czysty Windows — zrób to samo ręcznie:
   pobierz https://github.com/adrian-zielinski/projektowanie-stron-www/archive/refs/heads/main.tar.gz,
   rozpakuj i skopiuj do mojego projektu, nadpisując, TYLKO te ścieżki:
   AGENTS.md, GEMINI.md, CLAUDE.md, README.md, START-TUTAJ.md, WERSJA, aktualizuj.sh,
   wiedza/, szablony-startowe/, .claude/skills/, briefy/SZABLON-BRIEFU.md, briefy/przyklad-wypelniony.md.
   Niczego nie kasuj.)
3. Przeczytaj plik WERSJA i wypisz mi prostym językiem, co nowego dostałem.
4. Przeczytaj od nowa AGENTS.md i od tej chwili trzymaj się go — reguły mogły się zmienić.
5. Zapisz zmiany na moim GitHubie (commit + push) z opisem "Aktualizacja systemu".

WAŻNE: nie zmieniaj i nie kasuj niczego w folderze Klienci/, moich briefów
ani motywów, które już zrobiłem. Aktualizacja dotyczy wyłącznie plików systemowych.
```

Co się stanie: agent pobierze najnowsze instrukcje, wiedzę i gotowe szablony, a **Twojej pracy nie ruszy** — strony klientów, briefy i motywy, które zrobiłeś, zostają nietknięte. Na wszelki wypadek zrobi też kopię poprzednich plików systemowych (folder `_kopia-przed-aktualizacja`).

Aktualną wersję i listę nowości znajdziesz w pliku **`WERSJA`**. Aktualizuj się spokojnie — im nowsza wersja, tym mniej wpadek i tym więcej gotowców (np. system rezerwacji z synchronizacją Booking.com).

---

## Krok 1 — Zaprojektuj wygląd w Google Stitch

1. Wejdź na **[stitch.withgoogle.com](https://stitch.withgoogle.com)** i zaloguj się kontem Google (darmowe).
2. Opisz stronę po polsku lub angielsku, np.: *„Nowoczesna strona dla studia pilates w Krakowie: duże zdjęcie na górze, oferta 4 zajęć, opinie klientek, sekcja kontakt. Ciepłe kolory, elegancko, spokojnie."*
3. Stitch narysuje projekt. **Poprawiaj rozmową**: „zmień kolory na beżowo-zielone", „inne zdjęcie główne", „dodaj sekcję cennika" — aż powiesz sobie „to jest to".
4. **Pobierz kod wyglądu.** Kliknij eksport/kod przy ekranie projektu i **skopiuj lub pobierz kod HTML**.

> ⚠️ **Ważny haczyk Stitcha:** przycisk „Export ZIP" potrafi dać paczkę BEZ kodu (tylko obrazek i opis). Jeśli tak się stało — wróć i użyj opcji **skopiowania/eksportu kodu HTML** dla każdego ekranu (wklej go do zwykłego pliku tekstowego i zapisz jako `strona.html`). Nie wiesz jak? Zapytaj agenta w Antigravity: „jak zapisać kod ze Stitcha do pliku html?".

> Masz już wygląd skądinąd (Lovable, Claude, stary projekt) albo tylko **link** do podglądu? Też dobrze — użyjesz go w Kroku 3 zamiast pliku ze Stitcha.

---

## Krok 2 — Włóż plik z wyglądem do projektu

Robisz to w oknie swojego komputera (Finder na Macu, Eksplorator na Windows):

1. Otwórz folder tego projektu — ten sam, w którym widzisz `START-TUTAJ.md`.
2. Kliknij **prawym przyciskiem** w pustym miejscu → **Nowy folder** → nazwij go dokładnie **`MOJ-PROJEKT`**.
3. **Przeciągnij tam swój plik** z wyglądem. Może to być `.html`, kilka plików, folder albo `.zip` — bez znaczenia, agent sam rozpozna. ZIP-a nie rozpakowuj.

> Nie masz pewności, czy plik się nadaje? Wrzuć go i zapytaj agenta: „czy plik w MOJ-PROJEKT nadaje się na stronę?".

---

## Krok 3 — Powiedz agentowi, co ma zrobić

W Antigravity wklej dokładnie to zdanie (podmień nazwę pliku na swoją):

> **„Mam gotowy wygląd strony w folderze MOJ-PROJEKT (plik: strona.html). Przeczytaj AGENTS.md i przerób pod ten wygląd gotowy szablon studio-base, przygotuj stronę na WordPressa. Prowadź mnie krok po kroku, jestem początkujący."**

Masz tylko link zamiast pliku? Wklej zamiast tego:

> **„Mój wygląd strony jest pod tym linkiem: [wklej link]. Przeczytaj AGENTS.md i przerób pod ten wygląd gotowy szablon studio-base, przygotuj stronę na WordPressa. Prowadź mnie krok po kroku, jestem początkujący."**

Od tego momentu agent przejmuje stery. Pokaże Ci, jak strona będzie wyglądać, **zanim** cokolwiek zbuduje, i poprosi o zgodę. Oglądasz, mówisz „ok" albo „zmień to i to". Nic nie powstaje bez Twojego „ok".

---

## Krok 4 — Załóż hosting (jeśli jeszcze nie masz)

Strona musi „gdzieś mieszkać" — to hosting. Adres, pod którym ludzie ją znajdą — to domena.

- Polecany hosting: **LH.pl, plan Mango** (pod niego wszystko jest dostrojone) — ale każdy hosting WordPress z „SSH" zadziała.
- Domena np. `twojafirma.pl` — kupujesz razem z hostingiem.

Nie wiesz, co wybrać? Zapytaj agenta: „nie mam hostingu, doradź mi co kupić i jak". **Zakup robisz sam** — agent nigdy nie dostaje Twoich danych do płatności.

> **Po zakupie** dostaniesz maila z danymi do panelu (panel.lh.pl). **Zachowaj go** — dane serwera przydadzą się w następnym kroku.

---

## Krok 5 — Wpuść agenta na hosting (bezpiecznie, przez „klucz")

Żeby agent wgrał stronę, musi mieć dostęp do serwera. Robi się to **kluczem**, nie hasłem.

**Czym jest „klucz"?** Wyobraź sobie, że dorabiasz agentowi osobną wejściówkę do serwera. Agent **nie zna Twojego hasła** — ma tylko swój bilet, który w każdej chwili możesz odebrać. To bezpieczniejsze niż dawanie komukolwiek hasła.

**Uprzedzenie — ten krok wygląda technicznie, ale to tylko kopiuj-wklej:**
- Antigravity ma **wbudowane okienko poleceń (terminal)** — nie musisz nic dodatkowego instalować. Agent przygotuje gotowe komendy, Ty je zatwierdzasz.
- Raz, przy pierwszym połączeniu, serwer poprosi o **hasło — i podczas wpisywania NIC się nie pojawia** (żadnych kropek ani gwiazdek). **To normalne, tak ma być.** Wpisz „na ślepo" i naciśnij Enter. Nic się nie zepsuło.

Napisz do agenta:

> **„Chcę wgrać stronę na hosting LH. Daj mi instrukcję krok po kroku, jak włączyć SSH i wpuścić Cię kluczem. Jestem początkujący, prowadź mnie bardzo dokładnie."**

Agent powie Ci: co kliknąć w panelu LH, skąd wziąć trzy dane (adres serwera, port, login — są w panelu: Serwery → Ustawienia) i co wkleić w okienko poleceń.

⚠️ **Żelazna zasada bezpieczeństwa:** **hasła nie wpisujesz nigdzie poza okienkiem serwera, gdy ono samo o nie pyta.** Agentowi w czacie podajesz tylko trzy niegroźne dane: adres serwera, port, login. Nigdy hasło.

---

## Krok 6 — Agent wgrywa stronę

Agent wgra całą stronę na serwer i **sam sprawdzi, że działa** (pokaże Ci dowód — stronę otwartą pod Twoim adresem). Ty tylko potwierdzasz „tak, wgrywamy na żywo". Potem otwórz swoją domenę w przeglądarce i zobacz stronę w prawdziwym internecie. 🎉

---

## Krok 7 — Edytujesz stronę

- **Drobne zmiany** (teksty, zdjęcia) — robisz sam w panelu WordPress (`twojadomena.pl/wp-admin`). Agent pokaże Ci gdzie co jest.
- **Większe zmiany** (nowa sekcja, inny układ) — mówisz agentowi w Antigravity, on robi i wgrywa.

**Gotowe. Masz swoją stronę na WordPressie — zbudowaną darmowymi narzędziami.** ✅

---

## Droga B — nie mam wyglądu, zaczynam od zera

Nie chcesz zaczynać od Stitcha? Napisz agentowi w Antigravity:

> **„Chcę zrobić stronę dla [nazwa firmy / czego dotyczy]. Nie mam projektu. Przeczytaj AGENTS.md i poprowadź mnie od początku, jestem początkujący."**

Agent zada kilka prostych pytań (co firma robi, dla kogo, jakie podstrony), pokaże propozycję wyglądu do akceptacji, a dalej wszystko idzie jak w Krokach 4–7.

> Wskazówka: i tak warto najpierw pobawić się Stitchem — łatwiej ocenić gotowy obrazek, niż opisywać wygląd słowami.

---

## Czego potrzebujesz (lista)

```
[ ] Konto Google (darmowe)
[ ] Google Antigravity zainstalowane + ten projekt otwarty (Krok 0)
[ ] Wygląd strony ze Stitcha (albo skądinąd) — plik lub link
[ ] Hosting WordPress z SSH (polecany: LH.pl Mango) + domena
[ ] Cierpliwość do klikania — agent prowadzi za rękę
```

## Gdy się zgubisz

- **„Nie rozumiem"** → napisz to agentowi, wytłumaczy prościej.
- **„Coś nie działa"** → opisz, co widzisz (możesz wkleić zrzut ekranu), agent zdiagnozuje.
- **„Gdzie ja jestem w procesie?"** → zapytaj: „na którym kroku ze START-TUTAJ jesteśmy i co dalej?".

---

### Dla ciekawskich — co jest pod spodem

`README.md` opisuje system ogólnie, folder `wiedza/` zawiera szczegółowe instrukcje techniczne, a `AGENTS.md` to rozkaz dzienny dla agenta. **Te pliki czyta agent, nie Ty** — możesz je pominąć. Projekt działa też z Claude Code (płatnym) — instrukcje agenta są w `CLAUDE.md`; przebieg dla Ciebie jest ten sam.
