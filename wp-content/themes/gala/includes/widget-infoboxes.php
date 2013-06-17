<?php

/* ==  Widget ==============================*/
class DT_Infoboxes extends WP_Widget {


/* ==  Widget Setup ==============================*/

	function DT_Infoboxes() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'DT_Infoboxes', 'description' => __('A widget that displays a information in a box.', 'engine') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'dt_infobox_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'dt_infobox_widget', __('DT - Info Boxes', 'engine'), $widget_ops, $control_ops );
	}


/* ==  Display Widget ==============================*/

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Latest Tweets */
		 ?>

			<?php

			$boxes = array(

				array(
					'name' => 'box1',
					'enable' => $instance['box1'],
					'icon'  => $instance['box1_icon'],
					'title'  => $instance['box1_title'],
					'excerpt'  => $instance['box1_excerpt'],
					'link_title'  => $instance['box1_link_title'],
					'url'  => $instance['box1_link_url'],
				),

				array(
					'name' => 'box2',
					'enable' => $instance['box2'],
					'icon'  => $instance['box2_icon'],
					'title'  => $instance['box2_title'],
					'excerpt'  => $instance['box2_excerpt'],
					'link_title'  => $instance['box2_link_title'],
					'url'  => $instance['box2_link_url'],
				),

				array(
					'name' => 'box3',
					'enable' => $instance['box3'],
					'icon'  => $instance['box3_icon'],
					'title'  => $instance['box3_title'],
					'excerpt'  => $instance['box3_excerpt'],
					'link_title'  => $instance['box3_link_title'],
					'url'  => $instance['box3_link_url'],
				)

			);

			if($instance['box1'] || $instance['box2'] || $instance['box3'] ) :

			?>

			<!-- .boxes -->
			<ul class="boxes clearfix">

				<?php foreach($boxes as $box) : ?>

				<?php if($box['enable']) : ?>
				<!-- .box -->
				<li id="<?php echo $box['name']; ?>" class="box">

					<!-- .box-inner -->
					<div class="box-inner">

							<?php if($box['icon'] != '') : ?>
							<!-- .box-icon -->
							<div class="box-icon"><img src="<?php echo $box['icon']; ?>" alt="<?php echo $box['title']; ?>"/></div>
							<!-- /.box-icon -->
							<?php endif; ?>

							<?php if($box['title'] != '') : ?>
							<!-- .box-title -->
							<h3 class="box-title"><?php echo $box['title']; ?></h3>
							<!-- /.box-title -->
							<?php endif; ?>

							<?php if($box['excerpt']) : ?>
							<!-- .box-excerpt -->
							<div class="box-excerpt">
								<p><?php echo stripslashes(htmlspecialchars_decode(nl2br($box['excerpt']))); ?></p>

								<?php if($box['link_title'] != '') : ?>
								<a href="<?php echo $box['url']; ?>" class="box-link"><?php echo $box['link_title']; ?></a>
								<?php endif; ?>

							</div>
							<!-- /.box-excerpt -->
							<?php endif; ?>


					</div>
					<!-- /.box-inner -->

				</li>
				<!-- /.box -->
				<?php endif; ?>

				<?php endforeach; ?>

			</ul>

			<?php endif; ?>


		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}



