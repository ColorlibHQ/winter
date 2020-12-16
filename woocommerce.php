<?php
/**
 * @Packge     : Winter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

get_header();

if ( is_product() ) {
	$winter_wc_wrapper_class 	= 'product_image_area section_padding';
	$winter_wc_row_class 		= 'row s_product_inner justify-content-between';
	$winter_shop_row_class 		= '';
} else {
	$winter_wc_wrapper_class 	= 'cat_product_area section_padding border_top';
	$winter_wc_row_class 		= 'row';
	$winter_shop_row_class 		= 'row';
}

?>

	<!-- Content page -->
	<section class="<?php echo esc_attr( $winter_wc_wrapper_class )?>">
		<div class="container">
			<div class="<?php echo esc_attr( $winter_wc_row_class )?>">

				<?php
				// sidebar
				$col = '12';
				if ( ! is_product() ) {
					get_sidebar( 'woo' );
					$col = '9';
				}

				?>
				<div class="col-lg-<?php echo esc_attr( $col ); ?>">
					<?php echo $winter_shop_row_class != '' ? '<div class="row">' : '' ?>
						<?php
						if ( have_posts() ) {
							// Woocommerce Content
							woocommerce_content();
						} else {
							get_template_part( 'templates/content', 'none' );
						}
						?>
					<?php echo $winter_shop_row_class != '' ? '</div>' : '' ?>
				</div>

			</div>
		</div>
	</section>
	<?php if ( is_product() && winter_opt( 'winter-woo-related-product-settings' ) ) : ?>
	<section class="product_list best_seller padding_bottom">
		<div class="container">
			<?php woocommerce_output_related_products(); ?>
		</div>
	</section>
	<?php endif; ?>

<?php
get_footer();
?>
