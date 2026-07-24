# 🟢 START TUTAJ — przewodnik krok po kroku

Ten przewodnik przeprowadzi Cię od pomysłu do gotowej strony na WordPressie. Jest napisany dla osoby **nietechnicznej** — nie musisz umieć programować. Całą trudną robotę wykonuje Claude. Ty klikasz, kopiujesz gotowe zdania i akceptujesz efekty.

Zasada, która obowiązuje zawsze: **jak czegoś nie wiesz — po prostu zapytaj Claude w oknie czatu.** Napisz „nie rozumiem tego kroku, wytłumacz prościej". Claude odpowie i poczeka na Ciebie.

---

## Najpierw zrozum, jak to działa (2 minuty czytania)

Wewnątrz tego projektu jest **gotowy szablon strony** (nazywa się `studio-base`). To silnik: ma już zaprogramowane wszystkie klocki strony — nagłówek, sekcje, galerię, stopkę, przyciski. Jest celowo „bezbarwny", żeby dało się go ubrać w dowolny wygląd.

Ty **nie budujesz strony od zera.** Ty dajesz Claude swój wygląd, a Claude **przemalowuje ten gotowy szablon** pod Twój projekt — kolory, czcionki, układ, teksty. To dlatego jest szybko i tanio: nie tworzycie motywu, tylko dostrajacie gotowca.

Masz dwie drogi. Wybierz swoją:

