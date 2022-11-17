<?php
function wishlist_ajax_enqueue() {
	wp_enqueue_script(
		'wishlist-ajax-script',
		get_template_directory_uri() . '/ajax.js',
		array( 'jquery' )
	);


	wp_localize_script(
		'wishlist-ajax-script',
		'wishlist_ajax_obj',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

}

add_action( 'wp_enqueue_scripts', 'wishlist_ajax_enqueue' );

function add_wishlist_ajax_request() {
	$userID = get_current_user_id();
	$postID = $_REQUEST['postID'];
	if ( ! empty( $userID ) ) {
		$existing_pms = get_post_meta( $postID, 'postwishlist' );

		if ( in_array( $userID, $existing_pms ) ) {

			$wishurl = get_home_url() . '/wishlist';
			$data = '{"content":"' . $wishurl . '", "action":"exists"}';
		} else {

			add_post_meta( $postID, 'postwishlist', $userID );
			if ( pll_current_language() == 'en' ) {
				$data = '{"content":"The Product has been added to the list", "action":"added" , "confirm":"ok"}';
			}else{
				$data = '{"content":"مطلب مورد نظر به لیست علاقه مندی ها اضافه شد", "action":"added" , "confirm":"باشه"}';
			}

		}
	} else {
		if ( pll_current_language() == 'en' ) {
			$data = '{"content":"Please login first", "action":"login" , "confirm":"ok"}';
		}else{
			$data = '{"content":"لطفا ابتدا در سایت عضو شوید", "action":"login" , "confirm":"باشه"}';
		}

	}
	echo $data;
	die();
}

add_action( 'wp_ajax_add_wishlist_ajax_request', 'add_wishlist_ajax_request' );
add_action( 'wp_ajax_nopriv_add_wishlist_ajax_request', 'add_wishlist_ajax_request' );

function delete_wishlist_ajax_request() {
	$userID = get_current_user_id();
	$postID = $_REQUEST['postID'];
	if ( ! empty( $userID ) ) {
			delete_post_meta( $postID, 'postwishlist', $userID );
		if ( pll_current_language() == 'en' ) {
			$data = '{"content":"The Product has been removed from the list", "action":"deleted" , "confirm":"ok"}';
		}else{
			$data = '{"content":"مطلب مورد نظر از لیست علاقه مندی ها حذف شد", "action":"deleted" , "confirm":"باشه"}';
		}


	} else {
		if ( pll_current_language() == 'en' ) {
			$data = '{"content":"Please login first", "action":"login" , "confirm":"ok"}';
		}else{
			$data = '{"content":"لطفا ابتدا در سایت عضو شوید", "action":"login" , "confirm":"باشه"}';
		}
	}
	echo $data;
	die();
}

add_action( 'wp_ajax_delete_wishlist_ajax_request', 'delete_wishlist_ajax_request' );
add_action( 'wp_ajax_nopriv_delete_wishlist_ajax_request', 'delete_wishlist_ajax_request' );