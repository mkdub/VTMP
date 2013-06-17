<?php get_header(); ?>

	<!--BEGIN #content -->
    <div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--BEGIN .hentry -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<!-- .post-wrap clearfix -->
			<div class="post-wrap-page clearfix">

				<!--BEGIN .post-content -->
				<div class="post-content clearfix">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'engine').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
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