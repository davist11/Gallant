<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie ie6 lte8 lte7" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]--> 
<!--[if IE 7]><html class="no-js ie ie7 lte8 lte7" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]--> 
<!--[if IE 8]><html class="no-js ie ie8 lte8" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]--> 
<!--[if !IE]><!--><html class="no-js" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/"><!--<![endif]-->
<html> 
<head>
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> | Online magazine for
	men&rsquo;s fashion, sneakers, music, technology, streetwear.</title>
	<meta charset="utf-8" />
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" media="screen,projection" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="The Gallant &raquo; Feed" href="hhttp://feeds.feedburner.com/TheGallant" />
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
	<?php remove_action('wp_print_styles', 'pagenavi_stylesheets'); ?>
	<?php remove_action('wp_head', 'feed_links_extra', 3); remove_action( 'wp_head', 'feed_links', 2 ); ?>
</head>
<body<?php if(is_page() || is_single()) echo ' class="individual-entry"'; ?>>
	<div id="fb-root"></div>
	<ul class="screen-reader">
		<li><a href="#content">Skip to Content</a></li>
		<li><a href="#nav">Skip to Navigation</a></li>
	</ul>
	
	<div id="header">
		<div class="container">
			<?php if(is_front_page()) : ?>
				<h1 id="logo" class="alt">The Gallant</h1>
			<?php else : ?>
				<a href="/" id="logo" class="alt">The Gallant</a>
			<?php endif; ?>
			
			<form action="/" method="get" class="search">
				<label for="s" class="screen-reader">Keywords</label>
				<input type="text" name="s" id="s" />
				<button type="submit">Search</button>
			</form>
			
			<ul id="nav">
				<li><a href="/category/fashion/">Fashion</a></li>
				<li><a href="/category/music/">Music</a></li>
				<li><a href="/category/tech/">Tech</a></li>
				<li><a href="/category/etcetera/">Etcetera</a></li>
				<li><a href="/category/featured/">Features</a></li>
				<li><a href="/about/">About</a></li>
				<li><a href="/contact/">Contact</a></li>
			</ul>
		</div>
	</div>

	<div id="content">
		<div class="container">