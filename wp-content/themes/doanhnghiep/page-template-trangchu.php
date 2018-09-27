<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	



<div id="content">
	<div class="container">
		<div class="list_post">
			
			<?php 
			$kinhdoanhPosts = new WP_Query('cat=9&post_per_page=3');
			if($kinhdoanhPosts->have_posts()):
				while($kinhdoanhPosts->have_posts()):
					$kinhdoanhPosts -> the_post();?>
					<div class="list_post_item">
						<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post_meta">
							<p><?php the_time('d/m/y');?><span>  <?php the_time('g:i a') ?></span> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a>
								| Posted in
								<?php 
								$categories = get_the_category();
								$seperator = ", ";
								$output = '';
								if($categories){
									foreach ($categories as $category){
										$output .= '<a href="' . get_category_link($category->term_id) . '"> '. $category-> cat_name . ' </a>' .  $seperator;

									}
									echo trim($output , $seperator);
								}
								?>
							</p>
						</div>
						<div class="excerpt">
							<?php 
								if($post->post_excerpt){ ?>
									<p><?php echo get_the_excerpt(); ?></p>
									<a href="<?php echo the_permalink(); ?>">Read more&raquo;</a>
								<?php } else{
									the_content();
								} 
							?>
							
						</div>

					</div>


				<?php endwhile;
			else:
			endif;
			wp_reset_postdata();
			?>
		</div>

	</div>
</div>


<?php get_footer(); ?>


