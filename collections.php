<?php /* Template Name: collections */
$tax        = $_GET['tax'];
$taxs       = get_term( $tax );
$query_name = $taxs->name;

if ( $query_name ) {
	get_header();
	get_template_part( 'templates/single/header' );
	$lang = pll_current_language( 'slug' );


	$s    = $_GET['q'];
	if ( $lang == 'fa' ) {
		$price_key = '_price';
		$step      = '5000';
	} else {
		$price_key = 'usd_price';
		$step      = '10';
	}
	if ( ( isset( $_GET['price_range_max'] ) ) && ( isset( $_GET['price_range_min'] ) ) ) {
		$price_range_max = $_GET['price_range_max'];
		$price_range_min = $_GET['price_range_min'];
		$args            = array(
			'post_type'      => 'product',
			's'              => $s,
			'posts_per_page' => - 1,
			'tax_query'      => array(
				array(
					'taxonomy' => 'collections',
					'field'    => 'name',
					'terms'    => $query_name,
				)
			),
			'meta_query'     => array(
				array(
					'key'     => $price_key,
					'value'   => array( $price_range_min, $price_range_max ),
					'compare' => 'BETWEEN',
					'type'    => 'NUMERIC'
				)
			),

		);
	} else {
		$args = array(
			'post_type'      => 'product',
			's'              => $s,
			'posts_per_page' => - 1,
			'tax_query'      => array(
				array(
					'taxonomy' => 'collections',
					'field'    => 'name',
					'terms'    => $query_name,
				)
			),
		);
	}
	$args_for_price = array(
		'post_type'      => 'product',
		's'              => $s,
		'posts_per_page' => - 1,
		'tax_query'      => array(
			array(
				'taxonomy' => 'collections',
				'field'    => 'name',

				'terms' => $query_name,
			)
		),
	);

	$posts             = get_posts( $args );
	$posts_for_price   = get_posts( $args_for_price );
	$postsID_for_price = [];
	$postsID           = [];

	foreach ( $posts as $post ) {
		$postsID[] = $post->ID;

	}
	foreach ( $posts_for_price as $post_for_price ) {
		$postsID_for_price[] = $post_for_price->ID;

	}

	$prices = [];
	$colors = [];
	$sizes  = [];
	if ( $lang == 'fa' ) {

		foreach ( $postsID_for_price as $postID_for_price ) {
			$price    = get_post_meta( $postID_for_price, '_price', true );
			$prices[] = $price;
		}

		$maxprice = max(array_filter($prices)  );
		$minprice = min( array_filter($prices)  );
	} elseif ( $lang == 'en' ) {
		$usd = array();

		foreach ( $postsID_for_price as $postID_for_price ) {
			$regularusd = get_post_meta( $postID_for_price, '_regular_price_wmcp', true );
			$saleusd    = get_post_meta( $postID_for_price, '_sale_price_wmcp', true );
			$pieces     = explode( '"', $saleusd );
			$pieces2    = explode( '"', $regularusd );
			$prices     = $pieces[3];
			$prices2    = $pieces2[3];
			if ( ! empty( $prices ) && $prices != '0' ) {
				update_post_meta( $postID_for_price, 'usd_price', $pieces[3] );
			} elseif ( ! empty( $prices2 ) ) {
				update_post_meta( $postID_for_price, 'usd_price', $pieces2[3] );
			}

			$usd[] = get_post_meta( $postID_for_price, 'usd_price', 'true' );
		}
		$maxprice = max(array_filter($usd)  );
		$minprice = min( array_filter($usd)  );


	}
	foreach ( $postsID as $postID ) {
		$term_obj_list  = get_the_terms( $postID, 'colors' );
		$colors[]       = $term_obj_list;
		$sizes_obj_list = get_the_terms( $postID, 'size' );
		$sizes[]        = $sizes_obj_list;
	}
	if ( isset( $_GET['price_range_max'] ) ) {
		$price_range_max = $_GET['price_range_max'];

	} else {
		$price_range_max = $maxprice;
	}
	if ( isset( $_GET['price_range_min'] ) ) {
		$price_range_min = $_GET['price_range_min'];

	} else {
		$price_range_min = $minprice;
	}
	$color_list = array();
	if ( isset( $_GET['color_list'] ) ) {
		$color_list = $_GET['color_list'];


	} else {
		foreach ( $colors as $color ) {
			foreach ( $color as $cl ) {
				$color_list[] = $cl->name;
			}
		}
		$color_list = array_unique( $color_list );

	}
	$size_list = array();
	if ( isset( $_GET['size_list'] ) ) {
		$size_list = $_GET['size_list'];


	} else {
		foreach ( $sizes as $size ) {
			foreach ( $size as $sz ) {
				$size_list[] = $sz->name;
			}
		}
		$size_list = array_unique( $size_list );


	}
	?>
    <section id="breadcrumbs">
        <div
                class="h-(146px) bg-black text-white text-(25px) text-w-(300) d-flex a-items-center"
                xxl="px-(142px)"
                i-xxl="px-(70px)"
                i-sm="text-(16px)"
                xs="!px-(40px)"
                ms="!text-(14px)"
        >
            <a class="text-white text-w-(600)" href="<?php echo get_home_url(); ?>">صفحه نخست</a>
            <span class="mx-(10px) text-white">/</span>
            <a class="text-white">کالکشن ها</a>
        </div>
    </section>
    <section
            id="category"
            class="mb-64"
            xxl="px-(142px)"
            i-xxl="px-(70px)"
            md="mt-(200px)"
            i-md="mt-(100px)"
            xs="!px-(40px)"
    >
        <div class="grid cols-12 dir-en" lg="gap-8">
            <div class="col-12 order-2" lg="col-9 order-1">
                <section id="new-arrivals">
                    <div class="container-fluid">
                        <div id="product_ajax" class="grid cols-12 gap-(20px) dir-en" xxl="gap-(40px)">
							<?php


							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


							$arg = array(
								'post_type'      => 'product',
								'posts_per_page' => 1,
								'paged'          => $paged,
								's'              => $s,

								'meta_query' => array(
									'relation' => 'OR',
									array(
										'key'     => $price_key,
										'value'   => array( $price_range_min, $price_range_max ),
										'compare' => 'BETWEEN',
										'type'    => 'NUMERIC'
									),
									array(
										'key'     => $price_key,
										'compare' => 'NOT EXISTS',
										'value'   => 'null',
									)
								),
								'tax_query'  => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'collections',
										'field'    => 'name',

										'terms' => $query_name,
									),
									array(
										'taxonomy' => 'colors',
										'field'    => 'name',
										'terms'    => $color_list,

									),
									array(
										'taxonomy' => 'size',
										'field'    => 'name',
										'terms'    => $size_list,

									)
								),


							);


							$wp_query = new WP_Query( $arg );


							if ( $wp_query->have_posts() ) {
								while ( $wp_query->have_posts() ) {
									$wp_query->the_post();
									?>
                                    <div class="col-12 parent" sm="col-6" lg="col-4">
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
                                                            class="p-absolute left-(0) top-(0) bg-white text-black border-solid border-black border-(2px) text-w-bold w-(max-content) zindex px-(14px) py-(4px) barlow"
                                                    >
														<?php pll_e( 'hasht-new' ); ?>
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
												$existing_pms = get_post_meta( $post->ID, 'postwishlist' );

												if ( in_array( get_current_user_id(), $existing_pms ) ) {
													?>
                                                    <a class="deletewishlist ml-6 ts-(0.5s)" hover="pb-(10px)"
                                                    >
                                                        <input type="hidden" name="post_id"
                                                               value="<?php echo $post->ID; ?>">
                                                        <i
                                                                class="ri-heart-fill text-black text-(25px)"
                                                                md="text-(35px)"
                                                        ></i
                                                        ></a>
													<?php
												} else {


													?>
                                                    <a class="addwishlist ml-6 ts-(0.5s)" hover="pb-(10px)"
                                                    >
                                                        <input type="hidden" name="post_id"
                                                               value="<?php echo $post->ID; ?>">
                                                        <i
                                                                class="ri-heart-line text-black text-(25px)"
                                                                md="text-(35px)"
                                                        ></i
                                                        ></a>
													<?php
												}
												?>
                                                <a href="<?php echo get_the_permalink() ?>" class="ts-(0.5s)"
                                                   hover="pb-(10px)"
                                                ><i
                                                            class="ri-arrow-right-line text-black text-(25px)"
                                                            md="text-(35px)"
                                                    ></i
                                                    ></a>
                                            </div>
                                            <div class="d-flex a-items-center j-content-center">
												<?php
												$lang = pll_current_language( 'slug' );
												if ( $lang == 'en' ) {
													$regularusd = get_post_meta( $post->ID, '_regular_price_wmcp', true );
													$saleusd    = get_post_meta( $post->ID, '_sale_price_wmcp', true );
													$pieces     = explode( '"', $saleusd );
													$pieces2    = explode( '"', $regularusd );
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
													} elseif ( $product->get_regular_price() ) {
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
								?>
                                <div class="w-full h-100 text-(20px) bg-white text-black col-12">
									<?php pll_e( "no-product" ); ?>
                                </div>
								<?php
							}


							?>


                        </div>


                    </div>
                </section>

    <div class="pagination grid cols-12 mt-(180px)">
		<?php cat_pagination( $wp_query ); ?>
    </div>


            </div>
			<?php
			if ( $wp_query->have_posts() ) {
				?>
                <div class="col-12 order-1 mb-16" lg="col-3 order">


                    <div id="show"
                         class="bg-black text-center cursor-pointer text-(17px) py-(15px) text-white mb-14 d-block"
                         lg="d-none">
						<?php pll_e( "advance-search" ); ?>
                        <i class="ri-arrow-left-s-line text-white arrowww d-inline-block"></i>
                    </div>

                    <div class="opener d-none" lg="d-block">
                        <div class="search">
							<?php
							global $wp;
							$current_url = home_url() . '/collections/';

							?>
                            <form
                                    action="<?php echo $current_url; ?>"
                                    method="get"
                                    class="p-relative border-bottom-(2px) border-bottom-solid border-black pb-(11px) dir-en"

                            >
                                <input type="hidden" name="tax" value="<?php echo $tax ?>">
                                <input
                                        type="text"
                                        class="w-full text-black text-(18px) barlow-thin dir-en"
                                        focus="outline-none"
                                        placeholder="<?php pll_e( "search" ); ?>"
                                        value="<?php echo $s ?>"
                                        name="q"
                                />
                                <button
                                        type="submit"
                                        class="parent bg-transparent p-absolute left-0 arrow-en"
                                >
                                    <i
                                            hover="ml-(-5px)"
                                            class="ri-arrow-left-line text-black text-(20px) cursor-pointer ts-(0.5s)"
                                    ></i>
                                </button>
                            </form>
                        </div>

                        <form action="<?php echo $current_url; ?>" method="get">

                            <div class="range-slider mt-(35px)">
                                <h1
                                        class="text-(22px) mb-(40px) text-w-(700) text-black text-right barlow text-left-en"
                                >
			                        <?php pll_e( "cost" ); ?>
                                </h1>
                                <input
                                        class="d-none"
                                        value=""
                                        min="<?php echo $minprice ?>"
                                        max=""
                                        step=""
                                        type="range"
                                />
                                <input
                                        value="<?php if ( $price_range_max ) {
					                        echo $price_range_max;
				                        } else {
					                        echo $maxprice;
				                        } ?>"
                                        min="<?php echo $minprice ?>"
                                        max="<?php echo $maxprice ?>"
                                        step=<?php echo $step ?>
                                        type="range"
                                />
                                <input type="hidden" value="" name="price_range_min" id="price_range_min">
                                <input type="hidden" value="" name="price_range_max" id="price_range_max">
                                <div class="d-flex j-content-between a-items-center pt-(30px) dir-en">
	                                <?php
	                                if ($lang == 'fa'){
		                                ?>
                                        <div class="d-flex">
			                                <?php pll_e( "price" ); ?>
                                            :
                                            &nbsp;
                                            <span
                                                    class="rangeValues text-(16px) text-black text-right"
                                            ></span>
                                        </div>
		                                <?php
	                                }elseif ($lang == 'en'){
		                                ?>
                                        <div class="d-flex dir-en barlow-thin">
			                                <?php pll_e( "price" ); ?>
                                            :
                                            &nbsp;
                                            <span
                                                    class="rangeValues barlow-thin dir-en text-(16px) text-black text-right"
                                            ></span>
                                        </div>
		                                <?php
	                                }
	                                ?>

                                    <button
                                            type="submit"
                                            class="bg-black float-left cursor-pointer text-white text-(16px) text-w-(800) w-(85px) h-(37px) text-lh-(42px) suprima-mid d-flex j-content-center a-items-center"
                                    >
				                        <?php pll_e( "filter" ); ?>
                                    </button>
                                </div>

                            </div>

	                        <?php
	                        if ( $s != '' ) {
		                        ?>
                                <input type="hidden" value="<?php echo $s ?>" name="q" id="s">
		                        <?php
	                        }
	                        ?>
                            <input type="hidden" name="tax" value="<?php echo $tax ?>">

                        </form>
						<?php

						$colors_id = array();
						foreach ( $colors as $color ) {
							foreach ( $color as $cl ) {
								$colors_id[] = $cl->term_id . ':' . $cl->name;


							}
						}
						$colors_id = array_unique( $colors_id );
						if ( $colors_id ){
						?>
                        <div class="colors mt-(35px)">
                            <h1
                                    class="text-(22px) mb-(25px) text-w-(700) text-black text-right barlow text-left-en"
                            >
								<?php pll_e( "color" ); ?>
                            </h1>
                            <div id="colors">
                                <form class="d-flex gap-3 dir-with-pad" action="<?php echo $current_url; ?>"
                                      method="get">
                                    <input type="hidden" name="tax" value="<?php echo $tax ?>">
									<?php
									if ( $_GET['price_range_min'] ) {
										?>
                                        <input type="hidden" value="<?php echo $_GET['price_range_min'] ?>"
                                               name="price_range_min" id="price_range_min">
										<?php
									}
									?>
									<?php
									if ( $_GET['price_range_max'] ) {
										?>
                                        <input type="hidden" value="<?php echo $_GET['price_range_max'] ?>"
                                               name="price_range_max" id="price_range_max">
										<?php
									}
									if ( $s != '' ) {
										?>
                                        <input type="hidden" value="<?php echo $s ?>" name="q" id="s">
										<?php
									}
									if ( isset( $_GET['size_list'] ) ) {
										foreach ( $_GET['size_list'] as $item ) {
											?>
                                            <input type="hidden" value="<?php echo $item ?>" name="size_list[]" id="">
											<?php
										}
									}
									?>

									<?php
									foreach ( $colors_id as $color_id ) {
										$items   = explode( ':', $color_id );
										$code_id = get_term_meta( $items[0], 'color-code-id', true );
										?>

                                        <div class="p-relative mx-2">
                                            <input type="checkbox" <?php if ( in_array( $items[1], $_GET['color_list'] ) ) {
												echo 'checked';
											} ?> value="<?php echo $items[1] ?>" name="color_list[]" id=""
                                                   onclick="this.form.submit()"/>
                                            <span class="checkmark bg-(<?php echo $code_id ?>)"></span>
                                        </div>
										<?php
									}
									?>
                                </form>
								<?php
								}
								?>


                            </div>
                        </div>
						<?php
						$sizes_name = array();
						foreach ( $sizes as $size ) {
							foreach ( $size as $sz ) {
								$sizes_name[] = $sz->name;
							}
						}
						$sizes_name = array_unique( $sizes_name );
						if ( $sizes_name ){
						?>
                        <div class="size mt-(45px)">
                            <h1
                                    class="text-(22px) mb-(30px) text-w-(700) text-black text-right barlow text-left-en"
                            >
								<?php pll_e( "size" ); ?>
                            </h1>
                            <form action="<?php echo $current_url; ?>" method="get" class="dir-en">
                                <input type="hidden" name="tax" value="<?php echo $tax ?>">
								<?php
								if ( $_GET['price_range_min'] ) {
									?>
                                    <input type="hidden" value="<?php echo $_GET['price_range_min'] ?>"
                                           name="price_range_min" id="price_range_min">
									<?php
								}
								?>
								<?php
								if ( $_GET['price_range_max'] ) {
									?>
                                    <input type="hidden" value="<?php echo $_GET['price_range_max'] ?>"
                                           name="price_range_max" id="price_range_max">
									<?php
								}
								if ( $s != '' ) {
									?>
                                    <input type="hidden" value="<?php echo $s ?>" name="q" id="s">
									<?php
								}
								if ( isset( $_GET['color_list'] ) ) {
									foreach ( $_GET['color_list'] as $item ) {
										?>
                                        <input type="hidden" value="<?php echo $item ?>" name="color_list[]" id="">
										<?php
									}
								}
								?>
								<?php

								foreach ( $sizes_name as $size_name ) {
									?>
                                    <div class="d-flex j-content-between mb-(15px) dir-en">
                                        <label for="xxl" class="text-black text-(17px)"><?php echo $size_name ?></label>
                                        <div class="p-relative">
                                            <input type="checkbox" <?php if ( in_array( $size_name, $_GET['size_list'] ) ) {
												echo 'checked';
											} ?> value="<?php echo $size_name ?>" name="size_list[]" id=""
                                                   onclick="this.form.submit()"/>
                                            <span class="checkmark"></span>
                                        </div>
                                    </div>
									<?php

								}
								}
								?>
                            </form>

                        </div>

                    </div>
                </div>
				<?php
			}
			wp_reset_postdata();
			?>
        </div>

    </section>

	<?php

	get_template_part( 'templates/index/footer' );
	get_template_part( 'templates/index/copyright' );
	get_template_part( 'templates/collections/footer' );


}
else {
	get_header();
	get_template_part( 'templates/single/header' );
	?>
    <section id="breadcrumbs">
        <div
                class="h-(146px) bg-black text-white text-(25px) text-w-(300) d-flex a-items-center"
                xxl="px-(142px)"
                i-xxl="px-(70px)"
                i-sm="text-(16px)"
                xs="!px-(40px)"
                ms="!text-(14px)"
        >
            <a class="text-white text-w-(600)" href="<?php echo get_home_url(); ?>">صفحه نخست</a>
            <span class="mx-(10px) text-white">/</span>
            <a class="text-white">کالکشن ها</a>
        </div>
    </section>
    <section id="dashboard" class="py-(100px)">


        <div class="container-fluid px-(20px)" lg="px-(70px)" xxl="px-(140px)">
			<?php

			$collections_terms = get_terms( array(
				'taxonomy'   => 'collections',
				'hide_empty' => false,
				'orderby'    => 'date',
				'order'      => 'ASC',
			) );

			?>


            <div class="grid cols-12 gap-(20px) py-(100px)" xxl="gap-(40px)">

				<?php
				$i = 0;
				foreach ( $collections_terms as $index => $collections_term ) {
					$collections_id = $collections_term->term_id;
					$image_id       = get_term_meta( $collections_id, 'collection-image-id', true );
					$img_att        = wp_get_attachment_image_src( $image_id, 'full' );
					if ( $index == '0' ) {

						?>
                        <div class="col-12 parent" md="col-6">
                            <div class="p-relative">
                                <div
                                        class="w-(100%) pt-(400px) p-relative overflow-hidden en-hover-65-bg"
                                        lg="pt-(500px)"
                                >
                                    <img
                                            src="<?php echo $img_att[0]; ?>"
                                            class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit"
                                    />
                                    <div
                                            class="p-absolute right-(0) left-(0) top-(0) py-(30px) px-(50px) ts-(0.5s) dir-en en-hover-65"
                                            parent-hover="pr-(65px)"
                                    >
                                        <h2 class="text-white text-(100px) text-w-(900) text-(49px) barlow dir-en">
											<?php echo $collections_term->name ?>
                                        </h2>
                                        <a
                                                class="text-(17px) text-white font-w-(800) d-block w-(1%) w-(max-content) text-right p-relative border-bottom-(2px) border-bottom-solid border-white ts-(0.5s) read-en"
                                                hover="border-transparent"
                                                href="<?php echo home_url() . '/collections/?tax=' . $collections_term->term_id ?>"
                                        ><?php pll_e( 'read-more' ); ?></a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
					} elseif ( $index == '1' ) {
						?>
                        <div class="col-12 parent" md="col-6">
                            <div class="p-relative">
                                <div
                                        class="w-(100%) pt-(400px) p-relative overflow-hidden en-hover-65-bg"
                                        lg="pt-(500px)"
                                >
                                    <img
                                            src="<?php echo $img_att[0]; ?>"
                                            class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit"
                                    />
                                    <div
                                            class="p-absolute right-(0) left-(0) top-(0) py-(30px) px-(50px) ts-(0.5s) dir-en en-hover-65"
                                            parent-hover="pr-(65px)"
                                    >
                                        <h2 class="text-white text-(100px) text-w-(900) text-(49px) barlow dir-en">
											<?php echo $collections_term->name ?>
                                        </h2>
                                        <a
                                                class="text-(17px) text-white font-w-(800) d-block w-(1%) w-(max-content) text-right p-relative border-bottom-(2px) border-bottom-solid border-white ts-(0.5s) read-en"
                                                hover="border-transparent"
                                                href="<?php echo home_url() . '/collections/?tax=' . $collections_term->term_id ?>"
                                        ><?php pll_e( 'read-more' ); ?></a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php

					} else {
						?>
                        <div class="col-12 mb-12" sm="col-6 mb-0" lg="col-3">
                            <div class="p-relative bg-transparent">
                                <div
                                        class="w-(100%) pt-(400px) p-relative overflow-hidden"
                                        lg="pt-(500px)"
                                >
                                    <img
                                            src="<?php echo $img_att[0]; ?>"
                                            class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit scale-in ts-(0.5s)"
                                    />
                                </div>
                            </div>
                            <div class="text-center mt-(20px)" md="mt-(45px)">
                                <h2
                                        class="text-black text-(100px) text-w-bold text-(21px) barlow"
                                        md="text-(30px)"
                                        xl="text-(49px)"
                                >
									<?php echo $collections_term->name ?>
                                </h2>
                                <a
                                        class=" mx-(auto) text-black text-(13px) d-block w-(max-content) text-right p-relative border-bottom-(2px) border-bottom-solid border-black ts-(0.5s) read-en"
                                        xl="text-(17px)"
                                        hover="border-transparent"
                                        href="<?php echo home_url() . '/collections/?tax=' . $collections_term->term_id ?>"
                                ><?php pll_e( 'read-more' ); ?></a>
                            </div>
                        </div>
						<?php
					}
					// if ($i>100){break;}
					// $i++;
				}
				?>
            </div>


        </div>

    </section>


	<?php
	get_template_part( 'templates/index/footer' );
	get_template_part( 'templates/index/copyright' );


	get_footer();

}
