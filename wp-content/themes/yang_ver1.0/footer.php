
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
</div>
<footer class="footer">
	<div class="container">
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