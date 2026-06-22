# Override szablonów WooCommerce w custom classic theme (bez buildera)

Zasada twarda systemu: **zero Elementora i page-builderów.** Sklep budujesz jako custom classic theme. WooCommerce daje dwa czyste mechanizmy dostosowania: **template override** (przesłanianie szablonów) i **hooki**. Oba działają w kodzie motywu — bez wizualnego buildera.

---

## 1. Włączenie wsparcia WooCommerce w theme

W `functions.php` motywu zadeklaruj wsparcie, inaczej Woo pokaże własny, nieostylowany wrapper:

```php
add_action( 'after_setup_theme', function () {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );   // zoom — wymóg konwersyjny
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
} );
```

Zoom galerii jest obowiązkowy konwersyjnie (zdjęcie = substytut dotyku) — włącz go tu, nie dokładaj wtyczki.

---

## 2. Template override — katalog `woocommerce/` w motywie

WooCommerce szuka szablonu najpierw w motywie, dopiero potem w pluginie. Skopiuj plik z `wp-content/plugins/woocommerce/templates/` do `wp-content/themes/twoj-theme/woocommerce/`, zachowując ścieżkę, i edytuj kopię.

Najczęściej przesłaniane:

```
twoj-theme/woocommerce/
├── archive-product.php              # PLP — strona kategorii/sklepu
├── content-product.php              # kafelek produktu na liście
├── single-product.php               # PDP — karta produktu
├── single-product/
│   ├── add-to-cart/variable.php     # warianty (swatche zamiast dropdownu)
│   ├── product-image.php            # galeria + zoom
│   └── tabs/tabs.php                # zakładki opisu/specyfikacji/FAQ
├── cart/cart.php                    # koszyk
└── checkout/form-checkout.php       # checkout
```

Reguły:
- Przesłaniaj **tylko te pliki, które realnie zmieniasz** — każdy nadpisany szablon to dług przy aktualizacji Woo (trzeba go zweryfikować po update).
- Nie edytuj plików w katalogu pluginu — zniknie przy aktualizacji.
- Trzymaj się oryginalnej struktury ścieżek, inaczej Woo nie znajdzie override'u.

---

## 3. Hooki — zmiana bez kopiowania całego szablonu

Gdy potrzebujesz dodać/przesunąć element (a nie przebudować szablon), użyj hooka w `functions.php` — czyściej niż override i odporniej na aktualizacje.

Przydatne punkty zaczepienia:
- `woocommerce_before_add_to_cart_button` / `woocommerce_after_add_to_cart_button` — np. polityka zwrotów przy „Do koszyka".
- `woocommerce_single_product_summary` (priorytety: 5 title, 10 rating, 20 price, 30 excerpt, 40 add-to-cart) — kolejność bloków na PDP.
- `woocommerce_after_shop_loop_item` — przyciski na kafelku PLP.
- `woocommerce_review_order_before_payment` / `woocommerce_review_order_after_submit` — plakietki zaufania **pod przyciskiem płatności**.
- `woocommerce_before_main_content` / `woocommerce_after_main_content` — wrappery layoutu sklepu.

Przykład — polityka zwrotów przy CTA (podnosi add-to-cart o ~23%):

```php
add_action( 'woocommerce_after_add_to_cart_button', function () {
    echo '<p class="pdp-returns">Darmowy zwrot 30 dni · gwarancja zwrotu pieniędzy</p>';
} );
```

Przykład — plakietki bezpieczeństwa pod przyciskiem płatności:

```php
add_action( 'woocommerce_review_order_after_submit', function () {
    echo '<div class="checkout-trust">SSL · Bezpieczne płatności · BLIK</div>';
} );
```

---

## 4. Wydajność = przewaga custom theme

Brak buildera oznacza, że ładujesz tylko swój CSS/JS. Wykorzystaj to:
- Wyłącz domyślne style Woo, jeśli stylujesz wszystko sam: `add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );` (tylko gdy pokrywasz całość własnym CSS).
- Ładuj skrypty Woo warunkowo — na stronach nie-sklepowych dequeue `woocommerce`, `wc-cart-fragments` itd.
- Krytyczny CSS, defer JS, lazy-load obrazów, WebP. Mobile-first: ~60%+ sprzedaży z mobile, sekunda opóźnienia ≈ -20% konwersji.
- Sticky „Do koszyka" na PDP (mobile), elementy klikalne ≥44 px.

---

## 5. Block Cart/Checkout w classic theme

Nowy Block Cart/Checkout (na blokach Gutenberga) jest szybszy i elastyczniejszy niż stary shortcode-checkout — można go użyć w classic theme (to bloki na stronach koszyka/zamówienia, nie wymaga FSE).
**Zanim przełączysz:** potwierdź, że bramka płatności PL i widżet mapy Paczkomatów InPost działają z blokami. Część integracji wspiera tylko shortcode-checkout — wtedy zostań przy nim do czasu zgodności.
