<?php
/**
 * Studio Base — bootstrap motywu-bazy.
 * Wygląd marki dostarcza motyw-dziecko. Tutaj tylko silnik.
 *
 * @package studio-base
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'STUDIO_BASE_VER', '0.1.0' );
define( 'STUDIO_BASE_DIR', get_template_directory() );
define( 'STUDIO_BASE_URI', get_template_directory_uri() );

require_once STUDIO_BASE_DIR . '/inc/setup.php';
require_once STUDIO_BASE_DIR . '/inc/icons.php';
require_once STUDIO_BASE_DIR . '/inc/flex.php';
require_once STUDIO_BASE_DIR . '/inc/seo.php';
require_once STUDIO_BASE_DIR . '/inc/enqueue.php';
require_once STUDIO_BASE_DIR . '/inc/acf.php';
require_once STUDIO_BASE_DIR . '/inc/fields.php';
