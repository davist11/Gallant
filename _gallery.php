<?php
	 
$post_image = get_post_meta($post->ID, 'post_image', true);
$featured_image = get_post_meta($post->ID, 'featured_image', true);
$args = array(
	'post_type' => 'attachment',
	'numberposts' => -1,
	'post_parent' => $post->ID
	);
$attachments = get_posts($args);

if (count($attachments) > 2): ?>
	<ul class="gallery">
	<?php
		foreach ($attachments as $attachment) {

			$thumb = wp_get_attachment_image_src($attachment->ID);
			$fullSize = wp_get_attachment_url($attachment->ID);
			
			if($thumb && ($fullSize !== $post_image) && ($fullSize !== $featured_image)) {
	?>
				<li><a href="<?=$fullSize; ?>" rel="lightbox" title="<?=$attachment->post_title; ?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $thumb[0]; ?>&amp;h=90&amp;w=143&amp;zc=1" alt="" height="90" width="143" /></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
	
<?php endif; ?>


