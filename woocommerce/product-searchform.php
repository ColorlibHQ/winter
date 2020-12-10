<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="pos-relative bo11 of-hidden">
<form role="search" method="get" class="woocommerce-product-search header__search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'winter' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field s-text7 size16 p-l-23 p-r-50" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'winter' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'winter' ); ?>"><i class="fs-13 fa fa-search" aria-hidden="true"></i></button>
	<input type="hidden" name="post_type" value="product" />
</form>
</div>