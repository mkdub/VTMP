
<?php if(!is_page_template('template-home.php')) : ?>

<!-- #header-title-wrap -->
<div id="header-title-wrap">
	
	<?php

		// Get author data
		if(get_query_var('author_name')) :
			$curauth = get_userdatabylogin(get_query_var('author_name'));
		else :
			$curauth = get_userdata(get_query_var('author'));
		endif;
		
		?>
		
		<?php if(!is_404()) {$post = $posts[0];} // Hack. Set $post so that the_date() works. ?>
		
		<?php if (is_category()) : ?>
		<h1 class="page-title"><?php printf(__('All posts in %s', 'engine'), single_cat_title('',false)); ?></h1>
		
		<?php elseif( is_tag() ) : ?>
		<h1 class="page-title"><?php printf(__('All posts tagged %s', 'engine'), single_tag_title('',false)); ?></h1>
		
		<?php elseif (is_day()) : ?>
		<h1 class="page-title"><?php _e('Archive for', 'engine') ?> <?php the_time('F jS, Y'); ?></h1>
		
		<?php elseif (is_month()) : ?>
		<h1 class="page-title"><?php _e('Archive for', 'engine') ?> <?php the_time('F, Y'); ?></h1>
		
		<?php elseif (is_year()) : ?>
		<h1 class="page-title"><?php _e('Archive for', 'engine') ?> <?php the_time('Y'); ?></h1>
		
		<?php elseif (is_author()) : ?>
		<h1 class="page-title"><?php _e('All posts by', 'engine') ?> <?php echo $curauth->display_name; ?></h1>
		
		<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
		<h1 class="page-title"><?php _e('Blog Archives', 'engine') ?></h1>
		
		<?php elseif (is_search()) : ?>
		<h1 class="page-title"><?php _e('Search Results:', 'engine') ?> <?php echo $_GET['s']; ?></h1>
		
		<?php elseif (is_page()) : ?>
		<h1 class="page-title"><?php the_title() ?></h1>
		
		<?php elseif(is_single() && get_post_type() == 'post') : ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="meta-published"><span class="month"><?php the_time( 'M' ); ?></span><span class="day"><?php the_time( 'd' ); ?></span></div>
		
		<?php elseif(is_single() && get_post_type() == 'portfolio') : ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<?php elseif(is_404()) : ?>
		<h1 class="page-title"><?php _e('Sorry, we can\'t find what you\'re looking for!', 'engine'); ?></h1>
		
		<?php elseif (is_tax()) : ?>
		
		<?php
		$term_id = get_query_var('term');
		$groups = get_term_by('slug', $term_id, 'group');
		?>
		
		<h1 class="page-title"><?php echo $groups->name; ?></h1>
		
		<?php elseif(is_home()) : ?>
		
		<?php $posts_page = get_option('page_for_posts'); ?>
		
		<h1 class="page-title"><?php echo get_the_title($posts_page) ?></h1>
		
		<?php endif; ?>
		

</div>
<!-- /#header-title-wrap -->

<?php if(is_single() && get_post_type() == 'post') :?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!--BEGIN .post-meta .post-header-->
<div class="post-meta post-header">

	<span class="meta-author"><?php the_author_posts_link(); ?></span>
	<span class="meta-categories"><?php the_category(', ') ?></span>
	<span class="meta-comment"><?php comments_popup_link(__('No Comments', 'engine'), __('1 Comment', 'engine'), __('% Comments', 'engine')); ?> </span>

<!--END .post-meta post-header -->
</div>
<?php endwhile; endif; ?>

<?php endif; ?>

<?php endif; ?>