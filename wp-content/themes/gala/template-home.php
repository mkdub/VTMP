<?php 
/* 
	Template Name: Home 
*/ 
?>

<?php get_header(); ?>
		
	<?php if (dt_is_sidebar_active('home_page')) : ?>
	
	<!-- #home-widgets.clearfix -->
	<div id="home-widgets" class="clearfix">
		    	
    	<?php dynamic_sidebar('home_page'); ?>
	
	</div>
	<!-- /#home-widgets.clearfix -->
	
	<?php endif; ?>

<?php get_footer(); ?>