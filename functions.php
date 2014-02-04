<?php

//	============================================
//	# Enqueue styles and scripts
//	============================================

add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

function script_enqueuer() {


	wp_register_script( 'magnific-popup', get_template_directory_uri().'/js/plugins/jquery.magnific-popup.min.js', array( 'jquery' ), '0.9.9' );
	wp_enqueue_script( 'magnific-popup' );

	wp_register_script( 'main', get_template_directory_uri().'/js/main.js', array( 'jquery' ), '1.0' );
	wp_enqueue_script( 'main' );

	wp_register_style( 'fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic|Quattrocento+Sans:400,400italic,700');
	wp_enqueue_style( 'fonts' );

	wp_register_style( 'screen', get_template_directory_uri().'/css/build/prefixed/global.css', '', '', 'screen' );
	wp_enqueue_style( 'screen' );

}

//	============================================
//	# Add editor style
//	============================================

function my_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri().'/editor-styles.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// ==========================================================
// # Attach a class to linked images parent anchors
// ==========================================================
//
// e.g. a img => a.img img
//
// ----------------------------------------------------------


function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
	$classes = 'img-link'; // separated by spaces, e.g. 'img image-link'

	// check if there are already classes assigned to the anchor
	if ( preg_match('/<a.*? class=".*?">/', $html) ) {
		$html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
	} else {
		$html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
	}
	return $html;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);




// ==========================================================
// # Move Wordpress Admin to the bottom on front-end
// ==========================================================
//
// Sticky hero post and navigation clashes with the admin bar.
// It's easier to move it to the bottom than getting it
// working on top.
//
// ----------------------------------------------------------
function adminBarBottom() {
	echo '<style type="text/css">
		body {
			margin-top: -28px;
		}
		#wpadminbar {
			top: auto !important;
			bottom: 0;
		}
		#wpadminbar .quicklinks .ab-sub-wrapper {
			bottom: 28px;
		}
		#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {
			border-width: 1px 1px 0 1px;
			-moz-box-shadow:0 -4px 4px rgba(0,0,0,0.2);
			-webkit-box-shadow:0 -4px 4px rgba(0,0,0,0.2);
			box-shadow:0 -4px 4px rgba(0,0,0,0.2);
		}
		#wpadminbar .quicklinks .menupop ul#wp-admin-bar-wp-logo-default {
			background-color: #eee;
		}
		#wpadminbar .quicklinks .menupop ul#wp-admin-bar-wp-logo-external {
			background-color: white;
		}
		body.wp-admin div#wpwrap div#footer {
			bottom: 28px !important;
		}
	</style>';
}

// Uncomment if you want it to be done in the Admin Section too

// if ( is_admin_bar_showing() ) {
//     add_action( 'admin_head', 'adminBarBottom' );
// }

if ( is_admin_bar_showing() ) {
	// add_action( 'wp_head', 'adminBarBottom' );
}


// ==========================================================
// # Add Post Thumbnails support
// ==========================================================

	add_theme_support( 'post-thumbnails' );

// ==========================================================
// # Custom image sizes
// ==========================================================
/*
		## Post Thumbnails:

		Aspect ratio: 16:9
		Hero sticky post image size: 1920x1080
		Grid post image size: 1067x600px
*/
// ----------------------------------------------------------

	// add_image_size( 'sticky-featured-img', 1920, 1080);
	add_image_size( 'grid-featured-img', 1067, 600, true);




// ==========================================================
// # Register menus
// ==========================================================
//
//
//
// ----------------------------------------------------------

function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
// add_action( 'init', 'register_my_menu' );


//	============================================
//	# Wordpress captions
//	============================================
//	http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	//
	// Removing the width for responsivness... maybe should use CSS? CSS vs markup... Aaarrrggh
	// $attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';
	//

	/* Open the caption <div>. */
	$output = '<div' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

	/* Close the caption </div>. */
	$output .= '</div>';

	/* Return the formatted, clean caption. */
	return $output;
}




//	============================================
//	# Fix shortcode empty <p> tags
//	============================================

add_filter("the_content", "the_content_filter");

function the_content_filter($content) {

	// array of custom shortcodes requiring the fix
	$block = join("|",array("pull-quote", "island"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;

}



//	==========================================================
//	# Shortcodes
//	==========================================================
/*
		1. Pull quote
		2. Island


*/
// ----------------------------------------------------------

//	1. Pull quote
//	=========================================================
/*
		[pull-quote align="center/left/right"]...[/pull-quote]
*/
//	----------------------------------------------------------

function pull_quote_shortcode($atts, $content = null) {
// Attributes
	extract( shortcode_atts(
		array(
			'align' => null
		), $atts )
	);

	if($align == 'center'){
		$align_content = 'pullquote--center';

	} elseif($align == 'left') {
		$align_content = 'pullquote--left';

	} elseif($align == 'right') {
		$align_content = 'pullquote--right';

	} else {
		$align_content = null;

	}

	return '<aside class="quote quote--pullquote '. $align_content .'"><blockquote>' . $content . '</blockquote></aside>';
}

add_shortcode( 'pull-quote', 'pull_quote_shortcode' );

//	2. Island
//	=========================================================
/*
		[island]...[/island]
*/
//	----------------------------------------------------------

function island_shortcode($atts, $content = null) {

return '<div class="content-island">' . $content . '</div>';

}
add_shortcode( 'island', 'island_shortcode' );



?>