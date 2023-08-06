<?php
/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function thacodongnai_custom_post_type() {
	// Custom post type
	$labels = array(
		'name'               => __( 'Sản phẩm', 'thacodongnai' ),
		'singular_name'      => __( 'Sản phẩm', 'thacodongnai' ),
		'add_new'            => _x( 'Add New Sản phẩm', 'thacodongnai', 'thacodongnai' ),
		'add_new_item'       => __( 'Add New Sản phẩm', 'thacodongnai' ),
		'edit_item'          => __( 'Edit Sản phẩm', 'thacodongnai' ),
		'new_item'           => __( 'New Sản phẩm', 'thacodongnai' ),
		'view_item'          => __( 'View Sản phẩm', 'thacodongnai' ),
		'search_items'       => __( 'Search Sản phẩm', 'thacodongnai' ),
		'not_found'          => __( 'No Danh mục xe tải found', 'thacodongnai' ),
		'not_found_in_trash' => __( 'No Danh mục xe tải found in Trash', 'thacodongnai' ),
		'parent_item_colon'  => __( 'Parent Sản phẩm:', 'thacodongnai' ),
		'menu_name'          => __( 'Xe tải', 'thacodongnai' ),
		'all_items'			 => __( 'All Sản phẩm', 'thacodongnai' ),
		'archives'			 => __( 'Sản phẩm', 'thacodongnai' ),
		'attributes'		 => __( 'Sản phẩm Attributes', 'thacodongnai' ),
		'insert_into_item'	 => __( 'Insert into sản phẩm', 'thacodongnai' ),
		'uploaded_to_this_item'	=> __( 'Uploaded to this sản phẩm', 'thacodongnai' ),
		'filter_items_list'		=> __( 'Filter sản phẩm list', 'thacodongnai' ),
		'filter_by_date'		=> __( 'Filter sản phẩm by date', 'thacodongnai' ),
		'items_list_navigation' => __( 'Sản phẩm list navigation', 'thacodongnai' ),
		'items_list'			=> __( 'Sản phẩm list', 'thacodongnai' ),
		'item_published'		=> __( 'Sản phẩm published', 'thacodongnai' ),
		'item_published_privately'	=> __( 'Sản phẩm published privately', 'thacodongnai' ),
		'item_reverted_to_draft'	=> __( 'Sản phẩm reverted to draft.', 'thacodongnai' ),
		'item_scheduled'			=> __( 'Sản phẩm scheduled', 'thacodongnai' ),
		'item_updated'				=> __( 'Sản phẩm updated', 'thacodongnai' ),
		'item_link'					=> __( 'Sản phẩm Link', 'thacodongnai' ),
		'item_link_description'		=> __( 'A link to a sản phẩm', 'thacodongnai' ),

	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-car',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => [ 'slug' => 'san-pham' ],
		'capability_type'     => 'post',
		'show_in_rest'		  => true,
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
		'delete_with_user' => false,
	);

	register_post_type( 'xe-tai', $args );

	// Taxonomy tầm giá
	$labels_tam_gia = array(
		'name'                  => _x( 'Tầm giá', 'Taxonomy Tầm giá', 'thacodongnai' ),
		'singular_name'         => _x( 'Tầm giá', 'Taxonomy Tầm giá', 'thacodongnai' ),
		'search_items'          => __( 'Search Tầm giá', 'thacodongnai' ),
		'popular_items'         => __( 'Popular Tầm giá', 'thacodongnai' ),
		'all_items'             => __( 'All Tầm giá', 'thacodongnai' ),
		'parent_item'           => __( 'Parent Tầm giá', 'thacodongnai' ),
		'parent_item_colon'     => __( 'Parent Tầm giá', 'thacodongnai' ),
		'edit_item'             => __( 'Edit Tầm giá', 'thacodongnai' ),
		'update_item'           => __( 'Update Tầm giá', 'thacodongnai' ),
		'add_new_item'          => __( 'Add New Tầm giá', 'thacodongnai' ),
		'new_item_name'         => __( 'New Tầm giá', 'thacodongnai' ),
		'add_or_remove_items'   => __( 'Add or remove Tầm giá', 'thacodongnai' ),
		'choose_from_most_used' => __( 'Choose from most used Tầm giá', 'thacodongnai' ),
		'menu_name'             => __( 'Tầm giá', 'thacodongnai' ),
	);
	
	$args_tam_gia = array(
		'labels'            => $labels_tam_gia,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'tam-gia' ],
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'tax-tam-gia', array( 'xe-tai' ), $args_tam_gia );

	// Taxonomy tải trọng
	$labels_tai_trong = array(
		'name'                  => _x( 'Tải trọng', 'Taxonomy Tải trọng', 'thacodongnai' ),
		'singular_name'         => _x( 'Tải trọng', 'Taxonomy Tải trọng', 'thacodongnai' ),
		'search_items'          => __( 'Search Tải trọng', 'thacodongnai' ),
		'popular_items'         => __( 'Popular Tải trọng', 'thacodongnai' ),
		'all_items'             => __( 'All Tải trọng', 'thacodongnai' ),
		'parent_item'           => __( 'Parent Tải trọng', 'thacodongnai' ),
		'parent_item_colon'     => __( 'Parent Tải trọng', 'thacodongnai' ),
		'edit_item'             => __( 'Edit Tải trọng', 'thacodongnai' ),
		'update_item'           => __( 'Update Tải trọng', 'thacodongnai' ),
		'add_new_item'          => __( 'Add New Tải trọng', 'thacodongnai' ),
		'new_item_name'         => __( 'New Tải trọng', 'thacodongnai' ),
		'add_or_remove_items'   => __( 'Add or remove Tải trọng', 'thacodongnai' ),
		'choose_from_most_used' => __( 'Choose from most used Tải trọng', 'thacodongnai' ),
		'menu_name'             => __( 'Tải trọng', 'thacodongnai' ),
	);
	
	$args_tai_trong = array(
		'labels'            => $labels_tai_trong,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'tai-trong' ],
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'tax-tai-trong', array( 'xe-tai' ), $args_tai_trong );

	// Taxonomy phân khúc
	$labels_phan_khuc = array(
		'name'                  => _x( 'Phân khúc', 'Taxonomy Phân khúc', 'thacodongnai' ),
		'singular_name'         => _x( 'Phân khúc', 'Taxonomy Phân khúc', 'thacodongnai' ),
		'search_items'          => __( 'Search Phân khúc', 'thacodongnai' ),
		'popular_items'         => __( 'Popular Phân khúc', 'thacodongnai' ),
		'all_items'             => __( 'All Phân khúc', 'thacodongnai' ),
		'parent_item'           => __( 'Parent Phân khúc', 'thacodongnai' ),
		'parent_item_colon'     => __( 'Parent Phân khúc', 'thacodongnai' ),
		'edit_item'             => __( 'Edit Phân khúc', 'thacodongnai' ),
		'update_item'           => __( 'Update Phân khúc', 'thacodongnai' ),
		'add_new_item'          => __( 'Add New Phân khúc', 'thacodongnai' ),
		'new_item_name'         => __( 'New Phân khúc', 'thacodongnai' ),
		'add_or_remove_items'   => __( 'Add or remove Phân khúc', 'thacodongnai' ),
		'choose_from_most_used' => __( 'Choose from most used Phân khúc', 'thacodongnai' ),
		'menu_name'             => __( 'Phân khúc', 'thacodongnai' ),
	);
	
	$args_phan_khuc = array(
		'labels'            => $labels_phan_khuc,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'phan-khuc' ],
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'tax-phan-khuc', array( 'xe-tai' ), $args_phan_khuc );

	// Taxonomy thương hiệu
	$labels_thuong_hieu = array(
		'name'                  => _x( 'Thương hiệu', 'Taxonomy Thương hiệu', 'thacodongnai' ),
		'singular_name'         => _x( 'Thương hiệu', 'Taxonomy Thương hiệu', 'thacodongnai' ),
		'search_items'          => __( 'Search Thương hiệu', 'thacodongnai' ),
		'popular_items'         => __( 'Popular Thương hiệu', 'thacodongnai' ),
		'all_items'             => __( 'All Thương hiệu', 'thacodongnai' ),
		'parent_item'           => __( 'Parent Thương hiệu', 'thacodongnai' ),
		'parent_item_colon'     => __( 'Parent Thương hiệu', 'thacodongnai' ),
		'edit_item'             => __( 'Edit Thương hiệu', 'thacodongnai' ),
		'update_item'           => __( 'Update Thương hiệu', 'thacodongnai' ),
		'add_new_item'          => __( 'Add New Thương hiệu', 'thacodongnai' ),
		'new_item_name'         => __( 'New Thương hiệu', 'thacodongnai' ),
		'add_or_remove_items'   => __( 'Add or remove Thương hiệu', 'thacodongnai' ),
		'choose_from_most_used' => __( 'Choose from most used Thương hiệu', 'thacodongnai' ),
		'menu_name'             => __( 'Thương hiệu', 'thacodongnai' ),
	);
	
	$args_thuong_hieu = array(
		'labels'            => $labels_thuong_hieu,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'danh-muc-xe-tai' ],
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'tax-thuong-hieu', array( 'xe-tai' ), $args_thuong_hieu );
	
}

