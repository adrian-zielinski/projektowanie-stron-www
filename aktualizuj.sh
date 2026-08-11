#!/usr/bin/env bash
# Aktualizacja systemu do najnowszej wersji od prowadzącego.
#
# Nadpisuje TYLKO część systemową (instrukcje, wiedza, silnik motywu).
# NIGDY nie kasuje Twojej pracy: folderu Klienci/, Twoich briefów, Twoich
# motywów i wszystkiego, czego nie ma w oryginale.
#
# Uruchom:  bash aktualizuj.sh            — aktualizuje system
#           bash aktualizuj.sh --sprawdz  — TYLKO sprawdza, czy jest nowsza wersja
#                                           (nic nie zmienia; kod wyjścia 10 = jest nowsza)
#
# Cała logika siedzi w funkcji main() — dzięki temu skrypt może bezpiecznie
# podmienić sam siebie w trakcie działania (bash wczytuje całą funkcję naraz).

set -euo pipefail

ZRODLO="https://github.com/adrian-zielinski/projektowanie-stron-www/archive/refs/heads/main.tar.gz"
ZRODLO_WERSJA="https://raw.githubusercontent.com/adrian-zielinski/projektowanie-stron-www/main/WERSJA"

TMP=""
trap '[ -n "$TMP" ] && rm -rf "$TMP"' EXIT

# Ścieżki systemowe — te są nadpisywane najnowszą wersją.
SYSTEM="
AGENTS.md
GEMINI.md
CLAUDE.md
README.md
START-TUTAJ.md
WERSJA
aktualizuj.sh
wiedza
szablony-startowe
.claude/skills
briefy/SZABLON-BRIEFU.md
briefy/przyklad-wypelniony.md
"

# Szybkie sprawdzenie wersji — pobiera jeden mały plik, niczego nie zmienia.
# Kody wyjścia: 0 = masz najnowszą, 10 = jest nowsza, 1 = brak połączenia.
sprawdz() {
	cd "$(dirname "$0")"
	local stara="brak"
	[ -f WERSJA ] && stara="$(head -1 WERSJA)"

	# Znacznik czasu w adresie omija cache CDN GitHuba (inaczej przez kilka minut
	# po publikacji widać starą wersję i skrypt proponowałby zbędną aktualizację).
	local nowa
	if ! nowa="$(curl -fsSL --max-time 10 -H 'Cache-Control: no-cache' "${ZRODLO_WERSJA}?t=$(date +%s)" 2>/dev/null | head -1)"; then
		echo "? Nie udało się sprawdzić wersji (brak internetu?). Pracuj dalej normalnie."
		exit 1
	fi

	if [ "$stara" = "$nowa" ]; then
		echo "✓ System aktualny (wersja $nowa)."
		exit 0
	fi

	# Aktualizujemy tylko, gdy zdalna wersja jest NOWSZA. Gdy lokalna jest nowsza
	# lub równa (np. cache GitHuba, praca prowadzącego) — nic nie proponujemy.
	if [ "$stara" != "brak" ]; then
		local najnowsza
		najnowsza="$(printf '%s\n%s\n' "$stara" "$nowa" | sort -V | tail -1)"
		if [ "$najnowsza" = "$stara" ]; then
			echo "✓ System aktualny (wersja $stara)."
			exit 0
		fi
	fi

	echo "! JEST NOWSZA WERSJA SYSTEMU: $nowa (masz: $stara)"
	echo "  Aby zaktualizować, uruchom: bash aktualizuj.sh"
	exit 10
}

main() {
	cd "$(dirname "$0")"
	local kopia="_kopia-przed-aktualizacja"
	TMP="$(mktemp -d)"

	local stara="brak (pierwsza aktualizacja)"
	[ -f WERSJA ] && stara="$(head -1 WERSJA)"

	echo "→ Pobieram najnowszą wersję systemu…"
	if ! curl -fsSL "$ZRODLO" -o "$TMP/system.tar.gz"; then
		echo "✗ Nie udało się pobrać. Sprawdź połączenie z internetem i spróbuj ponownie." >&2
		exit 1
	fi
	mkdir -p "$TMP/nowe"
	tar -xzf "$TMP/system.tar.gz" -C "$TMP/nowe" --strip-components=1

	local nowa="nieznana"
	[ -f "$TMP/nowe/WERSJA" ] && nowa="$(head -1 "$TMP/nowe/WERSJA")"

	if [ "$stara" = "$nowa" ]; then
		echo "✓ Masz już najnowszą wersję ($nowa). Nic nie zmieniam."
		exit 0
	fi

	echo "→ Robię kopię zapasową obecnych plików systemowych w $kopia/"
	rm -rf "$kopia"
	mkdir -p "$kopia"

	local zmienione=0
	local sciezka
	for sciezka in $SYSTEM; do
		[ -e "$TMP/nowe/$sciezka" ] || continue

		if [ -e "$sciezka" ]; then
			mkdir -p "$kopia/$(dirname "$sciezka")"
			cp -R "$sciezka" "$kopia/$(dirname "$sciezka")/" 2>/dev/null || true
		fi

		mkdir -p "$(dirname "$sciezka")"
		if [ -d "$TMP/nowe/$sciezka" ]; then
			# Bez usuwania: dokłada i nadpisuje pliki z nowej wersji,
			# Twoje własne pliki w tych folderach zostają nietknięte.
			cp -R "$TMP/nowe/$sciezka/." "$sciezka/"
		else
			cp "$TMP/nowe/$sciezka" "$sciezka"
		fi
		echo "   zaktualizowano: $sciezka"
		zmienione=$((zmienione + 1))
	done

	chmod +x aktualizuj.sh 2>/dev/null || true

	echo
	echo "✓ Gotowe. Wersja: $stara  →  $nowa"
	echo "  Zaktualizowanych elementów: $zmienione"
	echo "  Twoja praca (Klienci/, Twoje briefy, Twoje motywy) — nietknięta."
	echo "  Kopia poprzednich plików systemowych: $kopia/ (możesz ją skasować, gdy wszystko działa)"
	echo
	echo "  Co nowego — zajrzyj do: WERSJA"
}

if [ "${1:-}" = "--sprawdz" ]; then
	sprawdz
fi

main "$@"
