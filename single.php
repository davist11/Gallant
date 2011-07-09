<?php $options = get_option('gallant_v2_theme_options'); ?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="primary-content">
		<h1><?php the_title(); ?></h1>
		
		<ul class="social">
			<li><g:plusone size="medium"></g:plusone></li>
			<li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="thegallantlife">Tweet</a></li>
			<li class="like"><fb:like href="<?php the_permalink(); ?>" send="false" layout="button_count" width="75" show_faces="false" font="arial"></fb:like></li>
			<li class="last"><?php if(function_exists('wp_email')) { email_link(); } ?></li>
		</ul>
				
		<div class="text">
			<?php the_content(); ?>
		</div>

		<?php include('_gallery.php'); ?>
	
		<div class="meta">
			<strong>Category:</strong> <?php the_category(', ') ?>
			<?php the_tags( '<strong class="spaced">Tags:</strong> ', ', ', ''); ?>
			<?php edit_post_link('Edit this entry.', '', ''); ?>
		</div>
		
		<?php if(function_exists('related_posts')) related_posts(); ?>
		
		<div class="ad ad-wide">
			<?php echo $options['ad4']; ?>
		</div>
		
		<?php comments_template(); ?>
		
	</div>
	
<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>