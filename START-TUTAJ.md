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

## 🅰️ Droga A — mam gotowy wygląd i chcę go na WordPressie

### Krok 1 — Przygotuj plik z wyglądem

Jeśli robisz wygląd w Claude na claude.ai:
1. Poproś Claude o zaprojektowanie strony (opisz firmę, co ma być na stronie).
2. Gdy wygląd Ci się podoba, **pobierz go na dysk** (przycisk pobierania nad projektem — dostaniesz plik, zwykle ZIP albo plik `.html`).

Masz już plik z Lovable lub skądinąd? Świetnie, użyj go.

### Krok 2 — Włóż plik do projektu

1. W folderze projektu (tym, w którym jest ten plik) utwórz folder o nazwie **`MOJ-PROJEKT`**.
2. Wrzuć tam swój plik/ZIP z wyglądem.

> Nie wiesz, gdzie jest folder projektu? Zapytaj Claude: „gdzie mam wrzucić plik z moim wyglądem?".

### Krok 3 — Powiedz Claude, co ma zrobić

Otwórz projekt w Claude Code i wklej dokładnie to zdanie (podmień nazwę pliku na swoją):

> **„Mam gotowy wygląd strony w folderze MOJ-PROJEKT (plik: nazwa-pliku.zip). Przerób pod niego szablon studio-base i przygotuj stronę na WordPressa. Prowadź mnie krok po kroku, jestem początkujący."**

Od tego momentu Claude przejmuje stery. Pokaże Ci, jak strona będzie wyglądać, **zanim** cokolwiek zbuduje, i poprosi o Twoją zgodę. Oglądasz, mówisz „ok" albo „zmień to i to".

### Krok 4 — Załóż hosting (jeśli jeszcze nie masz)

Strona musi „gdzieś mieszkać". To hosting.
- Polecany: **LH.pl, plan Mango** (pod niego wszystko jest dostrojone) — ale każdy hosting WordPress z „SSH" zadziała.
- Potrzebujesz też **domeny** (adresu strony, np. `twojafirma.pl`).

Nie masz pojęcia, co wybrać? Napisz Claude: „nie mam jeszcze hostingu, doradź mi, co kupić i jak". Zakup robisz Ty sam (Claude nigdy nie wpisuje Twoich danych do płatności).

### Krok 5 — Wpuść Claude na hosting (bezpiecznie, przez „klucz")

Żeby Claude wgrał stronę, musi mieć dostęp do serwera. Robi się to **kluczem**, nie hasłem — to bezpieczne.

Napisz w czacie:

> **„Chcę wgrać stronę na hosting LH. Daj mi instrukcję krok po kroku, jak włączyć SSH i wpuścić Cię kluczem."**

Claude da Ci **dokładną instrukcję**: co kliknąć w panelu LH i **jedną komendę do wklejenia**. 

⚠️ **Ważna zasada bezpieczeństwa:** **nigdy nie podajesz Claude swojego hasła** do hostingu ani banku. Podajesz tylko trzy niegroźne dane (adres serwera, port, login). Klucz wystarczy.

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
