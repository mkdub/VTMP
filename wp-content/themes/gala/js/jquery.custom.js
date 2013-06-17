/*-----------------------------------------------------------------------------------

 	Custom JS - All custom front-end jQuery
 
-----------------------------------------------------------------------------------*/
 

/*-----------------------------------------------------------------------------------*/
/*	Let's dance
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {

	if(window.location=='http://vancouvertourismplan.org/survey/'){
	if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
		location.replace("https://www.surveymonkey.com/s/PG9GKWF");
		}
	}
/*-----------------------------------------------------------------------------------*/
/*	Responsive Menu
/*-----------------------------------------------------------------------------------*/

	jQuery('#menu-button').click(function() {
		
		jQuery('#primary-menu select').css('display', 'inline-block');
		jQuery(this).css('display', 'none');
		
	});
	
	jQuery(window).resize(function() {
		
		if(jQuery(this).width() >= 980) {
		
			jQuery('#primary-menu select').css('display', 'none');
			jQuery('#menu-button').css('display', 'none');
						
		} else if(jQuery(this).width() <= 980) {
			
			jQuery('#primary-menu select').css('display', 'none');
			jQuery('#menu-button').css('display', 'inline-block');
			
		} 
		
	});
	
	
/*-----------------------------------------------------------------------------------*/
/*	Responsive Filter
/*-----------------------------------------------------------------------------------*/
	
	if(jQuery(window).width() < 641) {
	
		function dt_open_drop() {
				
			jQuery('#filter .drop').fadeIn(200);
		
		}	
		
		function dt_close_drop() {
		
			jQuery('#filter .drop').fadeOut(200);
			
		}
		
		function is_closed() {
			
			if(jQuery('#filter .drop').css('display') == 'none') {
				return true;
			} else {
				return false;
			}
		}
		
		jQuery('#filter #all').click(function() {
			
			if(is_closed() == true) {
			
				dt_open_drop();
				
			} else {
			
				dt_close_drop();
				
			}
			
			jQuery('#filter #all a').not('#all li a').html('All<span class="arrow"></span>');
		
		});
	
		jQuery('#filter li li').click(function() {
				
			dt_close_drop();
			
			$link = jQuery(this).find('a');
			
			jQuery('#filter #all a').not('#all li a').html($link.html());
		
		});
	
	}

/*-----------------------------------------------------------------------------------*/
/*	Responsive Sidebar
/*-----------------------------------------------------------------------------------*/

	jQuery('.handle').toggle(function() {
		
		jQuery.scrollTo('#sidebar', 800);
		
		jQuery('#sidebar').stop().animate({
			right: 0
		}, 400, 'easeInOutQuart');
		
		return false;
		
	}, function() {
		
		jQuery('#sidebar').stop().animate({
			right: -370
		}, 400, 'easeInOutQuart');
		
		return false;
	
	});


/*-----------------------------------------------------------------------------------*/
/*	FancyBox
/*-----------------------------------------------------------------------------------*/
	
	function dt_lightbox() {
		
		if(jQuery().fancybox) {
		
			jQuery(".gallery a").fancybox({
				autoScale	: true,
				centerOnScroll: true
			});
			
		}
	
	}
	
	dt_lightbox();