/* ==  Update Widget ==============================*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['box1'] = strip_tags( $new_instance['box1'] );
		$instance['box1_icon'] = strip_tags( $new_instance['box1_icon'] );
		$instance['box1_title'] = strip_tags( $new_instance['box1_title'] );
		$instance['box1_excerpt'] = strip_tags( $new_instance['box1_excerpt'] );
		$instance['box1_link_title'] = strip_tags( $new_instance['box1_link_title'] );
		$instance['box1_link_url'] = strip_tags( $new_instance['box1_link_url'] );

		$instance['box2'] = strip_tags( $new_instance['box2'] );
		$instance['box2_icon'] = strip_tags( $new_instance['box2_icon'] );
		$instance['box2_title'] = strip_tags( $new_instance['box2_title'] );
		$instance['box2_excerpt'] = strip_tags( $new_instance['box2_excerpt'] );
		$instance['box2_link_title'] = strip_tags( $new_instance['box2_link_title'] );
		$instance['box2_link_url'] = strip_tags( $new_instance['box2_link_url'] );

		$instance['box3'] = strip_tags( $new_instance['box3'] );
		$instance['box3_icon'] = strip_tags( $new_instance['box3_icon'] );
		$instance['box3_title'] = strip_tags( $new_instance['box3_title'] );
		$instance['box3_excerpt'] = strip_tags( $new_instance['box3_excerpt'] );
		$instance['box3_link_title'] = strip_tags( $new_instance['box3_link_title'] );
		$instance['box3_link_url'] = strip_tags( $new_instance['box3_link_url'] );

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
			'box1' => 1,
			'box1_title' => __('Our Services', 'engine'),
			'box1_icon' => get_template_directory_uri() . '/images/icon-1.png',
			'box1_excerpt' => 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.',
			'box1_link_title' => __('what we do', 'engine'),
			'box1_link_url' => '#',
			'box2' => 1,
			'box2_title' => __('Analytics', 'engine'),
			'box2_icon' => get_template_directory_uri() . '/images/icon-1.png',
			'box2_excerpt' => 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.',
			'box2_link_title' => __('learn more', 'engine'),
			'box2_link_url' => '#',
			'box3' => 1,
			'box3_title' => __('The Team', 'engine'),
			'box3_icon' => get_template_directory_uri() . '/images/icon-1.png',
			'box3_excerpt' => 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.',
			'box3_link_title' => __('meet the team', 'engine'),
			'box3_link_url' => '#'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>


			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		    <input class="checkbox" class="widefat" type="checkbox" <?php checked( (bool) $instance['box1'], true ); ?> id="<?php echo $this->get_field_id( 'box1' ); ?>" name="<?php echo $this->get_field_name( 'box1' ); ?>" /><label for="<?php echo $this->get_field_id( 'box1' ); ?>"><?php _e('Enable Box 1', 'engine'); ?></label><br />

		    <input class="checkbox" class="widefat" type="checkbox" <?php checked( (bool) $instance['box2'], true ); ?> id="<?php echo $this->get_field_id( 'box2' ); ?>" name="<?php echo $this->get_field_name( 'box2' ); ?>" /><label for="<?php echo $this->get_field_id( 'box2' ); ?>"><?php _e('Enable Box 2', 'engine'); ?></label><br />

		    <input class="checkbox" class="widefat" type="checkbox" <?php checked( (bool) $instance['box3'], true ); ?> id="<?php echo $this->get_field_id( 'box3' ); ?>" name="<?php echo $this->get_field_name( 'box3' ); ?>" /><label for="<?php echo $this->get_field_id( 'box3' ); ?>"><?php _e('Enable Box 3', 'engine'); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box1_title' ); ?>"><?php _e('Box 1 Title', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box1_title' ); ?>" name="<?php echo $this->get_field_name( 'box1_title' ); ?>" value="<?php echo $instance['box1_title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box1_icon' ); ?>"><?php _e('Box 1 Icon URL', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box1_icon' ); ?>" name="<?php echo $this->get_field_name( 'box1_icon' ); ?>" value="<?php echo $instance['box1_icon']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box1_excerpt' ); ?>"><?php _e('Box 1 Excerpt', 'engine') ?>:</label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id( 'box1_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'box1_excerpt' ); ?>"><?php echo $instance['box1_excerpt']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box1_link_title' ); ?>"><?php _e('Box 1 Link Text', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box1_link_title' ); ?>" name="<?php echo $this->get_field_name( 'box1_link_title' ); ?>" value="<?php echo $instance['box1_link_title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box1_link_url' ); ?>"><?php _e('Box 1 Link', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box1_link_url' ); ?>" name="<?php echo $this->get_field_name( 'box1_link_url' ); ?>" value="<?php echo $instance['box1_link_url']; ?>" />
		</p>

<hr style="border:0;margin:12px 0;height:2px;background:#DFDFDF;" />

		<p>
			<label for="<?php echo $this->get_field_id( 'box2_title' ); ?>"><?php _e('Box 2 Title', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box2_title' ); ?>" name="<?php echo $this->get_field_name( 'box2_title' ); ?>" value="<?php echo $instance['box2_title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box2_icon' ); ?>"><?php _e('Box 2 Icon URL', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box2_icon' ); ?>" name="<?php echo $this->get_field_name( 'box2_icon' ); ?>" value="<?php echo $instance['box2_icon']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box2_excerpt' ); ?>"><?php _e('Box 2 Excerpt', 'engine') ?>:</label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id( 'box2_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'box2_excerpt' ); ?>"><?php echo $instance['box2_excerpt']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box2_link_title' ); ?>"><?php _e('Box 2 Link Text', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box2_link_title' ); ?>" name="<?php echo $this->get_field_name( 'box2_link_title' ); ?>" value="<?php echo $instance['box2_link_title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box2_link_url' ); ?>"><?php _e('Box 2 Link', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box2_link_url' ); ?>" name="<?php echo $this->get_field_name( 'box2_link_url' ); ?>" value="<?php echo $instance['box2_link_url']; ?>" />
		</p>

<hr style="border:0;margin:12px 0;height:2px;background:#DFDFDF;" />

		<p>
			<label for="<?php echo $this->get_field_id( 'box3_title' ); ?>"><?php _e('Box 3 Title', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box3_title' ); ?>" name="<?php echo $this->get_field_name( 'box3_title' ); ?>" value="<?php echo $instance['box3_title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box3_icon' ); ?>"><?php _e('Box 3 Icon URL', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box3_icon' ); ?>" name="<?php echo $this->get_field_name( 'box3_icon' ); ?>" value="<?php echo $instance['box3_icon']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box3_excerpt' ); ?>"><?php _e('Box 3 Excerpt', 'engine') ?>:</label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id( 'box3_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'box3_excerpt' ); ?>"><?php echo $instance['box3_excerpt']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box3_link_title' ); ?>"><?php _e('Box 3 Link Text', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box3_link_title' ); ?>" name="<?php echo $this->get_field_name( 'box3_link_title' ); ?>" value="<?php echo $instance['box3_link_title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box3_link_url' ); ?>"><?php _e('Box 3 Link', 'engine') ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'box3_link_url' ); ?>" name="<?php echo $this->get_field_name( 'box3_link_url' ); ?>" value="<?php echo $instance['box3_link_url']; ?>" />
		</p>

	<?php
	}
}


?>