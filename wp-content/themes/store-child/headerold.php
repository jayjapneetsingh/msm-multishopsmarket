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


  <!-- <?php
//         $custom_logo_id = get_theme_mod( 'custom_logo' );
// $image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
// // echo $image[0];
?> -->

  <header>
    <nav class="custom-navbar d-flex ">
      <div class="container-fluid custom-container d-flex align-items-center">
        <a class="navbar-brand" href="<?php echo esc_url( home_url('/')) ;?>"><img src="<?php echo $image[0];?>"></a>
        <div class="collapse navbar-collapse show" id="navbarNav">
          <div class="nav-menu d-flex align-items-center justify-content-evenly">


            <?php 
       
      
       $header_menu = array(
     'theme_location'  => 'header_menu',
     'menu_class' => 'navbar-nav d-flex align-items-center ms-0',
     'li_class' => 'nav-item',
     'a_class' => 'nav-link',
     'active_class' => 'active',

  );
 wp_nav_menu($header_menu);
?>
            <form action="/" method="get" class="search-bar">
              <div class="form-group">
                <input type="text" name="s" id="search" placeholder="Search products"
                  value="<?php the_search_query(); ?>" />
                <img src="<?php echo get_stylesheet_directory_uri().'/Search.svg'?>" alt="">
              </div>
            </form>

            <?php $login_menu = array(
     'theme_location'  => 'login_menu',
     'container'       => '',
     'menu_class' => 'btn-menu m-0',
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
      </div>
    </nav>
  </header>