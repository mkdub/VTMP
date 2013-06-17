<?php get_header(); ?>

	<!--BEGIN #content -->
    <div id="content">


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--BEGIN .hentry -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<!-- .post-wrap clearfix -->
			<div class="post-wrap-blog clearfix">
				
				<?php if(get_option('dt_blog_image') == 'true') : ?>
				
				<?php $custom_thumb = get_post_meta(get_the_ID(), 'dt_custom_thumbnail', TRUE); ?>
	
				<?php if ( has_post_thumbnail() || $custom_thumb != ''  ) : ?>
				
				<!--BEGIN .featured-image -->
				<div class="featured-image">
	
					<a title="<?php printf(__('Permanent Link to %s', 'engine'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
						<?php dt_image(558, ''); ?>
					</a>
	
				<!--END .featured-image -->
				</div>
				
				<?php endif; ?>
	
				<?php endif; ?>
				
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'engine'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
			
				<div class="meta-published"><span class="month"><?php the_time( 'M' ); ?></span><span class="day"><?php the_time( 'd' ); ?></span></div>
				
				<!--BEGIN .post-meta .post-header-->
				<div class="post-meta post-header">
	
					<span class="meta-author"><?php the_author_posts_link(); ?></span>
					<span class="meta-categories"><?php the_category(', ') ?></span>
					<span class="meta-comment"><?php comments_popup_link(__('No Comments', 'engine'), __('1 Comment', 'engine'), __('% Comments', 'engine')); ?> </span>
	
				<!--END .post-meta post-header -->
				</div>
	
	
				<!--BEGIN .post-content -->
				<div class="post-content clearfix">
					<?php the_content(__('Read more', 'engine') . '<span class="right-arrow"></span>'); ?>
				<!--END .post-content -->
				</div>


			</div>
			<!-- /.post-wrap clearfix -->
			
		<!--END .hentry-->
		</div>

		<?php endwhile; ?>

		<!--BEGIN .post-navigation -->
		<div class="post-navigation clearfix">
			<?php dt_pagination(); ?>
		<!--END .post-navigation -->
		</div>

		<?php endif; ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>