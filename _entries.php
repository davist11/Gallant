<ul class="entries">
	<?php while (have_posts()) : the_post(); ?>
		<?php $post_image = get_post_meta($post->ID, 'post_image', true); ?>
		<li class="entry">
			<?php if($post_image): ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $post_image; ?>&amp;h=169&amp;w=242&amp;zc=1" alt="<?php the_title(); ?>" height="169" width="242" /></a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="content">
				<?php the_excerpt(); ?>
			</div>
			<div class="footer">
				<?php 
					$shareLink = urlencode(get_permalink());
					$shareTitle = urlencode(the_title( '', '', FALSE));
				?>
				<ul class="meta">
					<li><a href="<?php comments_link(); ?>" class="comments"><?php comments_number('0','1','%'); ?></a></li>
					<li><a href="http://www.facebook.com/share.php?u=<?=$shareLink;?>&amp;t=<?=$shareTitle;?>" class="alt facebook" rel="nofollow">Facebook</a></li>
					<li><a href="http://twitter.com/?status=From+The+Gallant:+<?=$shareTitle;?>+<?=$shareLink;?>" class="alt twitter" rel="nofollow">Twitter</a></li>
					<li><?php if(function_exists('wp_email')) { email_link(); } ?></li>
				</ul>
				<a href="<?php the_permalink(); ?>" class="button more">Read More</a>
			</div>
		</li>
	<?php endwhile; ?>
</ul>