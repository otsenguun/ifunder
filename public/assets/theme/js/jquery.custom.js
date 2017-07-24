(function($) {
	'use strict';
	
	jQuery(document).on('ready', function(){
	
	/*START MOBILE DEVICE SUPPORT CHECK JS*/
		var isMobile = {
			Android: function() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function() {
				return navigator.userAgent.match(/IEMobile/i);
			},
			any: function() {
				return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
			}
		};
	/*END MOBILE DEVICE SUPPORT CHECK JS*/

	
	/*START NS SAR JS*/	
	   jQuery.fn.isOnScreen = function(){
		 
		var win = $(window);
		 
		var viewport = {
			top : win.scrollTop(),
			left : win.scrollLeft()
		};
		viewport.right = viewport.left + win.width();
		viewport.bottom = viewport.top + win.height();
		 
		var bounds = this.offset();
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();
		 
		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};
	/*END NS SAR JS*/
	
	
	/*START CONTACT FORM JS*/
	jQuery.fn.cleardefault = function() {
		return this.focus(function() {
			if( this.value == this.defaultValue ) {
				this.value = "";
				jQuery(this).addClass('selected-input');
			}
		}).blur(function() {
			if( !this.value.length ) {
				this.value = this.defaultValue;
				jQuery(this).removeClass('selected-input');
			}
		});
	};

	jQuery(".ginput_container input, .ginput_container textarea").cleardefault(); 
	/*END CONTACT FORM JS*/
	

	/*START SCROLLING MENU JS*/
		jQuery(function() {
		  jQuery('.sticky-buttons a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  var target = jQuery(this.hash);
			  var header_height = jQuery('#header-panel').outerHeight();
			  var offset_top = target.offset().top-header_height-0;

			  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			  if (target.length) {
				jQuery('html,body').animate({
				  scrollTop: offset_top
				}, 1000);
				return false;
			  }
			}
		  });
		});
	/*END SCROLLING MENU JS*/
	

	/*START STICKY HEADER JS*/
	if ( jQuery().sticky ) {
		var topSpacing;
		if ( jQuery('body').hasClass('admin-bar') ) {
		  topSpacing = 28;
		} else {
		  topSpacing = 0;
		}
		jQuery('#header-panel').sticky({
			topSpacing:topSpacing,
			responsiveWidth: true,
			getWidthFrom: 'body'
		});
	  };
	/*END SCROLLING MENU JS*/
	  
	 /*START MAP JS*/
    var contact = {"lat":"45.7127837", "lon":"-74.00594130000002"}; //Change a map coordinate here!
    try {
        $('.map').gmap3({
            action: 'addMarker',
            latLng: [contact.lat, contact.lon],
            map:{
                center: [contact.lat, contact.lon],
                zoom: 5
                },
            },
            {action: 'setOptions', args:[{scrollwheel:false}]}
        );
    } catch(err) {}
   /*END MAP JS*/

	/*START FEATURED PANEL CONTENT BOX JS*/
		$('.featured-panel-content__box a[href*=#]').on("click", function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 50
			}, 1000);
			e.preventDefault();
		});
    /*END FEATURED PANEL CONTENT BOX JS*/

	});

})(jQuery);