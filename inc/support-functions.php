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



// Popular post count
function winter_get_post_views($postID){
    $count_key = 'winter_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function winter_set_post_views($postID) {
    $count_key = 'winter_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


// Post Category
function winter_post_cats() {

	$cats       = get_the_category();
	$categories = '';
	if ( $cats ) {

		$categories .= '<div class="posts--cat m--30-0-0">';
		$categories .= '<ul class="nav"><li><span><i class="fa fm fa-th-list"></i>' . esc_html__( 'Catagory :', 'winter' ) . '</span></li>';

		foreach ( $cats as $cat ) {
			$categories .= '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="category-link">' . esc_html( $cat->name ) . '</a></li>';
		}

		$categories .= '</ul>';
		$categories .= '</div>';
	}

	return $categories;

}

// Post Tags
function winter_post_tags() {

	$tags = get_the_tags();

	$get_tags = '';

	if ( $tags ) {

		foreach ( $tags as $tag ) {
			$get_tags .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="tag-item">' . esc_html( $tag->name ) . '</a>';
		}
	}

	return $get_tags;

}


/*===================================================
 Winter Comment Template Callback
 ====================================================*/
 function winter_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'winter' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'winter'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'winter' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'winter' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'winter_replace_reply_link_class');
function winter_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



// header cart count
function winter_cart_count( $class = '' ) {
	if ( winter_is_wc_activated() ) :
		?>
		<div class="header-wrapicon2 <?php echo esc_attr( $class ); ?>">
			<img src="<?php echo esc_url( WINTER_DIR_ASSETS_URI ); ?>img/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="<?php esc_html_e( 'ICON', 'winter' ); ?>">
			<span class="header-icons-noti"><?php echo esc_html( sprintf( '%d', WC()->cart->cart_contents_count ) ); ?></span>
			<div class="header-cart header-dropdown">
				<?php woocommerce_mini_cart(); ?>
			</div>
		</div>
		<?php
	endif;
}

