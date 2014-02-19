<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('&#215;'); ?></title>

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
	<style type="text/css">body.admin-bar .main-header { top: 32px; }</style>
<?php } // end if ?>



<header class="main-header">
	<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/level1-logo.svg" class="logo" alt="Level1"></a>
</header>

<?php get_template_part('partials/navigation'); ?>