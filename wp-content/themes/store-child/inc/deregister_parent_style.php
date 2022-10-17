<?php
function project_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'store-swiperslider-style');
    wp_deregister_style( 'store-swiperslider-style' );
}
add_action( 'wp_print_styles', 'project_dequeue_unnecessary_styles' );


