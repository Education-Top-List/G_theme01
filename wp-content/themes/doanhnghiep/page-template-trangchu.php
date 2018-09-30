
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

	<div id="wrap">
		<div class="g_content">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-3  content_left">
						<?php echo get_post_field('post_content', $post->ID); ?>
						<div class="list_post_content">
							<?php 
							$wp_query = new WP_Query(); $wp_query->query('posts_per_page=10' . '&paged='.$paged);
							if(have_posts()): ?>


								<?php	while($wp_query->have_posts()) : $wp_query->the_post(); ?>

									<?php get_template_part('content') ?>		

								<?php endwhile;
							else:
							endif;
							?>

							<?php wp_reset_postdata();?>
						</div>

					</div>

					<div class="col-md-3 col-sm-3 sidebar">
						<?php dynamic_sidebar('sidebar1'); ?> 
					</div>
				</div>
			</div>
		</div>

	</div>


	<?php get_footer(); ?>




