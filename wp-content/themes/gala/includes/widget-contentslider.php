<?php

/* ==  Widget ==============================*/
class DT_Contentslider extends WP_Widget {


/* ==  Widget Setup ==============================*/	

	function DT_Contentslider() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'DT_Contentslider', 'description' => __('A widget that displays your portfolio, blog and tweets. Only supported on the home page', 'engine') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'dt_contentslider_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'dt_contentslider_widget', __('DT - Content Tabs', 'engine'), $widget_ops, $control_ops );
	}


/* ==  Display Widget ==============================*/

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		
		$active = $instance['active'];
		
		if($active == 'Portfolio')
			$active = 1; 
			
		if($active == 'Blog')
			$active = 2; 
			
		if($active == 'Twitter')
			$active = 3; 
			
		$portfolio_title = $instance['portfolio_title'];
		$blog_title = $instance['blog_title'];
		$twitter_title = $instance['twitter_title'];
		
		$portfolio = $instance['portfolio'];
		$portfolio_number = $instance['portfolio_number'];
		$portfolio_order = $instance['portfolio_order'];
		$portfolio_page = $instance['portfolio_page'];
		
		$blog = $instance['blog'];
		$blog_number = $instance['blog_number'];
		$blog_order = $instance['blog_order'];
		$blog_page = $instance['blog_page'];
		
		$twitter = $instance['twitter'];
		$twitter_username = $instance['twitter_username'];
		$twitter_number = $instance['twitter_number'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Latest Tweets */
		 ?>
		 
		 	
			
			<div class="content-slider clearfix" data-active="<?php echo $active; ?>">
				
				<!-- .slides_container -->
				<div class="slides_container">
					
					<?php
					
					if($portfolio) :
						
						if($portfolio_order == __('Random', 'engine') ) {
							$portfolio_order = 'rand';
							$asc = '';
						}
							
						if($portfolio_order == __('Date', 'engine') ) {
							$portfolio_order = 'date';
							$asc = 'DESC';
						}
							
						if($portfolio_order == __('Title', 'engine') ) {
							$portfolio_order = 'title';
							$asc = 'ASC';
						}
					
						$args = array(
							'posts_per_page' => $portfolio_number,
							'orderby' => $portfolio_order,
							'order' => $asc,
							'post_type' => 'portfolio'	
						);
						
						$query = new WP_Query($args);
						
						$total = $query->post_count;
						$start = 0;
						$finish = 1;
					?>
					<!-- .slide -->
					<div class="slide">
					
						<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
						
						<?php
						//Check if $start is a multiple of 3
						if ($start == 0 || $start % 3 == 0) :
						?>
						<ul class="clearfix">
						<?php endif; ?>
							<li>
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
										<p><?php the_excerpt(); ?>
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

							</li>
							
						<?php
						//Check if $start is a multiple of 3
						if ($finish == $total || $finish % 3 == 0) :
						?>
						</ul>
						<?php endif; ?>
						
						<?php $start++; $finish++; endwhile; endif; ?>
						
						<!-- .visit-wrap -->
						<div class="visit-wrap">
							<a href="<?php echo get_permalink($portfolio_page); ?>" class="visit"><?php _e('Go to Insights', 'engine'); ?><span class="right-arrow"></span></a>
						</div>
						<!-- /.visit-wrap -->
						
					</div>
					<!-- /.slide -->
					
					<?php endif; // end if portfolio ?>
					
					<?php
					
					if($blog) :
						

						if($blog_order == __('Date', 'engine') ) {
							$blog_order = 'date';
							$asc = 'DESC';
						}
							
						if($blog_order == __('Title', 'engine') ) {
							$blog_order = 'title';
							$asc = 'ASC';
						}
					
						$args = array(
							'posts_per_page' => $blog_number,
							'orderby' => $blog_order,
							'order' => $asc
						);
						
						$query = new WP_Query($args);
						
						$total = $query->post_count;
						$start = 0;
						$finish = 1;
					?>

					
					<!-- .slide -->
					<div class="slide">
						
						<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
						
						<?php
						//Check if $start is a multiple of 3
						if ($start == 0 || $start % 3 == 0) :
						?>
						<ul class="clearfix">
						<?php endif; ?>
							<li>
								<!--BEGIN .hentry -->
								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
									
									<!-- .clearfix -->
									<div class="clearfix">
										
										<!--BEGIN .post-meta .post-header-->
										<div class="post-meta post-header">
											<span class="meta-published"><span class="month"><?php the_time( 'M' ); ?></span><span class="day"><?php the_time( 'd' ); ?></span></span>
										<!--END .post-meta post-header -->
										</div>
										
										<!-- .post-wrap -->
										<div class="post-wrap">
											
											<h2 class="post-title">
												<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'engine'), get_the_title()); ?>"><?php the_title(); ?></a>
											</h2>
																	
											<!--BEGIN .post-content -->
											<div class="post-content">
												<?php dt_excerpt(20); ?>
											<!--END .post-content -->
											</div>
								
											<!--BEGIN .post-meta .post-footer-->
											<div class="post-meta post-footer">
												<span class="meta-categories"><?php the_category(', ') ?></span>
											<!--END .post-meta .post-footer-->
											</div>
										
										</div>
										<!-- /.post-wrap -->
									
									</div>
									<!-- /.clearfix -->
						
								<!--END .hentry-->
								</div>

							</li>
							
						<?php
						//Check if $start is a multiple of 3
						if ($finish == $total || $finish % 3 == 0) :
						?>
						</ul>
						<?php endif; ?>
						
						<?php $start++; $finish++; endwhile; endif; ?>
						
						<!-- .visit-wrap -->
						<div class="visit-wrap">
							<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="visit"><?php _e('Go to News', 'engine'); ?><span class="right-arrow"></span></a>
						</div>
						<!-- /.visit-wrap -->
						
					</div>
					<!-- /.slide -->
					
					<?php endif; // if blog ?>
					
					<?php if($twitter) : ?>
					<!-- .slide -->
					<div class="slide">

						<!-- .twitter-wrap clearfix -->
						<div class="twitter-wrap clearfix">
							<?php the_widget('DT_Twitter', 'title=&username='.$twitter_username.'&postcount='.$twitter_number.'&tweettext=&tweettext='.__('Follow', 'engine').' @'.$twitter_username.''); ?>
						</div>
						<!-- /.twitter-wrap clearfix -->
						
					</div>
					<!-- /.slide -->
					<?php endif; // if twitter ?>
					
					
				</div>
				<!-- /.slides_container -->
				
				<ul class="pagination">
					<?php if($portfolio) : ?>
					<li class="icon-projects"><a href="#0"><span class="icon"></span><?php echo stripslashes($portfolio_title); ?><span class="arrow"></span></a></li>
					<?php endif; ?>
					<?php if($blog) : ?>
					<li class="icon-blog"><a href="#1"><span class="icon"></span><?php echo stripslashes($blog_title); ?><span class="arrow"></span></a></li>
					<?php endif; ?>
					<?php if($twitter) : ?>
					<li class="icon-twitter"><a href="#2"><span class="icon"></span><?php echo stripslashes($twitter_title); ?><span class="arrow"></span></a></li>
					<?php endif; ?>
				</ul>

			</div>
			<!-- /.content-slider -->
		
		<?php 

		/* After widget (defined by themes). */
		echo $after_widget;
	}



