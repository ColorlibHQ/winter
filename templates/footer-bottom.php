<?php
	// Copyright text
	$copy_text = sprintf( __( 'Copyright &copy; %s All rights reserved.', 'winter' ), date( 'Y' ) );
?>
<div class="col-lg-12">
	<div class="copyright_text">
		<p><?php echo wp_kses_post( winter_opt( 'winter-copyright-text-settings', $copy_text ) ); ?></p>
	</div>
</div>