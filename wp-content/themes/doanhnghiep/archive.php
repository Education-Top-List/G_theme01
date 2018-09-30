<?php 

get_header(); 

	if(have_posts()) :
?>	
		<div id="content">
			<div class="container">
				
			
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

			<?php 
				while(have_posts()): the_post();
				get_template_part('content');
		 endwhile;
			else:
			endif;
			wp_reset_postdata();
		?>
		</div>
	</div>



<?php get_footer(); ?>


