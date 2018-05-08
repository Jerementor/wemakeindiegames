<?php
//Loading in Scripts
function wemakeindiegames_enqueue_styles(){
    wp_enqueue_script('webflow-js', get_template_directory_uri() . '/assets/js/webflow.js', array('jquery'));
    // wp_enqueue_script('wemakeindiegames_custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'));
    
    wp_enqueue_style("normalize",  get_template_directory_uri() . "/assets/css/normalize.css");
    wp_enqueue_style("webflow",  get_template_directory_uri() . "/assets/css/webflow.css");
    wp_enqueue_style("wemakeindiegames",  get_template_directory_uri() ."/assets/css/wemakeindiegames.webflow.css");
    wp_enqueue_style("wemakeindiegames-style", get_stylesheet_uri());
    
}
add_action("wp_enqueue_scripts", "wemakeindiegames_enqueue_styles");
function wemakeindiegames_menu_setup(){
    
    //Registers custom primary nav menu 
    register_nav_menus( array(
        'logged-in'     => __("Logged-In Menu", "wemakeindiegames-login"),
        'logged-out'    => __("Logged-Out Menu", "wemakeindiegames-logout"),
        'main-nav'    => __("Main-Nav Menu", "wemakeindiegames-mainnav"),
        // 'drop-down'    => __("Dropdown Menu", "thegameclass-drop"),
        // 'second-nav'    => __("Second Nav Menu", "thegameclass-secondnav"),
        
    ));
    
}
add_action("after_setup_theme", "wemakeindiegames_menu_setup");
function wemakeindiegames_setup(){
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	
	) );
}
add_action( 'after_setup_theme', 'wemakeindiegames_setup' );

//remove_filter('the_content', 'wpautop');


add_post_type_support( 'page', 'excerpt' );

// add_filter ('get_the_excerpt','wemakeindiegames_filter_excerpt');

// function wemakeindiegames_filter_excerpt ($post_excerpt) { 
//   $post_excerpt = '<p class="jer_blog_sub">' . $post_excerpt . '</p>';
//   return $post_excerpt;
// }  

function wemakeindiegames_widgets(){
  
    register_sidebar(array(
     'name'           => __('Categories- Sidebar', 'wemakeindiegames'),
     'id'             => 'article-sidebar',
     'description'    => __('Add widgets here to appear in the sidebar', 'wemakeindiegames'),
     'before_widget'  => '<div id="%1$s" class="%2$s">',
     'after_widget'   => '</div>',
     'before_title'   => '<h3 class="jer_h3"> ',
     'after_title'    => '</h3>',
  ));
  
}
add_action('widgets_init', 'wemakeindiegames_widgets');

add_filter('widget_title','wemakeindiegames_widget_title'); 
function wemakeindiegames_widget_title($t)
{

    return null;
}


function wemakeindiegames_edd_empty_cart_redirect() {
	$cart 		= function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : false;
	$redirect 	= site_url( '/' ); // could be the URL to your shop
	if ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() && ! $cart ) {
		wp_redirect( $redirect, 301 ); 
		exit;
	}
}
add_action( 'template_redirect', 'wemakeindiegames_edd_empty_cart_redirect' );

if (!current_user_can('manage_options')){
    add_filter('show_admin_bar', '__return_false');
}



function wemakeindiegames_filter_excerpt ($post_excerpt) { 
  $post_excerpt = '<p class="jer_post_sub">' . $post_excerpt . '</p>';
  return $post_excerpt;
}  

add_filter ('get_the_excerpt','wemakeindiegames_filter_excerpt');

function wemakeindiegames_remove_p_on_pages() {
       $pages = array(163, "/sales", "/join-community");
    if ( is_page($pages) ) {
        remove_filter( 'the_content', 'wpautop' );
    }
}
add_action( 'wp_head', 'wemakeindiegames_remove_p_on_pages' );