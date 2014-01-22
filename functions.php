<?php

//	============================================
//	# Enqueue styles and scripts
//	============================================

add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

function script_enqueuer() {

	wp_register_script( 'main', get_template_directory_uri().'/js/main.js', array( 'jquery' ), '1.0' );
	wp_enqueue_script( 'main' );


	wp_register_style( 'fonts', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic');
	wp_enqueue_style( 'fonts' );

	wp_register_style( 'screen', get_template_directory_uri().'/css/build/prefixed/global.css', '', '', 'screen' );
	wp_enqueue_style( 'screen' );

}


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
//
// ## Post Thumbnails:
//
//		Aspect ratio: 16:9
//		Hero sticky post image size: 1920x1080
//		Grid post image size: 1067x600px
//
// ----------------------------------------------------------

	// add_image_size( 'sticky-featured-img', 1920, 1080);
	add_image_size( 'grid-featured-img', 1067, 600, true);


?>