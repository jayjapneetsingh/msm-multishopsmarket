<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_stylesheet_directory_uri() . '/css/styles.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri().'/css/styles.css',
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

//single line comment



function themename_custom_logo_setup() {
    $defaults = array(
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


// Register Nav Menus 

function msm_nav_menus(){
    register_nav_menus(array(
        'header_menu' =>__("Header Menu", 'salesvue_nav_menus'),
        'login_menu' => __("Login Menu",'salesvue_nav_menus' ),
        
            ) );
    
}

add_action('init', 'msm_nav_menus');


//

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
 function add_anchor_classes($attr,$item,$args){
    if(isset($args->a_class)){
        $attr['class'] = $args->a_class;
    }
    return $attr;
 }
 add_filter('nav_menu_link_attributes', 'add_anchor_classes', 10,3);