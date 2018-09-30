<?php 
get_header(); 
?>	



<div id="wrap">
	<div class="g_content">
		<div class="container">
			<div class="row">
				<?php 
				if(have_posts()) :
					while(have_posts()) : the_post(); ?>
						<div class="col-md-9 col-sm-3  content_left">
						<div id="breadcrumb" class="breadcrumb">
							<ul>
								 <?php  echo breadcrumbs(); ?>
							</ul>
						</div> 
							<article class="content_single_post">
								<div class="single_post_info">
									<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
								<div class="post_avt">
									<div class="wrap_post_avt">
										<?php //the_post_thumbnail();?>
									</div>
								</div>

								<p><?php echo the_content(); ?></p>
							</article>
						</div>
						<div class="col-md-3 col-sm-3 sidebar">
							<?php dynamic_sidebar('sidebar1'); ?> 
						</div>
					<?php endwhile;
				else:
				endif;
				wp_reset_postdata();
				?>
			</div>
			
		</div>

		
	</div>
</div>


<?php get_footer(); ?>


