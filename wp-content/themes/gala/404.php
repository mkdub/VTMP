<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>

<?php get_header(); ?>

	<!--BEGIN #content -->
    <div id="content">

		<!--BEGIN .hentry -->
		<div class="hentry" id="post-0">
			
			<!-- .post-wrap clearfix -->
			<div class="post-wrap-page clearfix">

				<!--BEGIN .post-content -->
				<div class="post-content clearfix">
					
					<?php echo do_shortcode('[sitemap]'); ?>
					
				<!--END .post-content -->
				</div>


			</div>
			<!-- /.post-wrap clearfix -->
			
		<!--END .hentry-->
		</div>

	</div><!-- #content -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>