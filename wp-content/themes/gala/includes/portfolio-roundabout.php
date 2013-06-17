<!-- .portfolio-nav clearfix -->
<div class="portfolio-nav clearfix">
	<div class="prev"><?php previous_post_link('<span class="arrow"></span> %link'); ?></div>
	<div class="next"><?php next_post_link('<span class="arrow"></span> %link'); ?></div>
</div>
<!-- /.portfolio-nav clearfix -->

<?php

global $wp_embed;
$video_url = get_post_meta(get_the_ID(), 'dt_video', true);
$video_embed = $wp_embed->run_shortcode('[embed width="980"]'.$video_url.'[/embed]');
$id = get_the_ID();

if($video_url == '') :

$args = array(
	'orderby'		 => 'menu_order',
	'post_type'      => 'attachment',
	'post_parent'    => get_the_ID(),
	'post_mime_type' => 'image',
	'post_status'    => null,
	'numberposts'    => -1,
);

$attachments = get_posts($args);

$count = count($attachments);

?>

<?php if ($attachments) : ?>

<?php 

$duration = get_option('dt_roundabout_duration');

if($duration == '')
	$duration = '0';

?>

<!-- #roundabout-wrap -->
<div id="roundabout-wrap" class="clearfix" data-duration="<?php echo $duration; ?>">
	
	<ul <?php if($count > 1) : ?>class="roundabout"<?php endif; ?>>
	
		<?php foreach ($attachments as $attachment) : ?>
		
		<?php
        	$src = wp_get_attachment_image_src( $attachment->ID, array( '9999','9999' ), false, '' );
			$src = $src[0];
			if($count == 1) { 
				$image = dt_resize($attachment->ID, $src, 980, '', true);
			} else {
				$image = dt_resize($attachment->ID, $src, 700, 500, true);
			}
         ?>

		<li>
			<img height="<?php echo $image['height']; ?>" width="<?php echo $image['width']; ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $image['url']; ?>" />
		</li>
		<?php endforeach; ?>
		
	</ul>

</div>
<!-- /#roundabout-wrap -->

<?php endif; ?>

<?php else: ?>

<div class="dt-video"><?php echo $video_embed; ?></div>

<?php endif; ?>