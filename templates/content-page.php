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

$contentclass = '';
if ( ! winter_is_cca_page() ) {
	$contentclass = 'content--area';
}

?>
<div id="page_<?php the_ID(); ?>" <?php post_class( esc_attr( $contentclass ) ); ?>>
	<?php

	/**
	 * page content
	 * Comments Template
	 * @Hook  winter_page_content
	 *
	 * @Hooked winter_page_content_cb
	 *
	 *
	 */
	do_action( 'winter_page_content' );

	?>
</div>
