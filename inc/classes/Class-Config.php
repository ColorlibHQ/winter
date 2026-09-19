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

	// Final Class
final class Winter {

	// Theme Version
	private $winter_version = '1.0';

	// Minimum WordPress Version required
	private $min_wp = '5';

	// Minimum PHP version required
	private $min_php = '7.2';

	function __construct() {

		// After setup theme
		add_action( 'after_setup_theme', array( $this, 'support' ) );
		// elementor flag
		add_action( 'after_switch_theme', array( $this, 'set_elementor_flag' ) );
		// Enqueue elementor theme default style
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_elementor_theme_default_style' ) );
		// Enqueue elementor notice script
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_elementor_notice_script' ) );
		// Elementor desiable default style
		add_action( 'wp_ajax_elementor_desiable_default_style', array( $this, 'elementor_desiable_default_style' ) );

		// initialize theme flag
		$this->init();

	}

	// Theme init
	public function init() {

		$this->setup();

		// customizer init Instantiate
		$this->customizer_init();


	}

	// Theme setup
	private function setup() {

		// Create enqueue class instance
		$enqueu          = new winter_Enqueue();
		$enqueu->scripts = $this->enqueue();
		$enqueu->winter_scripts_enqueue_init();

	}
	// Theme Support
	public function support() {
		// content width
		$GLOBALS['content_width'] = apply_filters( 'winter_content_width', 751 );

		// text domain for translation.
		load_theme_textdomain( 'winter', WINTER_DIR_PATH . '/languages' );

		// support title tage
		add_theme_support( 'title-tag' );

		// support logo
		add_theme_support( 'custom-logo', array(
			'height'      => 21,
			'width'       => 82,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		//  support post format
		add_theme_support( 'post-formats', array( 'video', 'audio' ) );

		// support post-thumbnails
		add_theme_support( 'post-thumbnails' );

		// Site logo size
		add_image_size( 'winter_logo_82x21', 82, 21, true );

		// Featured image thumbnails size
		add_image_size( 'winter_featured_img_thumb_630x700', 630, 700, true );

		// Custom data center thumbnails size
		add_image_size( 'winter_widget_post_thumb', 370, 277, true );

		// New arrival product thumbnails size
		add_image_size( 'winter_new_arrival_product_thumb_755x560', 755, 560, true );
		add_image_size( 'winter_new_arrival_product_thumb_540x560', 540, 560, true );
		add_image_size( 'winter_new_arrival_product_thumb_565x560', 565, 560, true );

		// Shipping details icon image size
		add_image_size( 'winter_shipping_details_icon_thumb_48x39', 48, 39, true );

		// Product thumb image sizes
		add_image_size( 'winter_product_thumb_255x280', 255, 280, true );
		add_image_size( 'winter_single_product_thumb_475x580', 475, 580, true );

		// Single blog post image size
		add_image_size( 'winter_single_blog_750x375', 750, 375, true );
		add_image_size( 'winter_np_thumb', 60, 60, true );

		// Latest post thumbnail Widget thumbnail size
		add_image_size( 'winter_widget_post_thumb', 80, 80, true );

		// support custom header

		add_theme_support(
			'custom-header',
			array(
				'header-text' => false,
			)
		);

		// support automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// support html5
		add_theme_support( 'html5' );
		
		// support custom background
		add_theme_support( 'custom-background' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// woocommerce support
		add_theme_support( 'woocommerce' );

		// woo product gallery zoom, lightbox, slider support
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// register nav menu
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'winter' ),
				'company-menu' => esc_html__( 'Company Menu', 'winter' ),
			)
		);

		// editor style
		add_editor_style( 'assets/css/editor-style.css' );

	} // end support method

