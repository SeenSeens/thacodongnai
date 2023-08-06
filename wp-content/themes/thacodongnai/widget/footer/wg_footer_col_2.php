<?php
class Wg_Footer_Col_2 extends WP_Widget {
    public function __construct() {
      parent::__construct( '', esc_html( ' * Menu Footer', 'thacodongnai' ),
           [
                'classname' => 'footer__wrap-product', 
                'description' => esc_html( 'Menu ở footer', 'thacodongnai' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        global $wp_customize;
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'thacodongnai' );
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
        // Get menus.
        $menus = wp_get_nav_menus();
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'thacodongnai' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"><?php esc_attr_e( ' Chọn menu ', 'thacodongnai' ); ?></label> 
            <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
                <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
                <?php foreach ( $menus as $menu ) : ?>
                    <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
                        <?php echo esc_html( $menu->name ); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['nav_menu'] = ( ! empty( $new_instance['nav_menu'] ) ) ? (int) ( $new_instance['nav_menu'] ) : '';
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
        if ( ! $nav_menu ) { return; }
        echo $args['before_widget'];
        ?>
        <h5 class="footer__wrap-product-title Roboto-Bold c-text-lg text-uppercase"><?php if ( !empty($title)) { echo $title; } ?></h5>
        <?php
        if ( ! function_exists( 'add_menu_link_class' ) ) {
            function add_menu_link_class( $atts, $item, $args ) {
                if ( isset( $args->menu_item_class ) ) {
                    $atts['class'] = $args->menu_item_class;
                }
                return $atts;
            }
            add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 10, 3 );
        }

        wp_nav_menu( [
            'fallback_cb'          => '',
            'menu'                 => $nav_menu,
            'container'            => false,
            'items_wrap'           => '<ul class="footer__wrap-list c-text-sm">%3$s</ul>',
            'menu_item_class'      => 'c-text-base'
        ] );
        ?>
        <?php
        echo $args['after_widget'];
    }
}
add_action( 'widgets_init', function() {
    register_widget( 'Wg_Footer_Col_2' );
});
$wg_footer_col_2 = new Wg_Footer_Col_2();

?>
