/*
jQuery(function() {
var nav_container = jQuery(".headercontent");
var nav = jQuery("nav.main");
var top_spacing = 0;
var waypoint_offset = 0;
nav_container.waypoint({
	handler: function(event, direction) {
		if (direction == 'down') {
			nav_container.css({ 'height':0});
			nav.stop().addClass("sticky");
		}else {
			nav_container.css({ 'height':0 });
			nav.stop().removeClass("sticky").css("top",0);
		}
	},
	offset: function() {		
		return -nav.outerHeight()-waypoint_offset;
	}
	});
});

jQuery(function() {
var nav_container = jQuery(".parallax_nav");
var nav = jQuery("nav.parallax");
var top_spacing = 0;
var waypoint_offset = 0;
nav_container.waypoint({
	handler: function(event, direction) {
		if (direction == 'down') {
			nav_container.css({ 'height':0});
			nav.stop().addClass("sticky").css("top",-nav.outerHeight()).animate({"top":top_spacing});
		}else {
			nav_container.css({ 'height':0 });
			nav.stop().removeClass("sticky").css("top",0).animate({"top":"-45"});
		}
	},
	offset: function() {		
		return -nav.outerHeight()-waypoint_offset;
	}
	});
});
*/

jQuery("#bt_comments").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#comments").offset().top
    }, 2000);
});
jQuery("#bt_share").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#share").offset().top
    }, 2000);
});

jQuery("a[href*='#']").click(function(){
  jQuery('html, body').animate({
    scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top
  }, 500);
  return false;
});


jQuery(window).load(function(){
	jQuery(".flexslider").flexslider({
		animation:"fade",
		easing:"swing",
		reverse: true, 
		start:function(slider){jQuery('body').removeClass('loading');}
	});
});

	jQuery(document).ready(function() {	
		jQuery( ".footer_widget h2.widget_title" ).click(
			function() {
				jQuery(this).parent().toggleClass('hide_footer_widget');
			}
		);			
	});
jQuery(document).ready(function() {
    jQuery('#list').click(function(event){event.preventDefault();jQuery('#products .item').addClass('list-group-item');});
    jQuery('#grid').click(function(event){event.preventDefault();jQuery('#products .item').removeClass('list-group-item');jQuery('#products .item').addClass('grid-group-item');});
});
