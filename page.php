<?php get_header(); ?>

<div class="primary-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		
		<div class="text">
			<?php the_content(); ?>
			
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
		
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	<?php endwhile; endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>