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
								<div class="text_content">
									<?php  the_content(); ?>
								</div>
							</article>
							<div class="fb-comments" data-href="http://localhost:86/G_theme01" data-numposts="5"></div>
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=1953938748210615&autoLogAppEvents=1';
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<div class="related_posts">
								<h2>Tin cùng chuyên mục</h2>
								<ul class="row"> 
									<?php
									$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
									if( $related ) foreach( $related as $post ) {
										setup_postdata($post); ?>

										<li class="col-md-4 col-sm-4 col-xs-12">
											<a href="<?php the_permalink(); ?>"><figure class="thumbnail"><?php the_post_thumbnail(); ?></figure></a>
											<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
										</li>

									<?php }
									wp_reset_postdata(); ?>
								</ul>   
							</div>
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


