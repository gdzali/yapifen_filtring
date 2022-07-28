<?php

// Register Custom Post Type
function yapifen_projeler_cpt() {

	$labels = array(
		'name'                  => _x( 'Projeler', 'Post Type General Name', 'yapifen' ),
		'singular_name'         => _x( 'Projeler', 'Post Type Singular Name', 'yapifen' ),
		'menu_name'             => __( 'Projeler', 'yapifen' ),
		'name_admin_bar'        => __( 'Projeler', 'yapifen' ),
		'archives'              => __( 'Projeler', 'yapifen' ),
		'attributes'            => __( 'Item Attributes', 'yapifen' ),
		'parent_item_colon'     => __( 'Üst Proje', 'yapifen' ),
		'all_items'             => __( 'Tüm Projeler', 'yapifen' ),
		'add_new_item'          => __( 'Yeni Proje Ekle', 'yapifen' ),
		'add_new'               => __( 'Yeni Ekle', 'yapifen' ),
		'new_item'              => __( 'Yeni Proje', 'yapifen' ),
		'edit_item'             => __( 'Proje Düzenle', 'yapifen' ),
		'update_item'           => __( 'Proje Güncelle', 'yapifen' ),
		'view_item'             => __( 'Proje Görüntüle', 'yapifen' ),
		'view_items'            => __( 'Projeleri Görüntüle', 'yapifen' ),
		'search_items'          => __( 'Proje Ara', 'yapifen' ),
		'not_found'             => __( 'Bulunamadı', 'yapifen' ),
		'not_found_in_trash'    => __( 'Çöpte bulunamadı', 'yapifen' ),
		'featured_image'        => __( 'Proje Görseli', 'yapifen' ),
		'set_featured_image'    => __( 'Proje görseli belirle', 'yapifen' ),
		'remove_featured_image' => __( 'Proje görseli kaldır', 'yapifen' ),
		'use_featured_image'    => __( 'Proje görseli olarak kullan', 'yapifen' ),
		'insert_into_item'      => __( 'Projeye yerleştir', 'yapifen' ),
		'uploaded_to_this_item' => __( 'Bu projeye eklenenler', 'yapifen' ),
		'items_list'            => __( 'Projeler Listesi', 'yapifen' ),
		'items_list_navigation' => __( 'Items list navigation', 'yapifen' ),
		'filter_items_list'     => __( 'Filter items list', 'yapifen' ),

	);
	$args = array(
		'label'                 => __( 'Projeler', 'yapifen' ),
		'description'           => __( 'Projeler', 'yapifen' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'ust-yapi', ' ulastirma', ' su-enerji' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'menu_icon'           => 'dashicons-format-aside',
	);
	register_post_type( 'projeler-alt', $args );

}
add_action( 'init', 'yapifen_projeler_cpt', 0 );

// Register Custom Taxonomy
function ust_yapi_tax() {

	$labels = array(
		'name'                       => _x( 'Üst Yapı', 'Taxonomy General Name', 'yapifen' ),
		'singular_name'              => _x( 'Üst Yapı', 'Taxonomy Singular Name', 'yapifen' ),
		'menu_name'                  => __( 'Üst Yapı', 'yapifen' ),
		'all_items'                  => __( 'All Items', 'yapifen' ),
		'parent_item'                => __( 'Parent Item', 'yapifen' ),
		'parent_item_colon'          => __( 'Parent Item:', 'yapifen' ),
		'new_item_name'              => __( 'New Item Name', 'yapifen' ),
		'add_new_item'               => __( 'Add New Item', 'yapifen' ),
		'edit_item'                  => __( 'Edit Item', 'yapifen' ),
		'update_item'                => __( 'Update Item', 'yapifen' ),
		'view_item'                  => __( 'View Item', 'yapifen' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'yapifen' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'yapifen' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'yapifen' ),
		'popular_items'              => __( 'Popular Items', 'yapifen' ),
		'search_items'               => __( 'Search Items', 'yapifen' ),
		'not_found'                  => __( 'Not Found', 'yapifen' ),
		'no_terms'                   => __( 'No items', 'yapifen' ),
		'items_list'                 => __( 'Items list', 'yapifen' ),
		'items_list_navigation'      => __( 'Items list navigation', 'yapifen' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'ust-yapi', array( 'projeler-alt' ), $args );

}
add_action( 'init', 'ust_yapi_tax', 0 );

// Register Custom Taxonomy
function ulastirma_tax() {

	$labels = array(
		'name'                       => _x( 'Ulaştırma', 'Taxonomy General Name', 'yapifen' ),
		'singular_name'              => _x( 'Ulaştırma', 'Taxonomy Singular Name', 'yapifen' ),
		'menu_name'                  => __( 'Ulaştırma', 'yapifen' ),
		'all_items'                  => __( 'All Items', 'yapifen' ),
		'parent_item'                => __( 'Parent Item', 'yapifen' ),
		'parent_item_colon'          => __( 'Parent Item:', 'yapifen' ),
		'new_item_name'              => __( 'New Item Name', 'yapifen' ),
		'add_new_item'               => __( 'Add New Item', 'yapifen' ),
		'edit_item'                  => __( 'Edit Item', 'yapifen' ),
		'update_item'                => __( 'Update Item', 'yapifen' ),
		'view_item'                  => __( 'View Item', 'yapifen' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'yapifen' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'yapifen' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'yapifen' ),
		'popular_items'              => __( 'Popular Items', 'yapifen' ),
		'search_items'               => __( 'Search Items', 'yapifen' ),
		'not_found'                  => __( 'Not Found', 'yapifen' ),
		'no_terms'                   => __( 'No items', 'yapifen' ),
		'items_list'                 => __( 'Items list', 'yapifen' ),
		'items_list_navigation'      => __( 'Items list navigation', 'yapifen' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'ulastirma', array( 'projeler-alt' ), $args );

}
add_action( 'init', 'ulastirma_tax', 0 );

// Register Custom Taxonomy
function su_enerji_tax() {

	$labels = array(
		'name'                       => _x( 'Su ve Enerji', 'Taxonomy General Name', 'yapifen' ),
		'singular_name'              => _x( 'Su ve Enerji', 'Taxonomy Singular Name', 'yapifen' ),
		'menu_name'                  => __( 'Su ve Enerji', 'yapifen' ),
		'all_items'                  => __( 'All Items', 'yapifen' ),
		'parent_item'                => __( 'Parent Item', 'yapifen' ),
		'parent_item_colon'          => __( 'Parent Item:', 'yapifen' ),
		'new_item_name'              => __( 'New Item Name', 'yapifen' ),
		'add_new_item'               => __( 'Add New Item', 'yapifen' ),
		'edit_item'                  => __( 'Edit Item', 'yapifen' ),
		'update_item'                => __( 'Update Item', 'yapifen' ),
		'view_item'                  => __( 'View Item', 'yapifen' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'yapifen' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'yapifen' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'yapifen' ),
		'popular_items'              => __( 'Popular Items', 'yapifen' ),
		'search_items'               => __( 'Search Items', 'yapifen' ),
		'not_found'                  => __( 'Not Found', 'yapifen' ),
		'no_terms'                   => __( 'No items', 'yapifen' ),
		'items_list'                 => __( 'Items list', 'yapifen' ),
		'items_list_navigation'      => __( 'Items list navigation', 'yapifen' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'su-enerji', array( 'projeler-alt' ), $args );

}
add_action( 'init', 'su_enerji_tax', 0 );

?>
