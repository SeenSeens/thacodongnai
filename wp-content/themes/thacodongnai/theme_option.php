<?php

define( 'TP_GE_FIELDS_GROUP', 'tp_ge_pfs-fields-group' );

//1. Tạo trang cấu hình Theme Option
add_action("admin_menu", 'tp_create_theme_option_page');
function tp_create_theme_option_page(){
    $page_title = 'Theme Options';
    $menu_title = $page_title;
    $capability = 'manage_options'; // Phân Quyền, ai có quyền sử dụng trang này
    $menu_slug = 'tp-theme-options';
    $function_callback = 'tp_the_content_option_fields';
    $icon_url = '';
    $position = 1;
    add_menu_page($page_title, $menu_title, $capability, $menu_slug , $function_callback, $icon_url, $position);
}

function tp_the_content_option_fields(){
?>
    <div id="poststuff">
        <div class="postbox-container">
            <div class="meta-box-sortables ui-sortable">
                <div class="postbox ">
                    <h2 class="hndle ui-sortable-handle">Theme Option - Cấu hình Website</h2>
                    <div class="wle-tab-content">
                        <!-- Form khai báo các Options tại đây -->
                        <form method="post" action="options.php">
                            <?php settings_fields( TP_GE_FIELDS_GROUP ); ?>
                            <?php do_settings_sections( TP_GE_FIELDS_GROUP ); ?>
                            
                            <!--Khai báo các fields tại đây: xem hàm 'tp_register_option_fields' bên dưới-->
                            <div class="tp-option-fields">
                                <table class="form-table">
                                    <!-- Mỗi 1 tr là 1 field -->
                                    
                                    <!-- tp_hotline -->
                                    <tr valign="top">
                                        <td><strong><?php esc_html_e("Hotline", 'thacodongnai'); ?></strong></td>
                                        <td>
                                            <?php $tp_hotline = get_option('tp_hotline');?>
                                            <input style="width:100%" placeholder="0385 573 558" type="text" id="<?php echo esc_html('tp_hotline'); ?>" name="<?php echo esc_html('tp_hotline'); ?>" value="<?php echo esc_attr($tp_hotline); ?>" />
                                        </td>
                                    </tr>
                                    
                                    <!-- tp_email -->
                                    <tr valign="top">
                                        <td><strong><?php esc_html_e("Email", 'thacodongnai'); ?></strong></td>
                                        <td>
                                            <?php $tp_email = get_option('tp_email');?>
                                            <input style="width:100%" placeholder="tuantruong829@gmail.com" type="text" id="<?php echo esc_html('tp_email'); ?>" name="<?php echo esc_html('tp_email'); ?>" value="<?php echo esc_attr($tp_email); ?>" />
                                        </td>
                                    </tr>
                                    
                                    <!-- tp_address -->
                                    <tr valign="top">
                                        <td><strong><?php esc_html_e("Địa chỉ", 'thacodongnai'); ?></strong></td>
                                        <td>
                                            <?php $tp_address = get_option('tp_address');?>
                                            <input style="width:100%" placeholder="303/41 Tân Sơn Nhì, Tân Phú, Hồ Chí Minh" type="text" id="<?php echo esc_html('tp_address'); ?>" name="<?php echo esc_html('tp_address'); ?>" value="<?php echo esc_attr($tp_address); ?>" />
                                        </td>
                                    </tr>
                                    
                                    <!-- tp_facebook -->
                                    <tr valign="top">
                                        <td><strong><?php esc_html_e("Facebook", 'thacodongnai'); ?></strong></td>
                                        <td>
                                            <?php $tp_facebook = get_option('tp_facebook');?>
                                            <input style="width:100%" placeholder="https://www.facebook.com/tuan.seen.it" type="text" id="<?php echo esc_html('tp_address'); ?>" name="<?php echo esc_html('tp_address'); ?>" value="<?php echo esc_attr($tp_facebook); ?>" />
                                        </td>
                                    </tr>

                                    <!-- tp_youtube -->
                                    <tr valign="top">
                                        <td><strong><?php esc_html_e("Youtube", 'thacodongnai'); ?></strong></td>
                                        <td>
                                            <?php $tp_youtube = get_option('tp_youtube');?>
                                            <input style="width:100%" placeholder="https://www.youtube.com/@tuanpho97" type="text" id="<?php echo esc_html('tp_youtube'); ?>" name="<?php echo esc_html('tp_youtube'); ?>" value="<?php echo esc_attr($tp_youtube); ?>" />
                                        </td>
                                    </tr>
                                    
                                    <tr valign="top">
                                        <td colspan="2"><?php submit_button(); ?></td>
                                    </tr>
                                </table>
                            </div>
                            
                            
                        </form>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

//2. Đăng ký các field cho Theme Option
add_action('admin_init', 'tp_register_option_fields' );
function tp_register_option_fields(){
    //Khai báo các trường dữ liệu cho theme option tại đây
    register_setting( TP_GE_FIELDS_GROUP, 'tp_hotline');
    register_setting( TP_GE_FIELDS_GROUP, 'tp_email');
    register_setting( TP_GE_FIELDS_GROUP, 'tp_address');
    //Copy: register_setting( WS247_GE_FIELDS_GROUP, 'tp_ten_field_moi_cua_ban');
}
