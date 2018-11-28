
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

<div id="wrap">
	<div class="g_content">
		<?php 
		$arg_big_post_query = array(
			'posts_per_page' => 1,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => 'post',
			'post_status' => 'publish'
		);
		$big_post_query = new WP_Query();
		$big_post_query->query($arg_big_post_query);
		?>
		<div class="hot_big_post_area">

			<?php if(have_posts()) : 
				while($big_post_query->have_posts()) : $big_post_query->the_post();
					?>
					<div class="col-md-6 pw">
						<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
						<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
							<a href="<?php the_permalink();?>"></a>
						</figure>
					</div>
					<div class="col-md-6">
						<div class="hot_big_post ">
							<div class="cat_post">
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

							<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
							
							<div class="post_meta">
									<span class="author_post"> 
										<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
											<?php echo get_avatar(get_the_author_meta('ID')); ?>
											<?php the_author(); ?>
										</a> 
									</span>
								<p><?php the_time('d/m');?><a href="<?php the_permalink();?>"></a></p>
							</div>
							<div class="excerpt">
								<p><?php echo excerpt(50); ?></p>
							</div>
							<a class="readmore" href="<?php echo the_permalink(); ?>">Read more</a>
						</div>

					</div>
					
					<?php  
				endwhile;
			else:
			endif;
			?>

		</div><!-- hot_big_post_area -->

		<div class="list_post_news">
			<div class="container">
				<h2 class="title_tg_top">Bài viết mới nhất</h2>
				<div class="row">
					<?php 
					$arg_cmt_post_q = array(
						'posts_per_page' => 3,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish',
						'offset' => 1
					);
					$cmt_post_q = new WP_Query();
					$cmt_post_q->query($arg_cmt_post_q);
					?>
					<?php if(have_posts()) : ?>
						<ul class="most-commented">
							<?php
							while ($cmt_post_q->have_posts()) : $cmt_post_q->the_post(); ?>
								<li>
									<div class="post_cmt_wrapper pw">
										<div class="wrap_thumb">
											<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
											<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
												<a href="<?php the_permalink();?>"></a>
											</figure>	
										</div>
										<div class="cat_post">
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
										<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h3>
										<div class="wrap_cmt_count">
											<span class="wpb-comment-count"><b><?php the_time('d/m');?></b><a href="<?php the_permalink();?>"></a></span>
										</div>
										
										<div class="post_meta">
											<span class="author_post"> 
												<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
													<?php echo get_avatar(get_the_author_meta('ID')); ?>
													<?php the_author(); ?>
												</a> 
											</span>

										</div>
										<div class="excerpt">
											<p><?php echo excerpt(50); ?></p>
										</div>
									</div>

								</li>
							<?php endwhile; ?>
						<?php endif; ?> 
					</ul>
				</div>
			</div>
		</div>

		<div class="list_post_comments">
			<div class="container">
				<h2 class="title_tg_top">Bài viết nổi bật nhất</h2>
				<div class="row">
					<?php 
					$arg_cmt_post_q = array(
						'posts_per_page' => 4,
						'meta_key' => 'wpb_post_views_count',
						'orderby' => 'meta_value_num',
						'order' => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish'
					);
					$cmt_post_q = new WP_Query();
					$cmt_post_q->query($arg_cmt_post_q);
					?>
					<?php if(have_posts()) : ?>
						<ul class="most-commented">
							<?php
							while ($cmt_post_q->have_posts()) : $cmt_post_q->the_post(); ?>
								<li>
									<div class="post_cmt_wrapper pw">
										<div class="wrap_thumb">
											<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
											<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
												<a href="<?php the_permalink();?>"></a>
											</figure>	
										</div>
										<div class="cat_post">
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
										<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h3>
										<div class="wrap_cmt_count">
											<span class="wpb-comment-count">
												<i class="fa fa-comment" aria-hidden="true">
													<p><?php echo wpb_get_post_views(get_the_ID()); ?></p>
												</i>
												</span>
										</div>
										
										<div class="post_meta">
											<span class="author_post"> 
												<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
													<?php echo get_avatar(get_the_author_meta('ID')); ?>
													<?php the_author(); ?>
												</a> 
											</span>

										</div>
										<div class="excerpt">
											<p><?php echo excerpt(50); ?></p>
										</div>
									</div>

								</li>
							<?php endwhile; ?>
						<?php endif; ?> 
					</ul>
				</div>
			</div>
		</div>
		<div class="list_post_random">
			<div class="container">
				<h2 class="title_tg_top">Video</h2>
				<div class="row">
					<div class="col-sm-8 content_left">
						<?php
							if ( have_posts() ) : while ( have_posts() ) : the_post();
								the_content();
							endwhile; else: ?>
							<p>Sorry, no posts matched your criteria.</p>
						<?php endif; ?>
				
					</div>
					<div class="col-sm-4 sidebar">
							<?php dynamic_sidebar('sidebar1'); ?> 
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<?php get_footer(); ?>




