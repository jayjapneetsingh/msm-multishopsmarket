<?php

// FOR HERO BANNER 

$stores = [];
$shops = get_users(
    array('meta_key' => 'store_name')
);


foreach ($shops as $user) :
    $vendor_address = get_user_meta($user->ID, 'wcfmmp_profile_settings', true);
    $store_name = $vendor_address['store_name'];
    $stores[$store_name] = array(
        'label' => $store_name,
        'value' => $user->ID,
    );
endforeach;

function add_custom_meta_box_hero_slider()
{
    global $post;
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

    if ($pageTemplate == 'front-page.php') {
        add_meta_box('vendor-shops', 'Hero Banner Shops Slider', 'show_vendor_shops', 'page');
    }
}
add_action('add_meta_boxes', 'add_custom_meta_box_hero_slider');


$vendor_shops_meta_fields = array(
    array(
        'label' => 'For windows: Hold down the control (ctrl) button to select multiple options
        <br>For Mac: Hold down the command button to select multiple options',
        'id' => 'vendor-shop',
        'type' => 'multiselect',
        'multiple' => true,
        'select_all_none' => true,
        'options' => $stores,
    ),

);

function show_vendor_shops()
{
    global $vendor_shops_meta_fields, $post;
    echo '<table class="form-table">';
    foreach ($vendor_shops_meta_fields as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>';
        echo '<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
        echo '<td>';
        switch ($field['type']) {
            case 'multiselect':
                echo '<select name="' . $field['id'] . '[]" id="' . $field['id'] . '"', $field['type'] == 'chosen' ? ' class="chosen"' : '', isset($field['multiple']) && $field['multiple'] == true ? ' multiple="multiple"' : '', '>';

                foreach ($field['options'] as $option) {
                    echo '<option value="' . $option['value'] . '"', is_array($meta) && in_array($option['value'], $meta) ? ' selected="selected"' : '', ' >' . $option['label'] . '</option>';
                }

                echo '</select><br />';
                break;
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}


function save_custom_meta_hero_slider($post_id)
{
    global $vendor_shops_meta_fields;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($vendor_shops_meta_fields as $field) {

        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_custom_meta_hero_slider');


//  FOR VENDOR CATEGORIES SLIDER
$vendors = get_option('wcfmvm_registration_custom_fields', true)[0]['options'];
$vandors_cat = explode('|', $vendors);
$options = [];
foreach ($vandors_cat as $cat) {
    $options[$cat] = array(
        'label' => $cat,
        'value' => $cat,
    );
}

function add_custom_meta_box()
{
    global $post;
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

    if ($pageTemplate == 'front-page.php') {
        add_meta_box('vendor-category', 'Vendor Categories Slider', 'show_vendor_categories', 'page');
    }
}
add_action('add_meta_boxes', 'add_custom_meta_box');

$vendor_cat_meta_fields = array(
    array(
        'label' => 'For windows: Hold down the control (ctrl) button to select multiple options
        <br>For Mac: Hold down the command button to select multiple options',
        'id' => 'vendor-cat',
        'type' => 'multiselect',
        'multiple' => true,
        'select_all_none' => true,
        'options' => $options,
    ),

);

function show_vendor_categories()
{
    global $vendor_cat_meta_fields, $post;
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($vendor_cat_meta_fields as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>';
        echo '<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
        echo '<td>';
        switch ($field['type']) {
            case 'multiselect':
                echo '<select name="' . $field['id'] . '[]" id="' . $field['id'] . '"', $field['type'] == 'chosen' ? ' class="chosen"' : '', isset($field['multiple']) && $field['multiple'] == true ? ' multiple="multiple"' : '', '>';

                foreach ($field['options'] as $option) {
                    echo '<option value="' . $option['value'] . '"', is_array($meta) && in_array($option['value'], $meta) ? ' selected="selected"' : '', ' >' . $option['label'] . '</option>';
                }

                echo '</select><br />' . $field['desc'];
                break;
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

function save_custom_meta($post_id)
{
    global $vendor_cat_meta_fields;
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }


    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($vendor_cat_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_custom_meta');
