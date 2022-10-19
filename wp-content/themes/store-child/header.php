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
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<!-- Head end -->

<!-- Body Start -->
<body <?php body_class(); ?>>
  <?php
   $custom_logo_id = get_theme_mod('custom_logo');
   $image = wp_get_attachment_image_src($custom_logo_id, 'medium');
?>
  <header>
      <nav class="navbar navbar-expand-lg fixed-top">
          <div class="container-fluid custom-container">
              <a class="brand-logo" href="<?php echo esc_url(home_url('/')) ;?>"><img src="<?php echo $image[0];?>" alt="msm-logo"></a>

              <form id="search-form" action="/" method="get" class="d-none d-sm-block d-lg-none">
              <div class="form-group position-relative">
                              <input class="form-control me-2" type="search" name="s" placeholder="Search products and shops"
                                     value="<?php the_search_query(); ?>" />
                              <button href="#"  id="search-form-submit"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/Icon-search.svg" alt="search-logo&quot;"></button>
                          </div>
              </form>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                      aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                  <div class=" d-flex flex-column align-items-start flex-lg-row w-100">
                      <ul class="navbar-nav me-auto mb-3 my-sm-3 my-lg-0 order-2 order-lg-0">
                          <!--This is header nav menus -->

                          <?php
                          $header_menu = array(
                              'theme_location'  => 'header_menus',
                              'menu_class' => 'navbar-nav d-flex align-items-center ms-0',
                              'li_class' => 'nav-item',
                              'a_class' => 'nav-link',
                              'active_class' => 'active',
                          );
                          wp_nav_menu($header_menu);
                          ?>
                          <!-- Header nav menus end -->
                      </ul>

                      <!-- Search Bar -->
                      <form id="search-form" action="/" method="get" class="d-flex me-auto my-3 my-lg-0 d-block d-sm-none d-lg-block order-1 order-lg-0">
                          <div class="form-group position-relative">
                              <input class="form-control me-2" type="search" name="s" placeholder="Search products and shops"
                                     value="<?php the_search_query(); ?>" />
                              <button href="#"  id="search-form-submit"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/Icon-search.svg" alt="search-logo&quot;"></button>
                          </div>
                      </form>
                      <!-- Search bar end  -->

                      <div class="btn-group  flex-column flex-sm-row order-3 order-lg-0">
                          <!-- This is a second nav menu called as Login menu -->
                          <?php $login_menu = array(
                              'theme_location'  => 'login_menus',
                              'menu_class' => 'btn-menu',
                              'a_class' => 'common-btn',
                              'active_class' => 'active',
                          );
                          wp_nav_menu($login_menu);
                          ?>
                      </div>
                  </div>
              </div>
          </div>
      </nav>
  </header>
  <!-- header-ends here -->
  <!-- Header end -->