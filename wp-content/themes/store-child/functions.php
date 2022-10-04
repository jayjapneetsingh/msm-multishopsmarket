<?php
/*
    Including a footer-sidebar
*/
add_action( 'after_setup_theme', 'register_navwalker' ); 

function register_navwalker(){
	require_once get_stylesheet_directory( ).'/inc/footer-sidebar.php';
}


/*
    Enquing the parent theme script file 
*/

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
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
    
}
    add_theme_support( 'custom-logo', $defaults );
 


// Register Nav Menus 

add_action('init', 'msm_nav_menus');

function msm_nav_menus(){
    register_nav_menus(array(
        'header_menus' =>__("Header Menu", 'msm'),
        'login_menus' => __("Login Menu",'msm' ),
        ) );
        
    }

