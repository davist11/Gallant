		</div>
	</div>

	<div id="footer">
		<div class="container">
			<ul>
				<li><a href="/advertise/">Advertise</a></li>
				<li><a href="/map/">Site Map</a></li>
				<li><a href="/privacy-policy/">Privacy Policy</a></li>
			</ul>
		</div>
	</div>

	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.colorbox.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/global.js"></script>
	<?php if(is_single()): ?>
		<script src="https://apis.google.com/js/plusone.js"></script>
		<script src="http://platform.twitter.com/widgets.js"></script>
		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
	<?php endif; ?>
</body>
</html>
