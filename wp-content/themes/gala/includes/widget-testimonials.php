<?php

/* ==  Widget ==============================*/
class DT_Testimonials extends WP_Widget {


/* ==  Widget Setup ==============================*/

	function DT_Testimonials() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'DT_Testimonials', 'description' => __('A widget that displays your testimonials.', 'engine') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'dt_testimonials_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'dt_testimonials_widget', __('DT - Testimonials', 'engine'), $widget_ops, $control_ops );
	}


/* ==  Display Widget ==============================*/

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		$number = $instance['number'];
		$rand = $instance['rand'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Latest Tweets */
		 ?>

			<!-- .testimonial-slider -->
			<div class="testimonial-slider">

				<!-- .slides_container -->
				<div class="slides_container">

					<?php

					if($rand)
						$rand = 'rand';

					$args = array(
						'posts_per_page' => $number,
						'orderby' => $rand,
						'post_type' => 'testimonials'
					);

					$query = new WP_Query($args);

					$total = $query->post_count;

					if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

					$name = get_post_meta(get_the_ID(), 'dt_testimonial_name', TRUE);
					$business = get_post_meta(get_the_ID(), 'dt_testimonial_business', TRUE);
					$link = get_post_meta(get_the_ID(), 'dt_testimonial_link', TRUE);
					?>


					<div class="slide">

						<?php the_content(); ?>

						<?php if($name != ''): ?>
						<div class="meta">
							<?php echo stripslashes($name);
							?><?php if($business != '') : ?>,
								<?php if($link != '') : ?><a target="_blank" href="<?php echo $link; ?>"><?php endif; ?>
								<?php echo $business; ?><?php if($link != '') : ?></a><?php endif; ?>
							<?php endif; ?>
						</div>

						<?php endif; ?>
						<div class="quote-left">“</div>
						<div class="quote-right">”</div>

					</div>

					<?php endwhile; else: ?>

					<p><?php __('There are no testimonials right now.', 'engine'); ?></p>

					<?php endif; ?>

				</div>
				<!-- /.slides_container -->

				<?php if($total > 1) : ?>
				<div class="testimonial-arrows show">
					<a href="#" class="next"></a>
					<a href="#" class="prev"></a>
				</div>
				<?php endif; ?>

			</div>
			<!-- /.testimonial-slider -->

		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}



/* ==  Update Widget ==============================*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['rand'] = strip_tags( $new_instance['rand'] );

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
		'title' => '',
		'number' => '5',
		'rand' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number to Display', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( (bool) $instance['rand'], true ); ?> id="<?php echo $this->get_field_id( 'rand' ); ?>" name="<?php echo $this->get_field_name( 'rand' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'rand' ); ?>"><?php _e('Random Order?', 'engine'); ?></label>
		</p>


	<?php
	}
}


?>