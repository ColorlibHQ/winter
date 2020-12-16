<?php
/**
 * @Packge     : Winter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

// Cart button option field
if ( defined( 'WC_PLUGIN_FILE' ) ) {
	Epsilon_Customizer::add_field(
		'winter-cart-toggle-settings',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Header Cart Button', 'winter' ),
			'transport'   => 'refresh',
			'description' => esc_html__( 'Toggle the display of the header cart button.', 'winter' ),
			'section'     => 'winter_general_options_section',
			'default'     => false,
		)
	);
}

Epsilon_Customizer::add_field(
	'winter_instagram_username',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Instagram Username', 'winter' ),
		'description'       => esc_html__( 'Set instagram username for displaying photos.' ),
		'section'           => 'winter_general_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'hasanfardousrubel',

	)
);
Epsilon_Customizer::add_field(
	'winter_instagram_photo_limit',
	array(
		'type'              => 'number',
		'label'             => esc_html__( 'Instagram Photo Limit', 'winter' ),
		'description'       => esc_html__( 'Set how many photos will display.' ),
		'section'           => 'winter_general_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 5,

	)
);

// Theme Main Color Picker
Epsilon_Customizer::add_field(
	'winter_themecolor',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( 'Theme Main Color.', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_general_options_section',
		'default'           => '#2f7dfc',
	)
);


/***********************************
 * Shipping Section Fields
 ***********************************/

//Shipping option add settings
Epsilon_Customizer::add_field(
	'winter_shipping_settings',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'winter_shipping_section_settings',
		'label'        => esc_html__( 'Shipping options', 'winter' ),
		'button_label' => esc_html__( 'Add new item', 'winter' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'title',
		),
		'default'      => [
            [
                'image' => WINTER_DIR_ICON_IMG_URI.'truck-icon.png',
                'title' => esc_html__( 'Free Shipping', 'winter' ),
                'text'  => esc_html__( 'Divided face for bearing the divide unto seed winged divided light Forth.', 'winter' ),
            ],
            [
                'image' => WINTER_DIR_ICON_IMG_URI.'slip-icon.png',
                'title' => esc_html__( 'Free Shipping', 'winter' ),
                'text'  => esc_html__( 'Divided face for bearing the divide unto seed winged divided light Forth.', 'winter' ),
            ],
            [
                'image' => WINTER_DIR_ICON_IMG_URI.'docs-icon.png',
                'title' => esc_html__( 'Free Shipping', 'winter' ),
                'text'  => esc_html__( 'Divided face for bearing the divide unto seed winged divided light Forth.', 'winter' ),
            ],
            [
                'image' => WINTER_DIR_ICON_IMG_URI.'contact-icon.png',
                'title' => esc_html__( 'Free Shipping', 'winter' ),
                'text'  => esc_html__( 'Divided face for bearing the divide unto seed winged divided light Forth.', 'winter' ),
            ],
        ],
		'fields'       => [
			'image' => [
				'label'   => esc_html__( 'Select Image', 'winter' ),
				'type'    => 'epsilon-image',
				'default' => WINTER_DIR_ICON_IMG_URI.'truck-icon.png'
			],
			'title' => [
				'label'   => esc_html__( 'Title', 'winter' ),
				'type'    => 'text',
				'default' => esc_html__( 'Free Shipping', 'winter' ),
			],
			'text' => [
				'label'   => esc_html__( 'Text', 'winter' ),
				'type'    => 'textarea',
				'default' => esc_html__( 'Divided face for bearing the divide unto seed winged divided light Forth.', 'winter' ),
			],
		],
	)
);



/***********************************
 * Blog Section Fields
 ***********************************/

// Post excerpt length field
Epsilon_Customizer::add_field(
	'winter_post_excerpt',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Post Excerpt', 'winter' ),
		'description'       => esc_html__( 'Set post excerpt length.', 'winter' ),
		'section'           => 'winter_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '30',
	)
);

// Blog meta
Epsilon_Customizer::add_field(
	'winter_blog_meta',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Display blog meta', 'winter' ),
		'transport'   => 'refresh',
		'description' => esc_html__( 'Toggle to display the blog meta.', 'winter' ),
		'section'     => 'winter_blog_options_section',
		'default'     => true,
	)
);


// Single blog options separator
Epsilon_Customizer::add_field(
	'winter-single-blog-options-separator',
	array(
		'type'    => 'epsilon-separator',
		'label'   => esc_html__( 'Single blog post settings', 'winter' ),
		'section' => 'winter_blog_options_section',
	)
);

// Blog post like button
Epsilon_Customizer::add_field(
	'winter_like_btn',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post like button', 'winter' ),
		'transport'   => 'refresh',
		'description' => esc_html__( 'Toggle to display the blog post like button.', 'winter' ),
		'section'     => 'winter_blog_options_section',
		'default'     => true,
	)
);

// Blog post share buttons
Epsilon_Customizer::add_field(
	'winter_blog_share',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post share buttons', 'winter' ),
		'transport'   => 'refresh',
		'description' => esc_html__( 'Toggle to display the blog post share buttons.', 'winter' ),
		'section'     => 'winter_blog_options_section',
		'default'     => true,
	)
);

