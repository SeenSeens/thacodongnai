<?php
// Style
if( !function_exists( 'thacodongnai_style' )) {
	function thacodongnai_style() {
		wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', [], '5.2.2', 'all' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.1', 'all');
		wp_enqueue_style( 'carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', [], '2.3.4', 'all' );
		wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.1.0', 'all');
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', [], '6.4.2', 'all' );

		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.3.1', true);
		wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
		wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('jquery'), '10.1.0', true);
		wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js', array('jquery'), '2.11.8', true);
        wp_enqueue_script('fontawesome', get_template_directory_uri() . '/assets/js/all.min.js', array('jquery'), '6.4.2', true);
		wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true);
	}
	add_action( 'wp_enqueue_scripts', 'thacodongnai_style' );
}

// Custom logo
if( !function_exists( 'tp_logo' )):
    function tp_logo() {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) :
            echo '<a href="' . get_bloginfo('url') . '" class="header-logo-wrapper nuxt-link-exact-active nuxt-link-active">
            		<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">
            	  </a>';
        else :
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        endif;
    }
endif;

if( !function_exists( 'tp_logo_mobile' )):
    function tp_logo_mobile() {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) :
            echo '<a href="' . get_bloginfo('url') . '" class="nuxt-link-exact-active nuxt-link-active">
            		<img class="logo-mobile-w" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">
            	  </a>';
        else :
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        endif;
    }
endif;

// Custom menu
if( !function_exists( 'tp_menu' )) :
    function tp_menu() {
        wp_nav_menu( [
            'theme_loaction' => 'menu-1',
            'container' => false,
            'menu_class' => 'menu-header__list Roboto-Regular c-text-base',
            'menu_item_class' => 'menu-header__list-item Roboto-Regular c-text-base',
            'link_before' => '<span>',
            'link_after' => '</span>'
        ] );
    }
endif;

if( !function_exists( 'tp_menu_mobile' )) :
    function tp_menu_mobile() {
        wp_nav_menu( [
            'theme_loaction' => 'menu-mobile',
            'container' => false,
            'menu_id' => 'menu',
            'menu_class' => 'MyriadPro-Bold c-text-base text-uppercase',
            'menu_item_class' => 'menu-header__list-item list-item-mobile Roboto-Regular c-text-base',
            'link_before' => '<span>',
            'link_after' => '</span>'
        ] );
    }
endif;

// Disable block editor
if( !function_exists( 'disable_block_editor' )):
    function disable_block_editor() {
        remove_theme_support( 'widgets-block-editor' );
    }
    add_action( 'after_setup_theme', 'disable_block_editor' );
endif;

// Sidebar
function tp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Footer', 'thacodongnai' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Add widgets here.', 'thacodongnai' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tp_widgets_init' );

// widget
require_once get_template_directory() . '/widget/footer/wg_footer_col_1.php';
require_once get_template_directory() . '/widget/footer/wg_footer_col_2.php';
require_once get_template_directory() . '/widget/footer/wg_footer_col_3.php';
require_once get_template_directory() . '/widget/wg_html.php';
require_once get_template_directory() . '/widget/home/wg_tintuc.php';
require_once get_template_directory() . '/widget/home/wg_product_tab_slide.php';

// Theme Option
require_once get_template_directory() . '/theme_option.php';

add_filter( 'dynamic_sidebar_params', 'custom_widget_video_class' );
function custom_widget_video_class( $params ) {
    // Kiểm tra xem widget có là widget video hay không
    if ( isset( $params[0]['widget_id'] ) && 'video-2' === $params[0]['widget_id'] ) {
        // Thêm class mới vào class của widget
        $params[0]['before_widget'] = str_replace( 'class="widget_media_video', 'class="widget_media_video my-custom-video-widget', $params[0]['before_widget'] );
    }
    return $params;
}


