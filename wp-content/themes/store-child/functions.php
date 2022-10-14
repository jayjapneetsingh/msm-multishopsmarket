<?php
/*
Enquing the parent theme script file
 */

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );

    wp_enqueue_style('swiper-css', "https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css");

    wp_enqueue_script('swiper-js', "https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js", array(), false, true);

    wp_enqueue_script('bootstrap-js', "//code.jquery.com/jquery-3.3.1.slim.min.js ", array('jquery'), true);
}

require_once 'inc/footer-sidebar.php';
require_once 'inc/custom-functions.php';
require_once 'inc/woocommerce-functions.php';
require_once 'inc/wcfm-custom-functions.php';
require_once 'custom-meta-boxes.php';


