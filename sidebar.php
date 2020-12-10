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

// Sidebar
if ( is_active_sidebar( 'winter-post-sidebar' ) ) {

	echo '<div class="col-lg-4 sidebar-widgets"><div class="blog_right_sidebar">';
		dynamic_sidebar( 'winter-post-sidebar' );
	echo '</div></div>';
}



