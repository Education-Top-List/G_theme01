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
</body>
</html>