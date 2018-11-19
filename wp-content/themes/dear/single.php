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
									
								</div>
								<div class="post_avt">
									<div class="wrap_post_avt">
									</div>
								</div>
								<div class="text_content">
									<?php  the_content(); ?>
									<div class="time-single">
										<span>Hà Nội, <?php the_time('d/m/y');?></span>
									</div>
									<div class="clearfix"></div>
									<div class="author-custom">
										<div class="col-md-3 col-sm-3">
											<div class="row auth-single">
												<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
													<?php echo get_avatar(get_the_author_meta('ID')); ?>
													<strong><?php the_author(); ?></strong>
												</a> 
											</div>
										</div>
										<div class="col-md-9 col-sm-9">
											<div class="row social-single">
											 	<span class="view">
											 	<i class="fa fa-eye" aria-hidden="true"></i> 
											 		<?php echo wpb_get_post_views(get_the_ID()); ?> Người đang xem
											 	</span> 
												<button class="like__btn animated id_<?= get_the_ID() ?>" data-id="<?= get_the_ID() ?>">
										    		<i class="like__icon fa fa-heart"></i>
										    		<span class="like__number_<?= get_the_ID() ?>"> Click để bình chọn </span>
										    		<div class="vote" style="display: none">Người đã bình chọn</div>
										  		</button>
										  			
											</div>
										</div>
							  		</div>
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


