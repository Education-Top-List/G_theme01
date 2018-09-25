<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="">
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	
	<header class="site-header">
		<div class="container">
			<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
			<h5><?php bloginfo('description'); ?><?php if(is_page('trang-chu')){?> - Thank you for wathching our work <?php } ?> </h5>
			<nav class="nav nav_primary">
				<?php 
				$args = array('theme_location' => 'primary');
				?>
				<?php wp_nav_menu($args); ?>
			</nav>
		</div>
	</header>