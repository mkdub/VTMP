<?php get_header(); ?>
		
	<!-- #portfolio-wrap.clearfix -->
	<div id="portfolio-wrap" class="clearfix">
		
		<ul id="filter" class="clearfix">
			
			<li class="current"><a href="#" data-filter="*"><?php _e('All', 'engine'); ?></a></li>
			
			
			<?php 
			
			$term_id = get_query_var('term');
			
			$groups = get_term_by('slug', $term_id, 'group');
			
			//print_r($groups);
			
			$id =  $groups->term_id;
						
			wp_list_categories( array(
					'taxonomy' => 'group',
					'depth' => 1,
					'hierarchical' => 1,
					'hide_empty' => 0,
					'title_li' => '',
					'walker' => new Group_Walker(),
					'child_of' => $id,
					'show_option_none' => ''
				) 
			); 
			

			?> 
			
		</ul>
		

		<!--BEGIN #masonry -->	
		<ul id="masonry">
		
			<?php 
			
			$all_terms = get_terms( 'group', array('hide_empty' => 0 ) );
			
			$count = 1;
			
			$wp_query->set( 'posts_per_page', 9999 );
			$wp_query->query($wp_query->query_vars);
					
			?>
						
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php $terms = get_the_terms( get_the_ID(), 'group' ); ?>
			
			<!--BEGIN .item -->	
			<li data-order='1' data-id="id-<?php echo $count; ?>" class="item <?php if($terms) : foreach ($terms as $term) { echo 'term-'.$term->term_id.' '; } endif; ?>">
			
				<!--BEGIN .hentry -->
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					
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
				</div>
			
			<!--END .item -->	
			</li>
			<?php $count++; endwhile; endif; ?>
			
			<?php //get_template_part('includes/index-loadmore'); ?>
					
		<!--END #masonry -->
		</ul>

	</div>
	<!-- /#portfolio-wrap.clearfix -->

<?php get_footer(); ?>