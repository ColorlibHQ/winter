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



if ( post_password_required() ) {
	return;
}
?>

	<?php if ( have_comments() ) : ?>
		<div id="comments" class="comment--items content--area"> <!-- Comment Item Start-->
		<h4 class="m-text25 p-b-14"><?php printf( esc_html( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'winter' ) ), esc_html( number_format_i18n( get_comments_number() ) ) ); ?></h4>

		<?php the_comments_navigation(); ?>
			<ul class="commentlist">
				<?php
					wp_list_comments(
						array(
							'style'       => 'ul',
							'short_ping'  => true,
							'avatar_size' => 70,
							'callback'    => 'winter_comment_callback',
						)
					);
				?>
			</ul><!-- .comment-list -->
		<?php the_comments_navigation(); ?>
		</div><!-- Comment Item End-->
	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'winter' ); ?></p>
	<?php endif; ?>

<?php
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? "required='required'" : '' );
	$fields    = array(
		'author' => '<div class="bo12 of-hidden size19 m-b-20"><input class="sizefull s-text7 p-l-18 p-r-18" placeholder="' . esc_attr__( 'Your Name', 'winter' ) . '" type="text" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" id="cName" ' . $aria_req . '></div>',
		'email'  => '<div class="bo12 of-hidden size19 m-b-20"><input class="sizefull s-text7 p-l-18 p-r-18" placeholder="' . esc_attr__( 'Your Email', 'winter' ) . '" type="text" name="email"  value="' . esc_attr( $commenter['comment_author_email'] ) . '" id="cEmail" ' . $aria_req . '></div>',
		'url'    => '<div class="bo12 of-hidden size19 m-b-20"><input class="sizefull s-text7 p-l-18 p-r-18" placeholder="' . esc_attr__( 'Website', 'winter' ) . '" type="text" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" id="cWebsite"></div>',
	);


	$args = array(
		'comment_field'      => '<textarea id="cMessage" class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20 m-t-20" name="comment" placeholder="' . esc_attr__( 'Comment...', 'winter' ) . '"></textarea>',
		'id_form'            => 'contactForm',
		'class_form'         => '',
		'title_reply'        => esc_html__( 'LEAVE A COMMENT', 'winter' ),
		'title_reply_before' => '<h4 class="m-text25 p-b-14">',
		'title_reply_after'  => '</h4>',
		'label_submit'       => esc_html__( 'Post Comment', 'winter' ),
		'class_submit'       => 'flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4',
		'submit_button'      => '<div class="w-size24"><button type="submit" name="%1$s" id="%2$s" class="%3$s">%4$s</button></div>',
		'fields'             => $fields,

	);

	comment_form( $args );

	?>
<!-- .comments-area -->