/* ==  Update Widget ==============================*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['active'] = strip_tags( $new_instance['active'] );
		
		$instance['portfolio_title'] = strip_tags( $new_instance['portfolio_title'] );
		$instance['blog_title'] = strip_tags( $new_instance['blog_title'] );
		$instance['twitter_title'] = strip_tags( $new_instance['twitter_title'] );
		
		$instance['portfolio'] = strip_tags( $new_instance['portfolio'] );
		$instance['portfolio_number'] = strip_tags( $new_instance['portfolio_number'] );
		$instance['portfolio_order'] = strip_tags( $new_instance['portfolio_order'] );
		$instance['portfolio_page'] = strip_tags( $new_instance['portfolio_page'] );
		
		$instance['blog'] = strip_tags( $new_instance['blog'] );
		$instance['blog_number'] = strip_tags( $new_instance['blog_number'] );
		$instance['blog_order'] = strip_tags( $new_instance['blog_order'] );
		$instance['blog_page'] = strip_tags( $new_instance['blog_page'] );
		
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );
		$instance['twitter_number'] = strip_tags( $new_instance['twitter_number'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	
	
	
/* ==  Widget Settings ==============================*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'What\'s New',
		'active' => 'portfolio',
		'portfolio_title' => 'Projects',
		'blog_title' => 'The Blog',
		'twitter_title' => 'Twitter',
		'portfolio' => 1,
		'blog' => 1,
		'twitter' => 1,
		'portfolio_number' => 3,
		'portfolio_order' => 'date',
		'portfolio_page' => '',
		'blog_number' => 3,
		'blog_order' => 'date',
		'blog_page' => '',
		'twitter' => 1,
		'twitter_username' => 'designerthemes',
		'twitter_number' => 3
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>	
		    <input class="checkbox" class="widefat" type="checkbox" <?php checked( (bool) $instance['portfolio'], true ); ?> id="<?php echo $this->get_field_id( 'portfolio' ); ?>" name="<?php echo $this->get_field_name( 'portfolio' ); ?>" /><label for="<?php echo $this->get_field_id( 'portfolio' ); ?>"><?php _e('Enable Portfolio Tab', 'engine'); ?></label><br />
		    
		    <input class="checkbox" class="widefat" type="checkbox" <?php checked( (bool) $instance['blog'], true ); ?> id="<?php echo $this->get_field_id( 'blog' ); ?>" name="<?php echo $this->get_field_name( 'blog' ); ?>" /><label for="<?php echo $this->get_field_id( 'blog' ); ?>"><?php _e('Enable Blog Tab', 'engine'); ?></label><br />
		    
		    <input class="checkbox" class="widefat" type="checkbox" <?php checked( (bool) $instance['twitter'], true ); ?> id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" /><label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Enable Twitter Tab', 'engine'); ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'active' ); ?>"><?php _e('Active Tab', 'engine') ?>:</label>
			<select id="<?php echo $this->get_field_id( 'active' ); ?>" name="<?php echo $this->get_field_name( 'active' ); ?>">
				<option <?php if ( 'Portfolio' == $instance['active'] ) echo 'selected="selected"'; ?>><?php _e('Portfolio', 'engine'); ?></option>
				<option <?php if ( 'Blog' == $instance['active'] ) echo 'selected="selected"'; ?>><?php _e('Blog', 'engine'); ?></option>
				<option <?php if ( 'Twitter' == $instance['active'] ) echo 'selected="selected"'; ?>><?php _e('Twitter', 'engine'); ?></option>
			</select>		
		</p>		

<hr style="border:0;margin:12px 0;height:2px;background:#DFDFDF;" />

		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_title' ); ?>"><?php _e('Portfolio Title:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_title' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_title' ); ?>" value="<?php echo $instance['portfolio_title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_number' ); ?>"><?php _e('Portfolio Number:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_number' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_number' ); ?>" value="<?php echo $instance['portfolio_number']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_order' ); ?>"><?php _e('Portfolio Order', 'engine') ?>:</label>
			<select id="<?php echo $this->get_field_id( 'portfolio_order' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_order' ); ?>">
				<option <?php if ( __('Random', 'engine') == $instance['portfolio_order'] ) echo 'selected="selected"'; ?>><?php _e('Random', 'engine'); ?></option>
				<option <?php if ( __('Title', 'engine') == $instance['portfolio_order'] ) echo 'selected="selected"'; ?>><?php _e('Title', 'engine'); ?></option>
				<option <?php if ( __('Date', 'engine') == $instance['portfolio_order'] ) echo 'selected="selected"'; ?>><?php _e('Date', 'engine'); ?></option>
			</select>		
		</p>
		
		<p>
			<?php 
			$args = array(
			    'depth'            => 0,
			    'child_of'         => 0,
			    'selected'         => $instance['portfolio_page'],
			    'echo'             => 1,
			    'name'             => $this->get_field_name( 'portfolio_page' )); 
			?>
			<label for="<?php echo $this->get_field_id( 'portfolio_page' ); ?>"><?php _e('Portfolio Page:', 'engine') ?></label>
			<?php wp_dropdown_pages( $args ); ?> 
		</p>

<hr style="border:0;margin:12px 0;height:2px;background:#DFDFDF;" />
		
		<p>
			<label for="<?php echo $this->get_field_id( 'blog_title' ); ?>"><?php _e('Blog Title:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'blog_title' ); ?>" name="<?php echo $this->get_field_name( 'blog_title' ); ?>" value="<?php echo $instance['blog_title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'blog_number' ); ?>"><?php _e('Blog Number:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'blog_number' ); ?>" name="<?php echo $this->get_field_name( 'blog_number' ); ?>" value="<?php echo $instance['blog_number']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'blog_order' ); ?>"><?php _e('Blog Order', 'engine') ?>:</label>
			<select id="<?php echo $this->get_field_id( 'blog_order' ); ?>" name="<?php echo $this->get_field_name( 'blog_order' ); ?>">
				<option <?php if ( __('Random', 'engine') == $instance['blog_order'] ) echo 'selected="selected"'; ?>><?php _e('Random', 'engine'); ?></option>
				<option <?php if ( __('Title', 'engine') == $instance['blog_order'] ) echo 'selected="selected"'; ?>><?php _e('Title', 'engine'); ?></option>
				<option <?php if ( __('Date', 'engine') == $instance['blog_order'] ) echo 'selected="selected"'; ?>><?php _e('Date', 'engine'); ?></option>
			</select>		
		</p>
		
		<p>
			<?php 
			$args = array(
			    'depth'            => 0,
			    'child_of'         => 0,
			    'selected'         => $instance['blog_page'],
			    'echo'             => 1,
			    'name'             => $this->get_field_name( 'blog_page' )); 
			?>
			<label for="<?php echo $this->get_field_id( 'blog_page' ); ?>"><?php _e('Blog Page:', 'engine') ?></label>
			<?php wp_dropdown_pages( $args ); ?> 
		</p>
		
<hr style="border:0;margin:12px 0;height:2px;background:#DFDFDF;" />

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_title' ); ?>"><?php _e('Twitter Title:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_title' ); ?>" name="<?php echo $this->get_field_name( 'twitter_title' ); ?>" value="<?php echo $instance['twitter_title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e('Twitter Username:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" value="<?php echo $instance['twitter_username']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_number' ); ?>"><?php _e('Twitter Number:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_number' ); ?>" name="<?php echo $this->get_field_name( 'twitter_number' ); ?>" value="<?php echo $instance['twitter_number']; ?>" />
		</p>

		
	<?php
	}
}


?>