<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

function hyper_scripts()
{

    wp_enqueue_style('style', get_stylesheet_uri());
    if (pll_current_language() == 'en') {

        wp_enqueue_style('style-en', get_template_directory_uri() . '/style-en.css');
    }
  	wp_enqueue_style('style-en', get_template_directory_uri() . '/ionicons.css');
    wp_enqueue_script('main', get_template_directory_uri() . '/main.js', array('jquery'), '1', true);

}

add_action('wp_enqueue_scripts', 'hyper_scripts');


function hyper_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'hyper_add_woocommerce_support');

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-cat' => __('دسته بندی سربرگ'),
            'footer-cat' => __('دسته بندی فوتر'),
            'footer-link' => __('لینک فوتر'),
        )
    );
}

add_action('init', 'register_my_menus');


function my_logged_in_redirect()
{

    if (!is_user_logged_in()) {

        if (!is_admin()) {

            wp_safe_redirect(home_url() . '/login');
        }
    }
}

add_action('login_init', 'my_logged_in_redirect');


function admin_default_page()
{
    return '/';
}

add_filter('login_redirect', 'admin_default_page');

add_action('init', 'my_user_id_Function');

function my_user_id_Function()
{
    return get_current_user_id();
}


function modify_product_cat_query($query)
{
    if (!is_admin() && $query->is_tax("product_cat")) {
        $query->set('posts_per_page', -1);
    }
}

add_action('pre_get_posts', 'modify_product_cat_query');

function modify_product_cat_queryy($query)
{
    if (!is_admin() && $query->is_tax("collections", "update")) {

        $query->set('posts_per_page', -1);


    }
}


add_filter('upload_mimes', 'my_myme_types', 1, 1);
function my_myme_types($mime_types)
{
    $mime_types['jfif'] = 'image/jfif';     // Adding .webp extension


    return $mime_types;
}


require_once(TEMPLATEPATH . '/inc/image-upload-metabox.php');
require_once(TEMPLATEPATH . '/inc/metabox.php');
require_once(TEMPLATEPATH . '/inc/img-uploader.php');
require_once(TEMPLATEPATH . '/inc/taxonomy.php');
require_once(TEMPLATEPATH . '/inc/pagination.php');
require_once(TEMPLATEPATH . '/inc/translation.php');
require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');
require_once(TEMPLATEPATH . '/inc/ajax.php');
require_once(TEMPLATEPATH . '/inc/test.php');

remove_action('shutdown', 'wp_ob_end_flush_all', 1);
