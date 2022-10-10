
<?php
// require_once('custom-box.php');
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


function addMyScript() {
  wp_enqueue_script('swiper-js',get_stylesheet_directory_uri( ).'/inc/swiper.js',array(),false,true);
                      }
  add_action('wp_enqueue_scripts', 'addMyScript');

// $user_id=get_current_user_id();
// $user=get_user_meta($user_id);
// $shop_category=$user['store-category'][0];
// if($shop_category){
//     $labels = array(
//         'name' => _x( $shop_category, 'taxonomy general name' ),
//         'singular_name' => _x( $shop_category, 'taxonomy singular name' ),
//         'search_items' =>  __( 'Search blog_category' ),
//         'all_items' => __( 'All'.$shop_category),
//         // 'parent_item' => __( 'Parent blog_category' ),
//         // 'parent_item_colon' => __( 'Parentblog_category:' ),
//         // 'edit_item' => __( 'Edit blog_category' ), 
//         // 'update_item' => __( 'Update blog_category' ),
//         // 'add_new_item' => __( 'Add New blog_category' ),
//         // 'new_item_name' => __( 'New blog_category Name' ),
//         'menu_name' => __($shop_category),
//       );    
     
//     // Now register the taxonomy
//       register_taxonomy($shop_category,array('product'), array(
//         'hierarchical' => true,
//         'labels' => $labels,
//         'show_ui' => true,
//         'show_in_rest' => true,
//         'show_admin_column' => true,
//         'query_var' => true,
//         'rewrite' => array( 'slug' => $shop_category ),
//       ));
     
//     }

    // $banner_type     = $store_user->get_list_banner_type();
    // if( $banner_type == 'video' ) {
    //   $banner_video = $store_user->get_list_banner_video();
    // } else {
    //   $banner          = $store_user->get_list_banner();
    //   if( !$banner ) {
    //     $banner = !empty( $WCFMmp->wcfmmp_marketplace_options['store_list_default_banner'] ) ? wcfm_get_attachment_url($WCFMmp->wcfmmp_marketplace_options['store_list_default_banner']) : $WCFMmp->plugin_url . 'assets/images/default_banner.jpg';
    //     $banner = apply_filters( 'wcfmmp_list_store_default_bannar', $banner );
    //   }
    // }
    // die('dyingggg///');    
// function my_acf_load_field( $field ) {
    // print_r($field);
    // die('hkjhk');
    // $terms = get_taxonomies();
    // unset($terms['nav_menu'],$terms['link_category'],$terms['wp_template_part_area'],$terms['post_format'],$terms['wp_theme']);
  
    // foreach($terms as $term){
  
    //   $field['choices'][$term]=$term;
    // }
//    return $field;
//   }
//    add_filter('acf/load_field/type=postobject', 'my_acf_load_field');
// die(' l;jjfljdljfl;j'  );

// function update_acf_post_object_field_choices() {
// 	// $title .= ' [' . $post->ID .  ']';
// 	die(' l;jjfljdljfl;j'  );
//         // return $title;	
// }

// add_filter( 'acf/fields/post_object/query', 'update_acf_post_object_field_choices');



//     $args['tax_query'] = array(
//         array(
//             'taxonomy'  => 'category',
//             'field'     => 'term_id',
//             'terms'     => $post_id,
//         ),
//     );

// return $args;
// }

// add_filter('acf/fields/post_object/', 'filter_by_category'); -->