<?php get_header(); ?>

	<!--BEGIN #content -->
    <div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--BEGIN .hentry -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<!-- .post-wrap clearfix -->
			<div class="post-wrap-blog clearfix">
			
				<?php $custom_thumb = get_post_meta(get_the_ID(), 'dt_custom_thumbnail', TRUE); ?>
	
				<?php if ( has_post_thumbnail() || $custom_thumb != '' ) : ?>
	
				<!--BEGIN .featured-image -->
				<div class="featured-image">
				<?php
				if(get_option('dt_blog_image') == 'true') {

					if($custom_thumb == '') {

						dt_image(642, '');

					} else {

						$image = dt_resize( '', $custom_thumb, 642, '', true );

						?>
						<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
						<?php
					}
				}
				?>
				<!--END .featured-image -->
				</div>
	
				<?php endif; ?>

				<!--BEGIN .post-content -->
				<div class="post-content clearfix">
					<?php the_content(__('Read more', 'engine') . '<span class="right-arrow"></span>'); ?>
				<!--END .post-content -->
				</div>

			</div>
			<!-- /.post-wrap clearfix -->
			
		<!--END .hentry-->
		</div>
		
		<?php comments_template('', true); ?>

		<?php endwhile; endif; ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>