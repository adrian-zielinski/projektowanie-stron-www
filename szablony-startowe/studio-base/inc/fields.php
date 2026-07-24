<?php
/**
 * Definicje pól ACF rejestrowane w kodzie (acf_add_local_field_group).
 * Spełnia regułę „definicje w gicie, nie w bazie" — pola jadą z motywem,
 * nie są zapisywane do DB i nie rozjeżdżają się między środowiskami.
 *
 * Dwie grupy:
 *   1) „Sekcje strony" — Flexible Content „sekcje" (zamiennik page-buildera).
 *   2) „Ustawienia strony" — dane globalne (Booksy, kontakt, stopka).
 *
 * Brandless: zero treści klienta, tylko silnik pól.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// Helper: skrócona definicja pola.
	$f = function ( $key, $name, $label, $type, $x = array() ) {
		return array_merge( array( 'key' => 'field_sb_' . $key, 'name' => $name, 'label' => $label, 'type' => $type ), $x );
	};

	$icons = array(
		'leaf' => 'Liść', 'leaf-fan' => 'Liść (wachlarz)', 'search' => 'Lupa / diagnostyka',
		'doc' => 'Dokument / plan', 'waves' => 'Fale / RF', 'shield' => 'Tarcza / ochrona',
		'person' => 'Osoba', 'laser' => 'Laser', 'star' => 'Gwiazda', 'physio' => 'Fizjoterapia',
		'needle' => 'Igła / mikropunktura', 'flask' => 'Preparat', 'team' => 'Zespół',
		'flag' => 'Flaga / etap', 'usg' => 'USG / obraz',
	);
	$icon_field = function ( $key ) use ( $f, $icons ) {
		return $f( $key, 'icon', 'Ikona', 'select', array( 'choices' => $icons, 'allow_null' => 1, 'ui' => 1 ) );
	};
	$bg     = function ( $key ) use ( $f ) { return $f( $key, 'bg', 'Tło kremowe', 'true_false', array( 'ui' => 1 ) ); };
	$eyebrow= function ( $key ) use ( $f ) { return $f( $key, 'eyebrow', 'Nadtytuł', 'text' ); };
	$heading= function ( $key ) use ( $f ) { return $f( $key, 'heading', 'Nagłówek', 'text' ); };

	// Para przycisków (label+url) z prefiksem.
	$btn = function ( $key, $n, $label ) use ( $f ) {
		return array(
			$f( $key . '_l', $n . '_label', $label . ' — etykieta', 'text' ),
			$f( $key . '_u', $n . '_url', $label . ' — URL', 'url' ),
		);
	};

	$layouts = array();

	// HERO
	$layouts['hero'] = array(
		'key' => 'layout_hero', 'name' => 'hero', 'label' => 'Hero (pełnoekranowe)', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$f( 'hero_img', 'image', 'Zdjęcie tła', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				$f( 'hero_h', 'heading', 'Nagłówek H1', 'text' ),
				$f( 'hero_lead', 'lead', 'Lead', 'textarea', array( 'rows' => 3 ) ),
			),
			$btn( 'hero_cta', 'cta', 'CTA' ),
			array(
				$f( 'hero_ph', 'paths_heading', 'Nagłówek ścieżek', 'text', array( 'default_value' => 'Najczęściej wybierane ścieżki' ) ),
				$f( 'hero_paths', 'paths', 'Ścieżki', 'repeater', array(
					'layout' => 'table', 'button_label' => 'Dodaj ścieżkę',
					'sub_fields' => array(
						$f( 'hero_paths_label', 'label', 'Etykieta', 'text' ),
						$f( 'hero_paths_url', 'url', 'URL', 'url' ),
					),
				) ),
			)
		),
	);

	// HERO SPLIT (jasne tło, tekst obok kolażu zdjęć — częsty wzorzec z generatorów)
	$layouts['hero-split'] = array(
		'key' => 'layout_hero_split', 'name' => 'hero-split', 'label' => 'Hero split (jasne, tekst + zdjęcia)', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$eyebrow( 'hsp_e' ),
				$f( 'hsp_h', 'heading', 'Nagłówek H1', 'text' ),
				$f( 'hsp_lead', 'lead', 'Lead', 'textarea', array( 'rows' => 3 ) ),
			),
			$btn( 'hsp_cta', 'cta', 'CTA' ),
			array(
				$f( 'hsp_img1', 'image1', 'Zdjęcie 1 (duże)', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				$f( 'hsp_img2', 'image2', 'Zdjęcie 2 (małe, opcjonalne)', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
			)
		),
	);

	// SUBHERO
	$layouts['subhero'] = array(
		'key' => 'layout_subhero', 'name' => 'subhero', 'label' => 'Subhero (nagłówek podstrony)', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$f( 'sh_img', 'image', 'Zdjęcie tła', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				$f( 'sh_cpl', 'crumb_parent_label', 'Okruszek — etykieta nadrzędna', 'text' ),
				$f( 'sh_cpu', 'crumb_parent_url', 'Okruszek — URL nadrzędny', 'url' ),
				$f( 'sh_h', 'heading', 'Nagłówek H1', 'text' ),
				$f( 'sh_lead', 'lead', 'Lead', 'textarea', array( 'rows' => 3 ) ),
			),
			$btn( 'sh_c1', 'cta1', 'CTA 1' ),
			$btn( 'sh_c2', 'cta2', 'CTA 2' )
		),
	);

	// TILES
	$layouts['tiles'] = array(
		'key' => 'layout_tiles', 'name' => 'tiles', 'label' => 'Kafle (3 kolumny / ścieżki)', 'display' => 'block',
		'sub_fields' => array(
			$eyebrow( 'tiles_e' ), $heading( 'tiles_h' ),
			$f( 'tiles_intro', 'intro', 'Wprowadzenie', 'textarea', array( 'rows' => 2 ) ),
			$bg( 'tiles_bg' ), $f( 'tiles_cols', 'cols', 'Liczba kolumn', 'select', array( 'choices' => array( 3 => '3 kolumny', 4 => '4 kolumny' ), 'default_value' => 3, 'ui' => 1 ) ),
			$f( 'tiles_items', 'tiles', 'Kafle', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj kafel',
				'sub_fields' => array(
					$icon_field( 'tiles_ic' ),
						$f( 'tiles_img', 'image', 'Zdjęcie (opcjonalne, u góry karty)', 'image', array( 'return_format' => 'array' ) ),
					$f( 'tiles_t', 'title', 'Tytuł', 'text' ),
					$f( 'tiles_tx', 'text', 'Opis', 'textarea', array( 'rows' => 2 ) ),
					$f( 'tiles_url', 'url', 'URL (puste = kafel nieklikalny)', 'text' ),
				),
			) ),
		),
	);

	// STEPS
	$layouts['steps'] = array(
		'key' => 'layout_steps', 'name' => 'steps', 'label' => 'Kroki / proces', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$eyebrow( 'steps_e' ), $heading( 'steps_h' ), $bg( 'steps_bg' ),
				$f( 'steps_items', 'steps', 'Kroki', 'repeater', array(
					'layout' => 'block', 'button_label' => 'Dodaj krok',
					'sub_fields' => array(
						$f( 'steps_t', 'title', 'Tytuł', 'text' ),
						$f( 'steps_tx', 'text', 'Opis', 'textarea', array( 'rows' => 2 ) ),
					),
				) ),
			),
			$btn( 'steps_cta', 'cta', 'CTA (opcjonalne)' )
		),
	);

	// ICONLIST
	$layouts['iconlist'] = array(
		'key' => 'layout_iconlist', 'name' => 'iconlist', 'label' => 'Lista punktów', 'display' => 'block',
		'sub_fields' => array(
			$eyebrow( 'il_e' ), $heading( 'il_h' ),
			$f( 'il_center', 'center', 'Wyśrodkuj', 'true_false', array( 'ui' => 1 ) ),
			$f( 'il_cols2', 'cols2', 'Dwie kolumny', 'true_false', array( 'ui' => 1 ) ),
			$bg( 'il_bg' ),
			$f( 'il_items', 'items', 'Punkty', 'repeater', array(
				'layout' => 'table', 'button_label' => 'Dodaj punkt',
				'sub_fields' => array( $f( 'il_tx', 'text', 'Treść', 'text' ) ),
			) ),
			$f( 'il_callout', 'callout', 'Wyróżnienie (callout)', 'textarea', array( 'rows' => 2 ) ),
		),
	);

	// SPLIT
	$layouts['split'] = array(
		'key' => 'layout_split', 'name' => 'split', 'label' => 'Dwie kolumny (tekst)', 'display' => 'block',
		'sub_fields' => array(
			$bg( 'split_bg' ),
			$f( 'split_l', 'left', 'Kolumna lewa', 'wysiwyg', array( 'media_upload' => 0 ) ),
			$f( 'split_r', 'right', 'Kolumna prawa', 'wysiwyg', array( 'media_upload' => 0 ) ),
		),
	);

	// REEL
	$layouts['reel'] = array(
		'key' => 'layout_reel', 'name' => 'reel', 'label' => 'Reel (wideo + tekst)', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$bg( 'reel_bg' ),
				$f( 'reel_v', 'video', 'Wideo (plik)', 'file', array( 'return_format' => 'array', 'mime_types' => 'mp4,webm' ) ),
				$f( 'reel_vu', 'video_url', 'Wideo (URL — alternatywnie)', 'url' ),
				$f( 'reel_poster', 'poster', 'Plakat (poster)', 'image', array( 'return_format' => 'array' ) ),
				$eyebrow( 'reel_e' ), $heading( 'reel_h' ),
				$f( 'reel_tx', 'text', 'Tekst', 'textarea', array( 'rows' => 3 ) ),
			),
			$btn( 'reel_cta', 'cta', 'CTA (opcjonalne)' )
		),
	);

	// GALLERY
	$layouts['gallery'] = array(
		'key' => 'layout_gallery', 'name' => 'gallery', 'label' => 'Galeria (efekty)', 'display' => 'block',
		'sub_fields' => array(
			$bg( 'gal_bg' ), $eyebrow( 'gal_e' ), $heading( 'gal_h' ),
			$f( 'gal_items', 'items', 'Zdjęcia', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj zdjęcie',
				'sub_fields' => array(
					$f( 'gal_img', 'image', 'Zdjęcie', 'image', array( 'return_format' => 'array' ) ),
					$f( 'gal_tag', 'tag', 'Znacznik', 'text', array( 'default_value' => 'Przed · Po' ) ),
					$f( 'gal_cap', 'caption', 'Podpis', 'text' ),
				),
			) ),
			$f( 'gal_note', 'note', 'Nota pod galerią', 'text', array( 'default_value' => 'Zdjęcia za zgodą pacjentów. Efekty są indywidualne.' ) ),
		),
	);

	// FAQ
	$layouts['faq'] = array(
		'key' => 'layout_faq', 'name' => 'faq', 'label' => 'FAQ (akordeon)', 'display' => 'block',
		'sub_fields' => array(
			$bg( 'faq_bg' ), $eyebrow( 'faq_e' ), $heading( 'faq_h' ),
			$f( 'faq_items', 'items', 'Pytania', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj pytanie',
				'sub_fields' => array(
					$f( 'faq_q', 'q', 'Pytanie', 'text' ),
					$f( 'faq_a', 'a', 'Odpowiedź', 'textarea', array( 'rows' => 4 ) ),
				),
			) ),
		),
	);

	// TESTIMONIALS
	$layouts['testimonials'] = array(
		'key' => 'layout_testimonials', 'name' => 'testimonials', 'label' => 'Opinie', 'display' => 'block',
		'sub_fields' => array(
			$bg( 'tst_bg' ), $f( 'tst_dark', 'dark', 'Ciemne tło sekcji', 'true_false', array( 'ui' => 1 ) ), $eyebrow( 'tst_e' ), $heading( 'tst_h' ),
			$f( 'tst_items', 'items', 'Opinie', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj opinię',
				'sub_fields' => array(
					$f( 'tst_q', 'quote', 'Cytat', 'textarea', array( 'rows' => 3 ) ), $f( 'tst_rating', 'rating', 'Ocena (gwiazdki 0–5)', 'number', array( 'min' => 0, 'max' => 5, 'default_value' => 5 ) ), $f( 'tst_av', 'avatar', 'Zdjęcie autora (opcjonalne)', 'image', array( 'return_format' => 'array' ) ),
					$f( 'tst_au', 'author', 'Autor', 'text' ),
				),
			) ),
		),
	);

	// AUTHOR
	$layouts['author'] = array(
		'key' => 'layout_author', 'name' => 'author', 'label' => 'O ekspertce / klinice', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$f( 'au_img', 'image', 'Zdjęcie', 'image', array( 'return_format' => 'array' ) ),
				$f( 'au_role', 'role', 'Rola / podpis', 'text' ),
				$heading( 'au_h' ),
				$f( 'au_body', 'body', 'Treść', 'wysiwyg', array( 'media_upload' => 0 ) ),
				$f( 'au_items', 'items', 'Punkty', 'repeater', array(
					'layout' => 'table', 'button_label' => 'Dodaj punkt',
					'sub_fields' => array( $f( 'au_tx', 'text', 'Treść', 'text' ) ),
				) ),
			),
			$btn( 'au_cta', 'cta', 'CTA' )
		),
	);

	// CTA
	$layouts['cta'] = array(
		'key' => 'layout_cta', 'name' => 'cta', 'label' => 'Pas CTA', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$f( 'cta_pull', 'pullquote', 'Pullquote (zamiast nagłówka)', 'textarea', array( 'rows' => 2 ) ),
				$heading( 'cta_h' ),
				$f( 'cta_tx', 'text', 'Tekst', 'textarea', array( 'rows' => 2 ) ),
			),
			$btn( 'cta_c1', 'cta1', 'Przycisk 1' ),
			$btn( 'cta_c2', 'cta2', 'Przycisk 2' )
		),
	);

	// DIVIDER
	$layouts['divider'] = array(
		'key' => 'layout_divider', 'name' => 'divider', 'label' => 'Linia ozdobna', 'display' => 'block',
		'sub_fields' => array(
			$f( 'div_note', 'note', 'Separator dekoracyjny — bez ustawień.', 'message', array( 'message' => 'Cienka linia oddzielająca sekcje.' ) ),
		),
	);

	// FILARS
	$layouts['filars'] = array(
		'key' => 'layout_filars', 'name' => 'filars', 'label' => 'Filary (bloki)', 'display' => 'block',
		'sub_fields' => array(
			$eyebrow( 'fil_e' ), $heading( 'fil_h' ),
			$f( 'fil_items', 'filars', 'Filary', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj filar',
				'sub_fields' => array(
					$f( 'fil_tag', 'tag', 'Tag', 'text' ),
					$f( 'fil_t', 'title', 'Tytuł', 'text' ),
					$f( 'fil_body', 'body', 'Treść', 'wysiwyg', array( 'media_upload' => 0 ) ),
				),
			) ),
		),
	);

	// COMBINED (radial)
	$layouts['combined'] = array(
		'key' => 'layout_combined', 'name' => 'combined', 'label' => 'Terapie łączone (radial)', 'display' => 'block',
		'sub_fields' => array_merge(
			array(
				$f( 'cmb_img', 'image', 'Zdjęcie', 'image', array( 'return_format' => 'array' ) ),
				$eyebrow( 'cmb_e' ),
				$f( 'cmb_h', 'heading', 'Nagłówek (dozwolone <br>)', 'text' ),
				$f( 'cmb_sub', 'sub', 'Podtytuł', 'textarea', array( 'rows' => 2 ) ),
				$f( 'cmb_nodes', 'nodes', 'Węzły (połowa lewo / połowa prawo)', 'repeater', array(
					'layout' => 'block', 'button_label' => 'Dodaj węzeł',
					'sub_fields' => array(
						$icon_field( 'cmb_ic' ),
						$f( 'cmb_nt', 'title', 'Tytuł', 'text' ),
						$f( 'cmb_nd', 'desc', 'Opis', 'textarea', array( 'rows' => 2 ) ),
					),
				) ),
				$f( 'cmb_et', 'emblem_title', 'Emblemat — tytuł', 'text', array( 'default_value' => 'Terapia łączona' ) ),
				$f( 'cmb_ed', 'emblem_desc', 'Emblemat — opis', 'text' ),
				$f( 'cmb_combos', 'combos', 'Kombinacje (lista)', 'repeater', array(
					'layout' => 'table', 'button_label' => 'Dodaj kombinację',
					'sub_fields' => array( $f( 'cmb_ct', 'text', 'Treść', 'text' ) ),
				) ),
			),
			$btn( 'cmb_c1', 'cta1', 'Przycisk 1' ),
			$btn( 'cmb_c2', 'cta2', 'Przycisk 2' )
		),
	);

	// FEAT
	$layouts['feat'] = array(
		'key' => 'layout_feat', 'name' => 'feat', 'label' => 'Co nas wyróżnia (feat)', 'display' => 'block',
		'sub_fields' => array(
			$f( 'feat_img', 'image', 'Zdjęcie', 'image', array( 'return_format' => 'array' ) ),
			$f( 'feat_pl', 'photo_label', 'Etykieta zdjęcia (gdy brak foto)', 'text' ),
			$f( 'feat_tt', 'tab_title', 'Plakietka — tytuł', 'text' ),
			$f( 'feat_ts', 'tab_sub', 'Plakietka — podtytuł', 'text' ),
			$eyebrow( 'feat_e' ), $heading( 'feat_h' ), $f( 'feat_num', 'numbered', 'Numeruj karty (01, 02…)', 'true_false', array( 'ui' => 1 ) ),
			$f( 'feat_sub', 'sub', 'Podtytuł', 'textarea', array( 'rows' => 2 ) ),
			$f( 'feat_cards', 'cards', 'Karty', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj kartę',
				'sub_fields' => array(
					$icon_field( 'feat_ic' ),
					$f( 'feat_ct', 'title', 'Tytuł', 'text' ),
					$f( 'feat_cx', 'text', 'Opis', 'textarea', array( 'rows' => 2 ) ),
				),
			) ),
		),
	);

	// CATGRID
	$layouts['catgrid'] = array(
		'key' => 'layout_catgrid', 'name' => 'catgrid', 'label' => 'Katalog (menu zabiegów)', 'display' => 'block',
		'sub_fields' => array(
			$bg( 'cat_bg' ),
			$f( 'cat_anchor', 'anchor', 'Kotwica (id)', 'text' ),
			$eyebrow( 'cat_e' ), $heading( 'cat_h' ),
			$f( 'cat_intro', 'intro', 'Wprowadzenie', 'textarea', array( 'rows' => 2 ) ),
			$f( 'cat_groups', 'groups', 'Grupy', 'repeater', array(
				'layout' => 'block', 'button_label' => 'Dodaj grupę',
				'sub_fields' => array(
					$f( 'cat_gt', 'group_title', 'Tytuł grupy', 'text' ),
					$f( 'cat_cats', 'cats', 'Kategorie', 'repeater', array(
						'layout' => 'block', 'button_label' => 'Dodaj kategorię',
						'sub_fields' => array(
							$f( 'cat_ct', 'title', 'Tytuł kategorii', 'text' ),
							$f( 'cat_items', 'items', 'Pozycje (jedna na linię)', 'textarea', array( 'rows' => 6 ) ),
						),
					) ),
				),
			) ),
		),
	);

	// ACF indeksuje layouty kluczem layoutu (nie nazwą) — przekluczuj.
	$layouts_by_key = array();
	foreach ( $layouts as $lo ) {
		$layouts_by_key[ $lo['key'] ] = $lo;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_sb_sekcje',
		'title'    => 'Sekcje strony',
		'fields'   => array(
			array(
				'key'          => 'field_sb_sekcje',
				'name'         => 'sekcje',
				'label'        => 'Sekcje',
				'type'         => 'flexible_content',
				'button_label' => 'Dodaj sekcję',
				'layouts'      => $layouts_by_key,
			),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'page' ) ),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'hide_on_screen'        => array( 'the_content' ),
		'active'                => true,
	) );

	// ===== Ustawienia strony (opcje globalne) =====
	acf_add_local_field_group( array(
		'key'      => 'group_sb_options',
		'title'    => 'Ustawienia strony',
		'fields'   => array(
			$f( 'opt_booksy', 'booksy_url', 'Booksy — URL rezerwacji', 'url' ),
			$f( 'opt_cta', 'cta_label', 'Etykieta przycisku CTA', 'text', array( 'default_value' => 'Umów wizytę' ) ),
			$f( 'opt_phone', 'contact_phone', 'Telefon', 'text' ),
			$f( 'opt_email', 'contact_email', 'E-mail', 'email' ),
			$f( 'opt_addr', 'contact_address', 'Adres', 'textarea', array( 'rows' => 2 ) ),
			$f( 'opt_hours', 'contact_hours', 'Godziny otwarcia', 'text' ),
			$f( 'opt_about', 'footer_about', 'Stopka — opis', 'textarea', array( 'rows' => 3 ) ),
			$f( 'opt_tag', 'footer_tag', 'Stopka — znacznik', 'text' ),
			$f( 'opt_seodesc', 'seo_default_description', 'SEO — domyślny opis (fallback)', 'textarea', array( 'rows' => 2 ) ),
			$f( 'opt_ogimg', 'og_default_image', 'SEO — domyślny obraz udostępnień (OG)', 'image', array( 'return_format' => 'array' ) ),
			$f( 'opt_biztype', 'business_type', 'Typ działalności (schema.org)', 'text', array( 'default_value' => 'MedicalClinic', 'instructions' => 'np. MedicalClinic, Dentist, BeautySalon, LocalBusiness' ) ),
			$f( 'opt_fb', 'facebook_url', 'Facebook — URL', 'url' ),
			$f( 'opt_ig', 'instagram_url', 'Instagram — URL', 'url' ),
			$f( 'opt_zl', 'znanylekarz_url', 'ZnanyLekarz — URL', 'url' ),
			$f( 'opt_city', 'contact_city', 'Miasto', 'text' ),
			$f( 'opt_postal', 'contact_postal', 'Kod pocztowy', 'text' ),
			$f( 'opt_founder', 'founder_name', 'Założyciel/ka — imię i nazwisko', 'text' ),
			$f( 'opt_founderrole', 'founder_role', 'Założyciel/ka — rola/tytuł', 'text' ),
		),
		'location' => array(
			array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'ustawienia-strony' ) ),
		),
		'active'   => true,
	) );

	// ===== SEO per-strona (tytuł/opis/obraz; puste = auto z treści) =====
	acf_add_local_field_group( array(
		'key'      => 'group_sb_seo',
		'title'    => 'SEO',
		'fields'   => array(
			$f( 'seo_title', 'seo_title', 'Tytuł SEO (puste = automatyczny)', 'text', array( 'instructions' => 'To, co widać w Google jako niebieski nagłówek. ~50–60 znaków.' ) ),
			$f( 'seo_desc', 'seo_description', 'Opis meta (puste = auto z treści)', 'textarea', array( 'rows' => 3, 'maxlength' => 160, 'instructions' => 'Opis pod tytułem w Google. ~150–160 znaków.' ) ),
			$f( 'seo_ogimg', 'seo_og_image', 'Obraz do udostępnień (OG)', 'image', array( 'return_format' => 'array', 'instructions' => 'Miniatura przy wysyłce linku (FB/WhatsApp). Puste = pierwsze zdjęcie strony.' ) ),
		),
		'location'        => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'page' ) ),
		),
		'menu_order'      => 5,
		'position'        => 'side',
		'label_placement' => 'top',
		'active'          => true,
	) );
} );
