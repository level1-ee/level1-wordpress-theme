<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('&#215;'); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>



<?php if ( is_user_logged_in() ) { ?>
	<style type="text/css">body.admin-bar .main-header { top: 32px; }</style>
<?php } // end if ?>



<header class="main-header">
	<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/level1-logo.svg" class="logo" alt="Level1"></a>
</header>

<button type="button" role="button" aria-label="Toggle Navigation" class="lines-button x nav-btn">
	<span class="lines"></span>
</button>

<nav class="main-nav">
	<div class="nav-section">
		<h3>Rubriigid</h3>
		<ul>
			<li class="nav-item nav-item--uudis"><a href="<?php bloginfo('url' ); ?>/rubriik/uudis">Uudis</a></li>
			<li class="nav-item nav-item--mangitud"><a href="<?php bloginfo('url' ); ?>/rubriik/mangitud">Mängitud</a></li>
			<li class="nav-item nav-item--proovitud"><a href="<?php bloginfo('url' ); ?>/rubriik/proovitud">Proovitud</a></li>
			<li class="nav-item nav-item--intervjuu"><a href="<?php bloginfo('url' ); ?>/rubriik/intervjuu">Intervjuu</a></li>
			<li class="nav-item nav-item--arvamus"><a href="<?php bloginfo('url' ); ?>/rubriik/arvamus">Arvamus</a></li>
			<li class="nav-item nav-item--varia"><a href="<?php bloginfo('url' ); ?>/rubriik/varia">Varia</a></li>
		</ul>
	</div>
	<div class="nav-section nav-section--about">
		<h3>Level1</h3>
		<p>… on videomängudele ja virtuaalsusele pühendatud veebileht, mille eesmärgiks on luua huvilistele võrgustik ning tutvustada vähemteadlikele videomänge kui positiivset ja arendavat, kultuuri ühte kiiremini kasvavat osa.</p>
		<a href="#">Loe lähemalt</a>
	</div>
</nav>