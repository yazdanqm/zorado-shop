<?php

add_action('add_meta_boxes', 'so_custom_meta_box');

function so_custom_meta_box($post)
{
	add_meta_box('so_meta_box', 'نوع محصول', 'new_item_meta_box', array('product'), 'normal', 'high');
}

add_action('save_post', 'so_save_metabox');

function so_save_metabox()
{
	global $post;
	if (isset($_POST["new_item"])) {

		$meta_element_class = $_POST['new_item'];


		update_post_meta($post->ID, 'new_item_meta_box', $meta_element_class);

	}
}

function new_item_meta_box($post)
{
	$meta_element_class = get_post_meta($post->ID, 'new_item_meta_box', true);
	?>
	<label>محصول جدید ؟</label>

	<select name="new_item" id="new_item">
        <option value="no" <?php selected($meta_element_class, 'no'); ?>>خیر</option>
		<option value="yes" <?php selected($meta_element_class, 'yes'); ?>>بله</option>


	</select>
	<?php
}



add_action('colors_add_form_fields',  'add_colors_code', 10, 2);
add_action('created_colors',  'save_colors_code', 10, 2);
add_action('colors_edit_form_fields', 'update_colors_code', 10, 2);
add_action('edited_colors', 'updated_colors_code', 10, 2);


function add_colors_code($taxonomy)
{ ?>
    <div class="form-field term-group">
        <label for="color-code-id">کد رنگ</label>
        <input type="color" id="color-code-id" name="color-code-id" value="">
    </div>
	<?php
}


function save_colors_code($term_id, $tt_id)
{
	if (isset($_POST['color-code-id']) && '' !== $_POST['color-code-id']) {
		$code = $_POST['color-code-id'];
		add_term_meta($term_id, 'color-code-id', $code, true);
	}
}


function update_colors_code($term, $taxonomy)
{ ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="color-code-id">کد رنگ</label>
        </th>
        <td>
			<?php $code_id = get_term_meta($term->term_id, 'color-code-id', true); ?>
            <input type="color" id="color-code-id" name="color-code-id"
                   value="<?php echo $code_id; ?>">
        </td>
    </tr>
	<?php
}


function updated_colors_code($term_id, $tt_id)
{
	if (isset($_POST['color-code-id']) && '' !== $_POST['color-code-id']) {
		$code = $_POST['color-code-id'];
		update_term_meta($term_id, 'color-code-id', $code);
	} else {
		update_term_meta($term_id, 'color-code-id', '');
	}
}
