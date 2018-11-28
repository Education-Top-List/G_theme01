<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<?php $url_site =  get_site_url('null','/wp-content/themes/doanhnghiep', 'http');  ?>
	<!-- css -->
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/images/favicon.ico">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/animate.css">
	<!-- js -->
	<script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
	<?php wp_head(); ?>
	<meta property="fb:app_id" content="1953938748210615">
	<meta property="fb:app_admins" content="1993613924220223">
</head>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=1953938748210615&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<body <?php body_class() ?>>
	
	<header class="header">
		<div class="wrap_inner_header">
			<div class="container">
				<div class="logo_site">
					<?php 
					if(has_custom_logo()){
						the_custom_logo();
					}
					else { ?> 
						<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				</div>
		
				<nav class="nav nav_primary">
					<?php 
					$args = array('theme_location' => 'primary');
					?>
					<?php wp_nav_menu($args); ?>
					<i class="fa fa-search"></i>
					<button class="ajax_sign">Sign in/up </button>
				</nav>
				
			</div>
		</div>

	</header>
	<div class="banner">
		<?php echo do_shortcode('[metaslider id="240"]'); ?>
	</div>