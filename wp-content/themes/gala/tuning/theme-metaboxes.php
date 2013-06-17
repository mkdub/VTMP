<?php

/* ==  Metabox Settings  =======================================================
*
*	  This file contains an array of options for pages, posts and custom post
*	  types.
*
* ============================================================================*/


/* ==  Start with an underscore to hide fields from custom fields list  =====================================================*/

$prefix = 'dt_';

add_filter( 'cmb_meta_boxes', 'dt_metaboxes' );


/* ==  The Settings  =====================================================*/

function dt_metaboxes( $meta_boxes ) {

	global $prefix;

	$meta_boxes[] = array(
		'id' => 'other_options',
		'title' => __('Optionl Settings', 'engine'),
		'pages' => array('post'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Custom Thumbnail', 'engine'),
				'desc' => __('To use a custom thumbnail image, upload it here.', 'engine'),
				'id' => $prefix . 'custom_thumbnail',
				'type' => 'file'
			)
		)
	);


	$meta_boxes[] = array(
		'id' => 'testimonial_options',
		'title' => __('Optionl Settings', 'engine'),
		'pages' => array('testimonials'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Name', 'engine'),
				'desc' => __('Enter the name.', 'engine'),
				'id' => $prefix . 'testimonial_name',
				'type' => 'text'
			),
			array(
				'name' => __('Business', 'engine'),
				'desc' => __('Enter the business name.', 'engine'),
				'id' => $prefix . 'testimonial_business',
				'type' => 'text'
			),
			array(
				'name' => __('Link', 'engine'),
				'desc' => __('Enter the URL for the business.', 'engine'),
				'id' => $prefix . 'testimonial_link',
				'type' => 'text'
			)
		)
	);
	
	
	$meta_boxes[] = array(
		'id' => 'optional_options',
		'title' => __('Optional Settings', 'engine'),
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Insert Video (URL)', 'engine'),
				'desc' => __('<em>Example: http://www.youtube.com/watch?v=zonvhlnjwhg</em>To embed a video simply paste the hosted video URL into the field above. The video width and height will be set to fit your theme automatically.', 'engine'),
				'id' => $prefix . 'video',
				'type' => 'text'
			),
			array(
				'name' => __('Custom Thumbnail', 'engine'),
				'desc' => __('To use a custom thumbnail image, upload it here.', 'engine'),
				'id' => $prefix . 'custom_thumbnail',
				'type' => 'file'
			),
			array(
				'name' => __('Additional Tab Titles', 'engine'),
				'desc' => __('Enter your tab titles.', 'engine'),
				'id' => $prefix . 'tab_titles',
				'type' => 'repeatable_text'
			),
			array(
				'name' => __('Additional Tab Contents', 'engine'),
				'desc' => __('Enter your tab contents to go with the titles set above.', 'engine'),
				'id' => $prefix . 'tab_contents',
				'type' => 'repeatable_textarea'
			),
			array(
				'name' => __('Show Related Items', 'engine'),
				'desc' => __('Check to display related items.', 'engine'),
				'id' => $prefix . 'related',
				'type' => 'checkbox'
			)
		)
	);


	$meta_boxes[] = array(
		'id' => 'optional_options',
		'title' => __('Optional Settings', 'engine'),
		'pages' => array('slides'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Slide Link', 'engine'),
				'desc' => __('Enter the URL you wish the slide title, image and button to link to.', 'engine'),
				'id' => $prefix . 'button_url',
				'type' => 'text'
			),
			array(
				'name' => __('Slide Content Alignment', 'engine'),
				'desc' => __('Set how the content of this slide is aligned.', 'engine'),
				'id' => $prefix . 'content_alignment',
				'type' => 'radio_inline',
				'options' => array(
					array('name' => 'Left', 'value' => 'Left'),
					array('name' => 'Right', 'value' => 'Right'),
					array('name' => 'Center', 'value' => 'Center')
				)
			),
			array(
				'name' => __('Button Text', 'engine'),
				'desc' => __('Enter an optional button text, this will be displayed under the content. Leave blank to disable.', 'engine'),
				'id' => $prefix . 'button_text',
				'type' => 'text'
			),
		)
	);
	

	return $meta_boxes;

}


/* ==  Initialize the metaboxes  =====================================================*/

add_action( 'init', 'dt_initialize_cmb_meta_boxes', 9999 );
function dt_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( DT_ENGINE . '/metaboxes/init.php' );
	}
}

