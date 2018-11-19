
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
									<?php
									$user = wp_get_current_user();
									if ( $user ) :
										?>
										<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
									<?php endif; ?>
									<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a> 
								</span>
								<p><?php the_time('d/m');?><a href="<?php the_permalink();?>"></a></p>
							</div>
							<div class="excerpt">
								<p><?php echo excerpt(50); ?></p>
							</div>
							<a class="readmore" href="<?php echo the_permalink(); ?>">Read more</a>
						</div>

					</div>
					<div class="col-md-6">
						<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
						<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
							<a href="<?php the_permalink();?>"></a>
						</figure>
					</div>
					<?php  
				endwhile;
			else:
			endif;
			?>

		</div><!-- hot_big_post_area -->
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9  content_left">


					<div class="focal_week">
						<div class="lb_focal_week">
							tiêu điểm tuần
						</div>
						<?php 
						$arg_focal_week = array(
							'posts_per_page' => 4,
							'cat' => 20,
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

					<div class="list_post_content">
						<?php 
						$argsQuery = array(
							'posts_per_page'   => 10,
							'category__not_in' => 17
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




