<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="ie6 ie67"><![endif]-->
<!--[if IE 7]><html <?php language_attributes(); ?> class="ie7 ie67"><![endif]-->
<!--[if IE 8]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if(get_option('dt_rss_url')): ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo stripslashes(get_option('dt_rss_url')); ?>" />
	<?php endif; ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url').'?'.filemtime(get_stylesheet_directory().'/style.css'); ?>">

	<?php
		$skin=get_option('dt_skin');
		if($skin != __('Minimal', 'engine')):
	?>
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/skins.css" >
	<?php endif; ?>

	<link rel="stylesheet" href="<?php echo bloginfo('template_url').'/custom-style.css'.'?'.filemtime(get_stylesheet_directory().'/custom-style.css'); ?>">

	<?php if(get_option('dt_custom_css') && get_option('dt_custom_css')!=""): ?>
	<style type="text/css">
		<?php echo stripslashes(get_option('dt_custom_css')); ?>
	</style>
	<?php endif; ?>

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/engine/js/selectivizr.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<script type="text/javascript">
		//sessionStorage.rand =  Math.floor((Math.random()*3000)+1);
		$(document).ready(function() {
			setTimeout(animate,400);
			function animate(){
				 $('#main').stop().delay(0).animate({"opacity":1}, 800, 'easeOutQuad');
				 $('.vtpHeader').stop().delay(50).animate({"height":300}, 800, 'easeOutQuad');
				// $('#headerLine').stop().delay(200).animate({"width":860}, 1700, 'easeOutExpo');
				/* $('#headerLogo').stop().delay(100).animate({"top":0}, 700, 'easeOutBack');
				 $('#thankyou').stop().delay(400).animate({"height":165}, 1200, 'easeInExpo');
					
				 $('#footer').stop().delay(900).animate({"left":0}, 1400, 'easeOutExpo');
				 $('#logo').stop().delay(900).animate({"opacity":1, "opacity":1}, 1400, 'easeOutQuad');
		*/
			}
		
			var randHeader = Math.floor((Math.random()*3)+1);
			//$('#headerLogo').css("background-image", "url(images/header"+randHeader+".png)");
		}); 
	</script>

</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrapper-->
<div id="wrapper">
	
	<!-- BEGIN #page-->
    <div id="page">

		<!-- .header-wrap -->
		<div class="header-wrap">
			<div class="topHeader">
				<div class="topHeaderContent">
				<div id="logo">

					    <?php

					    $logo = get_option('dt_custom_logo');

					    if ($logo != '') :

					    ?>

							<?php if (is_home() || is_front_page()): ?>

								<h1 id="site-title"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>" rel="home"><img class="logo" alt="<?php bloginfo('name') ?>" src="<?php echo $logo; ?>" /></a></h1>

							<?php else: ?>

								<div id="site-title"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>" rel="home"><img class="logo" alt="<?php bloginfo('name') ?>" src="<?php echo $logo; ?>" /></a></div>

							<?php endif; ?>

						<?php else: ?>

							<?php if (is_home() || is_front_page()): ?>

								<h1 id="site-title"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></h1>
								<h2 id="site-description"><?php bloginfo('description') ?></h2>

							<?php else: ?>

								<div id="site-title"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></div>
								<div id="site-description"><?php bloginfo('description') ?></div>

							<?php endif; ?>

						<?php endif; ?>

					<!-- END #logo -->
					</div>
					<!-- BEGIN #primary-menu -->
					<div id="primary-menu">
						<?php
						
						if ( has_nav_menu( 'primary-menu' ) ) : // if menu location 'primary-menu' exists then use custom menu
						
							wp_nav_menu( array( 'theme_location' => 'primary-menu', 'depth' => 3 ) );
							
							if(get_option('dt_responsive_mobile') == 'true' || get_option('dt_responsive_tablet') == 'true') {
							
								$locations = get_registered_nav_menus();
								$menus = wp_get_nav_menus();
								$menu_locations = get_nav_menu_locations();
								
								$location_id = 'primary-menu';
								
								if (isset($menu_locations[ $location_id ])) {
									foreach ($menus as $menu) {
										// If the ID of this menu is the ID associated with the location we're searching for
										if ($menu->term_id == $menu_locations[ $location_id ]) {
											// This is the correct menu
											echo '<a id="menu-button" class="button-arrow" href="#">'.__('Menu', 'engine').'<span></span></a>';
											// Get the items for this menu
											echo dt_get_page_selector($menu);
								
											// Now do something with them here.
											//
											//
											break;
										}
									}
								}
							}
														
						endif;
					
						?>
					
					<!-- END #primary-menu -->
					</div>
					</div>
			</div><!-- END #topHeader -->
			<!-- BEGIN #header-->
			<div id="header" class="clearfix">

				<!-- .clearfix -->
				<div class="clearfix">
					
					

				</div>
				<!-- /.clearfix -->
				
				<?php if(is_page_template('template-home.php') && get_option('dt_slider') == 'true') get_template_part('includes/home-slider'); ?>

				<?php get_template_part('includes/header-title'); ?>

				<?php if(is_single() && get_post_type() == 'portfolio') get_template_part('includes/portfolio-roundabout'); ?>

			<!-- END #header -->
			</div>

		</div>
		<!-- /.header-wrap -->
		<!--<div class="hashLine">
		</div>
		<div class="vtpHeader">
			<div id='vtpBox'>
				<div id='vtpText'>
					<p>The Vancouver Tourism Master Plan is a joint effort of the City of Vancouver, Tourism Vancouver, Vancouver Economic Commission and the Vancouver Convention Centre to assess and define the product development needs of Vancouver's tourist attractions, services, facilities and transportation in order to create a long term strategy for the sustainable development and management of tourism in the city.</p>
				</div>
			</div>
		</div>
		-->
		<div id="main">

			<div id="container" class="clearfix">