<?php 

get_header(); 

if(have_posts()) :
	?>	
	<div id="wrap">
		<div class="g_content">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-3  content_left">
						<h3><?php 
						if(is_category()){
							//single_cat_title();
							echo '';
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

						<ul class="list_categories">			
							<?php 
							$args = array(
								'parent' => get_queried_object_id(),
							); 
							echo '<li class="parent_cat">' . get_category_parents( $cat, true, ' &raquo; ' ) .  '</li>' ;
							$terms = get_terms( 'category', $args );
							$
							$term_ids = wp_list_pluck( $terms, 'term_id' );

							$categories = get_categories( $args );

							foreach($categories as $category) { 
								echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';
							}
							?>
						</ul>
						<?php 
						while(have_posts()): the_post();
							get_template_part('content');
						endwhile;
					else:
					endif;
					wp_reset_postdata();
					?>
				</div>
				<?php  if(have_posts()) : ?>
				<div class="col-md-3 col-sm-3 sidebar">
					<?php dynamic_sidebar('sidebar1'); ?> 
				</div>
			<?php endif ?>
			</div>
		</div>
	</div>

</div>



<?php get_footer(); ?>