	// enqueue theme style and script
	private function enqueue() {

		$css_path = WINTER_DIR_CSS_URI;
		$js_path  = WINTER_DIR_JS_URI;

		$scripts = array(
			'style'   => array(
				array(
					'handler' => 'winter-google-font',
					'file'    => $this->google_font(),
				),
				array(
					'handler'    => 'winter-bootstrap',
					'file'       => $css_path . 'bootstrap.min.css',
					'dependency' => array(),
					'version'    => '5.3.8-4',
				),
				array(
					'handler'    => 'winter-animate',
					'file'       => $css_path . 'animate.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-owl-carousel-css',
					'file'       => $css_path . 'owl.carousel.min.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-flaticon-css',
					'file'       => $css_path . 'flaticon.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-font-awesome',
					'file'       => $css_path . 'font-awesome.min.css',
					'dependency' => array(),
					'version'    => '7.3.1-1',
				),
				array(
					'handler'    => 'winter-nice-select',
					'file'       => $css_path . 'nice-select.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-themify-icons',
					'file'       => $css_path . 'themify-icons.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-magnific-popup-css',
					'file'       => $css_path . 'magnific-popup.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-slick-css',
					'file'       => $css_path . 'slick.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'winter-css',
					'file'       => $css_path . 'style.css',
					'dependency' => array(),
					'version'    => $this->winter_version,
				),
				array(
					'handler' => 'winter-style',
					'file'    => get_stylesheet_uri(),
				),
			),
			'scripts' => array(

				array(
					'handler'    => 'winter-bootstrap-js',
					'file'       => $js_path . 'bootstrap.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '5.3.8-4',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-jquery-magnific-popup',
					'file'       => $js_path . 'jquery.magnific-popup.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-swiper-js',
					'file'       => $js_path . 'swiper.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-mixitup-js',
					'file'       => $js_path . 'mixitup.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-owl-carousel-js',
					'file'       => $js_path . 'owl.carousel.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-jquery-nice-select-js',
					'file'       => $js_path . 'jquery.nice-select.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-slick-js',
					'file'       => $js_path . 'slick.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'jquery-instagramFeed',
					'file'       => $js_path . 'jquery.instagramFeed.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-jquery-counterup-js',
					'file'       => $js_path . 'jquery.counterup.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-jquery-ajaxchimp-js',
					'file'       => $js_path . 'jquery.ajaxchimp.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-waypoints-js',
					'file'       => $js_path . 'waypoints.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-jquery-ajaxchimp-js',
					'file'       => $js_path . 'jquery.ajaxchimp.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'winter-main',
					'file'       => $js_path . 'custom.js',
					'dependency' => array( 'jquery' ),
					'version'    => $this->winter_version,
					'in_footer'  => true,
				),
			),
		);

		return $scripts;

	} // end enqueu method

	// Google Font
	private function google_font() {
		$font_url = '';

		/*
		 * The families this theme uses are bundled under
		 * assets/fonts/google, so nothing is fetched from Google and
		 * no request leaves the visitor's browser for a third party.
		 *
		 * Translators can still turn the fonts off for scripts these
		 * families do not cover.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'winter' ) ) {
			$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
		}

		return esc_url_raw( $font_url );
	} //End google_font method

	/**
	 * Epsilon customizer
	 *
	 */

	private function customizer_init() {




		// Instantiate winter theme customizer
		$winter_theme_customizer = new winter_theme_customizer();
	}
	/**
	 * Notice for Elementor default style
	 *
	 */

	// Check elementor preview page
	public static function check_elementor_preview_page() {

		if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) {
			return true;
		}

		return false;

	}
	// Set flag for elementor ( hooked in after switch theme )
	public function set_elementor_flag() {
		update_option( 'winter_had_elementor', 'no' );
	}
	// Elementor dsiable default style
	public function elementor_desiable_default_style() {

		if ( ! wp_verify_nonce( $_POST['nonce'], 'winter-elementor-notice-nonce' ) ) {
			return;
		}
		$reply = $_POST['reply'];
		if ( ! empty( $reply ) ) {
			if ( $reply == 'yes' ) {
				update_option( 'elementor_disable_color_schemes', 'yes' );
				update_option( 'elementor_disable_typography_schemes', 'yes' );
			}
			update_option( 'winter_had_elementor', 'yes' );
		}
		die();

	}
	// Enqueue theme default style for elementor
	public function enqueue_elementor_theme_default_style() {

		$disabled_color_schemes      = get_option( 'elementor_disable_color_schemes' );
		$disabled_typography_schemes = get_option( 'elementor_disable_typography_schemes' );

		if ( $disabled_color_schemes === 'yes' && $disabled_typography_schemes === 'yes' ) {
			wp_enqueue_style( 'winter-elementor-default-style', WINTER_DIR_CSS_URI . 'elementor-default-element-style.css', array(), $this->winter_version );
		}
	}
	// Enqueue elementor notice scripts
	public function enqueue_elementor_notice_script() {

		$had_elementor = get_option( 'winter_had_elementor' );

		if ( $had_elementor == 'no' && self::check_elementor_preview_page() ) {
			wp_enqueue_script( 'winter-elementor-notice', WINTER_DIR_JS_URI . 'winter-elementor-notice.js', array( 'jquery' ), '1.0', true );
			wp_localize_script(
				'winter-elementor-notice',
				'winterElementorNotice',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'winter-elementor-notice-nonce' ),
				)
			);
		}

	}

} // End Class