/*-----------------------------------------------------------------------------------*/
/*	Sliders
/*-----------------------------------------------------------------------------------*/

	if(jQuery().slides) {
		
		$postWrap = jQuery('.gecko .home-slider .post-wrap, .ie .home-slider .post-wrap');
		$featuredImage = jQuery('.gecko .home-slider .featured-image, .ie .home-slider .featured-image');
	
		$postWrap.css({
			left: -900
		});
		
		$featuredImage.css({
			bottom: -900
		});
		
		$postWrap.animate({
			left: 0
		}, 1000);
		
		$featuredImage.animate({
			bottom: 0
		}, 800);
	
		$sliderNav = jQuery('.home-slider .slider-nav');
		
		jQuery('.header-wrap').hover( function() {
			$sliderNav.fadeIn(200);
		}, function() {
			$sliderNav.delay(400).fadeOut(200);
		});
		
		jQuery('.testimonial-slider').slides({
			effect: 'fade',
			crossfade: false,
			generatePagination: false,
			autoHeight: true,
			fadeSpeed: 200
		});
		
		jQuery('.content-slider').slides({
			effect: 'fade',
			crossfade: false,
			generatePagination: false,
			autoHeight: true,
			fadeSpeed: 200,
			start: parseInt(jQuery('.content-slider').attr('data-active'))
		});
		
		jQuery('.home-slider .slide:first-child img').imagesLoaded( function(){
		
			jQuery('.home-slider').slides({
				effect: 'fade',
				crossfade: false,
				generatePagination: true,
				autoHeight: true,
				fadeSpeed: 200,
				preload: false,
				play: parseInt(jQuery('.home-slider').attr('data-autoplay')),
				preloadImage: jQuery('#ajax-loader').attr('data-url'),
				animationStart: function() {
				
					$postWrap.css({
						left: -900
					});
					
					$featuredImage.css({
						bottom: -900
					});
					
				},
				animationComplete: function() {
					
					$postWrap.animate({
						left: 0
					}, 1000);
					
					$featuredImage.animate({
						bottom: 0
					}, 800);
					
				}
			});
			
		});
		
		jQuery('.portfolio-tabs').slides({
			effect: 'fade',
			crossfade: false,
			generatePagination: false,
			autoHeight: true,
			fadeSpeed: 100,
			preload: false
		});


	}


/*-----------------------------------------------------------------------------------*/
/*	Portfolio Filtering
/*-----------------------------------------------------------------------------------*/
	
	if(jQuery().isotope) {
		
		$container = jQuery('#masonry');
		
		$container.imagesLoaded( function(){
		
	  		$container.isotope({
	  	    	itemSelector : '.item',
	  			getSortData: {
	
		  			order: function($elem) {
		  				return parseInt($elem.attr('data-order'));
		  			}
	
	  			},
	  			sortBy: 'order'
	  	    });
  	    
  	    });

  	    // filter items when filter link is clicked
		jQuery('#filter li').click(function(){

			jQuery('#filter li').removeClass('current');
			jQuery(this).addClass('current');

			var selector = jQuery(this).find('a').attr('data-filter');

			$container.isotope({ filter: selector });

	        return false;

		});


  	}


/*-----------------------------------------------------------------------------------*/
/*	Roundabout
/*-----------------------------------------------------------------------------------*/  	
  	
  	if(jQuery().roundabout) {
  	
  		$duration = parseInt(jQuery('#roundabout-wrap').attr('data-duration'));
  		//console.log($duration);
  		
  		if($duration == 0) {
			
			jQuery('.roundabout').roundabout({
		  		minOpacity: 1
		  	});
	  	
  		} else {
  			
  			jQuery('.roundabout').roundabout({
		  		minOpacity: 1,
		  		autoplay: true,
		  		autoplayDuration: $duration,
		  		autoplayPauseOnHover: true
		  	});
  		
  		}


  	}


/*-----------------------------------------------------------------------------------*/
/*	Extras
/*-----------------------------------------------------------------------------------*/
	
	jQuery(".tabber ul.tabs").tabs(".tabber div.panes > div", {
		effect: 'fade'
	});
	
	jQuery(".accordion").tabs(".accordion div.pane", {
		tabs: '.trigger', effect: 'slide', initialIndex: null
	});

	jQuery('.toggle .trigger').bind('click', function() {
		var maketoggle = jQuery(this).parent('.toggle').find('.pane');
		jQuery(maketoggle).slideToggle();
		jQuery(this).toggleClass('open');
		return false;
	});
	
	jQuery('<div class="clear">&nbsp;</div>').insertAfter('.column-last');


