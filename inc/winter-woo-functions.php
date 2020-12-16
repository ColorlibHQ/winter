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

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//Shop page product title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

//Remove before after link
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// Remove default add to cart
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Remove product rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
function winter_single_product_meta() { 
   global $product;
   $stock_message = $product->get_stock_status();
   if ( $stock_message == 'instock' ) {
	$stock = esc_html__( 'In Stock', 'winter' );
   } elseif ( $stock_message == 'outofstock' ) {
	$stock = esc_html__( 'Out Of Stock', 'winter' );
   } else {
	$stock = esc_html__( 'On Back Order', 'winter' ) ;
   }
   ?>
   <ul class="list">
      	<?php do_action( 'woocommerce_product_meta_start' ); ?>
		<li>
			<?php
			$cat_id = count( $product->get_category_ids() );
			$cat_label = $cat_id > 1 ? esc_html__('Categories', 'winter') : esc_html__('Category', 'winter');
			echo '<span>'.esc_html__( $cat_label, 'winter' ).'</span>: ' . wc_get_product_category_list( $product->get_id() );       	
			?>
		</li>
		<li><span><?php echo esc_html__('Availibility', 'winter')?></span>: <?php echo wp_kses_post( $stock ); ?></li>

		<?php
      do_action( 'woocommerce_product_meta_end' ); ?>
   	</ul>
<?php
};     
add_action( 'woocommerce_single_product_summary', 'winter_single_product_meta', 10 );

// Remove woocommerce sale flash
add_filter( 'woocommerce_sale_flash', 'winter_hide_wc_sale_flash' );
function winter_hide_wc_sale_flash() {
	return false;
}

// Woocommerce Check
if ( ! function_exists( 'winter_is_wc_activated' ) ) {
	function winter_is_wc_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false; }
	}
}

// Woocommerce Check
if ( ! function_exists( 'winter_is_cca_page' ) ) {
	function winter_is_cca_page() {
		if ( winter_is_wc_activated() && ( is_cart() || is_checkout() || is_account_page() ) ) {
			return true;
		} else {
			return false;
		}
	}
}

// related products number
add_filter( 'woocommerce_output_related_products_args', 'winter_change_number_related_products', 9999 );

function winter_change_number_related_products( $args ) {

	$number = 4;

	if ( winter_opt( 'winter_related_product_number' ) ) {
		$number = winter_opt( 'winter_related_product_number' );
	}

	$args['posts_per_page'] = absint( $number ); // # of related products

	return $args;
}

// product page before add to cart form
add_action( 'woocommerce_before_add_to_cart_form', 'winter_before_add_to_cart_form' );
function winter_before_add_to_cart_form() {
	echo '<div class="p-t-33 p-b-60">';
}

// product page after add to cart form
add_action( 'woocommerce_after_add_to_cart_form', 'winter_after_add_to_cart_form' );
function winter_after_add_to_cart_form() {
	echo '</div>';
}

/**
 *
 * Shop loop item title
 */

add_action( 'woocommerce_shop_loop_item_title', 'winter_woocommerce_item_title', 10 );

function winter_woocommerce_item_title() {
	?>
		<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
	<?php
}

/**
 *
 * header cart count
 */
function winter_woocommerce_header_add_to_cart_fragment( $fragments ) {

	ob_start();
	?>
		<span class="winter-head-cart"><?php echo sprintf( '%d', esc_html( WC()->cart->cart_contents_count ) ); ?></span>
	<?php
	$fragments['.dropdown.cart .winter-head-cart'] = ob_get_clean();
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'winter_woocommerce_header_add_to_cart_fragment' );


/**
 * winter_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 */

add_filter( 'woocommerce_show_page_title', 'winter_hide_page_title' );
function winter_hide_page_title() {

	if ( ! winter_opt( 'winter-woo-shoppage-title-settings' ) ) {
		$title = false;
	} else {
		$title = true;
	}

	return $title;
}

/**
 *
 * Removes the product page tab description heading
 */
add_filter( 'woocommerce_product_description_heading', 'winter_product_description_heading' );
function winter_product_description_heading() {
	return false;
}

/**
 *
 * Removes the product page tab additional information heading
 */
add_filter( 'woocommerce_product_additional_information_heading', 'winter_product_additional_information_heading' );
function winter_product_additional_information_heading() {
	return false;
}

/**
 *
 * Shop Page Product per page
 *
 */
add_filter( 'loop_shop_per_page', 'winter_loop_shop_per_page', 20 );
function winter_loop_shop_per_page( $cols ) {

	// Return the number of products you wanna show per page.
	if ( winter_opt( 'winter_woo_product_perpage' ) ) {
		$num = winter_opt( 'winter_woo_product_perpage' );
	} else {
		$num = 10;
	}

	$cols = absint( $num );

	return $cols;
}


/*==============================================
*  WooCommerce Comments Review Section
*/

function winter_woocommerce_comments($comment, $args, $depth) {
	global $product;
   	$GLOBALS['comment'] = $comment;
   	extract($args, EXTR_SKIP);
   	?>
   	<div id="comment-<?php comment_ID() ?>" class="review_item">
      <div class="media">
         <?php 
         if(get_avatar($comment)) {
            echo '<div class="d-flex">';
            echo get_avatar($comment, 70);
            echo '</div>';
         } ?>

         <div class="media-body">
            <h4><?php comment_author(); ?></h4>
			<?php
			$starVal = get_comment_meta( $comment->comment_ID, 'rating', true );
            
            if (!empty( $starVal )) {
                  echo '<div class="star">';
                  for ($i = 1; $i <= 5; $i++) {

                     if ($starVal >= $i) {
                        echo '<span class="fa fa-star"></span>';
                     } else {
                        echo '<span class="fa fa-star-o"></span>';
                     }
                  }
                  echo '</div>';
			} 
			
			// echo '<pre>';
			// print_r( woocommerce_review_display_rating() );
			// echo '</pre>';
			 
            ?>
         </div>
      </div>
    	<?php woocommerce_review_display_comment_text() ?>
   </div>

   <?php
}


?>
