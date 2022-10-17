<?php
if (function_exists('register_sidebar')) {
    register_sidebar(array(

        'name' => 'Footer column 1',
        'id' => 'footer-column-1',
        'description' => 'Content of First footer Widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => 'Footer column 2',
        'id' => 'footer-column-2',
        'description' => 'Content of Second footer Widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
      register_sidebar(array(
        'name' => 'Footer column 3',
        'id' => 'footer-column-3',
        'description' => 'Content of Third footer Widget',
        'before_widget' => '<div >',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer column 4',
        'id' => 'footer-column-4',
        'description' => 'Content of Third footer Widget',
        'before_widget' => '<div >',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

}
