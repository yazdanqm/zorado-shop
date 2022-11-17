<?php

add_action( 'add_meta_boxes', 'wb_220517_register_meta_boxes' );
function wb_220517_register_meta_boxes($post) {
    //Register Metabox
    add_meta_box( 'additional-file' , __( 'تصویر سایزبندی', 'textdomain' ), 'wb_220517_file_callback', ['page', 'post' , 'product'], 'side', 'low' );
}

function wb_220517_file_callback($post) {
    //Meta box content
    wp_nonce_field( 'wb_220517_nonce', 'meta_box_nonce' );
    $fileLink = get_post_meta($post->ID, "wb_additional_file", true);
?>
<img style="width:100%;border-radius:5px;" src="<?= $fileLink ?>" />
<em style="margin-top:20px;">تصویر بعد از ذخیره سازی مطلب تغییر می کند و یا نمایش داده می شود</em>
<input style="width:100%; margin-top:8px;" id="wb_additional_file" name="wb_additional_file" type="text" value="<?= $fileLink ?>" />
<input style="width: 100%; background: #2271b1; color: white; border: 0; padding: 10px 0; border-radius: 5px;margin-top:8px;" id="upload_button" type="button" value="آپلود عکس" />
<?php
}



add_action('admin_enqueue_scripts', 'wb_220517_add_admin_scripts');
function wb_220517_add_admin_scripts($hook) {
    if($hook !== 'post-new.php' && $hook !== 'post.php')
    {
        return;
    }
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('WB_JS_Admin', get_template_directory_uri() . '/main.js', array('jquery','media-upload','thickbox'), 1.1, true);
    wp_enqueue_style('thickbox');
}


add_action( 'save_post', 'wb_220517_save_meta_box' );
function wb_220517_save_meta_box( $post_id ){
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'wb_220517_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    $fields = [
        'wb_additional_file'
    ];
    foreach($fields as $field)
    {
        if( isset( $_POST[$field] ) )
        {
            update_post_meta( $post_id, $field, $_POST[$field] );
        }
    }
}

