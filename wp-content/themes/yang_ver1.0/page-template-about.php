<?php 
/*
Template Name: page-template-about
*/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
	<div class="aio_content_page">
		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
		endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>

</div>
	<div class="back_home">
		<a href="<?php echo get_home_url(); ?>"><img src="<?php echo BASE_URL; ?>/images/icon_prev_white.png"></a>
	</div>
<embed src="<?php echo BASE_URL; ?>/sound/thuong.mp3" autostart="true"></embed>
</body>


<?php get_footer(); ?>