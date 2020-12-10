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
		 * Footer Area
		 *
		 * @Footer
		 * @Back To Top Button
		 *
		 * @Hook winter_footer
		 *
		 * @Hooked  winter_footer_area 10
		 * @Hooked  winter_back_to_top 20
		 *
		 */

		do_action( 'winter_footer' );

	wp_footer();
?>
</body>
</html>
