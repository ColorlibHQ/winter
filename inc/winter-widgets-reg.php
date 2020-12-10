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


function winter_widgets_init() {
	// sidebar widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'winter' ),
			'id'            => 'winter-post-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="m-text23 p-b-34">',
			'after_title'   => '</h4>',
		)
	);

	// Woo page sidebar widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woo Page Sidebar', 'winter' ),
			'id'            => 'winter-woo-sidebar',
			'before_widget' => '<div id="%1$s" class="widget left_widgets sidebar_box_shadow %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="l_w_title"><h3>',
			'after_title'   => '</h4></div><div class="widgets_inner">',
		)
	);

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'winter' ),
			'id'            => 'footer-1',
			'before_widget' => '<div class="col-sm-6 col-lg-2"><div id="%1$s" class="single_footer_part %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'winter' ),
			'id'            => 'footer-2',
			'before_widget' => '<div class="col-sm-6 col-lg-2"><div id="%1$s" class="single_footer_part %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'winter' ),
			'id'            => 'footer-3',
			'before_widget' => '<div class="col-sm-6 col-lg-3"><div id="%1$s" class="single_footer_part %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'winter' ),
			'id'            => 'footer-4',
			'before_widget' => '<div class="col-sm-6 col-lg-4"><div id="%1$s" class="single_footer_part %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'winter_widgets_init' );
