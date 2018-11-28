<?php 
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
		<?php 
		wpb_set_post_views(get_the_ID());
		if(have_posts()) :
			while(have_posts()) : the_post(); ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div class="wrap_bg_title_single">
					<div class="bg_title_single" style="background:url('<?php echo $image[0]; ?>')">
						<div class="container">
							<div class="single_post_info">
								<div class="section-category">
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
								</div>
								<h2><a href="#"><?php the_title(); ?></a></h2>
							</div>
						</div>
					</div>
				</div>

				<div class="content_single_post">
					<div class="container">
						<div class="row">

							<div class="col-md-9 col-sm-3  content_left">
								<div id="breadcrumb" class="breadcrumb">
									<ul>
										<?php  echo breadcrumbs(); ?>
									</ul>
								</div> 
								<article class="wrap_content_text">
									<div class="text_content">
										<?php  the_content(); ?>
									</div>
									<div class="row auth-single">
										<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
											<?php echo get_avatar(get_the_author_meta('ID')); ?>
											<?php the_author(); ?>
										</a>
										
									</div>
								</article>

								<!-- fb-comment-area -->
								<div class="fb-comments" data-href="<?php //echo get_permalink();  ?>" data-width="855" data-numposts="20" data-colorscheme="light"></div>

								<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) ); ?>
								<?php if($related){ ?>
									<div class="related_posts">
										<h2>Tin cùng chuyên mục</h2>
										<ul class="row"> 
											<?php

											if( $related ) foreach( $related as $post ) {
												setup_postdata($post); ?>

												<li class="col-md-4 col-sm-4 col-xs-12">
													<div class="list_item_related pw">
														<div class="wrap_thumb">
															<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
															<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
																<a href="<?php the_permalink();?>"></a>
															</figure>
														</div>
														<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
													</div>

												</li>

											<?php }
											wp_reset_postdata(); ?>
										</ul>   
									</div>
								<?php } ?> 
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
</div>


<?php get_footer(); ?>


