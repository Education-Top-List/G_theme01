<?php
require_once( get_template_directory() . '/libs/ajax-auth.php' );
function zingvn_resources(){
	wp_enqueue_style ('style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts','zingvn_resources');

	// Navigation menus 
register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'menu_mobile' => __('Mobile Menu')
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

	// ADD FEATURED IMAGE SUPPORT
function featured_images_setup(){
	add_theme_support('post-thumbnails');
  add_image_size( 'thumbnail',300, 250, true ); //thumbnail
    add_image_size( 'medium', 600, 400, true ); //medium
    add_image_size( 'large', 1200, 800, true ); //large
}
add_action('after_setup_theme','featured_images_setup');

	// ADD POST FORMAT SUPPORT
add_theme_support('post-formats',array('aside','gallery','link'));

	// ADD OUR WIDGETS LOCATION
function our_widget_inits(){
	register_sidebar(array(
		'name' => 'Sidebar ml',
		'id' => 'sidebar1',
		'before_widget' => '<div id="%1$s" class=" %2$s widget_area">',
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


// ADD THEME CUSTOM LOGO
add_theme_support( 'custom-logo' );


	//  ADD BREADCRUMB
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



/*
 *  DUPLICATE POST IN  ADMIN. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 



/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Nhân bản</a>';
  }
  return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
// duplicate page
//add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);





function pressfore_comment_time_output($date, $d, $comment){
  return sprintf( _x( '%s trước', '', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );

}
add_filter('get_comment_date', 'pressfore_comment_time_output', 10, 3);





/**
 * ADD INPUT ADD CLASS TO WIDGET
 *
 */
function kc_widget_form_extend( $instance, $widget ) {
  if ( !isset($instance['classes']) )
    $instance['classes'] = null;

    $row .= "Class:\t<input type='text' name='widget-{$widget->id_base}[{$widget->number}][classes]' id='widget-{$widget->id_base}-{$widget->number}-classes' class='widefat' value='{$instance['classes']}'/>\n";
    $row .= "</p>\n";

    echo $row;
  return $instance;
}
add_filter('widget_form_callback', 'kc_widget_form_extend', 10, 2);function kc_widget_update( $instance, $new_instance ) {
  $instance['classes'] = $new_instance['classes'];
return $instance;
}
add_filter( 'widget_update_callback', 'kc_widget_update', 10, 2 );
function kc_dynamic_sidebar_params( $params ) {
  global $wp_registered_widgets;
  $widget_id    = $params[0]['widget_id'];
  $widget_obj    = $wp_registered_widgets[$widget_id];
  $widget_opt    = get_option($widget_obj['callback'][0]->option_name);
  $widget_num    = $widget_obj['params'][0]['number'];

  if ( isset($widget_opt[$widget_num]['classes']) && !empty($widget_opt[$widget_num]['classes']) )
    $params[0]['before_widget'] = preg_replace( '/class="/', "class=\"{$widget_opt[$widget_num]['classes']} ", $params[0]['before_widget'], 1 );
  return $params;
}
add_filter( 'dynamic_sidebar_params', 'kc_dynamic_sidebar_params' );


//SHOW POST COUNT VIEWS 
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
        return "1";
    }
    return $count.'';
}
// END SHOW POST COUNT VIEWS




  define('BASE_URL', get_site_url('null','/wp-content/themes/yang_ver1.0', 'http'));
?>


