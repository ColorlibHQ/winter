<?php
/**
 * @Packge     : Winter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
	/**
	 * Theme Options Panel
	 */
	array(
		'id'   => 'winter_options_panel',
		'args' => array(
			'priority'       => 0,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Theme Options', 'winter' ),
		),
	),
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
	/**
	 * General Section
	 */
	array(
		'id'   => 'winter_general_options_section',
		'args' => array(
			'title'    => esc_html__( 'General', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 1,
		),
	),
	/**
	 * Header Section
	 */
	array(
		'id'   => 'winter_headertop_options_section',
		'args' => array(
			'title'    => esc_html__( 'Header Top', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 2,
		),
	),
	/**
	 * Shipping Section Settings
	 */
	array(
		'id'   => 'winter_shipping_section_settings',
		'args' => array(
			'title'    => esc_html__( 'Shipping Section Settings', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 3,
		),
	),
	/**
	 * Blog Section
	 */
	array(
		'id'   => 'winter_blog_options_section',
		'args' => array(
			'title'    => esc_html__( 'Blog', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 4,
		),
	),
	/**
	 * WooCommerce Section
	 */
	array(
		'id'   => 'winter_woocommerce_options_section',
		'args' => array(
			'title'    => esc_html__( 'WooCommerce', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 5,
		),
	),

	/**
	 * 404 Page Section
	 */
	array(
		'id'   => 'winter_fof_options_section',
		'args' => array(
			'title'    => esc_html__( '404 Page', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 6,
		),
	),
	/**
	 * Footer Section
	 */
	array(
		'id'   => 'winter_footer_options_section',
		'args' => array(
			'title'    => esc_html__( 'Footer', 'winter' ),
			'panel'    => 'winter_options_panel',
			'priority' => 7,
		),
	),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
	'panel'   => $panels,
	'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );


