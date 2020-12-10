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


/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 *
 */

add_action( 'winter_header', 'winter_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'winter_footer', 'winter_footer_before_area', 10 );
add_action( 'winter_footer', 'winter_footer_area', 10 );
// add_action( 'winter_footer', 'winter_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'winter_wrp_start', 'winter_wrp_start_cb', 10 );
add_action( 'winter_wrp_end', 'winter_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'winter_blog_col_start', 'winter_blog_col_start_cb', 10 );
add_action( 'winter_blog_col_end', 'winter_blog_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'winter_blog_posts_thumb', 'winter_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'winter_blog_posts_title', 'winter_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'winter_blog_posts_meta', 'winter_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'winter_blog_posts_excerpt', 'winter_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'winter_blog_posts_content', 'winter_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'winter_blog_sidebar', 'winter_blog_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'winter_blog_posts_share', 'winter_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'winter_blog_single_meta', 'winter_blog_single_meta_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'winter_page_content', 'winter_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'winter_fof', 'winter_fof_cb', 10 );




