<?php
/****hide fields****/
add_filter('wcfm_marketplace_settings_fields_brand', 'wcfm_marketplace_settings_fields_general_custom', 50, 2 );
add_filter('wcfm_marketplace_settings_fields_general', 'wcfm_marketplace_settings_fields_general_custom', 50, 2 );
function wcfm_marketplace_settings_fields_general_custom($general_fields,$vendor_id) {
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


add_action( 'wcfm_wcfmmp_settings_update','fn_wcfm_vendor_settings_custom_update', 30, 2);
add_action( 'wcfm_vendor_settings_update','fn_wcfm_vendor_settings_custom_update', 30, 2);
function fn_wcfm_vendor_settings_custom_update($user_id, $wcfm_settings_form ){
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

