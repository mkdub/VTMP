<?php

/* ==  Widget ==============================*/
class DT_Callout extends WP_Widget {


/* ==  Widget Setup ==============================*/	

	function DT_Callout() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'DT_Callout', 'description' => __('A widget that displays a callout.', 'engine') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'dt_callout_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'dt_callout_widget', __('DT - Callout', 'engine'), $widget_ops, $control_ops );
	}


/* ==  Display Widget ==============================*/

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		
		$callout_text = $instance['callout_text'];
		$link_text = $instance['link_text'];
		$url = $instance['url'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Latest Tweets */
		 ?>
			
			<!-- .callout-box -->
			<div class="callout-box clearfix<?php if($link_text == '') : ?> no-link<?php endif; ?>">
			
				<!-- .callout-excerpt -->
				<div class="callout-excerpt">
					<p><?php echo htmlspecialchars_decode(stripslashes(nl2br($callout_text))); ?></p>
				</div>
				<!-- /.callout-excerpt -->
				
				<?php if($link_text != '') : ?>
				<!-- .callout-link -->
				<div class="callout-link">
					<a href="<?php echo $url ?>" class="button-arrow"><?php echo $link_text; ?><span></span></a>
				</div>
				<!-- /.callout-link -->
				<?php endif; ?>
				
			</div>
			<!-- /.callout-box -->
		
		<?php 

		/* After widget (defined by themes). */
		echo $after_widget;
	}



/* ==  Update Widget ==============================*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['callout_text'] = strip_tags( $new_instance['callout_text'] );
		$instance['link_text'] = strip_tags( $new_instance['link_text'] );
		$instance['url'] = strip_tags( $new_instance['url'] );

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
		'callout_text' => '',
		'link_text' => 'Sign Up Today',
		'url' => '#',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>


			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'callout_text' ); ?>"><?php _e('Description', 'engine') ?></label>
			<textarea class="widefat" rows="5" id="<?php echo $this->get_field_id( 'callout_text' ); ?>" name="<?php echo $this->get_field_name( 'callout_text' ); ?>"><?php echo $instance['callout_text']; ?></textarea>
		</p>
		
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e('Link Text', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" value="<?php echo $instance['link_text']; ?>" />
		</p>
		
		<!-- Tweettext: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('URL', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" />
		</p>
		
	<?php
	}
}


?>