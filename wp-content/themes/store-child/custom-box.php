<?php
function add_custom_meta_box() {
    add_meta_box('system_outage','System Outage','show_system_outage','page','normal','high');
    }
add_action('add_meta_boxes', 'add_custom_meta_box');

$prefix = 'sysout_';
$outage_meta_fields = array(
    array(
        'label' => 'Buildings Affected',
        'desc' => 'Select the buildings affected',
        'id' => $prefix.'buildings',
        'type' => 'multiselect',
        'multiple'=> true,
        'options' => array(
            'building1' => array(
                'label' => 'Building 1',
                'value' => 'building1'
            ),
            'building2' => array(
                'label' => 'Building 2',
                'value' => 'building2' //This continues for a while
            ),
            'building3' => array(
                'label' => 'Building 3',
                'value' => 'building3' //This continues for a while
            )
            )
    )
);

function show_system_outage() {
    global $outage_meta_fields, $post;
    // print_r($post);
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
    echo '<table class="form-table">';
        foreach ($outage_meta_fields as $field) {
            $meta = get_post_meta($post->ID, $field['id'], true);
            echo '<tr>';
                echo '<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>';
                echo '<td>';
                    switch($field['type']) {

                        case 'multiselect':  
                            echo '<select  multiple="multiple" name="'.$field['id'].'" id="'.$field['id'].'">';  
                               foreach ($field['options'] as $option) {  
                                      echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  }  
                                      echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
                          break; 

                    }
                echo '</td>';
            echo '</tr>';
        }
    echo '</table>';
}


function save_custom_meta($post_id) {
    global $outage_meta_fields;

    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    }
    elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($outage_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        }
        elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }

}
add_action('save_post', 'save_custom_meta');