<li class="col-sm-4 pw">
										<div class="post_cmt_wrapper">
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
													<?php
													$user = wp_get_current_user();
													if ( $user ) :
														?>
														<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
													<?php endif; ?>
													<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a> 
												</span>

											</div>
					
										</div>

									</li>