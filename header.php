<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>

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
		body.admin-bar .main-nav-single
		 {
			top: 32px;
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
			get_template_part('partials/main-nav-home');
		} else {
			get_template_part('partials/main-nav-single');
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