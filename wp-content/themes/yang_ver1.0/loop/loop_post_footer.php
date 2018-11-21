<li>
	<div class="wrap_thumb">
		<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
		<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
			<a href="<?php the_permalink();?>"></a>
		</figure>	
	</div>
	<p><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></p>
	<span><?php the_time('d/m');?></span>
</li>