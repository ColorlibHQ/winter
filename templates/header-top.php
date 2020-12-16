<!--::header part start::-->
<header class="main_menu home_menu">
	<div class="container-fluid">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-11">
				<nav class="navbar navbar-expand-lg navbar-light">
					<?php
						echo winter_theme_logo( 'navbar-brand' );
					?>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="menu_icon"><i class="fas fa-bars"></i></span>
					</button>

					<?php
						if(has_nav_menu('primary-menu')) {
							wp_nav_menu(array(
								'menu'           => 'primary-menu',
								'theme_location' => 'primary-menu',
								'menu_id'        => 'menu-main-menu',
								'container_class'=> 'collapse navbar-collapse main-menu-item',
								'container_id'   => 'navbarSupportedContent',
								'menu_class'     => 'navbar-nav',
								'walker'         => new winter_bootstrap_navwalker,
								'depth'          => 3
							));
						}
					?>

					<div class="hearer_icon d-flex">
						<?php
							$cart_visibility = winter_opt( 'winter-cart-toggle-settings' );
							if ( $cart_visibility == true ) {
								?>
								<div class="dropdown cart">
									<?php
									if ( is_plugin_active('woocommerce/woocommerce.php') ) {
										echo '<a class="dropdown-toggle" href="'.esc_url( wc_get_cart_url() ).'" id="navbarDropdown3" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="winter-head-cart"></span>';
									} else {
										echo '<a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="winter-head-cart">0</span>';
									}
									?>
									<i class="ti-bag"></i>
									</a>
								</div>
								<?php
							}
						?>
						<a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container ">
			<form class="d-flex justify-content-between search-inner">
				<input type="text" name="s" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="ti-close" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>
<!-- Header part end-->
