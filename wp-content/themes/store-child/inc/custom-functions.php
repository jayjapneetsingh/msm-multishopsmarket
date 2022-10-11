<?php
// Enqueue javascript for swiper
function addMyScript()
{
    wp_enqueue_script('swiper-js', get_stylesheet_directory_uri().'/inc/js/swiper.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'addMyScript');

// Function loads multiselect acf field with all shops
function load_category_selector_acf($field)
{   
   $categories = get_option('wcfmvm_registration_custom_fields');
      foreach ($categories as $category) :
             foreach (explode(' | ', $category['options']) as $shop_cat):
                 $field['choices'][$shop_cat] = $shop_cat;
             endforeach;
      endforeach;

    return $field;

}
add_filter('acf/load_field/name=shop_category', 'load_category_selector_acf');

// Function loads Select acf field with all Categories
function load_multi_select_acf($field)
{
    $users = get_users();
    foreach ($users as $use):
        $store_user = wcfmmp_get_store($use->ID);
        $user_capability = get_user_meta($use->ID, 'ms_capabilities');
        if (!$user_capability[0]['administrator']):
            foreach ($store_user as $user):
                $field['choices'][$user->store_name] = $user->store_name;
            endforeach;
        endif;
    endforeach;
      return $field;
}
add_filter('acf/load_field/name=hero_slider', 'load_multi_select_acf');