add_action( 'init', 'thacodongnai_custom_post_type' );

// Meta Box
/*function thacodongnai_add_meta_boxes() {
	$id = 'thacodongnai_tai_trong';
	$title = esc_html__( 'Tải trọng', 'thacodongnai' );
	$callback = 'thacodongnai_tai_trong_callback';
	$arr_post_type = [ 'xe-tai' ];
	$context = 'normal';
	$priority = 'default';
	add_meta_box( $id, $title, $callback, $arr_post_type, $context, $priority );
}
add_action( 'add_meta_boxes', 'thacodongnai_add_meta_boxes' );*/

/*function thacodongnai_tai_trong_callback( $post ) {
	$tai_trong = get_post_meta( $post->ID, 'tai-trong', true );
	?>
	<!-- <div id="content-tai-trong">
		<input type="text" name="tai-trong" placeholder="Tải trọng" value="<?= $tai_trong; ?>">
	</div> -->
	<?php
//}*/

/*function thacodongnai_add_meta_boxes_save_data( $post_id ) {
	// Lưu trường số 1
	if( array_key_exists( 'tai-trong', $_POST )) {
		update_post_meta( $post_id, 'tai-trong', $_POST['tai-trong'] );
	}
}
add_action( 'save_post_xe-tai', 'thacodongnai_add_meta_boxes_save_data' );*/