/*-----------------------------------------------------------------------------------*/
/*	Superfish Settings - http://users.tpg.com.au/j_birch/plugins/superfish/
/*-----------------------------------------------------------------------------------*/

	jQuery('#primary-menu ul').superfish({
		delay: 500,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		autoArrows: false,
		dropShadows: false
	});
	
	jQuery("#primary-menu ul ul").each(
	function (i) { // Preserves the mouse-over on top-level menu elements when hovering over children
	    jQuery(this).hover(
	    function () {
	        jQuery(this).parent().find("a").slice(0, 1).addClass("active");
	    }, function () {
	        jQuery(this).parent().find("a").slice(0, 1).removeClass("active");
	    });
	    var parent = jQuery(this).parent().outerWidth();
		var diff = 150 - parent;
		jQuery(this).css({
			width: '150px',
			marginLeft: -diff / 2
		});
	});


/*-----------------------------------------------------------------------------------*/
/*	Smooth scroll for anchor links
/*-----------------------------------------------------------------------------------*/

	jQuery('a[href*=#]').click(function () {
	    if (location.pathname.replace(/#/, '') == this.pathname.replace(/#/, '') && location.hostname == this.hostname) {
	        var $target = jQuery(this.hash);
	        jQuerytarget = $target.length && $target || jQuery('[name=' + this.hash.slice(1) + ']');
	        if ($target.length) {
	            var targetOffset = $target.offset().top;
	            jQuery('html,body').animate({
	                scrollTop: targetOffset
	            }, 700);
	            return false;
	        }
	    }
	});


/*-----------------------------------------------------------------------------------*/
/*	Show #backtotop link after scrollTop length
/*-----------------------------------------------------------------------------------*/

	jQuery(window).bind('scroll', function(){
		jQuery('#backtotop').toggle(jQuery(this).scrollTop() > 200);
	});


/*-----------------------------------------------------------------------------------*/
/*	Sidebar tabber widget
/*-----------------------------------------------------------------------------------*/

	var list = '<ul class="tabs clearfix">';
	jQuery('#sidebar-tabs.tabber').find('h3.widget-title').each(function () {
	    var the_title = jQuery(this).html();
	    list += '<li><a href="#">' + the_title + '</a></li>';
	});
	list += '</ul>';
	jQuery('#sidebar-tabs.tabber').prepend(list);
	jQuery("#sidebar-tabs.tabber .tabs").tabs("#sidebar-tabs.tabber .widget", { // requires jquerytools.js
	    //effect: 'fade'
	});
	jQuery('#sidebar-tabs.tabber .widget').addClass('panes');
	jQuery('#sidebar-tabs.tabber .widget-inside').addClass('pane');


/*-----------------------------------------------------------------------------------*/
/*	Randomizer
/*-----------------------------------------------------------------------------------*/

    jQuery.fn.randomize = function (childElem) {
        return this.each(function () {
            var jQuerythis = jQuery(this);
            var elems = jQuerythis.find(childElem);
            elems.sort(function () {
                return (Math.round(Math.random()) - 0.5);
            });
            jQuerythis.remove(childElem);
            for (var i = 0; i < elems.length; i++)
            jQuerythis.append(elems[i]);
        });
    }
    
    //RANDOMIZE (ADS)
	jQuery(".ads-inside.random").randomize("a");


/*-----------------------------------------------------------------------------------*/
/*	Contact Form
/*-----------------------------------------------------------------------------------*/
    
	jQuery.fn.exists = function () { // Check if element exists
	    return jQuery(this).length;
	}
	jQuery('.dt-contactform').submit(function () {
	    var cf = jQuery(this);
	    cf.prev('.alert').slideUp(400, function () {
	        cf.prev('.alert').hide();
	        jQuery.post(ajaxurl, {
	            name: cf.find('.dt-name').val(),
	            email: cf.find('.dt-email').val(),
	            subject: cf.find('.dt-subject').val(),
	            comments: cf.find('.dt-comments').val(),
	            verify: cf.find('.dt-verify').val(),
	            action: 'dt_contact_form'
	        }, function (data) {
	            cf.prev('.alert').html(data);
	            cf.prev('.alert').slideDown('slow');
	            cf.find('img.loader').fadeOut('slow', function () {
	                jQuery(this).remove()
	            });
	            if (data.match('success') != null) cf.slideUp('slow');
	        });
	    });
	    return false;
	});


/*-----------------------------------------------------------------------------------*/
/*	Overlay Settings
/*-----------------------------------------------------------------------------------*/
	
	function dt_image_hovers(){
	
		jQuery('.featured-image a').hover( function() {
		
			jQuery(this).find('img').stop().animate({
				opacity: 0.8
			}, 160);
			
		}, function() {
		
			jQuery(this).find('img').stop().animate({
				opacity: 1
			}, 160);
		
		});


	}	
	
	dt_image_hovers();


/*-----------------------------------------------------------------------------------*/
/*	FitVids
/*-----------------------------------------------------------------------------------*/

	jQuery(".hentry, #header").fitVids();
	
	
/*-----------------------------------------------------------------------------------*/
/*	Plugins
/*-----------------------------------------------------------------------------------*/	

(function ($) {
// VERTICALLY ALIGN FUNCTION
$.fn.vAlign = function() {
	return this.each(function(i){
	var ah = $(this).height();
	var ph = $(this).parent().height();
	var mh = Math.ceil((ph-ah) / 2);
	$(this).css('margin-top', mh);
	});
};
})(jQuery);
	
/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);



