<div class="!bg-(#000000ba) p-fixed inset-0 d-flex a-items-center j-content-center z-999999999 loader mylod">
    <img id="lodlod" class="w-40 opacity-0 ts-500" src="<?php echo get_template_directory_uri(), '/assets/img/henro.svg'; ?>" />
</div>

<a href="#" class="p-fixed z-9999999 right-4 bottom-4 bg-white w-(50px) h-(50px) d-flex a-items-center j-content-center rounded-full box-shadow scale-in ts-300 bxshdw" md="w-(70px) h-(70px) right-8 bottom-8">
  <img  class="w-(50%)"  src="<?php echo get_template_directory_uri() . '/assets/img/whatsapp.svg'; ?>"/>
</a>
<div class="menu-container p-fixed top-0 z-99999999 left-0 right-0 d-flex">

    <nav id="main-nav" class="nav dir-en !d-flex !j-content-end p-absolute left-14 top-(18px) z-10 ml-(10px)" md="ml-0">

        <div>

            <div class="d-flex gap-6">


                <?php
                if (!is_user_logged_in()) {
                ?>

                    <div id="shoppingCart" class="parent p-relative">
                         <?php 
                  $cart_count =WC()->cart->get_cart_contents_count();  
                  if($cart_count != 0){
                    ?>
                      <div class="cartCount">
						<?php echo $cart_count; ?>
                      </div>
                      <?php
                  }
                          ?>
                        <a>
                            <i class="ri-shopping-cart-2-line cursor-pointer text-(24px) text-white"></i>
                        </a>
                        <div parent-hover="visible opacity-100" class="p-absolute bg-black  ts-(0.5s) 

                  w-(280px) mt-1 -left-26.7  max-h-(300px) px-(20px) pb-(20px) overflow-x-auto hidden opacity-0  right-en-0" md="d-block -left-15.7">
                            <?php
                            $lang = pll_current_language('slug');
                            global $woocommerce;
                            if ($woocommerce->cart->get_cart()) {
                                foreach ($woocommerce->cart->get_cart() as $item => $values) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($values['data']->id), 'thumbnail'); ?>

                                    <div class="d-flex gap-4 py-4 border-bottom-(1px) border-bottom-solid border-(#ffffff1f)">
                                        <img class="w-(80px) h-(80px) rounded-8" src="<?php echo $image[0]; ?>" alt="" />
                                        <div children="text-white" class="pt-1">
                                            <p class="my-0 barlow cart-fonts"><?php echo $values['data']->name ?></p>
                                            <?php
                                            if ($lang == 'fa') {
                                            ?>
                                                <span class="text-(14px)"><?php echo $values['quantity'] ?></span>
                                            <?php
                                            } elseif ($lang == 'en') {
                                            ?>
                                                <span class="text-(14px) barlow-thin cart-fonts"><?php echo $values['quantity'] ?></span>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($lang == 'fa') {
                                            ?>
                                                <p class="my-0"><?php echo $values['line_total'] ?> تومان</p>
                                            <?php
                                            } elseif ($lang == 'en') {
                                            ?>
                                                <p class="my-0 barlow-thin cart-fonts"><?php echo '$' . $values['line_total'] ?></p>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                <?php

                                }
                                if ($lang == 'fa') {
                                ?>

                                    <a href="<?php echo home_url() . '/cart/' ?>" class="text-(14px) text-w-(500) font-w-(800) d-block mx-auto mt-4 w-(100%) text-center p-relative border-(2px) border-bottom-solid border-white ts-(0.5s) text-white py-(10px)" hover="bg-white text-black">
                                        تسویه حساب
                                    </a>
                                <?php
                                } elseif ($lang == 'en') {
                                ?>

                                    <a href="<?php echo home_url() . '/cart/' ?>" class="text-(14px) barlow text-w-(500) font-w-(800) d-block mx-auto mt-4 w-(100%) text-center p-relative border-(2px) border-bottom-solid border-white ts-(0.5s) text-white py-(10px)" hover="bg-white text-black">
                                        checkout
                                    </a>
                            <?php
                                }
                            } else {
                                if ($lang == 'fa') {
                                    echo ' <p class="text-white pt-(20px)">سبد خرید شما در حال حاضر خالی است.</p>';
                                } elseif ($lang == 'en') {
                                    echo ' <p class="text-white footer-thin pt-(20px) dir-en">Your shopping cart is empty</p>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <a href="<?php echo get_home_url() . '/login' ?>">
                        <i class="ri-login-circle-line cursor-pointer text-(24px) text-white"></i>
                    </a>
                <?php
                } else {
                ?>


                    <div id="shoppingCart" class="parent p-relative">
 <?php 
                  if($cart_count != 0){
                    ?>
                      <div class="cartCount">
						<?php echo $cart_count; ?>
                      </div>
                      <?php
                  }
                          ?>
                        <a>
                            <i class="ri-shopping-cart-2-line cursor-pointer text-(24px) text-white"></i>
                        </a>
                        <div parent-hover="visible opacity-100" class="p-absolute bg-black  ts-(0.5s) 

                  w-(280px) mt-1 -left-26.7  max-h-(300px) px-(20px) pb-(20px) overflow-x-auto hidden opacity-0 right-en-0" md="d-block -left-15.7">
                            <?php
                            $lang = pll_current_language('slug');
                            global $woocommerce;
                            if ($woocommerce->cart->get_cart()) {
                                foreach ($woocommerce->cart->get_cart() as $item => $values) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($values['data']->id), 'thumbnail'); ?>

                                    <div class="d-flex gap-4 py-4 border-bottom-(1px) border-bottom-solid border-(#ffffff1f)">
                                        <img class="w-(80px) h-(80px) rounded-8" src="<?php echo $image[0]; ?>" alt="" />
                                        <div children="text-white" class="pt-1">
                                            <p class="my-0 barlow cart-fonts"><?php echo $values['data']->name ?></p>
                                            <?php
                                            if ($lang == 'fa') {
                                            ?>
                                                <span class="text-(14px)"><?php echo $values['quantity'] ?></span>
                                            <?php
                                            } elseif ($lang == 'en') {
                                            ?>
                                                <span class="text-(14px) barlow-thin"><?php echo $values['quantity'] ?></span>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($lang == 'fa') {
                                            ?>
                                                <p class="my-0"><?php echo $values['line_total'] ?> تومان</p>
                                            <?php
                                            } elseif ($lang == 'en') {
                                            ?>
                                                <p class="my-0 barlow cart-fonts"><?php echo '$' . $values['line_total'] ?></p>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                <?php

                                }

                                if ($lang == 'fa') {
                                ?>

                                    <a href="<?php echo home_url() . '/cart/' ?>" class="text-(14px) text-w-(500) font-w-(800) d-block mx-auto mt-4 w-(100%) text-center p-relative border-(2px) border-bottom-solid border-white ts-(0.5s) text-white py-(10px)" hover="bg-white text-black">
                                        تسویه حساب
                                    </a>
                                <?php
                                } elseif ($lang == 'en') {
                                ?>

                                    <a href="<?php echo home_url() . '/cart/' ?>" class="text-(14px) barlow text-w-(500) font-w-(800) d-block mx-auto mt-4 w-(100%) text-center p-relative border-(2px) border-bottom-solid border-white ts-(0.5s) text-white py-(10px)" hover="bg-white text-black">
                                        checkout
                                    </a>
                            <?php
                                }
                            } else {
                                if ($lang == 'fa') {
                                    echo ' <p class="text-white pt-(20px)">سبد خرید شما در حال حاضر خالی است.</p>';
                                } elseif ($lang == 'en') {
                                    echo ' <p class="text-white barlow pt-(20px)">Your shopping cart is empty</p>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <a href="<?php echo get_home_url() . '/dashboard' ?>">
                        <i class="ri-user-line cursor-pointer text-(24px) text-white"></i>


                    </a>
                <?php
                }
                ?>



            </div>

        </div>
    </nav>




    <div class="menu">
        <a href="<?php echo get_home_url(); ?>" class="logo">
            <img class="w-(110px)" alt="Henro" src="<?php echo get_template_directory_uri() . '/assets/img/henro.svg'; ?>" />
        </a>


        <ul class="clearfix">


            <?php

            $menuLocations = get_nav_menu_locations();

            $menuID = $menuLocations['header-cat'];

            $items = wp_get_nav_menu_items($menuID);
            $child_items = [];



            foreach ($items as $key => $item) {
                if ($item->menu_item_parent) {
                    array_push($child_items, $item);
                    unset($items[$key]);
                }
            }





            foreach ($items as $item) {




                foreach ($child_items as $key => $child) {




                    if ($child->menu_item_parent == $item->ID) {

                        if (!$item->child_items) {
                            $item->child_items = [];
                        }

                        array_push($item->child_items, $child);
                        unset($child_items[$key]);
                    }
                }
            }




            $parent_items = [];

            if (is_array($items) || is_object($items)) {
                foreach ($items as $item) {


                    if ($item->menu_item_parent == 0) {
                        array_push($parent_items, $item);
            ?>
                        <li><a href="<?php echo $item->url ?>"><?php echo $item->title ?></a>
                            <?php

                            if ($item->child_items > 0) {

                            ?>
                                <ul>
                                    <?php
                                    foreach ($item->child_items as $bib) {
                                    ?>
                                        <li><a href="<?php echo $bib->url; ?>"><?php echo $bib->title; ?></a>

                                            <?php
                                            $childs = [];
                                            foreach ($child_items as $newitem) {

                                                if ($newitem->menu_item_parent == $bib->ID) {
                                                    array_push($childs, $newitem);
                                                }
                                            }

                                            if (count($childs) > 0) {

                                            ?>
                                                <ul>
                                                    <?php
                                                    foreach ($childs as $child) {
                                                    ?>
                                                        <li><a href="<?php echo $child->url; ?>"><?php echo $child->title; ?></a></li>



                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            <?php
                                            }
                                            ?>

                                        </li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            <?php

                            }

                            ?>

                        </li>


            <?php

                    }
                }
            }


            ?>












        </ul>
    </div>
</div>