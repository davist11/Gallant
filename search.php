<?php get_header(); ?>

<div class="primary-content">
	<?php if (have_posts()) : ?>
		<?php include('_entries.php'); ?>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	<?php endif; ?>
	
	<div class="ad">
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/content/ad-wide.jpg" alt="AD" height="90" width="728" /></a>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>