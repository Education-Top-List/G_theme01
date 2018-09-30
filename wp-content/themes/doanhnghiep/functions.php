<?php

function zingvn_resources(){
	wp_enqueue_style ('style', get_template_directory_uri().'/style.css');
	wp_enqueue_style ('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
	wp_enqueue_style ('bootstrap-style', get_template_directory_uri().'/css/bootstrap.min.css', array(),'1.0');
}

add_action('wp_enqueue_scripts','zingvn_resources');

	// Navigation menus 
register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'footer' => __('Footer Menu')
));

	// Get top ancestor id
function get_top_ancestor_id(){
	global $post;
	if($post->post_parent){
		$ancestors= array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}	
	return $post->ID;
}

	// Does page have children ? 
function has_children(){
	global $post;
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);
}

	// Customize excerpt word count length
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

	// Add featured image support
function featured_images_setup(){
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail',180,120,true);
	add_image_size('banner-image',920,110,true);
}
add_action('after_setup_theme','featured_images_setup');

	// Add post format support
add_theme_support('post-formats',array('aside','gallery','link'));

	// Add our widget locations
function our_widget_inits(){
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div id="%1$s" class="widget %2$s widget_area">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer area 1',
		'id' => 'footer1',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer area 2',
		'id' => 'footer2',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer area 3',
		'id' => 'footer3',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init','our_widget_inits');




/** Filter & Hook In Widget Before Post Content .*/
function before_post_widget() {


	if ( is_home() && is_active_sidebar( 'sidebar1' ) ) { 
		dynamic_sidebar('sidebar1', array(
			'before' => '<div class="before-post">',
			'after' => '</div>',
		) );      
	}

}

add_action( 'woo_loop_before', 'before_post_widget' );

	// Add theme custom logo
add_theme_support( 'custom-logo' );

	// Add breadcrumb
if ( ! function_exists( 'breadcrumbs' ) ) :
    /**
     * Prints HTML.
     */
    function breadcrumbs() {
        $delimiter = '';
        $name = 'Trang chủ'; //text for the 'Home' link
        $currentBefore = '<li><span class="current">';
        $currentAfter = '</span></li>';
        global $post;
        $home = get_bloginfo('url');
        
        if(is_home() && get_query_var('paged') == 0) 
            echo '<span class="home">' . $name . '</span>';
        else
            echo '<li><a class="home" href="' . $home . '">' . $name . '</a> </li> '. $delimiter . ' ';
        if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore;
            single_cat_title();
            echo $currentAfter;
      
        } elseif ( is_single() ) {
          $cat = get_the_category(); $cat = $cat[0];
          echo '<li>';
          echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          echo '</li>';
          echo $currentBefore;
          the_title();
          echo $currentAfter;
      
        } elseif ( is_page() && !$post->post_parent ) {
          echo $currentBefore;
          the_title();
          echo $currentAfter;
      
        } elseif ( is_page() && $post->post_parent ) {
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
          echo $currentBefore;
          the_title();
          echo $currentAfter;
      
        } elseif ( is_search() ) {
          echo $currentBefore . 'Search for ' . get_search_query() . $currentAfter;
      
        } elseif ( is_tag() ) {
          echo $currentBefore;
          single_tag_title();
          echo $currentAfter;
      
        } elseif ( is_author() ) {
           global $author;
          $userdata = get_userdata($author);
          echo $currentBefore. $userdata->display_name . $currentAfter;
      
        } elseif ( is_404() ) {
          echo $currentBefore . 'Error 404' . $currentAfter;
        }
      
        if ( get_query_var('paged') )
          echo $currentBefore . __('Page') . ' ' . get_query_var('paged') . $currentAfter;
    }
	endif;
?>