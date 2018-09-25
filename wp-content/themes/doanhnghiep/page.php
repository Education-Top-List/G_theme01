<?php get_header(); ?>

<?php 
if(have_posts()) :
	while (have_posts()) : the_post() ; ?>
		<div class="container">
			<article class="post page">
				<h2><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
			</article>
		</div>  <!-- container -->
	<?php endwhile;
else : 
	echo '<h2> No content found</h2>';
endif;?>

<?php get_footer(); ?>