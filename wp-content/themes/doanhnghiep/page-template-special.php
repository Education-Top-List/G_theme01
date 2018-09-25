<?php 
/*
Template Name: Template Special
*/
get_header(); 

 if(have_posts()) :
 	while (have_posts()) : the_post() ; ?>
 		<div id="content">
 			<div class="container">
 				<div class="content_left">
 					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
 					<?php the_content(); ?>
 				</div>
 				<div class="box_note_right">
 					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
 				</div>
 			</div>
 		</div> 

 	<?php endwhile;
 else : 
 	echo '<h2> No content found</h2>';
 endif;

 get_footer(); 

  ?>


