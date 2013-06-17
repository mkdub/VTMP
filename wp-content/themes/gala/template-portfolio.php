<?php 
/* 
	Template Name: Portfolio 
*/ 
?>

<?php get_header(); ?>
		
	<!-- #portfolio-wrap.clearfix -->
	<div id="portfolio-wrap" class="clearfix">
	
		<ul id="filter" class="clearfix">
			
			<li id="all" class="current"><a href="#" data-filter="*"><?php _e('All', 'engine'); ?><span class="arrow"></span></a>
				
				<ul class="drop">
					
					<?php 
						wp_list_categories( array(
								'taxonomy' => 'group',
								'orderby' => 'name',
						        'order' => 'ASC',
								'hide_empty' => 0,
								'title_li' => '',
								'depth' => 1,
								'walker' => new Group_Walker()
							) 
						); 
						
					?> 
				
				</ul>
				
			</li>
			
			
		</ul>

		<!--BEGIN #masonry -->	
		<ul id="masonry">
		
			<?php 
			
			$all_terms = get_terms( 'group', array('hide_empty' => 0 ) );
			
			$count = 1;
				
			$args = array(
            	'post_type' => 'Portfolio',
            	'posts_per_page' => -1
			);
			
			query_posts($args);
			
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
							<?php dt_image(222, 152); ?>
						</a>
		
					<!--END .featured-image -->
					</div>
		
					<?php endif; ?>
	
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'engine'), get_the_title()); ?>"><?php the_title(); ?></a>
					</h2>

					<?php if ( !empty( $post->post_excerpt ) ) { ?>

					<!--BEGIN .post-content -->
					<div class="post-content">
						<p><?php the_excerpt(); ?>
					<!--END .post-content -->
					</div>	

					<?php } ?>
					
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