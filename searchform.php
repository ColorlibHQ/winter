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
?>
<div class="pos-relative bo11 of-hidden">
	<form role="search" class="header__search-form" action="<?php echo esc_url( site_url( '/' ) ); ?>">
		<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="s" placeholder="<?php esc_html_e( 'Search', 'winter' ); ?>">
		<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
			<i class="fs-13 fa fa-search" aria-hidden="true"></i>
		</button>
	</form>
</div>
