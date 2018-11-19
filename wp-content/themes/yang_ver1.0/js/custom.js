
	jQuery(document).ready(function(){

				// SCROLL TO DIV
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop()>500){
				jQuery('.scrolltop').addClass('go_scrolltop');
			}
			else if(jQuery(this).scrollTop()>50){
				jQuery('.header').addClass('fixedheader');
			}
			else{
				jQuery('.scrolltop').removeClass('go_scrolltop');
				jQuery('.header').removeClass('fixedheader');
			}
		});
		jQuery('.scrolltop').click(function (){
		    jQuery('html, body').animate({
		      scrollTop: jQuery("html").offset().top
		    }, 1000);
		 }); 
			// SLIDE
		jQuery('.focal_week ul').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				// SHOP POPUP
				
			jQuery(".nav_primary i.fa-search").click(function(e){
				var toggleWidth = $(".searchform").width() == 800 ? "0px" : "800px";
				$('.searchform').animate({ width: toggleWidth},200);
				jQuery('.popup_search').stop(true,true).fadeIn('300').addClass('pop_active').find('.close_popup').click(function(){
					jQuery('.popup_search').removeClass('pop_active').fadeOut('300');	
					$(".searchform").css({'width':'0px'});
			});
				jQuery('.popup_search').find('.content_popup').show();
				e.preventDefault();
			});

		jQuery(document).click(function(event) {
 		 //if you click on anything except the modal itself or the "open modal" link, close the modal
  		if (!jQuery(event.target).closest(".content_popup,.nav_primary i.fa-search").length) {
  			jQuery("body").find(".content_popup").hide();
  				jQuery(".popup").fadeOut(300);
  				jQuery(".searchform").css({'width':'0px'});
  			}
		});


	});
	
