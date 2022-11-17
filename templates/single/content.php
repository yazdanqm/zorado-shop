<?php
$lang = pll_current_language( 'slug' );
global $product;

$gallery_ids       = $product->get_gallery_image_ids();
$title             = $product->name;
$price             = $product->price;
$description       = $product->description;
$short_description = $product->short_description;
$category_ids      = $product->category_ids;
$tag_ids           = $product->tag_ids;
?>


<section
        id="single-content"
        class="px-(20px) mb-64"
        md="mt-(200px)"
        i-md="mt-(100px)"
        lg="px-(70px)"
        xxl="px-(140px)"
>
    <div class="grid cols-12 dir-en" xl="gap-8">

        


        <div class="col-12" xxl="col-6" xl="col-7" i-xl="order-1">
            <section class="slider">
                <div class="slider__flex">
                    <div class="slider__col" i-sm="!h-(100px)" ms="mt-2">
                        <div class="slider__thumbs" md="h-(677px)" i-md="h-(100px)" i-sm="h-(70px)" xs="h-(80px)"
                             ms="!h-(90px)">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
									<?php
									foreach ( $gallery_ids as $gallery_id ) {
										$image_link = wp_get_attachment_url( $gallery_id );
										?>

                                        <div class="swiper-slide">
                                            <div class="slider__image p-relative overflow-hidden"><img
                                                        class="p-absolute left-0 top-0 right-0 bottom-0 obj-fit"
                                                        src="<?php echo $image_link; ?>"
                                                        alt=""/></div>
                                        </div>

										<?php
									}
									?>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slider__images" sm="h-(677px)" i-sm="h-(400px)" ms="!h-(300px)">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
								<?php
								foreach ( $gallery_ids as $gallery_id ) {
									$image_links = wp_get_attachment_url( $gallery_id );
									?>
                                    <div class="swiper-slide">
                                        <div class="slider__image p-relative overflow-hidden"><img
                                                    class="p-absolute left-0 top-0 right-0 bottom-0 obj-fit"
                                                    src="<?php echo $image_links ?>" alt=""/></div>
                                    </div>

									<?php
								}
								?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>


        <div class="col-12" xxl="col-6 px-14" xl="col-5 pt-(40px)" i-xl="order-2 pt-20">
            

                        <div class="content dir-en">
                <h1 class="text-black text-(50px) ma-0 text-w-(700) dir-en barlow" i-sm="text-(32px)">
					<?php
					echo $title
					?>
                </h1>
                <small class="text-black text-(30px) text-lh-(1) text-w-(400) dir-en barlow-thin"
                       i-sm="text-(20px)"
                >
					<?php
					$lang = pll_current_language( 'slug' );
					if ( $lang == 'en' ) {
						$regularusd = get_post_meta( $post->ID, '_regular_price_wmcp', true );
						$saleusd    = get_post_meta( $post->ID, '_sale_price_wmcp', true );
						if ( $saleusd != '' ) {
							$pieces = explode( '"', $saleusd );
							echo '$' . $pieces[3];

						} elseif ( $regularusd != '' ) {
							$pieces = explode( '"', $regularusd );
							echo '$' . $pieces[3];
						} else {
							 pll_e("unknown");
						}
					} elseif ( $lang == 'fa' ) {
						$product = wc_get_product( $post->ID );
						if ( $product->get_sale_price() ) {
							echo $product->get_sale_price();
						} elseif ( $product->get_regular_price() ) {
							echo $product->get_regular_price();
						} else {
							pll_e("unknown");
						}
					}


					?>

                </small>
                <p class="text-black mt-(50px) text-(17px) text-w-(200) dir-en footer-thin" i-sm="text-(16px)">
					<?php
					echo $short_description;
					?>
                </p>

            </div>


			<?php

			$targeted_id = $post->ID;
			$quantities  = WC()->cart->get_cart_item_quantities();


			if ( isset( $quantities[ $targeted_id ] ) && $quantities[ $targeted_id ] > 0 ) {
				$cart = $quantities[ $targeted_id ];
			}

			$max       = '';
			$inventory = $product->get_stock_quantity();
			if ( isset( $inventory ) ) {
				if ( $cart > 0 ) {
					$max = $inventory - $cart;
				} else {
					$max = $inventory;
				}
			} else {
				$max = 99;
			}

			if ( $max > 0 ) {
				?>
                <div class="addToCart mt-(28px)">
                    <div id="controls" class="d-flex gap-2 dir-en" ms="flex-col">
                        <div class="d-flex gap-2 j-content-center" sm="j-content-start">
                            <button
                                    id="btnRemove"
                                    class="w-(50px) h-(50px) border-solid border-(2px) border-black bg-transparent text-black text-(30px)"
                            >
                                -
                            </button>
                            <div
                                    id="badge"
                                    class="w-(50px) pt-1 d-flex j-content-center h-(50px) border-solid border-(2px) border-black bg-transparent text-black text-(30px) sup-thin pzero"
                            >
                                1
                            </div>
                            <button
                                    id="btnAdd"
                                    class="w-(50px) h-(50px) border-solid border-(2px) border-black bg-transparent text-black text-(30px)"
                            >
                                +
                            </button>
                        </div>

                        <a id="success"
                           class="w-(245px) h-(50px) bg-black text-w-(800) text-white d-flex j-content-center a-items-center text-(20px) mx-auto sup-thin"
                           sm="mx-0" i-sm="text-(16px)">
                             <?php pll_e("add-to-cart"); ?>
                        </a>

                        <script>
                            var itemCount = 0;


							<?php
							if ( $lang == 'fa' ) {
							$cart = get_home_url() . '/?add-to-cart=' . $post->ID   . '&quantity=';
                            }elseif ( $lang == 'en' ){
								$cart = get_home_url() . '/?add-to-cart=' . $post->ID .'&quantity=';
							}
							?>
                            var linkK = document.querySelector("#success");
                            linkK.href = "<?php echo $cart ?>".concat(itemCount);

                            document.querySelector("#btnAdd").addEventListener("click", function () {
                                itemCount += 1;
                                if (itemCount <= <?php echo $max; ?>) {
                                    document.querySelector("#badge").innerHTML = itemCount;
                                } else {
                                    document.querySelector("#badge").innerHTML = <?php echo $max; ?>;
                                    itemCount = <?php echo $max; ?>;
                                }
                                linkK.href = "<?php echo $cart ?>".concat(itemCount);
                            });

                            document.querySelector("#btnRemove")
                                .addEventListener("click", function () {
                                    itemCount -= 1;
                                    if (itemCount >= 0 && itemCount <= <?php echo $max; ?>) {
                                        document.querySelector("#badge").innerHTML = itemCount;
                                    } else if (itemCount < 0) {
                                        itemCount = 0;
                                    }
                                    linkK.href = "<?php echo $cart ?>".concat(itemCount);
                                });
                            document.getElementById('success').addEventListener('click' , function () {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'محصول مورد نظر به سبد خرید اضافه شد',
                                    confirmButtonText: 'باشه',
                                    timer: 4000,
                                })
                            })
                        </script>
                    </div>

                </div>


				<?php
				if ( $max == 1 ) {
					?>
                    <div class="text-w-(200)  mt-(15px) dir-en footer-thin">
                    <?php pll_e("last-one"); ?>
                    </div>
					<?php
				}
				?>

				<?php

			} else {
				?>
                <div id="success" class="d-flex mt-4 a-items-center mb-(-10px) d-flex a-items-center dir-en" xxl="mb-(-28px)">
                    <i class="ri-close-fill text-black text-(30px)"></i>
                    <div class="mr-1 text-w-800 text-(20px) text-black dir-en footer-thin">
                      <?php pll_e("empty-one") ?>
                    </div>
                </div>
				<?php
			}
			?>


			<?php
			$existing_pms = get_post_meta( $post->ID, 'postwishlist' );

			if ( in_array( get_current_user_id(), $existing_pms ) ) {
				?>
                <div class="deletewishlist mt-(10px) cursor-pointer d-flex a-items-center dir-en" xxl="mt-(28px)">
                    <input type="hidden" name="post_id" value="<?php echo $post->ID;?>">
                    <i class="ri-heart-fill heart text-black text-(30px)" i-sm="text-(24px)"></i>
                    <span class="text-w-800 text-(20px) text-black read-en mx-2" i-sm="text-(16px)">
                      <?php pll_e("del-from-wish") ?>
              </span
                    >
                </div>
				<?php

			}else{
				?>
                <div class="addwishlist mt-(10px) cursor-pointer d-flex a-items-center dir-en" xxl="mt-(28px)">
                    <input type="hidden" name="post_id" value="<?php echo $post->ID;?>">
                    <i class="ri-heart-line heart text-black text-(30px)" i-sm="text-(24px)"></i>
                    <span class="text-w-800 text-(20px) text-black read-en mx-2" i-sm="text-(16px)">
                        <?php pll_e("add-to-wish"); ?>
               </span>
                </div>
				<?php
            }
			?>

            <div class="info mt-(30px)" xxl="mt-(52px)">
                <div class="text-black dir-en">
                    <b class="text-black text-(22px) barlow"><?php pll_e("cat"); ?>  :</b>

					<?php

					$product_cats = get_the_terms( $product->id, 'product_cat' );
					$s            = 1;
					foreach ( $product_cats as $product_cat ) {
						?>
                        <a class="text-black text-(22px) barlow-thin" i-sm="text-(18px)"
                           href="<?php echo get_category_link( $product_cat->term_id ) ?>">
							<?php
							echo $product_cat->name;
							?>
                        </a>
						<?php
						if ( $s >= 1 ) {
							break;
						}
						$s ++;
					}
					?>
                </div>
                <div class="text-black dir-en">
                    <b class="text-black text-(22px) barlow"><?php pll_e("tags"); ?> :</b>
					<?php
					$product_tags = get_the_terms( $product->id, 'product_tag' );
					$i            = 1;
					foreach ( $product_tags as $product_tag ) {
						?>
                        <a class="text-black text-(22px) barlow-thin" i-sm="text-(18px)"
                           href="<?php echo get_category_link( $product_tag->term_id ) ?>">
							<?php
							echo $product_tag->name;
							?>
                        </a>
						<?php
						if ( $i > 2 ) {
							break;
						}
						$i ++;
						?>
                        ,
						<?php
					}
					?>


                </div>
            </div>
     

        </div>


    </div>
    <div class="describe mt-(120px)" xl=" mt-(220px)">
        <div id="tabs" class="tabs ts-(0.5s)">
            <ul class="d-flex gap-(69px) dir-en" i-md="gap-(30px)" ms="!gap-(15px)">
                <li>
                    <a
                            class="text-black text-(25px) text-w-(700) cursor-pointer barlow"
                            i-sm=" text-(20px)"
                            ms=" !text-(16px)"
                            href="#tabs-1"
                    >
                        <?php pll_e("description"); ?>
                    </a>
                </li>
                <li>
                    <a
                            class="text-black text-(25px) text-w-(700) cursor-pointer barlow"
                            i-sm=" text-(20px)"
                            ms=" !text-(16px)"
                            href="#tabs-2"
                    >
                        <?php pll_e("sizing"); ?>
                    </a>
                </li>
                <li>
                    <a
                            class="text-black text-(25px) text-w-(700) cursor-pointer barlow"
                            i-sm=" text-(20px)"
                            ms=" !text-(16px)"
                            href="#tabs-3"
                    >
                       <?php pll_e("shipping"); ?>
                    </a>
                </li>
            </ul>


            <div id="tabs-1" class="mt-(75px)">
                <div class="text-black text-(17px) text-w-(200) text-lh-(27px) dir-en footer-thin"
                     i-sm="text-(16px)"
                >
					<?php
					echo $description;
					?>

                </div>
            </div>
            <div id="tabs-2" class="mt-(75px)">
                <div class="text-black text-(17px) text-w-(200) text-lh-(27px)">

					<?php $fileLink = get_post_meta( $post->ID, "wb_additional_file", true ); ?>
					<?php
					if ( ! empty( $fileLink ) ) {
						?>
                        <div class="text-(14px) text-w-(300) text-black text-center footer-thin mb-2"> 
                    <?php pll_e("sizing-desc"); ?>
                        </div>
                        <img id="myImg" class="w-(100%) d-block mx-auto" sm="w-(100%)" md="w-(500px)" lg="" xl="" xxl=""
                             src="<?= $fileLink; ?>"/>
                        <div id="myModal" class="modal">
                            <img class="modal-content" id="img01">
                        </div>
						<?php
					} else {
						?>
                        <div class="text-(14px) text-center text-w-(300) text-black">
                        <?php pll_e("sizing-no"); ?>
                        </div>
						<?php
					}
					?>


                </div>
            </div>
            <div id="tabs-3" class="mt-(75px)">
                <div class="text-black text-(17px) text-w-(200) text-lh-(27px) dir-en footer-thin">
					<?php
					if ( $lang == 'en' ) {
						echo get_option( 'hasht-shipping-en' );
					} else if ( $lang == 'fa' ) {
						echo get_option( 'hasht-shipping' );
					}
					?>
                </div>
            </div>

        </div>
</section>
