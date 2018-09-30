<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	
	<header class="header">
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
			</nav>
			<div class="search_header">
				<?php //get_search_form(); ?>
				<form action="" role="search" method="get" id="searchform" action="<?php echo home_url('/');  ?>">
					<div class="search">
						<input type="text" value="" name="s" id="s" placeholder="Tìm kiếm">
						<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
		</div>
	</header>