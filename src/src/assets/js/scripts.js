/*
Author       : Theme_Ocean.
Template Name: Loreen - Real Estate HTML Template 
Version      : 1.0
*/
(function($) {
	'use strict';
	
	jQuery(document).on('ready', function(){
	
		/*PRELOADER JS*/
		$(window).on('load', function() { 
			$('.status').fadeOut();
			$('.preloader').delay(350).fadeOut('slow'); 
		}); 
		/*END PRELOADER JS*/
		
		/* 2. BOOTSTRAP TOOLTIP  */
			$('[data-toggle="tooltip"]').tooltip();
        /* END BOOTSTRAP TOOLTIP  */
		
		/*START MENU JS*/
			$('a.page-scroll').on('click', function(e){
				var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 50
				}, 1500);
				e.preventDefault();
			});		

			$(window).on('scroll', function() {
			  if ($(this).scrollTop() > 100) {
				$('.menu-top').addClass('menu-shrink');
			  } else {
				$('.menu-top').removeClass('menu-shrink');
			  }
			});			
			$(document).on('click','.navbar-collapse.in',function(e) {
			if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
				$(this).collapse('hide');
			}
			});				
		/*END MENU JS*/ 

		/*START MIXITUP JS*/	
		jQuery('#gallery .row').mixitup({
			targetSelector: '.mix',
		});		
		$("a[class^='prettyPhoto']").prettyPhoto();
		/*END MIXITUP JS*/		

		/*START PORTFOLIO POPUP JS*/
		 $("a[data-rel^='prettyPhoto']").prettyPhoto();				 
		 $('#projectModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		 })
		/*END PORTFOLIO POPUP JS*/
		  
		/*START PARTNER LOGO*/
		$('.partner').owlCarousel({
		  autoPlay: 9000, //Set AutoPlay to 3 seconds
		  items : 4,
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]
		});
		/*END PARTNER LOGO*/
		
		/*START VIDEO JS*/
		 function autoPlayYouTubeModal() {
			var trigger = $("body").find('[data-toggle="modal"]');
			trigger.on("click",function() {
			  var theModal = $(this).data("target"),
				videoSRC = $('#video-modal iframe').attr('src'),
				videoSRCauto = videoSRC + "?autoplay=1";
			  $(theModal + ' iframe').attr('src', videoSRCauto);
			  $(theModal + ' button.close').on("click",function() {
				$(theModal + ' iframe').attr('src', videoSRC);
			  });
			  $('.modal').on("click",function() {
				$(theModal + ' iframe').attr('src', videoSRC);
			  });
			});
		  }
		  autoPlayYouTubeModal();
		/*END VIDEO JS*/		
	}); 		
	
	/* START PARALLAX JS */
	(function () {
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { 
		} else {
			$(window).stellar({
				horizontalScrolling: false,
				responsive: true
			});
		}
	}());
	/* END PARALLAX JS  */		
	
	/*START WOW ANIMATION JS*/
	  new WOW().init();	
	/*END WOW ANIMATION JS*/	
				
})(jQuery);


  

