
jQuery(document).ready(function(){

	   // SROLLTOP AND ADD CLASS FIXED HEADER
	   $(window).bind("load", function() {
	   	if(jQuery(window).scrollTop()>50){
	   		jQuery('.header').addClass('fixedheader');
	   	}
	   });
	   jQuery(window).scroll(function(){
	   	if(jQuery(this).scrollTop()>800){
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
	   jQuery('.scroll-downs').click(function (){
	   	jQuery('html, body').animate({
	   		scrollTop: jQuery("#about-2").offset().top
	   	}, 700);
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
					},
					{
						breakpoint: 1920,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					}
					]
				});
				// SHOP POPUP
				
				jQuery(".nav_primary i.fa-search").click(function(e){
					jQuery('html').addClass('overflow-y');
					var toggleWidth = $(".searchform").width() == 800 ? "0px" : "800px";
					$('.searchform').animate({ width: toggleWidth},200);
					jQuery('.popup_search').stop(true,true).fadeIn('300').addClass('pop_active').find('.close_popup').click(function(){
						jQuery('.popup_search').removeClass('pop_active').fadeOut('300');	
						$(".searchform").css({'width':'0px'});
						jQuery('html').removeClass('overflow-y');
					});
					jQuery('.popup_search').find('.content_popup').show();
					e.preventDefault();
				});

				jQuery(".nav_primary .ajax_sign").click(function(e){
					jQuery('html').addClass('overflow-y');
					jQuery('.popup_login').stop(true,true).fadeIn('300').addClass('pop_active').find('.close_popup').click(function(){
						jQuery('.popup_login').removeClass('pop_active').fadeOut('300');	
						jQuery('html').removeClass('overflow-y');
					});
					jQuery('.popup_login').find('.content_popup').show();
					e.preventDefault();
				});



				jQuery('.popup_search').click(function(event) {
 		 //if you click on anything except the modal itself or the "open modal" link, close the modal
 		 if (!jQuery(event.target).closest(".content_popup,.nav_primary i.fa-search , .ajax_sign").length) {
 		 	jQuery("body").find(".content_popup").hide();
 		 	jQuery(".popup").removeClass('pop_active').fadeOut(300);
 		 	jQuery(".searchform").css({'width':'0px'});
 		 	jQuery('html').removeClass('overflow-y');
 		 }
 		});




		 // ANIMATION INDEX
		 var width = jQuery(window).width();
		 if(width>1200){
		 	jQuery('.list_post_news .most-commented>li, .list_post_comments .most-commented>li').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		 	jQuery('.list_post_random .content_left ul li').attr({"data-wow-delay" : "0.3s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		 	jQuery('.hot_big_post_area>.col-md-6:nth-child(1) .post_meta p , .post_cmt_wrapper .wpb-comment-count').attr({"data-wow-delay" : "0.5s", "data-wow-duration" : "1s"}).addClass("wow animated zoomIn ");
		 	jQuery('.home .footer .row>.col-sm-4:nth-child(1)').attr({"data-wow-delay" : "0.3s" , "data-wow-duration" : "2s"}).addClass("wow fadeIn");
		 	jQuery('.home .footer .row>.col-sm-4:nth-child(2)').attr({"data-wow-delay" : "0.6s" , "data-wow-duration" : "2s"}).addClass("wow fadeIn");
		 	jQuery('.home .footer .row>.col-sm-4:nth-child(3)').attr({"data-wow-delay" : "0.9s" , "data-wow-duration" : "2s"}).addClass("wow fadeIn");
		 	jQuery('.home .logo_ft_social ul li:nth-child(1)').attr({"data-wow-delay" : "1.5s" , "data-wow-duration" : "0.5s"}).addClass("wow zoomIn");
		 	jQuery('.home .logo_ft_social ul li:nth-child(2)').attr({"data-wow-delay" : "1.7s" , "data-wow-duration" : "0.5s"}).addClass("wow zoomIn");
		 	jQuery('.home .logo_ft_social ul li:nth-child(3)').attr({"data-wow-delay" : "1.9s" , "data-wow-duration" : "0.5s"}).addClass("wow zoomIn");
		 	jQuery('.home .copyright p').attr({"data-wow-delay" : "2s" , "data-wow-duration" : "1s"}).addClass("wow fadeInUp");
		 	  jQuery('.page-template-page-template-about #about-1 .welcome_y h4').attr({"data-wow-delay" : "0.5s", "data-wow-duration" : "1.5s"}).addClass("wow animated zoomIn ");
              jQuery('.page-template-page-template-about #about-1  .scroll-downs').attr({"data-wow-delay" : "2s", "data-wow-duration" : "1s"}).addClass("wow animated fadeInUp ");
		 	new WOW().init();
		 }
	
	    jQuery(".aio_content_page").onepage_scroll({
            sectionContainer: ".section",
            easing: "ease", //"ease", "linear", "ease-in",
            animationTime: 1000,
            pagination: true, 
            updateURL: true, 
            beforeMove: function(index) {
          		   jQuery('.section.active  .widget-title').addClass("animated slideInUp");;
          		   jQuery('.section.active .textwidget').addClass("animated slideInUp");;
          		   jQuery('.section.active #about-1 .textwidget').removeClass("animated slideInUp");;
            },
            afterMove: function(index) {
            }, 
            loop: true,                  
            keyboard: true,                
            responsiveFallback: false,
            direction: "vertical" //vertical,horizontal
        });


		});

