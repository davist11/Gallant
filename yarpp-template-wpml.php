<?php /*
Example template for use with WPML (WP Multilingual, http://wpml.org)
Author: mitcho (Michael Yoshitaka Erlewine)
*/ 

if (function_exists("icl_register_string")) {
  icl_register_string("Yet Another Related Posts Plugin","related posts header","Related Posts");
  icl_register_string("Yet Another Related Posts Plugin","no related posts message","No related posts.");
}
?>

<?php if ($related_query->have_posts()):?>
<h2>Related Stories:</h2>
<ul class="related">
	<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
		<li>
			<a href="<?php the_permalink() ?>">
				<?php $post_image = get_post_meta($post->ID, 'post_image', true); ?>
				<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $post_image; ?>&amp;h=98&amp;w=151&amp;zc=1" alt="" height="98" width="151" />
				<span class="hover">
					<span class="title"><?php the_title(); ?></span>
				</span>
			</a>
		</li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>
