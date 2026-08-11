#!/usr/bin/env bash
# Pobiera WSZYSTKIE grafiki z eksportu Google Stitch, zanim wygasną linki CDN.
# Użycie: bash stitch-assety.sh <folder-eksportu-stitch> <folder-docelowy>
# Wyciąga URL-e lh3.googleusercontent.com z każdego code.html i pobiera je
# w wysokiej rozdzielczości (sufiks =w1600), a lokalne PNG kopiuje obok.
set -euo pipefail

SRC="${1:?Podaj folder eksportu Stitch}"
DST="${2:?Podaj folder docelowy na grafiki}"
mkdir -p "$DST"

i=0
find "$SRC" -name 'code.html' -print0 | while IFS= read -r -d '' html; do
	# URL-e mogą być w src="..." i w url('...') — łapiemy oba, bez sufiksów rozmiaru
	grep -oE "https://lh3\.googleusercontent\.com/[A-Za-z0-9_/\.-]+" "$html" | sort -u | while read -r url; do
		i=$((i+1))
		base="$(printf '%s' "$url" | shasum | cut -c1-10)"
		out="$DST/stitch-$base"
		[ -e "$out.jpg" ] || [ -e "$out.png" ] && continue
		# Próba hi-res, potem oryginał; rozszerzenie wg realnego typu
		if curl -sfo "$out.tmp" "${url}=w1600" || curl -sfo "$out.tmp" "$url"; then
			case "$(file -b --mime-type "$out.tmp")" in
				image/png)  mv "$out.tmp" "$out.png" ;;
				image/webp) mv "$out.tmp" "$out.webp" ;;
				*)          mv "$out.tmp" "$out.jpg" ;;
			esac
			echo "OK  $url"
		else
			rm -f "$out.tmp"
			echo "BŁĄD (wygasł?) $url" >&2
		fi
	done
done

# Lokalne grafiki eksportu (screen.png w folderach zasobów) — kopiuj z nazwą folderu
find "$SRC" -mindepth 2 -name 'screen.png' -print0 | while IFS= read -r -d '' png; do
	name="$(basename "$(dirname "$png")" | cut -c1-60)"
	cp -n "$png" "$DST/lokalny-$name.png" 2>/dev/null || true
	echo "OK  lokalny: $name"
done

echo "Gotowe → $DST (obejrzyj pliki i nadaj im opisowe nazwy przed importem)"
