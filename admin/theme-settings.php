<?php


add_action('init', 'propanel_of_options');

if (!function_exists('propanel_of_options')) {
    function propanel_of_options()
    {

//Theme Shortname
        $shortname = "hasht";


//Populate the options array
        global $tt_options;
        $tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
        $tt_pages = array();
        $tt_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($tt_pages_obj as $tt_page) {
            $tt_pages[$tt_page->ID] = $tt_page->post_name;
        }
        $tt_pages_tmp = array_unshift($tt_pages, "Select a page:");


//Access the WordPress Categories via an Array
        $tt_categories = array();
        $tt_categories_obj = get_categories('hide_empty=0');
        foreach ($tt_categories_obj as $tt_cat) {
            $tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;
        }
        $categories_tmp = array_unshift($tt_categories, "Select a category:");


//Sample Array for demo purposes
        $sample_array = array("1", "2", "3", "4", "5");


//Sample Advanced Array - The actual value differs from what the user sees
        $sample_advanced_array = array("image" => "The Image", "post" => "The Post");


//Folder Paths for "type" => "images"
        $sampleurl = get_template_directory_uri() . '/admin/images/sample-layouts/';


        $themedir = get_template_directory_uri();
        $options = array(); // do not delete this line - sky will fall


        /////////////////////////////////////
        /////////////////////////////////////


            $options[] = array("name" => __('Slider', 'framework_localize'),
            "fname" => "اسلایدر",
            "type" => "heading");

            $options[] = array("name" => __('تصویر اول', 'framework_localize'),
            "desc" => __('یک تصویر با کیفیت و بزرگ را انتخاب کنید', 'framework_localize'),
            "id" => $shortname . "-slide1",
            "type" => "upload");

            $options[] = array("name" => __('لینک اولین اسلاید', 'framework_localize'),
            "desc" => __('', 'framework_localize'),
            "id" => $shortname . "-link1",
            "type" => "text");

            $options[] = array("name" => __('', 'framework_localize'),
            "desc" => "<hr>",
            "type" => "alert");

            $options[] = array("name" => __('تصویر دوم', 'framework_localize'),
            "desc" => __('یک تصویر با کیفیت و بزرگ را انتخاب کنید', 'framework_localize'),
            "id" => $shortname . "-slide2",
            "type" => "upload");

            $options[] = array("name" => __('لینک دومین اسلاید', 'framework_localize'),
            "desc" => __('', 'framework_localize'),
            "id" => $shortname . "-link2",
            "type" => "text");

            $options[] = array("name" => __('', 'framework_localize'),
            "desc" => "<hr>",
            "type" => "alert");

            $options[] = array("name" => __('تصویر سوم', 'framework_localize'),
            "desc" => __('یک تصویر با کیفیت و بزرگ را انتخاب کنید', 'framework_localize'),
            "id" => $shortname . "-slide3",
            "type" => "upload");

            $options[] = array("name" => __('لینک سومین اسلاید', 'framework_localize'),
            "desc" => __('', 'framework_localize'),
            "id" => $shortname . "-link3",
            "type" => "text");

    

        /////////////////////////////////////
        /////////////////////////////////////

        $options[] = array("name" => __('blue box', 'framework_localize'),
            "fname" => "اینستاگرام",
            "type" => "heading");
            
            for($i = 1; $i <=8; $i++){
                
            $options[] = array("name" => __('تصویر'. $i , 'framework_localize'),
            "desc" => __('یک تصویر مربعی و با کیفیت انتخاب کنید', 'framework_localize'),
            "id" => $shortname . "-insta".$i,
            "type" => "upload");

            $options[] = array("name" => __('لینک تصویر'.$i, 'framework_localize'),
            "desc" => __('', 'framework_localize'),
            "id" => $shortname . "-instalink".$i,
            "type" => "text");

            $options[] = array("name" => __('', 'framework_localize'),
            "desc" => "<hr>",
            "type" => "alert");
                
            }


        
/////////////////////////////////////
        /////////////////////////////////////
        
         $options[] = array("name" => __('return box', 'framework_localize'),
            "fname" => "بازگشت و حمل و نقل",
            "type" => "heading");
            
            $options[] = array("name" => __('متن قسمت بازگشت و حمل و نقل به صورت فارسی', 'framework_localize'),
            "desc" => __('در این قسمت می توانید متن مورد نظرتان را بنویسید. این متن زیر تمامی محصولات اعمال می شود.', 'framework_localize'),
            "id" => $shortname . "-shipping",
            "type" => "textarea");
            
            $options[] = array("name" => __('متن قسمت بازگشت و حمل و نقل به صورت انگلیسی', 'framework_localize'),
            "desc" => __('در این قسمت می توانید متن مورد نظرتان را بنویسید. این متن زیر تمامی محصولات اعمال می شود.', 'framework_localize'),
            "id" => $shortname . "-shipping-en",
            "type" => "textarea");




        update_option('of_template', $options);
        update_option('of_shortname', $shortname);

    }
}
?>