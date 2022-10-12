<?php
/*
    This function enable woocomerce support for developers
*/


function theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'theme_add_woocommerce_support' );

/*
     This code is used for showing product when no post found on search bar
*/

add_action( 'woocommerce_no_products_found', 'show_products_on_no_products_found', 20 );
function show_products_on_no_products_found() {
    echo '<h2>' . __( 'You may be interested in…', 'domain' ) . '</h2>';
    echo do_shortcode( '[recent_products per_page="4"]' );
}