// Custom post type dịch vụ
function thacodongnai_custom_post_type_dich_vu() {
	// Custom post type
	$labels = array(
		'name'               => __( 'Dịch vụ', 'thacodongnai' ),
		'singular_name'      => __( 'Dịch vụ', 'thacodongnai' ),
		'add_new'            => _x( 'Add New Dịch vụ', 'thacodongnai', 'thacodongnai' ),
		'add_new_item'       => __( 'Add New Dịch vụ', 'thacodongnai' ),
		'edit_item'          => __( 'Edit Dịch vụ', 'thacodongnai' ),
		'new_item'           => __( 'New Dịch vụ', 'thacodongnai' ),
		'view_item'          => __( 'View Dịch vụ', 'thacodongnai' ),
		'search_items'       => __( 'Search Dịch vụ', 'thacodongnai' ),
		'not_found'          => __( 'No Dịch vụ found', 'thacodongnai' ),
		'not_found_in_trash' => __( 'No Dịch vụ found in Trash', 'thacodongnai' ),
		'parent_item_colon'  => __( 'Parent Dịch vụ:', 'thacodongnai' ),
		'menu_name'          => __( 'Dịch vụ', 'thacodongnai' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-superhero',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => [ 'slug' => 'dich-vu' ],
		'capability_type'     => 'post',
		'show_in_rest'		  => true,
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
		'delete_with_user' => false,
	);

	register_post_type( 'dich-vu', $args );
	
}

add_action( 'init', 'thacodongnai_custom_post_type_dich_vu' );


?>