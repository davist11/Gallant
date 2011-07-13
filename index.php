<?php $options = get_option('gallant_v2_theme_options'); ?>
<?php get_header(); ?>

<div class="primary-content">
	<?php
		$excludeFeature = '';
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts('showposts=4&cat=7&meta_key=featured_image');
	?>
	<?php if (have_posts()) : ?>
		<div class="feature">
			<ul class="slides">
				<?php $count = 0; ?>
				<?php while (have_posts()) : the_post(); ?>
					
					<?php
						$excludeFeature .= $post->ID . ',';
						$featured_image = get_post_meta($post->ID, 'featured_image', true);
						$count++;
					?>
					
					<?php if($featured_image): ?>
						<li<?php if($count == 1) echo ' class="current"'; ?>><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $featured_image; ?>&amp;h=374&amp;w=830&amp;zc=1" alt="<?php the_title(); ?>" height="374" width="830" /></a></li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>
			<ul class="pager">
				<li class="current"><a href="#1" class="alt">1</a></li>
				<li><a href="#2" class="alt">2</a></li>
				<li><a href="#3" class="alt">3</a></li>
				<li class="last"><a href="#4" class="alt">4</a></li>
			</ul>
		</div>
	<?php endif; ?>
	
	<?php 
		if($paged === 1) {
			query_posts(array(
				'post__not_in' => explode(',', (rtrim($excludeFeature,','))),
				'cat' => '-6',
				'showposts' => '12',
				'paged' => $paged
			));
		} else {
			query_posts(array(
				'cat' => '-6',
				'showposts' => '12',
				'paged' => $paged
			));
		}
	?>
	<?php if (have_posts()) : ?>
		<?php include('_entries.php'); ?>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	<?php endif; ?>

	<div class="ad">
		<?php echo $options['ad4']; ?>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>