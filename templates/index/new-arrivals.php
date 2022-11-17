<?php
$lang = pll_current_language( 'slug' );
?>

<section id="new-arrivals" class="mt-(100px)" md="mt-(240px)">
    <div class="container-fluid px-(20px)" lg="px-(70px)" xxl="px-(140px)">
        <div class="grid cols-12 gap-(20px)" xxl="gap-(40px)">
            <div class="col-12 text-center mb-(60px)">
                <div class="text-(15px) text-w-(800) text-black en-desc en-mb" xl="text-(25px)">
                     <?php pll_e('hasht-new-desc'); ?>
                </div>
                <div class="text-(40px) text-w-(700) text-black barlow" xl="text-(104px)">
                      <?php pll_e('hasht-new-title'); ?>
                </div>
            </div>
			<?php
			$query = new WP_Query( array(
				'posts_per_page' => 4,
				'post_type'      => array( 'product' ),
				'order'          => 'DESC', // Also support: ASC
				'orderby'        => 'date',
			) );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();


					?>
         
                    <div class="col-12 parent" sm="col-6" lg="col-3">
                       <a href="<?php echo get_the_permalink() ?>">
                        <div class="p-relative bg-transparent">
                            <div
                                    class="w-(100%) pt-(320px) p-relative overflow-hidden"
                                    lg="pt-(250px)"
                                    xl="pt-(379px)"
                            >
								<?php
								$new = get_post_meta( $post->ID, 'new_item_meta_box', true );
								if ( $new === 'yes' ) {
									?>
                                    <div
                                            class="p-absolute left-(0) top-(0) bg-white text-black border-solid border-black border-(2px) text-w-bold w-(max-content) zindex px-(14px) py-(4px)"
                                    >
                                         <?php pll_e('hasht-new'); ?>
                                    </div>
									<?php
								}
								?>


                                <img
                                        src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>"
                                        class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit scale-in ts-(0.5s)"
                                />
                            </div>
                        </div>
                        <div class="text-center mt-(45px)">
                            <h2
                                    class="text-black text-(100px) text-w-bold text-(16px) ma-(0)"
                                    md="text-(22px)"
                            >
                                <a href="<?php echo get_the_permalink() ?>"
                                   class="text-black barlow"><?php echo get_the_title() ?></a>
                            </h2>
                        </div>
                        <div class="text-center p-relative mt-6">
                            <div
                                    class="bg-transparent ts-(0.5s) d-flex a-items-center j-content-center my-(10px)"
                                    md="p-absolute left-(0) right-(0) top-(0) bottom-(0) opacity-0 my-(0)"
                                    parent-hover="opacity-100 bg-white"
                            >
                                <?php
                                if ($lang == 'fa'){
                                    ?>
                                    <a href="<?php echo get_home_url() . '/?add-to-cart=' . $post->ID  ?>" class="ml-6 ts-(0.5s)" hover="pb-(10px)"
                                    ><i
                                                class="ri-shopping-cart-2-line text-black text-(25px)"
                                                md="text-(35px)"
                                        ></i
                                        ></a>
                                <?php
                                }elseif ($lang == 'en'){
                                    ?>
                                    <a href="<?php echo get_home_url() . '/?add-to-cart=' . $post->ID   ?>" class="ml-6 ts-(0.5s)" hover="pb-(10px)"
                                    ><i
                                                class="ri-shopping-cart-2-line text-black text-(25px)"
                                                md="text-(35px)"
                                        ></i
                                        ></a>
                                <?php
                                }
                                ?>

                                <?php
                                $existing_pms = get_post_meta($post->ID, 'postwishlist');

                                if (in_array(get_current_user_id(), $existing_pms)) {
                                    ?>
                                    <a class="deletewishlist ml-6 ts-(0.5s)" hover="pb-(10px)"
                                    >
                                        <input type="hidden" name="post_id" value="<?php echo $post->ID;?>">
                                        <i
                                                class="ri-heart-fill text-black text-(25px)"
                                                md="text-(35px)"
                                        ></i
                                        ></a>
                                <?php
                                }else{


                                ?>
                                <a class="addwishlist ml-6 ts-(0.5s)" hover="pb-(10px)"
                                >
                                    <input type="hidden" name="post_id" value="<?php echo $post->ID;?>">
                                    <i
                                            class="ri-heart-line text-black text-(25px)"
                                            md="text-(35px)"
                                    ></i
                                    ></a>
                                <?php
                                }
                                ?>
                                <a href="<?php echo get_the_permalink() ?>" class="ts-(0.5s)" hover="pb-(10px)"
                                ><i
                                            class="ri-arrow-right-line text-black text-(25px)"
                                            md="text-(35px)"
                                    ></i
                                    ></a>
                            </div>
                            <div class="d-flex a-items-center j-content-center">
								<?php

								if ( $lang == 'en' ) {
									$regularusd = get_post_meta( $post->ID, '_regular_price_wmcp', true );
									$saleusd    = get_post_meta( $post->ID, '_sale_price_wmcp', true );
									$pieces = explode( '"', $saleusd );
									$pieces2 = explode( '"', $regularusd );
									if ( $saleusd != '' ) {


										?>
                                        <span class="text-black text-(18px) text-w-(100) barlow-thin"><?php echo '$' . $pieces[3]; ?></span>
                                        <span class="text-black text-(18px) text-w-(100) line-through mr-4 barlow-thin"><?php echo '$' . $pieces2[3] ?></span>
										<?php
									} else {
										?>
                                        <span class="text-black text-(18px) text-w-(100) barlow-thin"><?php echo '$' . $pieces2[3] ?></span>
										<?php
									}

								} elseif ( $lang == 'fa' ) {
									$product = wc_get_product( $post->ID );
									if ( $product->get_sale_price() ) {
										?>
                                        <span class="text-black text-(18px) text-w-(100)"><?php echo $product->get_sale_price() . ' تومان ' ?></span>
                                        <span class="text-black text-(18px) text-w-(100) line-through mr-4"><?php echo $product->get_regular_price() . ' تومان ' ?></span>
										<?php
									} else {
										?>
                                        <span class="text-black text-(18px) text-w-(100)"><?php echo $product->get_regular_price() . ' تومان ' ?></span>
										<?php
									}
								}


								?>
                            </div>
                        </div>
                             </a>
                    </div>
        
					<?php
				}
			} else {
				echo "در حال حاضر مطلبی جهت نمایش وجود ندارد";
			}

			wp_reset_postdata();
			?>
            <div class="col-12 text-center mt-(100px)">
                <a
                        class="text-(13px) text-w-(500) font-w-(800) d-block mx-auto w-(1%) w-(max-content) text-right p-relative border-bottom-(2px) border-bottom-solid border-black ts-(0.5s) text-black read-en"
                        md="text-(17px)"
                        hover="border-transparent"
                        href=""
                > <?php pll_e('see-more'); ?></a
                >
            </div>
        </div>
    </div>
</section>