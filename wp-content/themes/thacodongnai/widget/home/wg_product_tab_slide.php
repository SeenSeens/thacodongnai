<?php
class Wg_Product_Tab_Slide extends WP_Widget {
    public function __construct() {
      parent::__construct( '', esc_html( ' * Sản phẩm', 'thacodongnai' ),
           [
                'classname' => 'home__product', 
                'description' => esc_html( 'Hiển thị sản phẩm Tab Slide', 'thacodongnai' ),
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
        echo $args['before_widget'];
        ?>
            <div class="tabs">
                <div class="navbar__logo">
                    <ul role="tablist" class="nav nav-tabs navbar__logo--wapper container-customize" id="productTabs">
                        <?php
                        $cates = get_categories([
                            'hide_empty' => 0,
                            'taxonomy' => 'tax-thuong-hieu',
                            'post_type' => 'xe-tai',
                            'parent' => 0
                        ]);
                        foreach ($cates as $index => $cate) {
                            $taxonomy_image = get_field('anh_dai_dien_thuong_hieu', 'tax-thuong-hieu_' . $cate->term_id);
                        ?>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#<?= $cate->slug; ?>" class="nav-link<?= ($index === 0) ? ' active' : ''; ?>">
                                    <?php if ($taxonomy_image) { ?>
                                        <img src="<?= esc_url($taxonomy_image['url']); ?>">
                                    <?php } ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="tab-content mt-3">
                    <?php foreach ($cates as $index => $cate) { ?>
                        <div class="tab-pane<?= ($index === 0) ? ' active' : ''; ?>" id="<?= $cate->slug; ?>">
                            <div class="home__product-title container">
                                <h1 class="Roboto-Bold c-text-2xl text-center text-uppercase"><?php if (!empty($title)) echo $title; ?></h1>
                            </div>
                            <?php
                            $query = new WP_Query([
                                'post_type' => 'xe-tai',
                                'post_status' => 'publish',
                                'posts_per_page' => 8,
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'tax-thuong-hieu',
                                        'field' => 'slug',
                                        'terms' => $cate->slug,
                                    ]
                                ],
                            ]);
                            ?>
                            <div class="home__product-content">
                                <div class="home__product-wapper tab-pane fade show">
                                    <div class="container-customize home__product-wapper-slide">
                                        <div class="product-slide container-customize">
                                            <div class="swiper HomeProductSlide ">
                                                <div class="swiper-wrapper">
                                                    <?php
                                                    if ($query->have_posts()) :
                                                        while ($query->have_posts()) :
                                                            $query->the_post();
                                                            $fields = get_field_objects(get_the_ID()); // Lấy tất cả các trường tùy chỉnh của bài viết hiện tại
                                                            $tai_trong = get_field('tai_trong', get_the_ID());
                                                            $chieu_dai_thung = get_field('chieu_dai_thung', get_the_ID());
                                                            $thung_ben = get_field('thung_ben', get_the_ID());
                                                            $dich_vu_247 = get_field('dich_vu_247', get_the_ID());
                                                            ?>                                                 
                                                            <div class="swiper-slide">
                                                                <a href="" class="nuxt-link-exact-active nuxt-link-active">
                                                                    <div class="slide-home-product">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <div class="slide-home-product-image">
                                                                                <?php the_post_thumbnail('', ['class' => 'w-100']); ?>
                                                                            </div>
                                                                            <h4 class="slide-home-product-title"><?php the_title(); ?></h4>
                                                                            <div class="info-specification">
                                                                                <?php if (!empty($tai_trong)) { ?>
                                                                                <div class="specification">
                                                                                    <div class="specification-left Roboto-Regular">Tải trọng:</div>
                                                                                    <div class="specification-right Roboto-Bold"><?= $tai_trong; ?></div>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <?php if (!empty($chieu_dai_thung)) { ?>
                                                                                <div class="specification">
                                                                                    <div class="specification-left Roboto-Regular">Chiều dài thùng:</div>
                                                                                    <div class="specification-right Roboto-Bold"><?= $chieu_dai_thung; ?></div>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <?php if (!empty($thung_ben)) { ?>
                                                                                <div class="specification">
                                                                                    <div class="specification-left Roboto-Regular">Thùng ben:</div>
                                                                                    <div class="specification-right Roboto-Bold"><?= $thung_ben; ?></div>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <?php if (!empty($dich_vu_247)) { ?>
                                                                                <div class="specification">
                                                                                    <div class="specification-left Roboto-Regular">Dịch vụ 24/7:</div>
                                                                                    <div class="specification-right Roboto-Bold"><?= $dich_vu_247; ?></div>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                    <?php
                                                        endwhile;
                                                        wp_reset_postdata(); // Reset the post data after each loop
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="btn-looking-info home__product-btn"><a href="" class="looking-info Roboto-Regular c-text-base"><span>Xem thêm</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php
        echo $args['after_widget'];
    }

}
add_action( 'widgets_init', function() {
    register_widget( 'Wg_Product_Tab_Slide' );
});
$wg_product_tab_slide = new Wg_Product_Tab_Slide();
?>