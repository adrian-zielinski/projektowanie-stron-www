#!/usr/bin/env bash
# Aktualizacja systemu do najnowszej wersji od prowadzącego.
#
# Nadpisuje TYLKO część systemową (instrukcje, wiedza, silnik motywu).
# NIGDY nie kasuje Twojej pracy: folderu Klienci/, Twoich briefów, Twoich
# motywów i wszystkiego, czego nie ma w oryginale.
#
# Uruchom:  bash aktualizuj.sh
#
# Cała logika siedzi w funkcji main() — dzięki temu skrypt może bezpiecznie
# podmienić sam siebie w trakcie działania (bash wczytuje całą funkcję naraz).

set -euo pipefail

ZRODLO="https://github.com/adrian-zielinski/projektowanie-stron-www/archive/refs/heads/main.tar.gz"

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

main "$@"
