<?php
if (!class_exists('CT_TAX_META')) {

    class CT_TAX_META
    {

        public function __construct()
        {
            //
        }

        public function init()
        {
            add_action('product_cat_add_form_fields', array($this, 'add_category_image'), 10, 2);
            add_action('created_product_cat', array($this, 'save_category_image'), 10, 2);
            add_action('product_cat_edit_form_fields', array($this, 'update_category_image'), 10, 2);
            add_action('edited_product_cat', array($this, 'updated_category_image'), 10, 2);
//


            add_action('collections_add_form_fields', array($this, 'add_collections_image'), 10, 2);
            add_action('created_collections', array($this, 'save_collections_image'), 10, 2);
            add_action('collections_edit_form_fields', array($this, 'update_collections_image'), 10, 2);
            add_action('edited_collections', array($this, 'updated_collections_image'), 10, 2);

            //brands
            add_action('brands_add_form_fields', array($this, 'add_brands_image'), 10, 2);
            add_action('created_brands', array($this, 'save_brands_image'), 10, 2);
            add_action('brands_edit_form_fields', array($this, 'update_brands_image'), 10, 2);
            add_action('edited_brands', array($this, 'updated_brands_image'), 10, 2);


            add_action('admin_enqueue_scripts', array($this, 'load_media'));
            add_action('admin_footer', array($this, 'add_script'));
        }

        public function load_media()
        {
            wp_enqueue_media();
        }

        public function add_category_image($taxonomy)
        { ?>
            <div class="form-field term-group">
                <label for="category-image-id">تصویر دسته بندی</label>
                <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
                <div id="category-image-wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button"
                           name="ct_tax_media_button" value="اضافه کردن"/>
                    <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove"
                           name="ct_tax_media_remove" value="حذف"/>
                </p>
            </div>
            <?php
        }


        public function save_category_image($term_id, $tt_id)
        {
            if (isset($_POST['category-image-id']) && '' !== $_POST['category-image-id']) {
                $image = $_POST['category-image-id'];
                add_term_meta($term_id, 'category-image-id', $image, true);
            }
        }


        public function update_category_image($term, $taxonomy)
        { ?>
            <tr class="form-field term-group-wrap">
                <th scope="row">
                    <label for="category-image-id">تصویر دسته بندی</label>
                </th>
                <td>
                    <?php $image_id = get_term_meta($term->term_id, 'category-image-id', true); ?>
                    <input type="hidden" id="category-image-id" name="category-image-id"
                           value="<?php echo $image_id; ?>">
                    <div id="category-image-wrapper">
                        <?php if ($image_id) { ?>
                            <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                        <?php } ?>
                    </div>
                    <p>
                        <input type="button" class="button button-secondary ct_tax_media_button"
                               id="ct_tax_media_button" name="ct_tax_media_button" value="اضافه کردن"/>
                        <input type="button" class="button button-secondary ct_tax_media_remove"
                               id="ct_tax_media_remove" name="ct_tax_media_remove" value="حذف"/>
                    </p>
                </td>
            </tr>
            <?php
        }


        public function updated_category_image($term_id, $tt_id)
        {
            if (isset($_POST['category-image-id']) && '' !== $_POST['category-image-id']) {
                $image = $_POST['category-image-id'];
                update_term_meta($term_id, 'category-image-id', $image);
            } else {
                update_term_meta($term_id, 'category-image-id', '');
            }
        }

//    collection

        public function add_collections_image($taxonomy)
        { ?>
            <div class="form-field term-group">
                <label for="collection-image-id">تصویر دسته بندی</label>
                <input type="hidden" id="collection-image-id" name="collection-image-id" class="custom_media_url"
                       value="">
                <div id="collection-image-wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button"
                           name="ct_tax_media_button" value="اضافه کردن"/>
                    <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove"
                           name="ct_tax_media_remove" value="حذف"/>
                </p>
            </div>
            <?php
        }


        public function save_collections_image($term_id, $tt_id)
        {
            if (isset($_POST['collection-image-id']) && '' !== $_POST['collection-image-id']) {
                $image = $_POST['collection-image-id'];
                add_term_meta($term_id, 'collection-image-id', $image, true);
            }
        }


        public function update_collections_image($term, $taxonomy)
        { ?>
            <tr class="form-field term-group-wrap">
                <th scope="row">
                    <label for="collection-image-id">تصویر دسته بندی</label>
                </th>
                <td>
                    <?php $image_id = get_term_meta($term->term_id, 'collection-image-id', true); ?>
                    <input type="hidden" id="collection-image-id" name="collection-image-id"
                           value="<?php echo $image_id; ?>">
                    <div id="collection-image-wrapper">
                        <?php if ($image_id) { ?>
                            <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                        <?php } ?>
                    </div>
                    <p>
                        <input type="button" class="button button-secondary ct_tax_media_button"
                               id="ct_tax_media_button" name="ct_tax_media_button" value="اضافه کردن"/>
                        <input type="button" class="button button-secondary ct_tax_media_remove"
                               id="ct_tax_media_remove" name="ct_tax_media_remove" value="حذف"/>
                    </p>
                </td>
            </tr>
            <?php
        }


        public function updated_collections_image($term_id, $tt_id)
        {
            if (isset($_POST['collection-image-id']) && '' !== $_POST['collection-image-id']) {
                $image = $_POST['collection-image-id'];
                update_term_meta($term_id, 'collection-image-id', $image);
            } else {
                update_term_meta($term_id, 'collection-image-id', '');
            }
        }


//        brands
        public function add_brands_image($taxonomy)
        { ?>
            <div class="form-field term-group">
                <label for="brands-image-id">تصویر دسته بندی</label>
                <input type="hidden" id="brands-image-id" name="brands-image-id" class="custom_media_url"
                       value="">
                <div id="brands-image-wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button"
                           name="ct_tax_media_button" value="اضافه کردن"/>
                    <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove"
                           name="ct_tax_media_remove" value="حذف"/>
                </p>
            </div>
            <?php
        }


        public function save_brands_image($term_id, $tt_id)
        {
            if (isset($_POST['brands-image-id']) && '' !== $_POST['brands-image-id']) {
                $image = $_POST['brands-image-id'];
                add_term_meta($term_id, 'brands-image-id', $image, true);
            }
        }


        public function update_brands_image($term, $taxonomy)
        { ?>
            <tr class="form-field term-group-wrap">
                <th scope="row">
                    <label for="brands-image-id">تصویر دسته بندی</label>
                </th>
                <td>
                    <?php $image_id = get_term_meta($term->term_id, 'brands-image-id', true); ?>
                    <input type="hidden" id="brands-image-id" name="brands-image-id"
                           value="<?php echo $image_id; ?>">
                    <div id="brands-image-wrapper">
                        <?php if ($image_id) { ?>
                            <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                        <?php } ?>
                    </div>
                    <p>
                        <input type="button" class="button button-secondary ct_tax_media_button"
                               id="ct_tax_media_button" name="ct_tax_media_button" value="اضافه کردن"/>
                        <input type="button" class="button button-secondary ct_tax_media_remove"
                               id="ct_tax_media_remove" name="ct_tax_media_remove" value="حذف"/>
                    </p>
                </td>
            </tr>
            <?php
        }


        public function updated_brands_image($term_id, $tt_id)
        {
            if (isset($_POST['brands-image-id']) && '' !== $_POST['brands-image-id']) {
                $image = $_POST['brands-image-id'];
                update_term_meta($term_id, 'brands-image-id', $image);
            } else {
                update_term_meta($term_id, 'brands-image-id', '');
            }
        }


        public function add_script()
        { ?>
            <script>
                jQuery(document).ready(function ($) {
                    function ct_media_upload(button_class) {
                        var _custom_media = true,
                            _orig_send_attachment = wp.media.editor.send.attachment;
                        $('body').on('click', button_class, function (e) {
                            var button_id = '#' + $(this).attr('id');
                            var send_attachment_bkp = wp.media.editor.send.attachment;
                            var button = $(button_id);
                            _custom_media = true;
                            wp.media.editor.send.attachment = function (props, attachment) {
                                if (_custom_media) {
                                    $('#category-image-id').val(attachment.id);
                                    $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                    $('#category-image-wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                                    $('#collection-image-id').val(attachment.id);
                                    $('#collection-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                    $('#collection-image-wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                                    $('#brands-image-id').val(attachment.id);
                                    $('#brands-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                    $('#brands-image-wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                                } else {
                                    return _orig_send_attachment.apply(button_id, [props, attachment]);
                                }
                            }
                            wp.media.editor.open(button);
                            return false;
                        });
                    }

                    ct_media_upload('.ct_tax_media_button.button');
                    $('body').on('click', '.ct_tax_media_remove', function () {
                        $('#category-image-id').val('');
                        $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                        $('#collection-image-id').val('');
                        $('#collection-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                        $('#brands-image-id').val('');
                        $('#brands-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                    });
                    $(document).ajaxComplete(function (event, xhr, settings) {
                        var queryStringArr = settings.data.split('&');
                        if ($.inArray('action=add-tag', queryStringArr) !== -1) {
                            var xml = xhr.responseXML;
                            $response = $(xml).find('term_id').text();
                            if ($response != "") {
                                // Clear the thumb image
                                $('#category-image-wrapper').html('');
                                $('#collection-image-wrapper').html('');
                                $('#brands-image-wrapper').html('');
                            }
                        }
                    });
                });
            </script>
        <?php }

    }

    $CT_TAX_META = new CT_TAX_META();
    $CT_TAX_META->init();

}
