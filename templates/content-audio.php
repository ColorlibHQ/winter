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


// Post Item Start

?>
<div id="<?php the_ID(); ?>" <?php post_class( esc_attr( 'item-blog-txt p-b-80' ) ); ?>>
	<?php
	/**
	 * Blog Post thumbnail
	 * @Hook  winter_blog_posts_thumb
	 *
	 * @Hooked winter_blog_posts_thumb_cb
	 *
	 *
	 */
	do_action( 'winter_blog_posts_thumb' );

	?>
	<div class="post--summery bg-color--alabaster">
		<?php

		/**
		 * Blog Post title
		 * @Hook  winter_blog_posts_title
		 *
		 * @Hooked winter_blog_posts_title_cb
		 *
		 *
		 */
		do_action( 'winter_blog_posts_title' );

		/**
		 * Blog Post Meta
		 * @Hook  winter_blog_posts_meta
		 *
		 * @Hooked winter_blog_posts_meta_cb
		 *
		 *
		 */
		do_action( 'winter_blog_posts_meta' );

		/**
		 * Blog Excerpt With read more button
		 * @Hook  winter_blog_posts_excerpt
		 *
		 * @Hooked winter_blog_posts_excerpt_cb
		 *
		 *
		 */
		do_action( 'winter_blog_posts_excerpt' );

		?>
	</div>
</div>
