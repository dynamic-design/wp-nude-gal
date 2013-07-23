<?php 

/*
Plugin Name: nude-gal
Plugin URI: http://#
Description: Nude gal, a plugin that strips post gallery images of formating with hook option.
Version: 1.0
Author: volontarresor
Author URI: http://volontarresor.se
*/

remove_shortcode('gallery');
add_shortcode('gallery', 'parse_gallery_shortcode');

function parse_gallery_shortcode($atts) {
 
	global $post;


	$atch_ids = split(",", $atts["ids"]);

	$output = array();

	foreach ($atch_ids as $img_id) {
		array_push($output, wp_get_attachment_image_src($img_id, full)[0]);

	}
	$output = apply_filters('format_nude_gallery', $output);
	


	echo join($output, "");

	// echo wp_get_attachment_image($atch_ids[0], full);


	
/*	extract(shortcode_atts(array(
		'orderby' => 'menu_order ASC, ID ASC',
		'id' => $post->ID,
		'itemtag' => 'dl',
		'icontag' => 'dt',
		'captiontag' => 'dd',
		'columns' => 3,
		'size' => 'medium',
		'link' => 'file'
	), $atts));
 
	$args = array(
		'post_type' => 'attachment',
		'post_parent' => $id,
		'numberposts' => -1,
		'orderby' => $orderby
		); 
	$images = get_posts($args);
 
	foreach ( $images as $image ) {


		$caption = $image->post_excerpt;

		$description = $image->post_content;
		if($description == '') {
			$description = $title;
		}

		$image_alt = get_post_meta($image->ID,'_wp_attachment_image_alt', true);

		$img = wp_get_attachment_image_src($image->ID, $size);

		// echo "<img src=\"" . $img[0]. "\">";
		// die(var_dump($img]));

	}

	*/
}

?>