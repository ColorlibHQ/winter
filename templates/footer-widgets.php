<?php
// Footer Widget Start

// Footer widget 1
if ( is_active_sidebar( 'footer-1' ) ) {
	dynamic_sidebar( 'footer-1' );
}

// Footer widget 2
if ( is_active_sidebar( 'footer-2' ) ) {
	dynamic_sidebar( 'footer-2' );
}

// Footer widget 3
if ( is_active_sidebar( 'footer-3' ) ) {
	dynamic_sidebar( 'footer-3' );
}

// Footer widget 4
if ( is_active_sidebar( 'footer-4' ) ) {
	echo '<div class="col-sm-6 col-lg-4">';
		dynamic_sidebar( 'footer-4' );
	echo '</div>';
}

?>