- **Droga A — mam już wygląd strony** (zrobiłeś go w Claude/„Claude design", w Lovable, albo masz plik ze stroną). → przejdź do **Drogi A**.
- **Droga B — zaczynam od zera, nie mam nic** → przejdź do **Drogi B**.

---

## Krok 0 — uruchom Claude Code (raz, na początku) — dotyczy obu dróg

Cała ta robota dzieje się **w aplikacji Claude Code**. Jeśli jeszcze jej nie masz:

1. **Pobierz Claude Code** na swój komputer (Mac lub Windows) ze strony Anthropic. Nie wiesz skąd? Wpisz w Google „Claude Code download" albo zapytaj o link zwykłego Claude na claude.ai.
2. **Zainstaluj** jak każdą aplikację (pobierz → otwórz → dalej/dalej).
3. **Otwórz w niej ten projekt** — czyli folder, w którym leży ten plik `START-TUTAJ.md`. W aplikacji szukasz opcji „Open Folder" / „Otwórz folder" i wskazujesz ten folder (albo przeciągasz go do okna).

> Utknąłeś już tutaj? To normalne przy pierwszym razie. Otwórz zwykłego Claude na claude.ai i napisz: „prowadź mnie, jak zainstalować Claude Code i otworzyć w nim folder na Macu/Windowsie". Wróć tu, gdy będziesz mieć projekt otwarty.

Gdy widzisz zawartość tego projektu w oknie Claude Code i możesz do niego pisać — jesteś gotowy. Wybierz swoją drogę (A albo B) poniżej.

---

## 🅰️ Droga A — mam gotowy wygląd i chcę go na WordPressie

### Krok 1 — Przygotuj plik z wyglądem

Jeśli robisz wygląd w Claude na claude.ai:
1. Poproś Claude o zaprojektowanie strony (opisz firmę, co ma być na stronie).
2. Gdy wygląd Ci się podoba, **pobierz go na dysk** (przycisk pobierania nad projektem — dostaniesz plik, zwykle ZIP albo plik `.html`).

Masz już plik z Lovable lub skądinąd? Świetnie, użyj go.

> **A jeśli nie mam pliku, tylko link?** Zdarza się (np. w Lovable), że nie da się nic „pobrać" — masz tylko adres podglądu strony. To też wystarczy: **skopiuj ten link** i użyj go zamiast pliku w Kroku 3 (wklej link Claude).

### Krok 2 — Włóż plik do projektu

Robisz to w oknie swojego komputera (Finder na Macu, Eksplorator na Windows), nie w Claude:

1. Otwórz folder tego projektu — ten sam, w którym widzisz plik `START-TUTAJ.md`.
2. Kliknij **prawym przyciskiem myszy** w pustym miejscu → **Nowy folder** → nazwij go dokładnie **`MOJ-PROJEKT`**.
3. **Przeciągnij swój plik** z wyglądem do tego folderu. Może to być pojedynczy plik `.html`, folder albo `.zip` — **bez znaczenia, Claude sam rozpozna**. ZIP-a nie musisz rozpakowywać.

> Coś nie gra (nie wiesz, gdzie jest folder projektu; nie masz pewności, czy Twój plik się nadaje)? Nie kombinuj — po prostu zapytaj w Claude Code: „gdzie mam wrzucić plik z moim wyglądem i czy ten plik się nadaje?".

### Krok 3 — Powiedz Claude, co ma zrobić

Otwórz projekt w Claude Code i wklej dokładnie to zdanie (podmień nazwę pliku na swoją):

> **„Mam gotowy wygląd strony w folderze MOJ-PROJEKT (plik: nazwa-pliku.zip). Przerób pod niego szablon studio-base i przygotuj stronę na WordPressa. Prowadź mnie krok po kroku, jestem początkujący."**

Masz tylko link zamiast pliku? Wklej zamiast tego:

> **„Mój wygląd strony jest pod tym linkiem: [wklej link]. Przerób pod niego szablon studio-base i przygotuj stronę na WordPressa. Prowadź mnie krok po kroku, jestem początkujący."**

Od tego momentu Claude przejmuje stery. Pokaże Ci, jak strona będzie wyglądać, **zanim** cokolwiek zbuduje, i poprosi o Twoją zgodę. Oglądasz, mówisz „ok" albo „zmień to i to".

### Krok 4 — Załóż hosting (jeśli jeszcze nie masz)

Strona musi „gdzieś mieszkać". To hosting.
- Polecany: **LH.pl, plan Mango** (pod niego wszystko jest dostrojone) — ale każdy hosting WordPress z „SSH" zadziała.
- Potrzebujesz też **domeny** (adresu strony, np. `twojafirma.pl`).

Nie masz pojęcia, co wybrać? Napisz Claude: „nie mam jeszcze hostingu, doradź mi, co kupić i jak". Zakup robisz Ty sam (Claude nigdy nie wpisuje Twoich danych do płatności).

> **Po zakupie** hostingu dostaniesz maila z danymi do panelu (panel.lh.pl). **Zapisz ten mail** — dane do serwera przydadzą się w następnym kroku.

### Krok 5 — Wpuść Claude na hosting (bezpiecznie, przez „klucz")

Żeby Claude wgrał stronę, musi mieć dostęp do serwera. Robi się to **kluczem**, nie hasłem — to bezpieczne.

**Czym jest „klucz"?** Wyobraź sobie, że dorabiasz Claude osobną wejściówkę do serwera. Claude **nie zna Twojego hasła** — ma tylko swój bilet wstępu, który w każdej chwili możesz cofnąć. Dlatego to bezpieczniejsze niż dawanie hasła.

**Uprzedzenie — ten jeden krok wygląda technicznie, ale to tylko kopiuj-wklej:**
- Trzeba raz otworzyć **Terminal** (na Macu) albo **PowerShell** (na Windows) — to takie czarne/białe okienko do wpisywania poleceń. Wygląda groźnie, ale Ty tylko wklejasz gotowe rzeczy od Claude.
- Gdy w tym okienku poprosi Cię o **hasło i podczas pisania NIC się nie pojawia** (żadnych kropek, żadnych gwiazdek) — **to normalne, tak ma być**. Wpisz hasło „na ślepo" i naciśnij Enter. Nic się nie zepsuło.

Napisz w czacie:

> **„Chcę wgrać stronę na hosting LH. Daj mi instrukcję krok po kroku, jak włączyć SSH i wpuścić Cię kluczem. Jestem początkujący, prowadź mnie bardzo dokładnie."**

Claude da Ci **dokładną instrukcję**: co kliknąć w panelu LH, skąd wziąć trzy dane (adres serwera, port, login — są w panelu LH: Serwery → Ustawienia) i **jaką komendę wkleić** w to okienko.

⚠️ **Ważna zasada bezpieczeństwa:** **nigdy nie podajesz Claude swojego hasła** do hostingu ani banku. Podajesz tylko te trzy niegroźne dane (adres serwera, port, login). Klucz wystarczy.

### Krok 6 — Claude wgrywa stronę

Claude wgra całą stronę na serwer i **sam sprawdzi**, że działa (pokaże Ci dowód). Ty tylko potwierdzasz „tak, wgrywamy na żywo".

### Krok 7 — Edytujesz stronę

- **Drobne zmiany** (teksty, zdjęcia) — robisz sam w panelu WordPress. Claude pokaże Ci gdzie.
- **Większe zmiany** (nowa sekcja, inny układ) — mówisz Claude w czacie, on to robi.

**Gotowe. Masz swoją stronę na WordPressie.** ✅

---

## 🅱️ Droga B — zaczynam od zera

Nie masz jeszcze wyglądu? Claude zaprojektuje go z Tobą.

### Krok 1 — Opisz, czego chcesz

Najprościej — wklej w czacie:

> **„Chcę zrobić stronę dla [nazwa firmy / czego dotyczy]. Nie mam jeszcze projektu. Poprowadź mnie od początku, jestem początkujący."**

Claude zada Ci kilka prostych pytań (co firma robi, dla kogo, jakie podstrony). To jest **brief** — nie musisz nic pisać wcześniej, Claude wyciągnie to z Ciebie rozmową.

### Krok 2 — Claude projektuje, Ty akceptujesz

Claude pokaże propozycję wyglądu (kolory, układ, sekcje). Oglądasz, mówisz co zmienić. **Nic nie jest budowane, dopóki nie powiesz „podoba mi się".**

### Krok 3 — dalej tak samo jak w Drodze A

Od momentu akceptacji wyglądu robicie to samo co w Drodze A od **Kroku 4** (hosting → SSH → wgranie → edycja).

---

## Czego będziesz potrzebować (lista)

```
[ ] Ten projekt otwarty w Claude Code
[ ] (Droga A) plik/ZIP z wyglądem strony
[ ] Hosting WordPress z SSH (polecany: LH.pl Mango)
[ ] Domena (adres strony)
[ ] Trochę cierpliwości do klikania — Claude prowadzi za rękę
```

## Gdy się zgubisz

- **„Nie rozumiem"** → napisz to Claude, poprosi prościej.
- **„Coś nie działa"** → opisz co widzisz, Claude zdiagnozuje.
- **„Gdzie ja jestem w procesie?"** → zapytaj „na którym kroku jesteśmy i co dalej".

Nie ma głupich pytań. Cały ten system jest po to, żebyś **nie musiał być technikiem.**

---

### Dla ciekawskich — co jest pod spodem

Jeśli chcesz zrozumieć więcej (nie musisz): `README.md` opisuje system ogólnie, a folder `wiedza/` ma szczegółowe instrukcje, z których Claude korzysta sam w tle. Ty ich czytać nie musisz.
