<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon.ico" type="image/x-icon" />
	<!-- Apple Touch Icons -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-152x152.png" />
	<!-- Windows 8 Tile Icons -->
	<meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/img/favicons/smalltile.png" />
	<meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/img/favicons/mediumtile.png" />
	<meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/img/favicons/widetile.png" />
	<meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/img/favicons/largetile.png" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=215235162000578";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php if ( is_user_logged_in() ) { ?>
	<style type="text/css">
		body.admin-bar .main-wrap,
		body.admin-bar .top-header-single,
		body.admin-bar .top-header-home
		 {
			top: 32px;
		}
		@media screen and (max-width: 782px) {
			body.admin-bar .top-header-single,
			body.admin-bar .top-header-home {
				top: 46px;
			}
		}
		body.admin-bar .sidebar .logo-box {
			top: 15px;
		}
		body.admin-bar .single-post-content {
			top: -56px;
		}
	</style>
<?php } // end if ?>

<div class="main-wrap">
	<div class="nav-wrap">
		<?php if ( is_front_page() ) {
			get_template_part('partials/top-header-home');
		} else {
			get_template_part('partials/top-header-single');
		} ?>
	</div> <!-- /.nav-wrap -->

<div class="search-overlay">
	<button class="close-search">×</button>
  <form class="search-form" method="get" action="<?php echo home_url( '/' ); ?>">
    <fieldset>
      <input class="search-form__field" type="text" name="s" id="search" placeholder="" value="<?php the_search_query(); ?>" />
      <!-- <input class="search-form__button" type="submit" value="" alt="Search"> -->
    </fieldset>
  </form>
</div>