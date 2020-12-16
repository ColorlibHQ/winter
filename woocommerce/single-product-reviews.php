<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>



<div class="row">
	<div class="col-lg-6">
		<div class="row total_rate">
			<div class="col-6">
				<div class="box_total">
					<h5><?php echo esc_html__( 'Overall', 'winter' )?></h5>
					<h4><?php echo $product->get_average_rating(); ?></h4>
					<h6>
					<?php
					$count = $product->get_review_count();
					if ( $count && wc_review_ratings_enabled() ) {
						/* translators: 1: reviews count 2: product name */
						$reviews_title = sprintf( esc_html( _n( '%1$s review', '%1$s reviews', $count, 'winter' ) ), esc_html( $count ) );
						echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
					} else {
						esc_html_e( 'Reviews', 'winter' );
					}
					?>
					</h6>
				</div>
			</div>
			<div class="col-6">
				<div class="rating_list">
					<?php 
					if ( $count && wc_review_ratings_enabled() ) {
						$rating_1 = $product->get_rating_count(1);
						$rating_2 = $product->get_rating_count(2);
						$rating_3 = $product->get_rating_count(3);
						$rating_4 = $product->get_rating_count(4);
						$rating_5 = $product->get_rating_count(5);

						$baseOn = sprintf( esc_html( 'Based on %1$s Reviews'), $count );
						echo '<h3>'. $baseOn .'</h3>'; ?>

						<ul class="list">
							<li>
								5 Star
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<?php echo esc_html( $rating_5 ); ?>
							</li>
							<li>
								4 Star
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<?php echo esc_html( $rating_4 ); ?>
							</li>
							<li>
								3 Star
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php echo esc_html( $rating_3 ); ?>
							</li>
							<li>
								2 Star
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php echo esc_html( $rating_2 ); ?>
							</li>
							<li>
								1 Star
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php echo esc_html( $rating_1 ); ?>
							</li>
						</ul>

						<?php
					}
					?>
				</div>
			</div>
		</div>

		<?php
		if( have_comments() ){ ?>
			<div class="review_list">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'winter_woocommerce_comments' ) ) ); ?>
			</div>
			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			}
	 	} else { ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'winter' ); ?></p>
			<?php 
		} ?>

	</div>
	<div class="col-lg-6">
		<div class="review_box">
			
			

			<?php
			$commenter = wp_get_current_commenter();

			$comment_form = array(
				/* translators: %s is product title */
				'title_reply'         => have_comments() ? '<h4>'. __( 'Add a review', 'winter' ).'</h4>' : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'winter' ), get_the_title() ),
				/* translators: %s is product title */
				'title_reply_to'      => __( 'Leave a Reply to %s', 'winter' ),
				'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
				'title_reply_after'   => '</span>',
				'comment_notes_after' => '',
				'fields'              => array(
					'author' => '<div class="col-md-12"><div class="form-group"><input	type="text"	class="form-control" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '"	placeholder="'.esc_html__( 'Your Full name', 'winter' ).'"/></div></div>',
					'email'  => '<div class="col-md-12"><div class="form-group"><input type="email" class="form-control" id="email"	name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="'.esc_html__('Email Address', 'winter').'"/></div></div>',

				),
				'label_submit'  => __( 'Submit', 'winter' ),
				'logged_in_as'  => '',
				'comment_field' => '',
				'class_form'    => 'contact_form',
				'id_form'       => 'contactForm',
				'submit_button' => '<div class="col-md-12 text-right"><button type="submit" name="submit " value="submit" class="btn_3">Submit Now</button></div>'
			);

			$account_page_url = wc_get_page_permalink( 'myaccount' );
			if ( $account_page_url ) {
				/* translators: %s opening and closing link tags respectively */
				$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'winter' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
			}

			if ( wc_review_ratings_enabled() ) {
				$comment_form['comment_field'] = '<div class="comment-form-rating col-lg-12"><label for="rating">' . esc_html__( 'Your rating', 'winter' ) . '</label>
				<select name="rating" id="rating" required>
					<option value="">' . esc_html__( 'Rate&hellip;', 'winter' ) . '</option>
					<option value="5">' . esc_html__( 'Perfect', 'winter' ) . '</option>
					<option value="4">' . esc_html__( 'Good', 'winter' ) . '</option>
					<option value="3">' . esc_html__( 'Average', 'winter' ) . '</option>
					<option value="2">' . esc_html__( 'Not that bad', 'winter' ) . '</option>
					<option value="1">' . esc_html__( 'Very poor', 'winter' ) . '</option>
				</select></div>';
			}
			$comment_form['comment_field'] .= '<div class="col-md-12"><div class="form-group"><textarea class="form-control" name="comment" id="comment" rows="5" placeholder="Review"></textarea></div></div>';
			
			
			comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
			?>



		</div>
	</div>
</div>


