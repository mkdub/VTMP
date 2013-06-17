<?php $autoplay = get_option('dt_slider_autoplay'); ?>

<!-- .home-slider -->
<div class="home-slider clearfix"<?php if($autoplay) : ?> data-autoplay="<?php echo $autoplay; ?>"<?php endif; ?>>
	
	<!-- .slides_container -->
	<div class="slides_container">
		
		<?php 
		
		$args = array(
				'post_type' => 'slides',
				'posts_per_page' => -1
			);
			
		$query = new WP_Query($args); 
		
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
		
		global $post;
		
		$button = get_post_meta(get_the_ID(), 'dt_button_text', TRUE);
		$url = get_post_meta(get_the_ID(), 'dt_button_url', TRUE);
		$custom_thumb = get_post_meta(get_the_ID(), 'dt_custom_thumbnail', TRUE);
		$content_alignment = get_post_meta(get_the_ID(), 'dt_content_alignment', TRUE);
		
		$content = $post->post_content;
		$total = $query->post_count;
		
		$fullwidth = '';
		if ( !has_post_thumbnail() ) {
			$fullwidth = 'fullwidth';
		}
		
		$alignment = '';
		if($content_alignment == __('Right', 'engine')) {
			$alignment = 'align-right';
		} elseif ($content_alignment == __('Center', 'engine')){
			$alignment = 'align-center';
		} else {
			$alignment = 'align-left';
		}
		
		?>
		
		<!-- .slide -->
		<div class="slide">
		
			<!--BEGIN .hentry -->
			<div <?php post_class(); ?> id="slider-<?php the_ID(); ?>">
				
				<!-- .clearfix -->
				<div class="clearfix">
					
					<?php if(!empty($content)) : ?>
					<!-- .post-wrap -->
					<div class="post-wrap <?php echo $fullwidth; ?> <?php echo $alignment; ?> clearfix">
						
						<?php if($url != '') :?>
						<h2 class="post-title"><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h2>
						<?php else: ?>
						<h2 class="post-title"><?php the_title(); ?></h2>
						<?php endif; ?>
						
						<div class="post-content">
							<?php the_content(); ?>
							<?php if($button != '') : ?>
							<a href="<?php echo $url; ?>" class="button-arrow"><?php echo $button; ?><span></span></a>
							<?php endif; ?>
						</div>
						
					</div>
					<!-- /.post-wrap -->
					<?php endif; ?>

					<?php if ( has_post_thumbnail() ) : ?>
		
					<!--BEGIN .featured-image -->
					<div class="featured-image<?php if(empty($content)) : ?> fullwidth<?php endif; ?>">
						
						<?php if(!empty($content)) : ?>
							
							<?php if($url != '') :?>
							<a href="<?php echo $url; ?>"><?php dt_image(430, ''); ?></a>
							<?php else: ?>
							<?php dt_image(430, ''); ?>
							<?php endif; ?>
							
						<?php else: ?>
							
							<?php if($url != '') :?>
							<a href="<?php echo $url; ?>"><?php dt_image(980, ''); ?></a>
							<?php else: ?>
							<?php dt_image(980, ''); ?>
							<?php endif; ?>

						<?php endif; ?>
		
					<!--END .featured-image -->
					</div>
		
					<?php endif; ?>

				
				</div>
				<!-- /.clearfix -->
				
			</div>
			<!-- /.hentry -->
		
		</div>
		<!-- /.slide -->
		
		<?php endwhile; endif; ?>
	
	</div>
	<!-- /.slides_container -->
	
	<!-- .slider-nav -->
	<div class="slider-nav <?php if($total > 1) : ?>show<?php endif; ?>">
		<a href="#" class="next"></a>
		<a href="#" class="prev"></a>
	</div>
	<!-- /.slider-nav -->

</div>
<!-- /.home-slider -->