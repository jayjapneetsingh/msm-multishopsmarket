<?php
/*
Enquing the parent theme script file
 */
dasdasadd_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );

    wp_enqueue_style('swiper-css', "https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css");

    wp_enqueue_script('swiper-js', "https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js", array(), false, true);

    wp_enqueue_script('bootstrap-js', "//code.jquery.com/jquery-3.3.1.slim.min.js ", array('jquery'), true);
}

require_once 'inc/footer-sidebar.php';
require_once 'inc/custom-functions.php';
require_once 'inc/woocommerce-functions.php';
require_once 'inc/wcfm-custom-functions.php';
require_once 'custom-meta-boxes.php';


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
        add_meta_box('vendor-category', 'Vendor Categories', 'show_vendor_categories', 'page');
    }
}
add_action('add_meta_boxes', 'add_custom_meta_box');

$vendor_cat_meta_fields = array(
    array(
        'label' => 'Vendor Categories',
        'desc' => 'Select the vendor category',
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
        // print_r($meta);
        // print_r($field['id']);
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
        echo $post_id;
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

