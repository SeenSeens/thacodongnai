<?php
class Wg_Chucnang extends WP_Widget {
    public function __construct() {
      parent::__construct( '', esc_html( ' * Section 5', 'thacodongnai' ),
           [
                'classname' => 'function', 
                'description' => esc_html( 'Section 5 trang chủ', 'thacodongnai' ),
                'customize_selective_refresh' => true,
                'show_instance_in_rest'       => true,
            ]
        );
    }
    public function init_repeat_sortable_fields(){
        $arr_fields = [
            'f_repeat_text1' => array('type'=>'text', 'label' => 'Tiêu dề'),
            'f_repeat_text2' => array('type'=>'text', 'label' => 'Mô tả ngắn'),
            'f_repeat_image' => array('type'=>'image', 'label' => 'Kiểu hình'),
        ];
        return $arr_fields;
    }
    public function form( $instance ) {
        $defaults = [ 'wle_repeat_sortable_data_1' => '' ];
        $instance = wp_parse_args($instance, $defaults);
        $id_field = 'wle_repeat_sortable_data_1';
        wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Lặp lại và Sắp xếp thứ tự', $instance, $this->init_repeat_sortable_fields());
    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        if (!empty($new_instance['wle_repeat_sortable_data_1'])) {
            $instance['wle_repeat_sortable_data_1'] = ($new_instance['wle_repeat_sortable_data_1']);
        }
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $defaults = [ 'wle_repeat_sortable_data_1' => '' ];
        $data_field = $instance['wle_repeat_sortable_data_1']; 
        $arr_data = json_decode($data_field,true);
        echo $args['before_widget'];
        ?>
            <div class="container">
                <div class="function__wapper">
                    <ul>
                        <?php
                        if($arr_data) {
                            foreach($arr_data as $k => $arr_item) {
                                $f_repeat_text1 = $arr_item['f_repeat_text1']['val'];
                                $f_repeat_text2 = $arr_item['f_repeat_text2']['val'];
                                $f_repeat_image_url = $arr_item['f_repeat_image']['val'];
                                ?>
                                <li>
                                    <a href="#" class="">
                                        <span class="icon">
                                            <img src="<?= $f_repeat_image_url; ?>" alt="">
                                        </span>
                                        <div class="content">
                                            <div class="title c-text-lg Roboto-Bold">
                                                <?= $f_repeat_text1; ?>
                                            </div>
                                            <div class="sub-title c-text-base Roboto-Regular">
                                                <?= $f_repeat_text2; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php
        echo $args['after_widget'];
    }
}

?>
