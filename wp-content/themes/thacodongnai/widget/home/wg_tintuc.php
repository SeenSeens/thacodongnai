<?php
class Wg_Tintuc extends WP_Widget {
    public function __construct() {
      parent::__construct( '', esc_html( ' * Tin tức', 'thacodongnai' ),
           [
                'classname' => 'home__new', 
                'description' => esc_html( 'Tin tức', 'thacodongnai' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'thacodongnai' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( ' Tiêu đề ', 'thacodongnai' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = $instance['title'];
        $query = new WP_Query( [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 8,
        ] );
        
        echo $args['before_widget'];
        ?>
        <h2 class="home__new-title Roboto-Bold c-text-2xl text-uppercase container"><?php if ( !empty($title)) echo $title; ?></h2>
        <div class="home__new--wapper desktop">
            <div class="home__new--wapper-slide">
                <div class="swiper homeNewSwiper">
                    <div class="swiper-wrapper">
                        <?php
                        if( $query->have_posts() ) {
                            while( $query->have_posts() ) {
                                $query->the_post();
                        ?>
                        <div class="swiper-slide swiper-slide-tintuc">
                            <div class="slide__new">
                                <div class="slide__new--item">
                                    <a href="<?php the_permalink(); ?>" class="slide__new--item-image">
                                        <?php the_post_thumbnail(); ?>
                                    </a> 
                                    <div class="slide__new--item-content">
                                        <div class="slide__new--item-content-time c-text-base Roboto-Regular">
                                            <time><?php the_modified_date('d-m'); ?><br><?php the_modified_date('Y'); ?></time
                                            ></div>
                                        <a href="" class="slide__new--item-content-title Roboto-Bold c-text-base"><?php the_title(); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <!-- Add pagination -->
                    
                </div>
            </div>
            <div class="btn-looking-info home__new-btn container">
                <a href="<?=get_site_url(); ?>" class="looking-info Roboto-Regular c-text-base">Xem thêm</a>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }
}
add_action( 'widgets_init', function() {
    register_widget( 'Wg_Tintuc' );
});
$wg_tintuc = new Wg_Tintuc();
?>