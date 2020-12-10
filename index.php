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

//  Call Header
get_header();

?>

<section class="blog_area section_padding">
<div class="container">
	<div class="row">
		<div class="col-lg-8 mb-5 mb-lg-0">
			<div class="blog_left_sidebar">

				<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						get_template_part('templates/content', get_post_format());
					endwhile;
				endif;

				//Pagination
				winter_blog_pagination();
				?>
			</div>
		</div>
		<?php
			get_sidebar();
		
		?>
	</div>
</div>
</section>


<?php
get_footer();
