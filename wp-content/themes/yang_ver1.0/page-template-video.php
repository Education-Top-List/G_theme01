<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
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

				<div class="footer-widget-area col-sm-4">
					<div class="cat_post">
						<a href="<?php echo get_category_link($category_id = 15);?>"><?php echo get_cat_name( $category_id = 15 );?></a>
					</div>

					<ul>
						<?php
						while ($arg_cat_15_q->have_posts()) : $arg_cat_15_q->the_post(); ?>
							<li class="col-md-4">
								<?php the_content();  ?>
							</li>
						<?php endwhile; ?> 
					</ul>
				</div>
			<?php endif; ?>
	</div>
</div>



<?php get_footer(); ?>