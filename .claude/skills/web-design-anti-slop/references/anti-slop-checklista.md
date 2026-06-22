# Anti-slop — pełna lista czerwonych flag i kontrprzykłady

AI domyślnie produkuje to, co najczęstsze w danych treningowych. To defaulty, nie wybory. Gdzie brief zostawia oś wolną — nie wydawaj tej wolności na default. Gdy brief jawnie prosi o któryś z tych looków, słowo briefu wygrywa.

## Czerwone flagi — jeśli to widzisz, popraw
- [ ] Font Inter / Roboto / Arial jako twarz marki bez powodu.
- [ ] Gradient niebiesko-fioletowy "znikąd"; neony, cyjan, cyberpunk glow ("purple AI slop").
- [ ] Jeden z trzech kliszowych looków pojawia się niezależnie od tematu (patrz niżej).
- [ ] Nagłówek-pustosłowie: "Build the future", "Twój partner w sukcesie", "Empower your X".
- [ ] Wszystkie karty z identycznym `border-radius: 16px` i tym samym cieniem.
- [ ] Każda sekcja w tym samym układzie 3 kafelków ("container soup").
- [ ] Stockowe zdjęcia uśmiechniętych ludzi z laptopem.
- [ ] Emoji jako ikony "na szybko".
- [ ] Numerowane markery 01/02/03 / eyebrowsy, gdy treść NIE jest sekwencją.
- [ ] Nadmiar animacji bez celu (sygnał "AI-generated").
- [ ] **Brak ani jednej świadomej, wyróżniającej decyzji estetycznej** — wszystko "bezpieczne" i nijakie.

## Trzy kliszowe looki AI (alarm, gdy pojawiają się niezależnie od briefu)
1. Kremowe tło (~#F4F1EA) + kontrastowy serif display + akcent terakota.
2. Prawie-czarne tło + jeden kwaśno-zielony lub wermilionowy akcent.
3. Broadsheet z włoskowymi liniami, zero border-radius, gęste kolumny jak w gazecie.

Wszystkie legalne dla NIEKTÓRYCH briefów. Problem w tym, że wychodzą "z automatu". Jeśli trafiłeś w któryś bez świadomej decyzji pod tego klienta — to default, zrewiduj.

## Jak walczyć ze slopem (reguły bazowe)
1. **Najpierw design system, potem generowanie.** Daj implementacji hexy, nazwy fontów, piksele i reguły negatywne. Im więcej konkretu, tym mniej generyczności.
2. **Wymień domyślne fonty.** Para z charakterem zamiast Inter/Roboto.
3. **Kontroluj kolor twardo.** Paleta + lista zakazów.
4. **Realne zdjęcia zamiast stocku** — prawdziwi ludzie, realizacje, biuro.
5. **Przepisz copy własnym głosem** (skill `stop-slop`) — konkrety branżowe, język klienta.
6. **Intencjonalne mikro-interakcje** — subtelny hover, sensowny reveal, by prowadzić uwagę.
7. **Zróżnicuj rytm sekcji** — pełnoekranowy wizual, split 50/50, lista kroków, cytat na całą szerokość.
8. **Łam domyślne zaokrąglenia i cienie** — wybierz styl narożników jako element marki.
9. **Iteruj i kwestionuj.** Pierwszy output to początek rozmowy: "to wygląda generycznie — co uczyniłoby to wyróżniającym?".
10. **Zbieraj referencje.** Folder screenshotów stron, które działają w tej branży, jako wzorzec — zamiast prosić "zrób ładnie".

## Test krytyki (faza 2)
Dla każdego elementu: *"Czy to wybór pod TEN brief, czy default dla dowolnej podobnej strony?"* Przejdź w myślach podobny prompt — jeśli wyszedłbyś w to samo miejsce, to default. Popraw i nazwij, co zmieniłeś i dlaczego. Zasada Chanel: przed wyjściem spójrz w lustro i zdejmij jeden dodatek — wytnij dekorację, która nie służy briefowi.
