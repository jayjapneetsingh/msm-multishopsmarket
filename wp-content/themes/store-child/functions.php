<?php
global $wpdb;
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{

    // bootstrap cdn
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', false, false, 'all');

    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();

    wp_enqueue_style($parenthandle, get_template_directory_uri() . '/style.css',
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );

    wp_enqueue_style('child-style', get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );

    wp_enqueue_script('youtube-subs', 'https://apis.google.com/js/platform.js', array(), '', true);
}

require_once get_stylesheet_directory() . '/inc/footer-sidebar.php';


// Creating the widget
class wcfm_vendor_categories extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'wcfm_vendor_categories',

            // Widget name will appear in UI
            __('Vendor Categories Widget', 'wcfm_vendor_categories_domain'),

            // Widget description
            array('description' => __('List vendors Store categories', 'wcfm_vendor_categories_domain'))
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        global $wpdb;
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // This is where you run the code and display the output
        $results = $wpdb->get_results("SELECT option_value FROM `wp_options` WHERE option_name = 'wcfmvm_registration_custom_fields'");
        $data = unserialize($results[0]->option_value);
        $cat_data = $data[0]['options'];
        $vander_categories = explode('|', $cat_data);
        echo '<ul>';
        foreach ($vander_categories as $vendor) { ?>
           
         <li>
         <a href="<?php echo 'vendor-'.strtolower(trim($vendor))?>" ><?php echo $vendor ?></a>
         </li>
       <?php }
        echo '</ul>';
        
        echo $args['after_widget']; 
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'wcfm_vendor_categories_domain');
        }
        // Widget admin form
        ?>
    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <?php
}

}

// Register and load the widget
function wpb_load_widget()
{
    register_widget('wcfm_vendor_categories');
}
add_action('widgets_init', 'wpb_load_widget');

// AddsAddress_Widget widget.

class Address_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'address_widget', // Base ID
            esc_html__('Add Address', 'address_domain'), // Name
            array('description' => esc_html__('A Your Primary Address', 'address_domain')) // Args
        );
    }

    // Front-end display of widget.

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo '<div>' .
                 '<h5>' . $instance['city'] . '</h5>' . '<p>' . $instance['tel'] . '</p>' . '<p>' . $instance['email'] . '</p>' . '<p>' . $instance['country'] . '</p>' . 
            '</div>';

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Reach Us at: ', 'address_domain');

        $country = !empty($instance['country']) ? $instance['country'] : esc_html__('Country', 'address_domain');

        $city = !empty($instance['city']) ? $instance['city'] : esc_html__('City', 'address_domain');

        $tel = !empty($instance['tel']) ? $instance['tel'] : esc_html__('tel', 'address_domain');

        $email = !empty($instance['email']) ? $instance['email'] : esc_html__('email', 'address_domain');
        ?>

        <!-- Title -->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'address_domain');?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <!-- country -->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('country')); ?>"><?php esc_attr_e('country:', 'address_domain');?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('country')); ?>" name="<?php echo esc_attr($this->get_field_name('country')); ?>" type="text" value="<?php echo esc_attr($country); ?>">
        </p>

        <!-- City-->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('city')); ?>"><?php esc_attr_e('City:', 'address_domain');?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('city')); ?>" name="<?php echo esc_attr($this->get_field_name('city')); ?>" type="text" value="<?php echo esc_attr($city); ?>">
        </p>

        <!-- tel -->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('tel')); ?>"><?php esc_attr_e('tel:', 'address_domain');?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tel')); ?>" name="<?php echo esc_attr($this->get_field_name('tel')); ?>" type="tel" value="<?php echo esc_attr($tel); ?>" min="10" max="10">
        </p>

        <!-- EMAIL -->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_attr_e('email:', 'address_domain');?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="email" value="<?php echo esc_attr($email); ?>"  >
        </p>
        <?php
}

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';

        $instance['country'] = (!empty($new_instance['country'])) ? sanitize_text_field($new_instance['country']) : '';

        $instance['city'] = (!empty($new_instance['city'])) ? sanitize_text_field($new_instance['city']) : '';

        $instance['tel'] = (!empty($new_instance['tel'])) ? sanitize_text_field($new_instance['tel']) : '';

        $instance['email'] = (!empty($new_instance['email'])) ? sanitize_text_field($new_instance['email']) : '';

        return $instance;
    }
}

function register_address_widget()
{
    register_widget('address_widget');
}
add_action('widgets_init', 'register_address_widget');