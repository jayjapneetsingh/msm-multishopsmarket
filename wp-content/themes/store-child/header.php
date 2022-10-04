<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package jay
*/
 
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">
 
   <?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>



<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/')) ;?>">
    <?php if (function_exists('the_custom_logo')){
                the_custom_logo();
            }
            ?> </a>
            <?php get_search_form( ); ?>

    <div class="collapse navbar-collapse" id="navbarNav">
    <?php 
       
      
       $header_menu = array(
     'theme_location'  => 'header_menus',
     'menu_class' => 'navbar-nav',
     'li_class' => 'nav-item',
     'a_class' => 'nav-link',
     'active_class' => 'active',

  );
 wp_nav_menu($header_menu);

?>
  
     <?php $login_menu = array(
     'theme_location'  => 'login_menus',
     'container'       => '',
     'menu_class' => '',
     'li_class' => '',
     'a_class' => 'nav-link',
     'active_class' => 'active',
     'container_class' => '',
     'container_id'    => '',

  );
 wp_nav_menu($login_menu);

?>
      
    
    </div>
  </div>
</nav> 
</header>