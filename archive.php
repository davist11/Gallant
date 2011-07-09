<?php $options = get_option('gallant_v2_theme_options'); ?>
<?php get_header(); ?>

<div class="primary-content">
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