<?php
/**
 * @Packge     : Winter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

	// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


	// Base URI
if ( ! defined( 'WINTER_DIR_URI' ) ) {
	define( 'WINTER_DIR_URI', get_template_directory_uri() . '/' );
}

	// assets URI
if ( ! defined( 'WINTER_DIR_ASSETS_URI' ) ) {
	define( 'WINTER_DIR_ASSETS_URI', WINTER_DIR_URI . 'assets/' );
}

	// Css File URI
if ( ! defined( 'WINTER_DIR_CSS_URI' ) ) {
	define( 'WINTER_DIR_CSS_URI', WINTER_DIR_ASSETS_URI . 'css/' );
}

	// Js File URI
if ( ! defined( 'WINTER_DIR_JS_URI' ) ) {
	define( 'WINTER_DIR_JS_URI', WINTER_DIR_ASSETS_URI . 'js/' );
}

	// Icon Images
if ( ! defined( 'WINTER_DIR_ICON_IMG_URI' ) ) {
	define( 'WINTER_DIR_ICON_IMG_URI', WINTER_DIR_ASSETS_URI . 'img/icon/' );
}

	// Base Directory
if ( ! defined( 'WINTER_DIR_PATH' ) ) {
	define( 'WINTER_DIR_PATH', get_parent_theme_file_path() . '/' );
}

	//Inc Folder Directory
if ( ! defined( 'WINTER_DIR_PATH_INC' ) ) {
	define( 'WINTER_DIR_PATH_INC', WINTER_DIR_PATH . 'inc/' );
}

	//Winter Libraries Folder Directory
if ( ! defined( 'WINTER_DIR_PATH_LIBS' ) ) {
	define( 'WINTER_DIR_PATH_LIBS', WINTER_DIR_PATH_INC . 'libraries/' );
}

	//Classes Folder Directory
if ( ! defined( 'WINTER_DIR_PATH_CLASSES' ) ) {
	define( 'WINTER_DIR_PATH_CLASSES', WINTER_DIR_PATH_INC . 'classes/' );
}

	//Hooks Folder Directory
if ( ! defined( 'WINTER_DIR_PATH_HOOKS' ) ) {
	define( 'WINTER_DIR_PATH_HOOKS', WINTER_DIR_PATH_INC . 'hooks/' );
}

	//Widgets Folder Directory
if ( ! defined( 'WINTER_DIR_PATH_WIDGET' ) ) {
	define( 'WINTER_DIR_PATH_WIDGET', WINTER_DIR_PATH_INC . 'widgets/' );
}


function winter_admin_style() {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'winter_admin_style' );
/**
 * Include File
 *
 */


if( class_exists( 'RW_Meta_Box' ) ){
	// Metabox Function
	require_once WINTER_DIR_PATH_INC . 'winter-metabox.php';
}
require_once WINTER_DIR_PATH_INC . 'winter-breadcrumbs.php';
require_once WINTER_DIR_PATH_INC . 'winter-widgets-reg.php';
require_once WINTER_DIR_PATH_INC . 'post-like.php';
require_once WINTER_DIR_PATH_INC . 'wp_bootstrap_navwalker.php';
require_once WINTER_DIR_PATH_INC . 'winter-functions.php';
require_once WINTER_DIR_PATH_INC . 'winter-commoncss.php';
require_once WINTER_DIR_PATH_INC . 'support-functions.php';
require_once WINTER_DIR_PATH_INC . 'winter-woo-functions.php';
require_once WINTER_DIR_PATH_INC . 'wp-html-helper.php';
require_once WINTER_DIR_PATH_INC . 'wp_bootstrap_pagination.php';
require_once WINTER_DIR_PATH_CLASSES . 'Class-Enqueue.php';
require_once WINTER_DIR_PATH_CLASSES . 'Class-Config.php';
require_once WINTER_DIR_PATH_HOOKS . 'hooks.php';
require_once WINTER_DIR_PATH_HOOKS . 'hooks-functions.php';
require_once WINTER_DIR_PATH_INC . 'customizer/customizer.php';
require_once WINTER_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php';
require_once WINTER_DIR_PATH_INC . 'class-epsilon-init-dashboard.php';


/**
 *
 * Initialize winter object
 *
 * Inside this object:
 *
 * Enqueue scripts, Google font, theme support features, Epsilon Dashboard .
 *
 */

$winter = new Winter();



