<?php 
get_header(); 
?>	



<div id="content">
	<div class="container">
		<div class="list_post">
			<?php 
			if(have_posts()): ?>
				<h2>Search result for : <?php the_search_query(); ?></h2>
				<?php	while(have_posts()): the_post(); 
					
				get_template_part('content');
				
				 endwhile;
			else:
				echo '<p> No found content</p>';
			endif;
			wp_reset_postdata();
			?>
		</div>

	</div>
</div>


<?php get_footer(); ?>


