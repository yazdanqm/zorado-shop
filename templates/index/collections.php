<?php
$collections_terms = get_terms( array(
	'taxonomy'   => 'collections',
	'hide_empty' => false,
	'orderby'    => 'date',
	'order'      => 'ASC',
) );
?>

<section id="collections" class="mt-(150px)">
    <div class="container-fluid px-(20px)" md="px-20">
        <div class="grid cols-12 dir-en">
            <div class="col-6 d-flex a-items-center dir-en">
                <div>
                    <div class="text-(15px) text-w-(800) text-black en-desc dir-en en-mb" lg="text-(25px)">
                           <?php pll_e('hasht-col-desc'); ?>
                    </div>
                    <div
                            class="text-(40px) text-w-(700) text-black barlow dir-en"
                            xl="text-(104px)"
                    >
                          <?php pll_e('hasht-col-title'); ?>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex a-items-center j-content-end dir-en">
                <a
                        href="<?php echo get_home_url() . '/collections' ?>"
                        class="p-relative d-flex a-items-center parent ml-(-15px) en180"
                        lg="ml-(-30px)"
                ><i
                            class="ri-arrow-left-s-line text-black text-(40px)"
                            lg="text-(100px)"
                    ></i>
                    <div
                            class="h-(4px) left-(18px) w-(30px) bg-black d-inline-block p-absolute ts-(0.5s)"
                            lg="h-(8px) left-(40px) w-(50px)"
                            parent-hover="w-(100px)"
                    ></div
                    >
                </a>
            </div>
        </div>
    </div>
    <div
            class="container-fluid mt-(70px) px-(20px)"
            lg="px-(70px)"
            xxl="px-(140px)">
        <div class="grid cols-12 gap-(20px)" xxl="gap-(40px)">

			<?php
            $i=0;
			foreach ( $collections_terms as $index => $collections_term ) {
				$collections_id = $collections_term->term_id;
				$image_id    = get_term_meta( $collections_id, 'collection-image-id', true );
				$img_att     = wp_get_attachment_image_src( $image_id, 'full' );
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
                                    ><?php pll_e('read-more'); ?></a
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
                                    ><?php pll_e('read-more'); ?></a
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
                            ><?php pll_e('read-more'); ?></a>
                        </div>
                    </div>
					<?php
				}
				if ($i>4){break;}
				$i++;
			}
			?>
        </div>
    </div>
</section>