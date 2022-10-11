<?php
/*
    Including a footer-sidebar
*/
add_action( 'after_setup_theme', 'register_navwalker' ); 

function register_navwalker(){
	require_once get_stylesheet_directory( ).'/inc/footer-sidebar.php';
}


/*
    Enquing the parent theme script file 
*/

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
    wp_enqueue_style('swiper-css',"https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css");
    wp_enqueue_script('swiper-js',"https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js",array(),false,true);
    wp_enqueue_script('bootstrap-js',"//code.jquery.com/jquery-3.3.1.slim.min.js ",array('jquery'),true);
    wp_enqueue_script('custom-swiper-js',get_stylesheet_directory_uri( ).'/slider.js',array(),false,true);

}

/* 
   Custom Logo 
*/

add_action( 'after_setup_theme', 'msm_custom_logo' );

function msm_custom_logo() {
    $defaults = array(
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );


    add_theme_support('custom-logo', $defaults);
} 


// Register Nav Menus 

add_action('init', 'msm_nav_menus');

function msm_nav_menus(){
    register_nav_menus(array(
        'header_menus' =>__("Header Menu", 'msm'),
        'login_menus' => __("Login Menu",'msm' ),
        ) );
        
    }


/*
      This code is used for inherting the li and nav classes in nav menus use the wp_nav menus classes 
*/
     
function add_class_li($classes, $item, $args){
    if(isset($args->li_class)){
        $classes[] =$args->li_class;
  
    }
    if(isset($args ->active_class)&& in_array('current-menu-item', $classes)){
        $classes[] =$args->active_class;
    }
    return $classes;
 }
 add_filter('nav_menu_css_class', 'add_class_li', 10,3 );
  
  

/*
    This code is used for inherting anchor classes <a> tag classes 
*/

 function add_anchor_classes($attr,$item,$args){
    if(isset($args->a_class)){
        $attr['class'] = $args->a_class;
    }
    return $attr;
 }
 add_filter('nav_menu_link_attributes', 'add_anchor_classes', 10,3);
 


/*
    This function enable woocomerce support for developers 
*/


 function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/*
     This code is used for showing product when no post found on search bar
*/


add_action( 'woocommerce_no_products_found', 'show_products_on_no_products_found', 20 );
function show_products_on_no_products_found() {
	echo '<h2>' . __( 'You may be interested in…', 'domain' ) . '</h2>';
	echo do_shortcode( '[recent_products per_page="4"]' );
}


/*
     This is a print_r code
*/

function pr($args,$args2 = false){
    echo"<pre>";
    print_r($args);
    echo"</pre>";
    if($args ==true){
        die;
    }
}





/****hide fields****/

add_filter('wcfm_marketplace_settings_fields_brand', 'wcfm_marketplace_settings_fields_general_custom2605', 50, 2 );
add_filter('wcfm_marketplace_settings_fields_general', 'wcfm_marketplace_settings_fields_general_custom2605', 50, 2 );
function wcfm_marketplace_settings_fields_general_custom2605($general_fields,$vendor_id) {
		unset($general_fields['banner_type']);
		unset($general_fields['banner_video']);
		unset($general_fields['banner_slider']);
		unset($general_fields['mobile_banner']);
		unset($general_fields['list_banner_type']);
		unset($general_fields['list_banner']);
		unset($general_fields['list_banner_video']);	
	return $general_fields;
}
/****save banner image to mobile and list banner mage****/


add_action( 'wcfm_wcfmmp_settings_update','fn_wcfm_vendor_settings_custom_update_2605', 30, 2);
add_action( 'wcfm_vendor_settings_update','fn_wcfm_vendor_settings_custom_update_2605', 30, 2);
function fn_wcfm_vendor_settings_custom_update_2605($user_id, $wcfm_settings_form ){	
	global $WCFM;
	$wcfm_settings_form_data_new = array();
	parse_str($_POST['wcfm_settings_form'], $wcfm_settings_form_data_new);	
	$wcfm_settings_form_data_mobilelistdata = array();
	

	if( isset($wcfm_settings_form_data_new['banner']) ) {
		if( !empty($wcfm_settings_form['banner']) ) {
			$wcfm_settings_form_data_mobilelistdata['mobile_banner'] = $WCFM->wcfm_get_attachment_id($wcfm_settings_form_data_new['banner']);
			$wcfm_settings_form_data_mobilelistdata['list_banner'] = $WCFM->wcfm_get_attachment_id($wcfm_settings_form_data_new['banner']);
		} else {
			$wcfm_settings_form_data_mobilelistdata['mobile_banner'] = '';
			$wcfm_settings_form_data_mobilelistdata['list_banner'] = '';
		}
	}
	
	$wcfm_settings_form = array_merge( $wcfm_settings_form, $wcfm_settings_form_data_mobilelistdata );
	update_user_meta( $user_id, 'wcfmmp_profile_settings', $wcfm_settings_form );
}