/*-----------------------------------------------------------------------------------*/
/*	Demo Style Switchers
/*-----------------------------------------------------------------------------------*/

	jQuery('.light-link').click( function() {
		jQuery('body').removeClass('dark-skin');
		jQuery('body').addClass('light-skin');
		
		jQuery('head').append('<link rel="stylesheet" href="http://demo.designerthemes.com/gala/wp-content/themes/gala/skins.css" type="text/css" />');
		
		jQuery('#logo img').attr('src', 'http://demo.designerthemes.com/gala/wp-content/themes/gala/images/logo.png');
		jQuery('#footer-widgets img').attr('src', 'http://demo.designerthemes.com/gala/wp-content/themes/gala/images/logo-footer.png');
		return false;
	});
	
	jQuery('.dark-link').click( function() {
		jQuery('body').removeClass('light-skin');
		jQuery('body').removeClass('blank-skin');
		jQuery('body').addClass('dark-skin');
		
		jQuery('head').append('<link rel="stylesheet" href="http://demo.designerthemes.com/gala/wp-content/themes/gala/skins.css" type="text/css" />');
		
		jQuery('#logo img').attr('src', 'http://demo.designerthemes.com/gala/wp-content/themes/gala/images/logo-dark.png');
		jQuery('#footer-widgets img').attr('src', 'http://demo.designerthemes.com/gala/wp-content/themes/gala/images/logo-footer-dark.png');
		return false;
	});
	
	jQuery('.minimal-link').click( function() {
		jQuery('body').removeClass('dark-skin');
		jQuery('body').removeClass('light-skin');
		
		jQuery("link[href='http://demo.designerthemes.com/gala/wp-content/themes/gala/skins.css']").remove();
		
		jQuery('#logo img').attr('src', 'http://demo.designerthemes.com/gala/wp-content/themes/gala/images/logo.png');
		jQuery('#footer-widgets img').attr('src', 'http://demo.designerthemes.com/gala/wp-content/themes/gala/images/logo-footer.png');
		return false;
	});
	
	jQuery('.sidebar-left-link').click( function() {
		jQuery('body').removeClass('sidebar-right');
		jQuery('body').addClass('sidebar-left');
		return false;
	});
	
	jQuery('.sidebar-right-link').click( function() {
		jQuery('body').removeClass('sidebar-left');
		jQuery('body').addClass('sidebar-right');
		return false;
	});


/*-----------------------------------------------------------------------------------*/
/*	We've finished dancing!
/*-----------------------------------------------------------------------------------*/


});