<?php $options = get_option('gallant_v2_theme_options'); ?>

<div class="secondary-content">
	<div class="section ad">
		<?php echo $options['ad1']; ?>
	</div>
	
	<div class="section">
		<h3>Stay Connected</h3>
		<div class="content">
			<ul class="connect">
				<li><a href="http://www.facebook.com/thegallantlife" class="alt facebook">Facebook</a></li>
				<li><a href="http://twitter.com/thegallantlife" class="alt twitter">Twitter</a></li>
				<li><a href="http://feeds.feedburner.com/TheGallant" class="alt rss">RSS</a></li>
				<li><a href="#" class="alt vimeo">Vimeo</a></li>
				<li><a href="#" class="alt youtube">YouTube</a></li>
				<li><a href="#" class="alt fancy">Fancy</a></li>
			</ul>
		</div>
	</div>

	<div class="section">
		<div class="like-box">
			<fb:like-box href="http://www.facebook.com/thegallantlife" width="300" colorscheme="dark" show_faces="true" border_color="#000000" stream="false" header="false"></fb:like-box>
		</div>
	</div>
	
	<div class="section">
		<div class="tab-container">
			<ul class="nav-tabs">
				<li class="current"><a href="#">Headlines</a></li>
				<?php if (function_exists('akpc_most_popular_in_last_days')) : ?>
					<li><a href="#popular">Most Popular</a></li>
				<?php endif; ?>
				<li class="last"><a href="#">Tags</a></li>
			</ul>
			<div class="tabs">
				<div class="tab content current">
					<ul>
						<?php 
							$headlines = get_posts('showposts=8&cat=11'); 
							foreach( $headlines as $post ) : 
						?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php
							endforeach;
						?>
					</ul>
				</div>
				
				<?php if (function_exists('akpc_most_popular_in_last_days')) : ?>
					<div class="tab content hide">
						<ul>
							<?php akpc_most_popular_in_last_days($limit = 8, $before = '<li>', $after = '</li>', $days = 7); ?>
						</ul>
					</div>
				<?php endif; ?>
				
				<div class="tab content hide">
					<?php wp_tag_cloud('unit=px&smallest=12&largest=12&format=flat'); ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section ad">
		<?php echo $options['ad2']; ?>
	</div>
	
	<div class="section ad">
		<a href="mailto:info@thegallant.com"><img src="<?php bloginfo('template_directory'); ?>/images/content/ad-write-for-us.png" alt="Want to write for us" height="250" width="300" /></a>
	</div>
	
	<div class="section ad">
		<?php echo $options['ad3']; ?>
	</div>
	
	<div class="section ad">
		If finding large sizes in men&rsquo;s fashions is difficult, then online shopping for <a href="http://www.kingsizedirect.com/" class="inline">cheap big and tall mens clothing</a> is a convenient solution.
	</div>
</div>
