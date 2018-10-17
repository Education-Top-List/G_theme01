
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

<div id="wrap">
	<div class="g_content">
		<div class="container">
			<div class="content_left">
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
					<div class="row featured-news-wrap">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="row">
										<div class="box h-400">
											<?php if(have_posts()) : 
												while($big_post_query->have_posts()) : $big_post_query->the_post();
											?>
											<!-- <figure class="thumbnail"> -->
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?>
														<div class="over-lay"></div>
													</a>
														
														<div class="info">
															<h2><a href="<?php the_permalink();?>">
																<?php the_title(); ?></a></h2>
														</div>
											<!-- </figure> -->
											<?php  
												endwhile;
											endif;	
											?>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="row">
										<?php 
											$arg_fpost_query = array(
												'order' => 'DESC',
												'posts_per_page'=>2,
												'offset'=>1,
												'post_type' => 'post',
												'post_status' => 'publish'
											);
											$exclude_fpost_query = new WP_Query();
											$exclude_fpost_query->query($arg_fpost_query);
										?>
										<?php if(have_posts()) : 
											while($exclude_fpost_query->have_posts()) : $exclude_fpost_query->the_post();
										?>
										<div class="col-md-6 col-sm-6">
											<div class="row">
												<div class="box h-200">
												<!-- <figure class="thumbnail"> -->
													<a href="<?php the_permalink(); ?>">
													  <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']);?>
													</a>
													<div class="over-lay"></div>
													<div class="info">
														<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
													</div>
												</div>
											<!-- </figure> -->
											</div>
										</div>
										<?php  
											endwhile;
										endif;	
										?>
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<?php 
										$arg_fpost_query = array(
											'order' => 'DESC',
											'posts_per_page'=>6,
											'offset'=>3,
											'post_type' => 'post',
											'post_status' => 'publish'
										);
										$exclude_fpost_query = new WP_Query();
										$exclude_fpost_query->query($arg_fpost_query);
									?>
									<?php if(have_posts()) : 
										while($exclude_fpost_query->have_posts()) : $exclude_fpost_query->the_post();
									?>
									<div class="col-md-6 col-sm-6">
											<div class="row">
												<div class="box h-200">
												<!-- <figure class="thumbnail"> -->
													<a href="<?php the_permalink(); ?>">
													  <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']);?>
													</a>
													<div class="over-lay"></div>
													<div class="info">
														<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
													</div>
												</div>
											<!-- </figure> -->
											</div>
										</div>
									<?php  
										endwhile;
									endif;	
									?>
							</div>
						</div>
					</div>
				</div><!-- hot_big_post_area -->

			<div class="focal_week">
				<div class="lb_focal_week">
					Tiêu điểm tuần
				</div>
				<?php 
				$arg_focal_week = array(
					'posts_per_page' => 4,
					// 'cat' => 27,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish'
				);
				$focal_week_query = new WP_Query();
				$focal_week_query->query($arg_focal_week);
				?>
				<ul>
					<?php if(have_posts()) : 
					while($focal_week_query->have_posts()) : $focal_week_query->the_post();
						?>
						<li class="item_focal_week pw">
							<figure class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a> </figure>
							<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
						</li>

						<?php  
					endwhile;
				else:
				endif;
				?>
			</ul>
		</div>

	

	</div>
	<div class="row">
		<div class="col-md-9 col-sm-9">
				<div class="list_post_content">
			<?php 
			$argsQuery = array(
				'posts_per_page'   => 10,
				'meta_key' => 'wpb_post_views_count',
				'orderby' => 'meta_value_num',
				'order' => 'DESC'
			);
			$wp_query = new WP_Query(); $wp_query->query($argsQuery);
			if(have_posts()): 
				while($wp_query->have_posts()) : $wp_query->the_post(); 
					get_template_part('content');		
				endwhile;
			else:
			endif;
			?>

			<?php wp_reset_postdata();?>
		</div>
		</div>
		<div class="col-md-3 col-sm-3 sidebar">
			<?php dynamic_sidebar('sidebar1'); ?> 
		</div>
	</div>
</div>
</div>

</div>


<?php get_footer(); ?>




