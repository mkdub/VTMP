			<!--END #content -->
			</div>
		
		<!--END #main -->
		</div>
		
		<!-- #footer-widgets.clearfix -->
		<div id="footer-widgets" class="clearfix">
			
			<?php if (dt_is_sidebar_active('footer_col1')) : ?>
			<!-- .col first -->
			<div class="col first">
				<?php dynamic_sidebar('footer_col1'); ?>
			</div>
			<!-- /.col first -->
			<?php endif; ?>
			
			<?php if (dt_is_sidebar_active('footer_col2')) : ?>
			<!-- .col -->
			<div class="col">
				<?php dynamic_sidebar('footer_col2'); ?>
			</div>
			<!-- /.col -->
			<?php endif; ?>
			
			<?php if (dt_is_sidebar_active('footer_col3')) : ?>
			<!-- .col -->
			<div class="col">
				<?php dynamic_sidebar('footer_col3'); ?>
			</div>
			<!-- /.col -->
			<?php endif; ?>
			
			<?php if (dt_is_sidebar_active('footer_col4')) : ?>
			<!-- .col -->
			<div class="col">
				<?php dynamic_sidebar('footer_col4'); ?>
			</div>
			<!-- /.col -->
			<?php endif; ?>
			
		</div>
		<!-- /#footer-widgets.clearfix -->
			
	<!--END #page -->
    </div>

<!--END #wrapper -->
</div>
<!--BEGIN #bottom -->
<div id="bottom">
	
	<!--BEGIN #footer -->
	<div id="footer">
		<!--BEGIN #site-info -->
		<div id="site-info">

			<!--<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?> - Created by <a href="http://resonanceco.com/" title="Resonance Consultancy">Resonance Consultancy</a></p>-->
			<p><a href='http://www.tourismvancouver.com/privacy/' target='_blank' val=">Privacy Policy">Privacy Policy</a> | <a href='http://www.tourismvancouver.com/web-site-use/' target='_blank' val="Web Site Use">Web Site Use</a> | <a href='http://www.tourismvancouver.com/about-us/contact/' target='_blank' val="Contact">Contact</a></p>
			<p>&copy; Copyright 2013 the Greater Vancouver Visitors and Convention Bureau, All Rights Reserved.</p>
		
		<!--END #site-info -->
		</div>
	<!--END #footer -->
	</div>

<!--END #bottom -->
</div>

<?php if(get_option('dt_skin') == 'Dark') : ?>
<div id="ajax-loader" data-url="<?php echo get_template_directory_uri(); ?>/images/ajax-loader-dark.gif" class="hidden"></div>
<?php else: ?>
<div id="ajax-loader" data-url="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" class="hidden"></div>
<?php endif; ?>

<div class="handle"><?php _e('Sidebar', 'engine'); ?></div>

<script> // for contact form
	var ajaxurl='<?php echo admin_url('admin-ajax.php'); ?>';
</script>

<?php wp_footer(); ?>

</body>

</html>