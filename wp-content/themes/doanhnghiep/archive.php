<?php 

get_header(); 
?>	



<div id="content">
	<div class="container">
		<?php 
			$kinhdoanhPosts = new WP_Query('cat=9&post_per_page=3');
			?> 
				<h3><?php 
						if(is_category()){
							single_cat_title();
						}
						else if(is_tag()){
							single_tag_title();
						}
						else if(is_author()){
							the_post();
							echo 'Author Archives : ' . get_the_author();
							rewind_posts();
						}
						else if(is_day()){
							echo 'Day Archives : ' . get_the_date();
						}
						else if(is_month()){
							echo 'Monthly Archives : ' . get_the_date('F Y');
						}
						else if(is_year()){
							echo ' Yearly Archives : ' . get_the_date('Y');
						}
						else{
							echo 'archive';
						}
					?></h3>

			<?php if($kinhdoanhPosts->have_posts()):
				while($kinhdoanhPosts->have_posts()):
					$kinhdoanhPosts -> the_post();?>
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
					<?php the_content(); ?>
		<?php endwhile;
			else:
			endif;
			wp_reset_postdata();
		?>
		  
	</div>
</div>


<?php get_footer(); ?>


