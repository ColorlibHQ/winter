<?php
function winter_pages_metabox( $meta_boxes ) {

	$winter_prefix = '_winter_';
	$meta_boxes[] = array(
		'id'        => 'page_metaboxs',
		'title'     => esc_html__( 'Visibility Options', 'winter' ),
		'post_types'=> array( 'page' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $winter_prefix . 'shipping_section',
				'name'       => esc_html__( 'Show Shipping Section?', 'winter' ),
				'type'       => 'switch',
				'on_label'	 => esc_html__( 'Show', 'winter' ),
				'off_label'	 => esc_html__( 'Hide', 'winter' ),
			),
			array(
				'id'         => $winter_prefix . 'instagram_section',
				'name'       => esc_html__( 'Show Instagram Feed Section?', 'winter' ),
				'type'       => 'switch',
				'on_label'	 => esc_html__( 'Show', 'winter' ),
				'off_label'	 => esc_html__( 'Hide', 'winter' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'winter_pages_metabox' );