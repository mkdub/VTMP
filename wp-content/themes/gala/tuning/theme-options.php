<?php


// Build Category/Tag Lists for Get Posts From...
$args = array('type' => 'categories');
$cat_dropdown = dt_make_option_list($args);
$args = array('type' => 'tags');
$tag_dropdown = dt_make_option_list($args);


$options= array(


// HOME
array(
	"type" => "section_start",
	"tab_name" => __("Dashboard", 'engine'),
	"name" => __("Dashboard", 'engine'),
	"tab-id" => "home-tab",
	"save-button" => false),
	array(
		"type" => "home_html" ),
array(
	"type" => "section_end" ),
// END HOME


// DESIGN
array(
	"type" => "section_start",
	"tab_name" => __("Design", 'engine'),
	"name" => __("Design and Branding Settings", 'engine'),
	"tab-id" => "design-tab" ),
		
	// Design Settings
    array(
		"type" => "options_group_start",
		"name" =>  __("Design Settings", 'engine') ),
		array(
			"type" => "select",
			"name" => __("Theme Skin", 'engine'),
			"id" => "dt_skin",
			"options" => array( __("Light", 'engine'), __("Dark", 'engine'),  __("Minimal", 'engine')),
			"desc" => __("This theme comes with multiple color schemes (or skins). You can change your theme's skin at any time using this dropdown menu.", 'engine'),
			"default" => __("Light", 'engine') ),
        array(
			"type" => "textarea",
			"name" =>  __("Add Custom CSS", 'engine'),
			"id" => "dt_custom_css",
			"desc" =>  __("Make quick changes to your theme by adding some custom CSS to this box. <br /><br />If you'd like to make more than just a few custom CSS changes, it's best to place them in your custom.css file which you can <a href='".admin_url()."theme-editor.php?file=/themes/".strtolower(DT_THEME_NAME)."/custom-style.css&theme=".DT_THEME_NAME."&dir=style&TB_iframe=1&width=940&height=800' class='thickbox' title='Edit CSS'>edit here</a>.", 'engine'),
			"default" => "" ),
    array(
		"type" => "options_group_end" ),

	// Branding
	array(
	    "type" => "options_group_start",
	    "name" => __("Branding Options", 'engine') ),
    	array(
			"type" => "image",
			"name" =>  __("Custom Logo", 'engine'),
			"id" => "dt_custom_logo",
			"desc" =>  __("Upload a logo for your theme or enter the image address of your existing logo. <br /><br />Leave this field blank if you'd prefer to just display your site's title and tagline instead of an image. Feel free to make changes to your site's <a href='".admin_url()."options-general.php?TB_iframe=1&width=940&height=800' class='thickbox' title='General Settings'>title and tagline</a>.", 'engine'),
			"default" => "" ),
        array(
			"type" => "image",
			"name" =>  __("Custom Favicon", 'engine'),
			"id" => "dt_custom_favicon",
			"desc" =>  __("Upload a small image to use as your site's favicon, also known as a shortcut icon.", 'engine'),
			"default" => "" ),
		array(
			"type" => "image",
			"name" =>  __("Custom Default Avatar", 'engine'),
			"id" => "dt_custom_avatar",
			"desc" =>  __("Upload a custom default comment avatar. Once you've uploaded your custom avatar, change the Default Avatar setting at the bottom of the <a href='".admin_url()."options-discussion.php?TB_iframe=1&width=940&height=800' class='thickbox' title='Custom Default Avatar'>Discussion Settings</a> page.", 'engine'),
			"default" => "" ),
	array(
	    "type" => "options_group_end" ),

		// Responsive
	array(
		"type" => "options_group_start",
		"name" =>  __("Responsive Layout Settings", 'engine') ),
		array(
			"type" => "checkbox",
		    "name" => __('Enable Responsive Layouts', 'engine'),
		    "id" => array( "dt_responsive_tablet", "dt_responsive_mobile"),
		    "options" => array( __('Enable Tablet Layout', 'engine'),  __('Enable Mobile Layout', 'engine')),
		    "desc" =>  __('Check the devices you wish for the template layout to be responsive (or adjust to the device being viewed on such as an iPhone or iPad).', 'engine'),
		    "default" => array( "checked", "checked" )
		),
	array(
		"type" => "options_group_end" ),
		
			    
array(
	"type" => "section_end" ),
// END GENERAL


// HOMEPAGE
array(
	"type" => "section_start",
	"tab_name" => __("Homepage", 'engine'),
	"name" => __("Homepage Options", 'engine'),
	"tab-id" => "homepage-tab" ),

	array(
		"type" => "options_group_start",
		"name" => __("Homepage Slider", 'engine') ),
		array(
			"type" => "checkbox",
			"name" => __("Enable Slider", 'engine'),
			"id" => array("dt_slider"),
			"desc" => __("Check this box to enable the homepage slider.", 'engine'),
			"default" => array( "checked" ),
			"options" => array( __('Enable the homepage slider', 'engine')) 
		),
		array(
			"type" => "text",
			"name" => __("Slider Autoplay", 'engine'),
			"id" => 'dt_slider_autoplay',
			"desc" => __("Enter the amount of time, in milliseconds, each slide should show before changing. Leave blank to disable autoplay.", 'engine'),
			"default" => ''
		),
	array(
		"type" => "options_group_end" ),

array(
	"type" => "section_end" ),
// END HOMEPAGE


// DISPLAY
array(
	"type" => "section_start",
	"tab_name" =>  __("Display", 'engine'),
	"name" =>  __("Display Options", 'engine'),
	"tab-id" => "display-tab" ),
		
	// Single Posts
	array(
		"type" => "options_group_start",
		"name" =>  __("Single Posts", 'engine') ),
		array(
			"type" => "checkbox",
			"name" =>  __("Featured Images", 'engine'),
			"id" => array("dt_blog_image"),
			"desc" =>  __("Check this to display featured images on single posts.", 'engine'),
			"default" => array( "checked" ),
			"options" => array(__('Display featured images on single posts', 'engine') )
		),
	array(
		"type" => "options_group_end" ),
		
	// Sidebar
	array(
		"type" => "options_group_start",
		"name" => __("Sidebar", 'engine') ),
		array(
			"type" => "radio_img",
			"name" => __("Sidebar Position", 'engine'),
			"id" => "dt_sidebar",
			"options" => array( '<img src="'.get_bloginfo('template_directory').'/engine/images/icons/admin-sidebar-left.png" /><div>'.__('Sidebar<br />on Left', 'engine') .'</div>', '<img src="'.get_bloginfo('template_directory').'/engine/images/icons/admin-sidebar-right.png" /><div>'. __('Sidebar<br />on Right', 'engine') . '</div>'),
			"values" => array( __("Left", 'engine'), __("Right", 'engine')),
			"desc" => __("Choose the position of your sidebar.", 'engine'),
			"default" => __("Right", 'engine') ),
	array(
		"type" => "options_group_end" ),
		
	// Portfolio
	array(
		"type" => "options_group_start",
		"name" => __("Portfolio Settings", 'engine') ),
		array(
			"type" => "text",
			"name" => __("Roundabout Autoplay", 'engine'),
			"id" => 'dt_roundabout_duration',
			"desc" => __("Enter the amount of time, in milliseconds, each image should show before changing. Leave blank to disable autoplay.", 'engine'),
			"default" => ''
		),
		array(
    		"type" => "text",
    		"name" =>  __("Related Title", 'engine'),
    		"id" => "dt_related_title",
    		"desc" =>  __("Enter the title for the related Portfolio items area. You can disable this area on a post-by-post basis from the Portfolio edit screen.", 'engine'),
    		"default" => "Related Projects"
    	),
    	array(
    		"type" => "text",
    		"name" =>  __("Related Number", 'engine'),
    		"id" => "dt_related_number",
    		"desc" =>  __("Enter the amount of related posts you wish to display.", 'engine'),
    		"default" => "4"
    	),
	array(
		"type" => "options_group_end" ),

array(
	"type" => "section_end" ),
// END DISPLAY


// GENERAL
array(
	"type" => "section_start",
	"tab_name" =>  __("General", 'engine'),
	"name" =>  __("General Settings", 'engine'),
	"tab-id" => "general-tab" ),

	// Contact Form
	array(
	    "type" => "options_group_start",
	    "name" => __("Contact Form", 'engine') ),
    	array(
    		"type" => "text",
    		"name" =>  __("Your Email Address", 'engine'),
    		"id" => "dt_email_address",
    		"desc" =>  __("This theme includes a built-in contact form. Enter the email address you would like your messages sent to. To display the contact form on your site add <code>[contact-form]</code> anywhere in the content of a page or post.", 'engine'),
    		"default" => ""
    	),
    	array(
    		"type" => "text",
    		"name" =>  __("Preset Subject Choices", 'engine'),
    		"id" => "dt_contact_subject",
    		"desc" =>  __("By default the contact form displays an empty Subject field for your visitors to specify when filling out the form. However, you can choose to provide a dropdown of Subject choices instead by listing them here, separated by commas. (Example: Support, Advertising, General Question)", 'engine'),
    		"default" => ""
    	),
	array(
	    "type" => "options_group_end" ),

	// RSS, Newsletter and Social Profiles
	array(
	    "type" => "options_group_start",
	    "name" => "Other Settings" ),
	    array(
	        "type" => "text",
	        "name" =>  __("RSS Feed URL", 'engine'),
	        "id" => "dt_rss_url",
	        "desc" =>  __("Enter your site's Feedburner or other RSS URL here. If left blank, the default WordPress feed will be used.", 'engine'),
	        "default" => ""
	    ),
	    array(
	        "type" => "textarea",
	        "name" =>  __("Tracking Code", 'engine'),
	        "id" => "dt_google_analytics",
	        "desc" =>  __("Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.", 'engine'),
	        "default" => ""
	     ),
	array(
	    "type" => "options_group_end"
	),

array(
	"type" => "section_end" ),
// END GENERAL


);