<?php

add_action( 'wp_enqueue_scripts', 'swiper_js_enquee' );
function swiper_js_enquee() {

    wp_enqueue_style('swiper-css',"//cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css");
    wp_enqueue_style('swiper-csssw',get_stylesheet_directory_uri()."/assets/css/styles.css");

    wp_enqueue_script('bootstrap-js',"//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js",array('jquery'),false);
    wp_enqueue_script('custom-swiper-js','//cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js',array(),false,true);
    wp_enqueue_script('d-custom-script-js',get_stylesheet_directory_uri().'/assets/js/script.js',array(),false,true);


}

/*
   Custom Logo
*/
add_action( 'after_setup_theme', 'msm_custom_logo' );

function msm_custom_logo() {
    $defaults = array(
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}

// Register Nav Menus
add_action('init', 'msm_nav_menus');

function msm_nav_menus(){
    register_nav_menus(array(
        'header_menus' =>__("Header Menu", 'msm'),
        'login_menus' => __("Login Menu",'msm' ),
    ) );

}

/*
      This code is used for inherting the li and nav classes in nav menus use the wp_nav menus classes
*/

function add_class_li($classes, $item, $args){
    if(isset($args->li_class)){
        $classes[] =$args->li_class;

    }
    if(isset($args ->active_class)&& in_array('current-menu-item', $classes)){
        $classes[] =$args->active_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_li', 10,3 );

/*
    This code is used for inherting anchor classes <a> tag classes
*/
function add_anchor_classes($attr,$item,$args){
    if(isset($args->a_class)){
        $attr['class'] = $args->a_class;
    }
    return $attr;
}
add_filter('nav_menu_link_attributes', 'add_anchor_classes', 10,3);

function pr($args,$args2 = false){
    echo"<pre>";
    print_r($args);
    echo"</pre>";
    if($args ==true){
        die;
    }
}



/*
 This code is used for search only products 
 */

add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
function tgm_io_cpt_search( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array( 'product') );
    }
    return $query;
}

