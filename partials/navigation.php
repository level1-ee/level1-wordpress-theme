<button type="button" role="button" aria-label="Ava/sulge navigatsioon" class="nav-btn">
	<span class="lines"></span><span class="nav-btn-label">Menüü</span>
</button>

<nav class="main-nav">
	<div class="nav-section">
		<a href="<?php bloginfo('url'); ?>" class="go-home" title="Avalehele"><img src="<?php echo get_template_directory_uri(); ?>/img/home-icon.svg" alt=""></a>
		<a href="https://www.facebook.com/level1.ee" class="fb-page-button" title="Facebooki lehekülg"><img src="<?php echo get_template_directory_uri(); ?>/img/fb-logo.svg" alt=""></a>
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
		<p>on videomängudele ja virtuaalsusele pühendatud veebileht, mille eesmärgiks on luua huvilistele võrgustik ning tutvustada vähemteadlikele videomänge kui positiivset ja arendavat, kultuuri ühte kiiremini kasvavat osa.</p>
		<a href="mailto:levelup@level1.ee">levelup@level1.ee</a>
	</div>
</nav>