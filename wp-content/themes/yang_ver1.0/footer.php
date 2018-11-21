
<div class="scrolltop">
	<i class="fa fa-angle-up" aria-hidden="true"></i>	
</div>
<div class="popup popup_search" >
	<div class="content_popup">
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label for="s">tìm kiếm cho</label>
			<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="Nhập nội dung tìm kiếm" />
			<input type="submit" id="searchsubmit" value="Tìm kiếm">
		</form>
	</div>
	<div class="close_popup"><i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i></div>
</div>

<div class="popup popup_login" >
	<div class="row">
		<div class="col-md-6">
		    <form id="login" action="login" method="post">
			    <h1>Site Login</h1>
			    <p class="status"></p>
			    <label for="username">Username</label>
			    <input id="username" type="text" name="username">
			    <label for="password">Password</label>
			    <input id="password" type="password" name="password">
			    <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
			    <input class="submit_button" type="submit" value="Login" name="submit">
			    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			</form>
		</div>

		<div class="col-md-6">
			<form id="register" class="ajax-auth"  action="register" method="post">
			    <h1>Signup</h1>
			    <p class="status"></p>
			    <label for="signonname">Username</label>
			    <input id="signonname" type="text" name="signonname" class="required">
			    <label for="email">Email</label>
			    <input id="email" type="text" class="required email" name="email">
			    <label for="signonpassword">Password</label>
			    <input id="signonpassword" type="password" class="required" name="signonpassword" >
			    <label for="password2">Confirm Password</label>
			    <input type="password" id="password2" class="required" name="password2">
			    <input class="submit_button" type="submit" value="SIGNUP">
			     <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>    
			</form>
		</div>
	</div>
	<div class="close_popup"><i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i></div>
</div>


</div>
<footer class="footer">
	<div class="container">
		<div class="logo_ft_social">
			<img src="<?php echo BASE_URL; ?>/images/ylogo.png" alt="">
			<ul>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="row">
			<?php if(is_active_sidebar('footer1')) :?>
				<div class="footer-widget-area col-md-4">
					<?php dynamic_sidebar('footer1'); ?>
				</div>
			<?php endif ?>
			<?php if(is_active_sidebar('footer2')) :?>
				<div class="footer-widget-area  col-md-4">
					<?php dynamic_sidebar('footer2'); ?>
				</div>
			<?php endif ?>
			<?php if(is_active_sidebar('footer3')) :?>
				<div class="footer-widget-area  col-md-4">
					<?php dynamic_sidebar('footer3'); ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>


<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>


</body>
</html>