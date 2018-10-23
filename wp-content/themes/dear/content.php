<div class="list_post_item pw <?= is_home() ? "col-md-6" : "" ?>">
	<figure class="thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?>
			<div class="arrow-up"></div>
		</a> 

		<?php if(is_home()) { ?>
		
				<?php 
				$categories = get_the_category();
				$seperator = ", ";
				$output = '';
				if($categories){
					foreach ($categories as $category){
						$output .= '<a class="cat_inner_thumbnail" href="' . get_category_link($category->term_id) . '"> '. $category-> cat_name . ' </a>' .  $seperator;
					}
					echo trim($output , $seperator);

				}

		}; ?>
		
	</figure>
	<div class="post_wrapper_content">
		<div class="author-custom">
			<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
				<?php echo get_avatar(get_the_author_meta('ID')); ?>
				<strong><?php the_author(); ?></strong>
			</a> 
			<button class="like__btn animated id_<?= get_the_ID() ?>" data-id="<?= get_the_ID() ?>">
	    		<i class="like__icon fa fa-heart"></i>
	    		<span class="like__number_<?= get_the_ID() ?>"> <?php echo post_love_display(get_the_ID()) ?> </span>
	  		</button>
  		</div>
  		
		<h2 class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if(is_category()) : ?>
		<div class="post_meta">
			<p><?php the_time('d/m/y');?><span>  <?php the_time('g:i a') ?></span> 
				| by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a> 
				| Posted in
				<?php 
				$categories = get_the_category();
				$seperator = ", ";
				$output = '';
				if($categories){
					foreach ($categories as $category){

						$output .='<a href="' . get_category_link($category->term_id) . '"> '. $category-> cat_name . ' </a>' .  $seperator;

					}
					echo trim($output , $seperator);
				}
				?>
			</p>
		</div>
	   <?php endif ?>
		
		<?php if(is_search() OR is_archive()){?>
			<p><?php echo excerpt(25); ?></p>
			<a class="readmore" href="<?php echo the_permalink(); ?>">Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
		<?php } 
		else {
			if($post->post_excerpt){ ?>
				<div class="excerpt"><p><?php echo excerpt(35); ?></p></div>
				<a class="readmore" href="<?php echo the_permalink(); ?>">Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			<?php } else{
				the_content();
			} 
		} ?>
	
	</div>


</div>
