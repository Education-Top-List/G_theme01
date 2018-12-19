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
<embed src="<?php echo BASE_URL; ?>/sound/thuong.mp3" autostart="true"></embed>
</body>


<?php get_footer(); ?>