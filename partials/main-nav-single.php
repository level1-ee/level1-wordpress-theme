<nav class="main-nav-single js-main-nav">
	<?php
	  wp_nav_menu( array(
	    'theme_location'  => 'header_menu',
	    'container'       => '',
	    'menu_class'      => 'menu'
	  ) );
	?>
	<div class="logo-wrapper">
		<a href="<?php echo home_url(); ?>" class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.svg" alt="Level1">
		</a>
	</div>
</nav>