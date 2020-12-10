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

// theme option callback
function winter_opt( $id = null, $default = '' ) {

	$opt = get_theme_mod( $id, $default );

	$data = '';

	if ( $opt ) {
		$data = $opt;
	}

	return $data;
}



/*============================================================
	Pagination
=============================================================*/
function winter_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'winter' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'winter' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*======================================================
	Blog Category
======================================================*/
function winter_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' ){
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
			}   
		}

		return implode( ', ', $getCat );
	}
         
}



/*================================================
    Page Title Bar
================================================*/
function winter_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner d-flex">
            <div class="container">
            	<div class="row">
					<div class="col-lg-8">
						<?php
							winter_breadcrumbs();
						?>
					</div>
				</div>
            </div>
        </section>
		<?php
	}
}

// Blog Date Permalink
function winter_blog_date_permalink() {

	$year       = get_the_time( 'Y' );
	$month_link = get_the_time( 'm' );
	$day        = get_the_time( 'd' );

	$link = get_day_link( $year, $month_link, $day );

	return $link;
}


// Body support function
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/*==========================================================
 *  Winter Icon List
=========================================================*/
function winter_flaticon_list(){
    return(
        array(
            'truck-icon'    => 'Truck Icon',
            'slip-icon'     => 'Slip Icon',
            'docs-icon'     => 'Docs Icon',
            'contact-icon'  => 'Contact Icon',
        )
    );
}


// Blog Excerpt Length
if ( ! function_exists( 'winter_excerpt_length' ) ) {
	function winter_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );

		// $limit null check
		if ( ! null == $limit ) {
			$limit = $limit;
		} else {
			$limit = 30;
		}

		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt   = implode( ' ', $exc_slice ) . ' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt   = implode( ' ', $exc_slice );
		}

		$excerpt = '<p>' . preg_replace( '`\[[^\]]*\]`', '', $excerpt ) . '</p>';

		$excerpt = wp_kses_post( $excerpt );

		return $excerpt;

	}
}
// Comment number and Link
if ( ! function_exists( 'winter_posted_comments' ) ) :
	function winter_posted_comments() {

		$comments_num = get_comments_number();

		if ( comments_open() ) {

			if ( $comments_num == 0 ) {
				$comments = __( 'No Comments', 'winter' );
			} elseif ( $comments_num > 1 ) {
				$comments = $comments_num . __( ' Comments', 'winter' );
			} else {
				$comments = __( '1 Comment', 'winter' );
			}

			$comments = '<a href="' . esc_url( get_comments_link() ) . '">' . esc_html( $comments ) . '</a>';
		} else {
			$comments = esc_html__( 'Comments are closed', 'winter' );
		}

		return $comments;
	}
endif;

//audio format iframe match
function winter_iframe_match() {

	$audio_content = winter_embedded_media( array( 'audio', 'iframe' ) );

	$iframe_match = preg_match( "/\iframe\b/i", $audio_content, $match );

	return $iframe_match;
}

//Post embedded media
function winter_embedded_media( $type = array() ) {

	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );

	$embed = get_media_embedded_in_content( $content, $type );

	if ( in_array( 'audio', $type ) ) {

		if ( count( $embed ) > 0 ) {
			$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
		} else {
			$output = '';
		}
	} else {
		if ( count( $embed ) > 0 ) {
			$output = $embed[0];
		} else {
			$output = '';
		}
	}

	return $output;
}

// WP post link pages
function winter_link_pages() {

	wp_link_pages(
		array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'winter' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'winter' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		)
	);
}

// theme logo
function winter_theme_logo( $class = '' ) {

	$site_url = home_url( '/' );

	// site logo
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	$image_url = wp_get_attachment_image_src( absint( $custom_logo_id ), 'winter_logo_82x21' );

	if ( ! empty( $image_url[0] ) ) {
		$site_logo = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $site_url ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . esc_attr( winter_image_alt( $image_url[0] ) ) . '"></a>';
	} else {
		$winter_def_logo = WINTER_DIR_ASSETS_URI . 'img/logo.png';
		$site_logo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $site_url ).'"><img src="'.esc_url( $winter_def_logo ).'" alt="winter logo"></a>';
	}

	return $site_logo;

}

// Blog pull right class callback
function winter_pull_right( $id = '', $condation ) {

	if ( $id == $condation ) {
		return ' ' . 'order-last';
	} else {
		return;
	}

}

// image alt tag
function winter_image_alt( $url = '' ) {

	if ( $url != '' ) {
		// attachment id by url
		$attachmentid = attachment_url_to_postid( esc_url( $url ) );
		// attachment alt tag
		$image_alt = get_post_meta( absint( $attachmentid ), '_wp_attachment_image_alt', true );

		if ( $image_alt ) {
			return $image_alt;
		} else {
			$filename = pathinfo( esc_url( $url ) );
			$alt = str_replace( '-', ' ', $filename['filename'] );
			return $alt;
		}
	} else {
		return;
	}

}

//  wysiwyg content output use in winter companion
function winter_get_textareahtml_output( $content ) {

	global $wp_embed;

	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}


// html Style tag for background image use in winter companion plugin
function winter_inline_bg_img( $bg_url ) {
	$bg = '';

	if ( $bg_url ) {
		$bg = 'style="background-image:url(' . esc_url( $bg_url ) . ')"';
	}

	return $bg;
}

//  customize sidebar option value return
function winter_sidebar_opt() {

	$sidebar_opt = winter_opt( 'winter-sidebarlayouts-settings' );

	$sidebar = '1';

	// Blog Sidebar layout  opt
	if ( is_array( $sidebar_opt ) ) {
		$sidebar_opt = $sidebar_opt;
	} else {
		$sidebar_opt = json_decode( $sidebar_opt, true );
	}

	if ( ! empty( $sidebar_opt['columnsCount'] ) ) {
		$sidebar = $sidebar_opt['columnsCount'];
	}

	return $sidebar;
}

//  customize sidebar option value return
function winter_global_header_opt() {

	$sidebar_opt = winter_opt( 'winter-header-layout' );

	$sidebar = '1';

	// Blog Sidebar layout  opt
	if ( is_array( $sidebar_opt ) ) {
		$sidebar_opt = $sidebar_opt;
	} else {
		$sidebar_opt = json_decode( $sidebar_opt, true );
	}

	if ( ! empty( $sidebar_opt['columnsCount'] ) ) {
		$sidebar = $sidebar_opt['columnsCount'];
	}

	return $sidebar;
}
