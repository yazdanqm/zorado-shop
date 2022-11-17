<?php
/* Template Name: Wishlist */
if (!get_current_user_id()){
    wp_redirect(home_url() . '/login' ); exit;
}
$lang = pll_current_language( 'slug' );
get_header();
get_template_part( 'templates/single/header' );
?>

    <section id="breadcrumbs">
        <div
                class="h-(146px) bg-black text-white text-(25px) text-w-(300) d-flex a-items-center dir-en"
                xxl="px-(142px)"
                i-xxl="px-(70px)"
                i-sm="text-(16px)"
                xs="!px-(40px)"
                ms="!text-(14px)"
        >
            <a class="text-white text-w-(600) suprima-mid" href="<?php echo get_home_url(); ?>">
				<?php pll_e("home-p"); ?>
            </a>
            <span class="mx-(10px) text-white">/</span>
            <a class="text-white sup-thin">
				<?php pll_e("wishlist"); ?>
            </a>
        </div>
    </section>

<?php
$userID = get_current_user_id();
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => -1,
	'meta_query'     => array(
		array(
			'key'     => 'postwishlist',
			'value'   => $userID,
			'compare' => '==',
		)
	)
);
?>

    <section
            id="wishlist"
            class="mt-(240px) mb-64"
            xxl="px-(142px)"
            i-xxl="px-(70px)"
            xs="!px-(40px)"
    >
<?php

$posts = get_posts( $args );
if ( $posts ) {
	foreach ( $posts as $post ) {
		?>


            <div class="d-flex grid cols-12 j-content-between py-(38px)">


                <div class=" col-12  mb-12 text-center"
                     lg="col-6 j-content-start mb-0 d-flex gap-(67px) a-items-center">
                    <div class="w-(179px) h-(179px) p-relative overflow-hidden mx-auto mb-8" lg="mx-0 mb-0">
                        <img
                                class="w-full h-full p-absolute left-0 right-0 bottom-0 top-0 obj-fit"
                                src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>"
                                alt=""
                        />

                    </div>
                    <div children="text-black">
                        <a href="<?php echo get_the_permalink() ?>"><b
                                    class="d-block text-(22px)"><?php echo the_title() ?></b></a>
						<?php

						if ( $lang == 'en' ) {
							$regularusd = get_post_meta( $post->ID, '_regular_price_wmcp', true );
							$saleusd    = get_post_meta( $post->ID, '_sale_price_wmcp', true );
							$pieces     = explode( '"', $saleusd );
							$pieces2    = explode( '"', $regularusd );
							if ( $saleusd != '' ) {


								?>
                                <span class="text-(18px)">
									<?php echo  $pieces[3] ?>
								</span>
								<?php
							} else {
								?>
                                <span class="text-(18px)">
									<?php echo $pieces2[3] ?>
								</span>
								<?php
							}

						} elseif ( $lang == 'fa' ) {
							$product = wc_get_product( $post->ID );
							if ( $product->get_sale_price() ) {
								?>
                                <span class="text-(18px)">
									<?php echo $product->get_sale_price() ?>
								</span>
								<?php
							} else {
								?>
                                <span class="text-(18px)">
									<?php echo $product->get_regular_price()  ?>
								</span>
								<?php
							}
						}


						?>

                    </div>
                </div>


                <div class="d-flex gap-(10px) a-items-center j-content-center col-12" lg="col-6 j-content-end">
                    <button class="deletewishlist w-(52px) h-(52px) d-inline-block border-solid border-(2px) cursor-pointer border-black text-black text-(30px) bg-transparent ts-(0.5s) parent"
                            hover="bg-black">
                        <input type="hidden" name="post_id" value="<?php echo $post->ID;?>">
                        <i class="ri-close-fill text-black ts-(0.5s)" parent-hover="text-white"></i>
                    </button>
                    <?php
                    if ($lang == 'fa'){
                        ?>

                        <a href="<?php echo get_home_url() . '/?add-to-cart=' . $post->ID  ?>">
                            <button
                                    class="w-full px-8 h-(50px) bg-black text-w-(800) text-white d-flex cursor-pointer j-content-center a-items-center text-(20px)"
                                    lg="w-auto"
                                    i-sm="text-(16px)"
                            >
			                    <?php
			                    pll_e( "add-to-cart" );
			                    ?>
                            </button>
                        </a>
                            <?php
                    }elseif ($lang == 'en'){
	                    ?>

                        <a href="<?php echo get_home_url() . '/?add-to-cart=' . $post->ID  ?>">
                            <button
                                    class="w-full px-8 h-(50px) bg-black text-w-(800) text-white d-flex cursor-pointer j-content-center a-items-center text-(20px)"
                                    lg="w-auto"
                                    i-sm="text-(16px)"
                            >
			                    <?php
			                    pll_e( "add-to-cart" );
			                    ?>
                            </button>
                        </a>
	                    <?php
                    }
                    ?>



                </div>


            </div>




		<?php
	};
}
else{
    ?>
    <div class="w-full h-8 text-(20px) text-center bg-white text-black col-12">
        <?php
        pll_e( "no-content" );
        ?>
    </div>
        <?php
}
?>
    </section>

<?php
get_template_part( 'templates/index/footer' );
get_template_part( 'templates/index/copyright' );
get_footer();