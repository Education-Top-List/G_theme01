
	jQuery(document).ready(function(){

		// SHOW HIDE LIST MORE	
		jQuery('.show_hide').click(function(){
			jQuery('.list_more').toggle(500);
		});
		function showhide_combo(item_click,item_show){
			jQuery(item_click).click(function(){
			jQuery(item_show).toggle(500);
			jQuery(item_click).toggleClass('editBackground');
			});
		}
		showhide_combo('.combo_start .show_li', ' .combo_start .cb_hidden');
		showhide_combo('.combo_pro .show_li', ' .combo_pro .cb_hidden');
		showhide_combo('.combo_enterprise .show_li', ' .combo_enterprise .cb_hidden');

		// SLIDE
		jQuery('.slide_ul').slick({
			dots: false,
			infinite: false,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 1,
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

	// SCROLL TO DIV
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop()>500){
				jQuery('.scrolltop').fadeIn();
			}
			else{
				jQuery('.scrolltop').fadeOut();
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

		var width = jQuery(window).width();
		if(width>1200){
			jQuery('.content_banner').attr({"data-wow-delay" : "0.5s"}).addClass("wow bounceIn");
			jQuery('#primaty_tab1').attr({"data-wow-delay" : "2s", "data-wow-iteration" : "2" , "data-wow-duration" : "2s"}).addClass("wow tada");
			jQuery('.backup_top, .title_custom, .faster, .footer_top ,.footer_bottom, .solution .container').attr({"data-wow-delay" : "0.5s"}).addClass("wow fadeInUp");
			jQuery('.footer_bottom').attr({"data-wow-delay" : "0.8s"}).addClass("wow fadeInUp");
			jQuery('.backup_bottom').attr({"data-wow-delay" : "0.8s"}).addClass("wow flipInY");
			jQuery('.compare').attr({"data-wow-delay" : "0.8s"}).addClass("wow flipInX");
			jQuery('.google_speed').attr({"data-wow-delay" : "0.5s"}).addClass("wow slideInLeft");
			jQuery('.profesional').attr({"data-wow-delay" : "0.5s"}).addClass("wow slideInRight");
			new WOW().init();
		}

		jQuery('.content_banner')

	});
	
	// SHOW HIDE TABCONTENT
	function openTab(evt, name) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(name).style.display = "block";
			evt.currentTarget.className += " active";
	}
	function openSubtab(evt, name) {
			var i, sub_tabcontent, sub_taplinks;
			sub_tabcontent = document.getElementsByClassName("sub_tabcontent");
			for (i = 0; i < sub_tabcontent.length; i++) {
				sub_tabcontent[i].style.display = "none";
			}
			sub_taplinks = document.getElementsByClassName("sub_taplinks");
			for (i = 0; i < sub_taplinks.length; i++) {
				sub_taplinks[i].className = sub_taplinks[i].className.replace(" active", "");
			}
			document.getElementById(name).style.display = "block";
			evt.currentTarget.className += " active";
	}