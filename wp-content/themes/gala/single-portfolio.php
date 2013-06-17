<?php get_header(); ?>

	<!--BEGIN #content -->
    <div id="content">
    	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php 
		
		$tab_titles = get_post_meta(get_the_ID(), 'dt_tab_titles', TRUE);
		$tab_contents = get_post_meta(get_the_ID(), 'dt_tab_contents', TRUE);
		$related = get_post_meta(get_the_ID(), 'dt_related', TRUE);
		
		?>

		<!--BEGIN .hentry -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<!-- .post-wrap -->
			<div class="post-wrap clearfix">
				
				<!-- .portfolio-tabs -->
				<div class="portfolio-tabs">
				
					<!-- .slides_container -->
					<div class="slides_container">
						
						<!-- .slide -->
						<div class="slide">
							
							<!--BEGIN .post-content -->
							<div class="post-content">
								<?php the_content(); ?>
							<!--END .post-content -->
							</div>
						
						</div>
						<!-- /.slide -->
						
						<?php if(is_array($tab_contents)) : ?>
						
							<?php $count = 2; ?>
							
							<?php foreach($tab_contents as $contents) : ?>
							<!-- .slide -->
							<div class="slide">
							
								<!--BEGIN .post-content -->
								<div class="post-content">
									<?php echo wpautop(do_shortcode($contents)); ?>
								<!--END .post-content -->
								</div>
						
							</div>
							<!-- /.slide -->
							<?php $count++; endforeach; ?>
							
						<?php endif; ?>
					
						
					</div>
					<!-- /.slides_container -->
					
					<!-- .pagination -->
					<ul class="pagination">
					
						<li class="current"><a href="#1"><?php _e('Overview', 'engine'); ?></a></li>
						
						<?php if(is_array($tab_titles)) : ?>
						
							<?php $count = 2; ?>
							
							<?php foreach($tab_titles as $title) : ?>
							<li><a href="#<?php echo $count; ?>"><?php echo stripslashes($title); ?></a></li>
							<?php $count++; endforeach; ?>
							
						<?php endif; ?>
						
					</ul>
					<!-- /.pagination -->
					
				</div>
				<!-- /.portfolio-tabs -->
			
			</div>
			<!-- /.post-wrap -->
        
		<!--END .hentry-->  
		</div>

		<?php endwhile; endif; ?>
		
		<?php if($related == 'on') : ?>

		<!--BEGIN #related-projects-->
		<div id="related" class="clearfix">

			<h3 class="widget-title"><span><?php echo stripslashes(get_option('dt_related_title', __('Related', 'engine'))); ?></span></h3>

			<?php $related = dt_get_posts_related_by_taxonomy(get_the_ID(), 'group', get_the_ID()); ?>

			<ul>

				<?php  if($related->have_posts()) : while ($related->have_posts()) : $related->the_post(); ?>

				<!--BEGIN .hentry -->
				<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					
					<?php $custom_thumb = get_post_meta(get_the_ID(), 'dt_custom_thumbnail', TRUE); ?>
		
					<?php if ( has_post_thumbnail() || $custom_thumb != '' ) : ?>
		
					<!--BEGIN .featured-image -->
					<div class="featured-image">
		
						<a title="<?php printf(__('Permanent Link to %s', 'engine'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
							<?php
		
							if($custom_thumb == '') {
	
								dt_image(222, 152);
	
							} else {
	
								$image = dt_resize( '', $custom_thumb, 222, 152, true );
	
								?>
								<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
								<?php
							}
							
							?>
						</a>
		
					<!--END .featured-image -->
					</div>
		
					<?php endif; ?>
	
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'engine'), get_the_title()); ?>"><?php the_title(); ?></a>
					</h2>
											
					<!--BEGIN .post-content -->
					<div class="post-content">
						<?php dt_excerpt(11); ?>
					<!--END .post-content -->
					</div>
					
					<!--BEGIN .post-meta .post-footer-->
					<div class="post-meta post-footer">
						<span class="meta-categories">
						<?php the_terms( get_the_ID(), 'group', '', ', ' ); ?> 
						</span>
					<!--END .post-meta .post-footer-->
					</div>
	
		
				<!--END .hentry-->
				</li>

				<?php endwhile;  else: ?>
					<p><?php _e('There are no related posts right now.', 'engine'); ?></p>
				<?php endif; ?>

			</ul>


		<!--END #related-projects-->
		</div>
		
		<?php endif; ?>


	</div><!-- #content -->

<?php get_footer(); ?>