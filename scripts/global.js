var GALLANT = GALLANT || {};

// Equal height items
(function($) {
	$.fn.equalHeight = function(options) {
		var opts = $.extend({}, $.fn.equalHeight.defaults, options);

		return this.each(function() {
			var $this = $(this),
			    o = $.meta ? $.extend({}, opts, $this.data()) : opts,
			    maxHeight = 0;
 
			$this.find(o.find).each(function() {
		    	var elemHeight = $(this).height();
		  		maxHeight = (elemHeight > maxHeight) ? elemHeight : maxHeight;
			}).height(maxHeight);
		});
	};

	// default options
	$.fn.equalHeight.defaults = {
		find: 'li'
	};
})(jQuery);

// Tabs
(function($) {
	$.fn.tabs = function(options) {
		
		var tabs = {
			handleClick: function(e) {
				var $this = $(this),
					$parent = $this.parent(),
					tabNum = $parent.prevAll().length;

				if(!$parent.hasClass('current')) {
					tabs.$tabNav.find('.current').removeClass('current');
					$parent.addClass('current');
					
					tabs.$tabs.find('.current').slideUp(500, function() {
						tabs.$tabs.find('.tab').eq(tabNum).slideDown(500, function() {
							$(this).addClass('current');
						});
					}).removeClass('current');;
					
				}

				e.preventDefault();
			},
			init: function() {
				var $this = $(this);
				
				tabs.$tabNav = $this.find('.nav-tabs');
				tabs.$tabs = $this.find('.tabs');

				tabs.$tabNav.find('a').bind('click', tabs.handleClick);
			}
		};
		
		return this.each(tabs.init);
	};
	
})(jQuery);

//Homepage feature area
GALLANT.feature = {
	
	autoRotate: function() {
		var $next = GALLANT.feature.$pager.find('.current').next();
	    if($next.length !== 0) {
	    	$next.children('a').trigger('click');
	    } else {
	    	GALLANT.feature.$pager.find('li:first-child a').trigger('click');
	    }	
	},
	
	change: function(e) {
		
		var $this = $(this),
			$parent = $this.parent(),
			slideNum = $parent.prevAll().length;
		
		if(!$parent.hasClass('current')) {
			//Change the selected element
			GALLANT.feature.$pager.find('.current').removeClass('current');
			$parent.addClass('current');
			
			//Deal with the old image
			GALLANT.feature.$slides.find('.current').animate({
				left: '-50px',
				opacity: 0
			}, 500, function() {
				$(this).css({
					display: 'none',
					left: '50px'
				}).removeClass('current');
			});
			
			//Deal with the new image
			GALLANT.feature.$slides.find('li').eq(slideNum).css('display', 'block').animate({
				left: 0,
				opacity: 1
			}, 500, function() {
				$(this).addClass('current');
			});
		}
		
		e.preventDefault();
	},
	
	init: function() {
		GALLANT.feature.$base = $('div.feature');
		GALLANT.feature.$slides = GALLANT.feature.$base.find('.slides');
		GALLANT.feature.$pager = GALLANT.feature.$base.find('.pager');
		
		GALLANT.feature.$pager.find('a').bind('click', GALLANT.feature.change);
		
		//Start auto rotate
		GALLANT.feature.startRotate();
		
		//Don't auto rotate if you are hovering in the area
		GALLANT.feature.$base.bind({
			mouseenter: GALLANT.feature.stopRotate,
			mouseleave: GALLANT.feature.startRotate
		});
	},
	
	startRotate: function() {
		GALLANT.feature.timer = setInterval(GALLANT.feature.autoRotate, 5000);
	},
	
	stopRotate: function() {
		clearInterval(GALLANT.feature.timer);
	}

};

GALLANT.gallery = {
	init: function() {
		
    	if($('body.individual-entry').length) {
			var $content = $('#content'),
				firstImg = $content.find('div.text img:first').attr('src'),
				$gallery = $content.find('.gallery'),
				$firstImgInGallery = $gallery.find('a[href="'+firstImg+'"]');

			if($firstImgInGallery.length) {
				$firstImgInGallery.parent().remove();
			}
			
			$("a[rel*='lightbox']").colorbox();
		}
	}
};

GALLANT.init = function() {
	$('.entries').equalHeight({
		find: 'li.entry'
	});

	if($('.feature').length) {
		GALLANT.feature.init();
	}
	
	$('div.tab-container').tabs();
	
	GALLANT.gallery.init();
};

$(document).ready(GALLANT.init);