function custom_breadcrumb() {
    echo '<div name="breadcrumb">
        <div class="list-breadcrumb all">
            <div class="container">
                <ul class="nav-breadcrumb">';
    
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb();
    } else {
        echo '<li class="Roboto-Regular"><a href="/">Trang chủ</a></li>';
        if ( is_category() ) {
            $category = get_queried_object();
            echo '<li class="Roboto-Regular"><span>' . $category->name . '</span></li>';
        } elseif ( is_single() ) {
            $categories = get_the_category();
            if ( $categories ) {
                $category = $categories[0];
                echo '<li class="Roboto-Regular"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '<li class="Roboto-Regular"><span>' . get_the_title() . '</span></li>';
        } elseif ( is_page() ) {
            global $post;
            if ( $post->post_parent ) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ( $ancestors as $ancestor ) {
                    echo '<li class="Roboto-Regular"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
            }
            echo '<li class="Roboto-Regular"><span>' . get_the_title() . '</span></li>';
        } elseif ( is_search() ) {
            echo '<li class="Roboto-Regular"><span>Kết quả tìm kiếm cho: ' . get_search_query() . '</span></li>';
        } elseif ( is_404() ) {
            echo '<li class="Roboto-Regular"><span>Không tìm thấy trang</span></li>';
        }
    }
    
    echo '</ul>
            </div>
        </div>
    </div>';
}

function custom_post_type_breadcrumb() {
    if ( ! is_singular('dich-vu') ) {
        return;
    }

    echo '<div name="breadcrumb">
        <div class="list-breadcrumb all">
            <div class="container">
                <ul class="nav-breadcrumb">';

    echo '<li class="Roboto-Regular"><a href="' . home_url() . '">Trang chủ</a></li>';

    // Lấy danh sách danh mục của dịch vụ nếu có
    $terms = get_the_terms(get_the_ID(), 'category');
    if ( $terms && ! is_wp_error($terms) ) {
        $category = array_shift($terms);
        echo '<li class="Roboto-Regular"><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
    }

    // Hiển thị tiêu đề dịch vụ
    echo '<li class="Roboto-Regular"><span>' . get_the_title() . '</span></li>';

    echo '</ul>
            </div>
        </div>
    </div>';
}
add_action('wp_footer', 'custom_post_type_breadcrumb');


// Phân trang
if( !function_exists( 'pagination' ) ) {
    function pagination() {
        global $wp_query;
        $total_pages = $wp_query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));
        $pagination_args = [
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'       => '',
            'total'        => $total_pages,
            'current'      => $current_page,
            'show_all'     => false,
            'end_size'     => 1,
            'mid_size'     => 2,
            'prev_next'    => true,
            'prev_text'    => '<i class="fa-solid fa-angle-left"></i>',
            'next_text'    => '<i class="fa-solid fa-angle-right"></i>',
            'type'         => 'array',
            'add_args'     => false,
            'add_fragment' => ''
        ];
        $paginate_links = paginate_links($pagination_args);
        if ($paginate_links > 1) {
            echo '<div class="pagination">';
            echo '<nav class="nav-pagination mt-4">';
            echo '<ul class="pagination font-pri-bold c-text-base w-100">';
            // Trang đầu tiên
            if ($current_page !== 1) {
                echo '<li class="page-item"><a href="' . esc_url(get_pagenum_link(1)) . '" class="page-link"><i class="fa-solid fa-angles-left"></i></a></li>';
            }
            foreach ($paginate_links as $page_link) {
                if (strpos($page_link, 'current') !== false) {
                    // Active page
                    echo '<li class="page-item active"><span class="page-link">' . strip_tags($page_link) . '</span></li>';
                } else {
                    // Inactive page
                    echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $page_link) . '</li>';
                }
            }
            // Trang cuối cùng
            if ($current_page !== $total_pages) {
                echo '<li class="page-item"><a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="page-link"><i class="fa-solid fa-angles-right"></i></i></a></li>';
            }
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
        }
    }
}
?>