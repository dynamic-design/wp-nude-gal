<?php 

/*
Plugin Name: nude-gal
Plugin URI: http://#
Description: Nude gal, a plugin that strips post gallery images of formating with hook option.
Version: 1.0
Author: Dynamic Communication
Author URI: http://dynamiccommunication.se
*/

remove_shortcode('gallery');
add_shortcode('gallery', 'parse_gallery_shortcode');

function parse_gallery_shortcode($atts) {
 
	global $post;

	// The attatchment IDs
	$atch_ids = explode(",", $atts["ids"]);

	$output = array();

	foreach ($atch_ids as $img_id) {
		$attatchment = wp_get_attachment_image_src($img_id, 'full');
		array_push($output, $attatchment[0]);

	}

	// Filter for customization
	$output = apply_filters('format_nude_gallery', $output);
	
	// Output the gallery
	echo join($output, "");
}

?>