<?php

/*
    Enquing the parent theme script file 
*/

require_once 'inc/footer-sidebar.php';
require_once 'inc/custom-functions.php';
require_once 'inc/woocommerce-functions.php';
require_once 'inc/wcfm-custom-functions.php';
require_once 'inc/deregister_parent_style.php';
require_once 'inc/custom-meta-box.php';


add_filter('query_vars', 'prefix_register_query_var');
function prefix_register_query_var($vars)
{
    $vars[] = 'vendor_category';
    $vars[] = 'type';

    return $vars;
}
add_action('template_redirect', 'prefix_url_rewrite_templates');

function prefix_url_rewrite_templates()
{
    if (get_query_var('vendor_category') && get_query_var('type') == 'vendor') {
        add_filter('template_include', function () {
            return get_stylesheet_directory() . '/vendor-cat.php';
        });
    }
}
