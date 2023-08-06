<?php
class Wg_Html extends WP_Widget {
    public function __construct() {
        parent::__construct('', esc_html(' * HTML Tùy Chỉnh', 'thacodongnai'),
            array(
                'classname' => '', 
                'description' => esc_html('HTML tùy chỉnh', 'thacodongnai'),
                'customize_selective_refresh' => true,
                'show_instance_in_rest' => true,
            )
        );
    }

    public function form($instance) {
        // Retrieve the existing HTML content from the widget instance
        $html = !empty($instance['html']) ? $instance['html'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('html')); ?>"><?php esc_html_e('HTML Content:', 'thacodongnai'); ?></label>
            <textarea class="widefat" rows="10" id="<?php echo esc_attr($this->get_field_id('html')); ?>" name="<?php echo esc_attr($this->get_field_name('html')); ?>"><?php echo esc_textarea($html); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        // Save the HTML content from textarea to widget instance
        $instance['html'] = wp_kses_post($new_instance['html']);
        return $instance;
    }

    public function widget($args, $instance) {
        extract($args);
        // Retrieve the HTML content from widget instance
        $html = !empty($instance['html']) ? $instance['html'] : '';
        echo $args['before_widget'];
        if (!empty($html)) {
            // Use the_content filter to parse shortcodes and apply formatting
            echo apply_filters('the_content', $html);
        }
        echo $args['after_widget'];
    }
}

function register_custom_html_widget() {
    register_widget('Wg_Html');
}
add_action('widgets_init', 'register_custom_html_widget');
?>