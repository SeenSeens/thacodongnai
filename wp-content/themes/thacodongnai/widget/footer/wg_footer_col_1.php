<?php
class Wg_Footer_Col_1 extends WP_Widget {
    public function __construct() {
      parent::__construct( '', esc_html( ' * Info website', 'thacodongnai' ),
           [
                'classname' => 'footer__wrap-city', 
                'description' => esc_html( 'Hiển thị thông tin', 'thacodongnai' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'thacodongnai' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'thacodongnai' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'thacodongnai' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( ' Mô tả ', 'thacodongnai' ); ?></label> 
            <textarea class="widefat" name="<?= esc_attr( $this->get_field_name( 'description' ) ); ?>" id="<?= esc_attr( $this->get_field_id( 'description' ) ); ?>" type="text" rows="10" cols="30"><?= esc_attr( $description ); ?></textarea>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? ( $new_instance['description'] ) : '';
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = $instance['title'];
        $description = $instance['description'];
        echo $args['before_widget'];
        ?>
            <h5 class="footer__wrap-city-title Roboto-Bold c-text-lg text-uppercase">
                <?php
                if ( !empty($title)) {
                    echo $title;
                }
                ?>
            </h5>
            <div class="footer__wrap-city-desc c-text-base">
                    <?php
                if ( !empty($description)) {
                    echo $description;
                }
                ?>
            </div>
            <a href="<?= esc_attr( get_field('link', 'widget_' . $widget_id ) ); ?>" class="footer__wrap-city-ministry desktop">
                <img src="<?= get_field('logo_bo_cong_thuong', 'widget_' . $widget_id); ?>" alt="Logo Bộ Công Thương" />
            </a>
        <?php
        echo $args['after_widget'];
    }
}
add_action( 'widgets_init', function() {
    register_widget( 'Wg_Footer_Col_1' );
});
$wg_footer_col_1 = new Wg_Footer_Col_1();

?>
