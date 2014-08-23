		<header class="top-header-home js-top-header">
			<div class="logo-wrapper">
				<a href="<?php echo home_url(); ?>" class="logo logo--large" title="Level1">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.svg" alt="Level1">
				</a>
				<a href="<?php echo home_url(); ?>" class="logo logo--small" title="Level1">
					<img class="logo-img logo-img--small" src="<?php echo get_template_directory_uri(); ?>/img/logo-icon.svg" alt="Level1">
				</a>
			</div>
			<div class="home-desktop-nav-wrapper">
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'header_menu',
						'container'       => ''
					) );
				?>
			</div>

			<div class="home-mobile-nav-wrapper js-mobile-nav-wrapper">
				<button class="mobile-nav-trigger">Menüü</button>
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'header_menu',
						'container'       => '',
				    'menu_class'      => 'menu'
					) );
				?>
			</div>
		</header>