
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
		<div class="logo_ft_social">
			<img src="<?php echo BASE_URL; ?>/images/ylogo.png" alt="">
			<ul>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="row">
			<?php 
			$arg_cat_15 = array(
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'cat'=>15
			);
			$arg_cat_15_q = new WP_Query();
			$arg_cat_15_q->query($arg_cat_15);
			?>
			<?php if(have_posts()) : ?>

				<div class="footer-widget-area col-md-4">
					<div class="cat_post">
					<a href="<?php echo get_category_link($category_id = 15);?>"><?php echo get_cat_name( $category_id = 15 );?></a>
					</div>

					<ul>
						<?php
						while ($arg_cat_15_q->have_posts()) : $arg_cat_15_q->the_post(); ?>
							<?php get_template_part('loop/loop_post_footer'); ?>
						<?php endwhile; ?> 
					</ul>
				</div>
			<?php endif; ?>

			<?php 
			$arg_cat_22 = array(
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'cat'=>22
			);
			$arg_cat_22_q = new WP_Query();
			$arg_cat_22_q->query($arg_cat_22);
			?>
			<?php if(have_posts()) : ?>
				<div class="footer-widget-area  col-md-4">
					<div class="cat_post">
						<a href="<?php echo get_category_link($category_id = 22);?>"><?php echo get_cat_name( $category_id = 22 );?></a>
					</div>
					<ul>
						<?php
						while ($arg_cat_22_q->have_posts()) : $arg_cat_22_q->the_post(); ?>
							<?php get_template_part('loop/loop_post_footer'); ?>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?> 

			
			<?php 
			$arg_cat_23 = array(
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'cat'=>23
			);
			$arg_cat_23_q = new WP_Query();
			$arg_cat_23_q->query($arg_cat_23);
			?>
			<?php if(have_posts()) : ?>
				<div class="footer-widget-area  col-md-4">
					<div class="cat_post">
					<a href="<?php echo get_category_link($category_id = 23);?>"><?php echo get_cat_name( $category_id = 23 );?></a>
					</div>
					<ul>
						<?php
						while ($arg_cat_23_q->have_posts()) : $arg_cat_23_q->the_post(); ?>
							<?php get_template_part('loop/loop_post_footer'); ?>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?> 
		</div>
		<div class="copyright">
			<p>Copyright 2018 · Created by Yang</p>
		</div>

	</div>
</footer>
<?php wp_footer(); ?>


<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>


</body>
</html>