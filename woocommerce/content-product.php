<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


global $product, $set_place;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

if ( is_product() ) {
	$single_product_wrapper = 'col-lg-3 col-sm-6';
} else {
	$single_product_wrapper = 'col-lg-4 col-sm-6';
}

?>

<div class="<?php echo esc_attr( $single_product_wrapper )?>">
	<div <?php wc_product_class( 'single_category_product' ); ?>>
		<div class="single_category_img">
			<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );

			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );

			?>

			<div class="category_social_icon">
				<ul>
					<!-- <li><a href="#"><i class="ti-heart"></i></a></li> -->
					<li><a href="<?php echo esc_url( $product->add_to_cart_url() )?>"><i class="ti-bag"></i></a></li>
				</ul>
			</div>
			
			<div class="category_product_text">
				<?php
				
				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );

				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );


				?>
			</div>
		</div>
	</div>
</div>
