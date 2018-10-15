<?php 
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
		<div class="container">
			<div class="row">
				<?php 
				wpb_set_post_views(get_the_ID());
				if(have_posts()) :
					while(have_posts()) : the_post(); ?>
						<div class="col-md-9 col-sm-9  content_left">
							<div id="breadcrumb" class="breadcrumb">
								<ul>
									<?php  echo breadcrumbs(); ?>
								</ul>
							</div> 
							<article class="content_single_post">
								<div class="single_post_info">
									<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p><?php the_time('d/m/y');?> | Số lượt xem : <span> <?php echo wpb_get_post_views(get_the_ID()); ?></span> 
									</p>
								</div>
								<div class="post_avt">
									<div class="wrap_post_avt">
									</div>
								</div>
								<div class="text_content">
									<?php  the_content(); ?>
									<span class="auth">
										<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a>
									</span> 
								</div>
							</article>
							<!-- fb-comment-area -->
							<div class="fb-comments" data-href="<?php echo get_permalink();  ?>" data-width="855" data-numposts="20" data-colorscheme="light"></div>

							<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) ); ?>
							<?php if($related){ ?>
							<div class="related_posts">
								<h2>Có thể bạn quan tâm</h2>
								<ul class="row"> 
									<?php
									if( $related ) foreach( $related as $post ) {
										setup_postdata($post); ?>
										<li class="col-md-4 col-sm-4 col-xs-12">
											<div class="list_item_related pw">
											<figure class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
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
<?php get_footer(); ?>


