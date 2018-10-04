
	jQuery(document).ready(function(){

	// jQuery(window).scroll(function () {
	// 	if (jQuery(this).scrollTop() >80) {
	// 		jQuery('#back-top').fadeIn();
	// 		jQuery('.header').addClass('fixedheader');
	// 	} else {
	// 		jQuery('#back-top').fadeOut();
	// 		jQuery('.header').removeClass('fixedheader');
	// 	}
	// });

	// SCROLL TO DIV
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop()>500){
				jQuery('.scrolltop').fadeIn();
			}
			else if(jQuery(this).scrollTop()>50){
				jQuery('.header').addClass('fixedheader');
			}
			else{
				jQuery('.scrolltop').fadeOut();
				jQuery('.header').removeClass('fixedheader');
			}
		});
		jQuery('.scrolltop').click(function (){
		    jQuery('html, body').animate({
		      scrollTop: jQuery("header").offset().top
		    }, 1000);
		 }); 
	

		// SHOP POPUP
			jQuery(" .register_fixed, .fixed_register_mobile, .order_now").click(function(e){
				jQuery('.popup_register').stop(true,true).fadeIn('300').find('.close_popup').click(function(){jQuery('.popup_register').stop(true,true).fadeOut('300');
			});
				jQuery('.popup_register').find('.content_popup').show();
				e.preventDefault();
			});
		jQuery(".btn_region").click(function(e){
				jQuery('.popup_region').stop(true,true).fadeIn('300').find('.close_popup').click(function(){jQuery('.popup_region').stop(true,true).fadeOut('300');
			});
				jQuery('.popup_region').find('.content_popup').show();
				e.preventDefault();
			});
		jQuery(document).click(function(event) {
 		 //if you click on anything except the modal itself or the "open modal" link, close the modal
  		if (!jQuery(event.target).closest(".content_popup, .register_fixed, .fixed_register_mobile, .btn_region, .order_now").length) {
  			jQuery("body").find(".content_popup").hide();
  				jQuery(".popup").fadeOut(300);
  			}
		});

		// EFFECT


	});
	
