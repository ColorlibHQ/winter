<?php
// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Winter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


// enqueue css
function winter_common_custom_css() {

	wp_enqueue_style( 'winter-common', get_template_directory_uri() . '/assets/css/common.css' );

	$topbar_bg         = esc_attr( winter_opt( 'winter_header_top_bgColor' ) );
	$topbar_color      = esc_attr( winter_opt( 'winter_header_top_textColor' ) );
	$header_bg         = esc_url( get_header_image() );
	$header_text_color = esc_attr( winter_opt( 'winter_headertextcolor' ) );
	$headerbgcolor     = esc_attr( winter_opt( 'winter_headerbgcolor' ) );
	$foftext1          = esc_attr( winter_opt( 'winter_fof_textonecolor_settings' ) );
	$foftext2          = esc_attr( winter_opt( 'winter_fof_texttwocolor_settings' ) );
	$fofbgcolor        = esc_attr( winter_opt( 'winter_fof_bgcolor_settings' ) );
	$footer_bg_color   = esc_attr( winter_opt( 'winter_footer_bgColor_settings' ) );
	$footer_text_color = esc_attr( winter_opt( 'winter_footer_color_settings' ) );
	$anchorcolor       = esc_attr( winter_opt( 'winter_footer_anchorcolor_settings' ) );
	$anchorhovcolor    = esc_attr( winter_opt( 'winter_footer_anchorhovcolor_settings' ) );
	$widgettitlecolor  = esc_attr( winter_opt( 'winter_footer_widgettitlecolor_settings' ) );
	$themecolor        = esc_attr( winter_opt( 'winter_themecolor' ) );

	$customcss = "
		[data-loader='ball-scale'],
		.select2-container .select2-results__option[aria-selected='true'],
		.select2-container .select2-results__option--highlighted[aria-selected],
		.item-menu-mobile,
		.arrow-slick1:hover,
		.swal-button,
		.swal-button:active,
		.block2-img span.onsale,
		.woocommerce span.onsale,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover,
		[data-loader='ball-scale'],
		.select2-container .select2-results__option[aria-selected='true'],
		.select2-container .select2-results__option--highlighted[aria-selected],
		.item-menu-mobile,
		.arrow-slick1:hover,
		.swal-button,
		.swal-button:active,
		.block2-img span.onsale,
		.woocommerce span.onsale,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover,
		.woocommerce button.button:hover,
		.block2-overlay .add_to_cart_button:hover,
		.woocommerce #respond input#submit:hover,
		.woocommerce a.button:hover,
		.woocommerce button.button:hover,
		.woocommerce input.button:hover,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover,
		.hov1:hover,
		.eff2:active,
		.woocommerce .woocommerce-cart-form #respond input#submit:hover,
		.woocommerce .woocommerce-cart-form a.button:hover,
		.woocommerce .woocommerce-cart-form button.button:hover,
		.woocommerce .woocommerce-cart-form input.button:hover,
		.woocommerce-MyAccount-navigation-link a:hover,
		.bg0-hov:hover {
			background-color: {$themecolor};
		}

		.side-menu .sub-menu a:hover,
		.block2-btn-towishlist .icon_heart,
		.side-menu .sub-menu a:hover,
		li.sale-noti > a,
		.sub_menu > li:hover > a,
		.inner-child-fof a:hover,
		a:hover,
		.color0-hov:hover {
			color: {$themecolor};
		}
		.woocommerce-MyAccount-navigation-link a:hover,
		.tag-item:hover{
			border-color: {$themecolor};
		}
		.promo-bar.bg0,
		.topbar{
			background-color: {$topbar_bg};
		}
		.promo-bar.bg0,
		.promo-bar.bg0 a,
		.topbar-social-item,
		.topbar-email,
		.topbar-child1{
			color: {$topbar_color};
		}
		.bg-title-page.global-page-header {
			background-image: url( {$header_bg} );
		}
		.bg-title-page .l-text2 {
			color: {$header_text_color};
		}

		.bg-title-page.global-page-header{
			background-color: {$headerbgcolor}
		}
		#f0f{
			background-color: {$fofbgcolor}
		}
		.inner-child-fof .h1 {
			color: {$foftext1}
		}
		.inner-child-fof a,
		.inner-child-fof p {
			color: {$foftext2}
		}
		footer.bg6{
			background-color: {$footer_bg_color};
			color: {$footer_text_color};
		}
		caption,
		footer .s-text8 {
			color: {$footer_text_color};
		}
		.footer-copy-right-text a,
		.footer--widget a{
			color: {$anchorcolor};
		}
		.footer-copy-right-text a:hover,
		.footer--widget a:hover{
			color: {$anchorhovcolor};
		}
		.footer--widget h4.s-text12{
			color: {$widgettitlecolor};
		}


	";

	wp_add_inline_style( 'winter-common', $customcss );

}
add_action( 'wp_enqueue_scripts', 'winter_common_custom_css', 50 );
