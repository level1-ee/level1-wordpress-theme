<?php

//	============================================
//	# Enqueue styles and scripts
//	============================================

add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

function script_enqueuer() {

	wp_register_script( 'mCustomScrollbar', get_template_directory_uri().'/js/plugins/jquery.mCustomScrollbar.min.js', array( 'jquery' ), '2.8.3' );

	wp_register_script( 'lazyload', get_template_directory_uri().'/js/plugins/jquery.lazyload.min.js', array( 'jquery' ), '1.9.3' );
	wp_enqueue_script( 'lazyload' );

	wp_register_script( 'magnific-popup', get_template_directory_uri().'/js/plugins/jquery.magnific-popup.min.js', array( 'jquery' ), '0.9.9' );
	wp_enqueue_script( 'magnific-popup' );

	wp_register_script( 'plugins', get_template_directory_uri().'/js/plugins.js', array( 'jquery' ), '1.0' );
	wp_enqueue_script( 'plugins' );

	wp_register_script( 'main', get_template_directory_uri().'/js/main.js', array( 'jquery', 'plugins' ), '1.0' );
	wp_enqueue_script( 'main' );


	wp_register_style( 'fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,700italic,400italic|Quattrocento+Sans:400,400italic,700,700italic');
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


function add_class_attachment_link($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="gallery-img-link"',$html);
    return $html;
}
add_filter('wp_get_attachment_link','add_class_attachment_link',10,1);


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
// # Image sizes
// ==========================================================
/*
		Featured image aspect ratio is 16:9

		Hero sticky post image uses full image that is uploaded and it needs to be 1920x1080 and optimized or the size of the image will blow up the internet.

		## Default Image sizes from admin panel
		Thumbnail: 300x300
		Medium:    1280x720
		Large:     1920x1080

		## Post Thumbnails:

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





















//	3. Gallery shortcode override
//	=========================================================
/*
		wp-includes/media.php
*/
//	----------------------------------------------------------

add_shortcode('gallery', 'my_gallery_shortcode');

/**
 * The Gallery shortcode.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @param array $attr Attributes of the shortcode.
 * @return string HTML content to display gallery.
 */
function my_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'medium',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>



		</style>";
	$size_class = sanitize_html_class( $size );




	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ( ! empty( $link ) && 'file' === $link )
			$image_output = wp_get_attachment_link( $id, $size, false, false );
		elseif ( ! empty( $link ) && 'none' === $link )
			$image_output = wp_get_attachment_image( $id, $size, false );
		else
			$image_output = wp_get_attachment_link( $id, $size, true, false );

		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		// if ( $columns > 0 && ++$i % $columns == 0 )
		// 	$output .= '<br style="clear: both" />';
	}

	$output .= "
			<!-- <br style='clear: both;' /> -->
		</div>\n";

	return $output;
}






?>