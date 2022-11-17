<?php

$args           = array(
	'taxonomy'     => 'product_cat',
	'orderby'      => 'name',
	'show_count'   => 0,
	'pad_counts'   => 0,
	'hierarchical' => 1,
	'title_li'     => '',
	'hide_empty'   => 0
);
$all_categories = get_categories( $args );

?>
<section id="category" class="px-(20px)" md="px-(0)">
    <div class="grid cols-12 gap-(20px)" md="gap-0">
		<?php
		$i = 0;
		foreach ( $all_categories as $index => $cat ) {
			if ( $index == '0' ) {
				$category_id = $cat->term_id;
				$image_id    = get_term_meta( $category_id, 'category-image-id', true );
				$img_att     = wp_get_attachment_image_src( $image_id, 'full' );

				?>
                <div class="col-6 order-2 img-scaling" md="order-1 col-3">
                    <div
                            class="w-full parent w-(100%) pt-(250px) p-relative overflow-hidden"
                            sm="pt-(350px)"
                            lg="pt-(717px)"
                    >
                        <div
                                class="bg-black p-absolute bottom-(0) left-(0) right-(0) py-(10px) text-(25px) text-w-bold zindex"
                                md="opacity-0 visibility-hidden z-(-1) ts-(0.5s) bg-black w-(90%) h-(95%) bottom-0 right-0 top-0 left-0 mx-auto my-auto bg-alpha-(0.7) p-absolute d-flex j-content-center a-items-center text-(50px) text-w-(900)"
                                parent-hover="opacity-100 visibility-visible z-(1)"
                        >
                            <a
                                    href="<?php echo get_term_link( $cat->slug, 'product_cat' ) ?>"
                                    class="w-full h-full d-flex j-content-center text-white a-items-center barlow"
                            >
								<?php
								echo $cat->name;
								?>
                            </a>
                        </div>

                        <img
                                src="<?php echo $img_att[0]; ?>"
                                alt=""
                                class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit ts-(25s) img-col"
                        />
                    </div>
                </div>
                <div class="col-12 order-1" md="col-6 order-2">
                    <div
                            class="d-flex j-content-center a-items-center flex-col h-full px-(25px) py-(85px)"
                            md=" py-(0)"
                    >
                        <h1
                                class="text-(40px) text-w-(900) text-black text-center barlow"
                                lg="text-(104px) "
                        >
                           <?php pll_e('hasht-cat-title'); ?>
                        </h1>
                        <p
                                class="text-(15px) text-w-(800) text-black text-center en-desc"
                                lg="text-(25px)"
                        >
                            <?php pll_e('hasht-cat-desc'); ?>
                        </p>
                    </div>
                </div>
				<?php
			}
			if ( $index != '0' ) {
				$category_id = $cat->term_id;
				$image_id    = get_term_meta( $category_id, 'category-image-id', true );
				$img_att     = wp_get_attachment_image_src( $image_id, 'full' );

				?>

                <div class="col-6 order-3 img-scaling" md="order-3 col-3">
                    <div
                            class="w-full parent w-(100%) pt-(250px) p-relative overflow-hidden"
                            sm="pt-(350px)"
                            lg="pt-(717px)"
                    >
                        <div
                                class="bg-black p-absolute bottom-(0) left-(0) right-(0) py-(10px) text-(25px) text-w-bold zindex"
                                md="opacity-0 visibility-hidden z-(-1) ts-(0.5s) bg-black w-(90%) h-(95%) bottom-0 right-0 top-0 left-0 mx-auto my-auto bg-alpha-(0.7) p-absolute d-flex j-content-center a-items-center text-(50px) text-w-(900)"
                                parent-hover="opacity-100 visibility-visible z-(1)"
                        >
                            <a
                                    href="<?php echo get_term_link( $cat->slug, 'product_cat' ) ?>"
                                    class="w-full h-full d-flex j-content-center text-white a-items-center barlow"
                            >
								<?php
								echo $cat->name;
								?>
                            </a>
                        </div>

                        <img
                                src="<?php echo $img_att[0]; ?>"
                                alt=""
                                class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit scale-in ts-(25s) img-col"
                        />
                    </div>
                </div>

				<?php
				if ( $i > 3 ) {
					break;
				}
				$i ++;
//	if($cat->category_parent == 0) {
//		$category_id = $cat->term_id;
//		echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
//	}
			}
		}
		?>
    </div>
</section>