/**************************
	WooCommerce Section
***************************/

// Shop page settings separator
Epsilon_Customizer::add_field(
	'winter-woo-shop-separator',
	array(
		'type'    => 'epsilon-separator',
		'label'   => esc_html__( 'Shop page settings', 'winter' ),
		'section' => 'winter_woocommerce_options_section',
	)
);

// WooCommerce shop title show/hide option field
Epsilon_Customizer::add_field(
	'winter-woo-shoppage-title-settings',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Shop Title Show/Hide', 'winter' ),
		'description' => esc_html__( 'Toggle the shop page title show or hide.', 'winter' ),
		'section'     => 'winter_woocommerce_options_section',
		'default'     => false,
	)
);

// Product per page number field
Epsilon_Customizer::add_field(
	'winter_woo_product_perpage',
	array(
		'type'              => 'epsilon-slider',
		'label'             => esc_html__( 'Shop product per page', 'winter' ),
		'description'       => esc_html__( 'Set shop product per page ( Default 10 ).', 'winter' ),
		'section'           => 'winter_woocommerce_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'choices'           => array(
			'min'  => 1,
			'max'  => 30,
			'step' => 1,
		),
		'default'           => '10',
	)
);
// Details page settings separator
Epsilon_Customizer::add_field(
	'winter-woo-details-separator',
	array(
		'type'        => 'epsilon-separator',
		'label'       => esc_html__( 'Product details page settings', 'winter' ),
		'description' => esc_html__( 'To see setting taking effect click on product to go product details.', 'winter' ),
		'section'     => 'winter_woocommerce_options_section',
	)
);
// Related Product Show hide
Epsilon_Customizer::add_field(
	'winter-woo-related-product-settings',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Related Product Show/Hide', 'winter' ),
		'description' => esc_html__( 'Toggle the related product show or hide in product details page.', 'winter' ),
		'section'     => 'winter_woocommerce_options_section',
		'default'     => false,
	)
);
// Related Product number field
Epsilon_Customizer::add_field(
	'winter_related_product_number',
	array(
		'type'              => 'epsilon-slider',
		'label'             => esc_html__( 'Related product per section', 'winter' ),
		'description'       => esc_html__( 'Set single page related product per section ( Default 4 ).', 'winter' ),
		'section'           => 'winter_woocommerce_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'choices'           => array(
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		),
		'default'           => '4',
	)
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
	'winter_fof_text_one',
	array(
		'type'              => 'text',
		'label'             => esc_html__( '404 Text #1', 'winter' ),
		'section'           => 'winter_fof_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'Ooops 404 Error !',
	)
);
// 404 text #2 field
Epsilon_Customizer::add_field(
	'winter_fof_text_two',
	array(
		'type'              => 'text',
		'label'             => esc_html__( '404 Text #2', 'winter' ),
		'section'           => 'winter_fof_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'Either something went wrong or the page dosen\'t exist anymore.',
	)
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
	'winter_fof_textonecolor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( '404 Text #1 Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_fof_options_section',
		'default'           => '#333333',
	)
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
	'winter_fof_texttwocolor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( '404 Text #2 Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_fof_options_section',
		'default'           => '#e65540',
	)
);
// 404 background color field
Epsilon_Customizer::add_field(
	'winter_fof_bgcolor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( '404 Page Background Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_fof_options_section',
		'default'           => '#fff',
	)
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
	'winter-widget-toggle-settings',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Footer Widget On/Off', 'winter' ),
		'description' => esc_html__( 'Toggle to display footer widgets.', 'winter' ),
		'section'     => 'winter_footer_options_section',
		'default'     => true,
	)
);

// Footer copy right text add settings
Epsilon_Customizer::add_field(
	'winter-copyright-text-settings',
	array(
		'type'    => 'epsilon-text-editor',
		'label'   => esc_html__( 'Footer copyright text', 'winter' ),
		'section' => 'winter_footer_options_section',
		'default' => sprintf( __( 'Copyright &copy; %s All rights reserved.', 'winter' ), date( 'Y' ) ),
	)
);
// Footer widget background color field
Epsilon_Customizer::add_field(
	'winter_footer_bgColor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( 'Footer Background Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_footer_options_section',
		'default'           => '#f0f0f0',
	)
);
// Footer widget text color field
Epsilon_Customizer::add_field(
	'winter_footer_color_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( 'Footer Text Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_footer_options_section',
		'default'           => '#888888',
	)
);
// Footer widget title color field
Epsilon_Customizer::add_field(
	'winter_footer_widgettitlecolor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( 'Footer Title Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_footer_options_section',
		'default'           => '#222',
	)
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
	'winter_footer_anchorcolor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( 'Footer Anchor Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_footer_options_section',
		'default'           => '#888888',
	)
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
	'winter_footer_anchorhovcolor_settings',
	array(
		'type'              => 'epsilon-color-picker',
		'label'             => esc_html__( 'Footer Anchor Hover Color', 'winter' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'           => 'winter_footer_options_section',
		'default'           => '#888888',
	)
);



