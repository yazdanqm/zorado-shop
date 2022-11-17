<?php
function collections_register_taxonomy() {
	$labels = [
		'name'              => _x( 'کالکشن ها', 'taxonomy general name' ),
		'singular_name'     => _x( 'کالکشن', 'taxonomy singular name' ),
		'search_items'      => __( 'جستجوی کالکشن ها' ),
		'all_items'         => __( 'همه کالکشن ها' ),
		'parent_item'       => __( 'کالکشن مادر' ),
		'parent_item_colon' => __( 'کالکشن مادر :' ),
		'edit_item'         => __( 'ویرایش کالکشن' ),
		'update_item'       => __( 'بروزرسانی کالکشن' ),
		'add_new_item'      => __( 'اضافه کردن کالکشن جدید' ),
		'new_item_name'     => __( 'اسم کالکشن جدید' ),
		'menu_name'         => __( 'کالکشن ها' ),
	];
	$args   = [
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'collections' ],
	];
	register_taxonomy( 'collections', [ 'product' ], $args );
}

add_action( 'init', 'collections_register_taxonomy' );

//-------------------

function brands_register_taxonomy() {
	$labels = [
		'name'              => _x( 'برند ها', 'taxonomy general name' ),
		'singular_name'     => _x( 'برند', 'taxonomy singular name' ),
		'search_items'      => __( 'جستجوی برند ها' ),
		'all_items'         => __( 'همه برند ها' ),
		'parent_item'       => __( 'برند مادر' ),
		'parent_item_colon' => __( 'برند مادر :' ),
		'edit_item'         => __( 'ویرایش برند' ),
		'update_item'       => __( 'بروزرسانی برند' ),
		'add_new_item'      => __( 'اضافه کردن برند جدید' ),
		'new_item_name'     => __( 'اسم برند جدید' ),
		'menu_name'         => __( 'برند ها' ),
	];
	$args   = [
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'brands' ],
	];
	register_taxonomy( 'brands', [ 'product' ], $args );
}

add_action( 'init', 'brands_register_taxonomy' );

//-------------------

function colors_register_taxonomy() {
	$labels = [
		'name'              => _x( 'رنگ ها', 'taxonomy general name' ),
		'singular_name'     => _x( 'رنگ', 'taxonomy singular name' ),
		'search_items'      => __( 'جستجوی رنگ ها' ),
		'all_items'         => __( 'همه رنگ ها' ),
		'parent_item'       => __( 'رنگ مادر' ),
		'parent_item_colon' => __( 'رنگ مادر :' ),
		'edit_item'         => __( 'ویرایش رنگ' ),
		'update_item'       => __( 'بروزرسانی رنگ' ),
		'add_new_item'      => __( 'اضافه کردن رنگ جدید' ),
		'new_item_name'     => __( 'اسم رنگ جدید' ),
		'menu_name'         => __( 'رنگ ها' ),
	];
	$args   = [
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'colors' ],
	];
	register_taxonomy( 'colors', [ 'product' ], $args );
}

add_action( 'init', 'colors_register_taxonomy' );

//-------------------
function size_register_taxonomy() {
	$labels = [
		'name'              => _x( 'سایز ها', 'taxonomy general name' ),
		'singular_name'     => _x( 'سایز', 'taxonomy singular name' ),
		'search_items'      => __( 'جستجوی سایز ها' ),
		'all_items'         => __( 'همه سایز ها' ),
		'parent_item'       => __( 'سایز مادر' ),
		'parent_item_colon' => __( 'سایز مادر :' ),
		'edit_item'         => __( 'ویرایش سایز' ),
		'update_item'       => __( 'بروزرسانی سایز' ),
		'add_new_item'      => __( 'اضافه کردن سایز جدید' ),
		'new_item_name'     => __( 'اسم سایز جدید' ),
		'menu_name'         => __( 'سایز ها' ),
	];
	$args   = [
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'size' ],
	];
	register_taxonomy( 'size', [ 'product' ], $args );
}

add_action( 'init', 'size_register_taxonomy' );