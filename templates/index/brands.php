<section class="mt-(100px)" md="mt-(240px)">
  <div class="container-fluid px-(20px)" lg="px-(70px)" xxl="px-(140px)">
    
    <div class="col-12 text-center mb-(60px)">
                <div class="text-(15px) text-w-(800) text-black en-desc en-mb" xl="text-(25px)">
                     از برند مورد علاقت خرید کن               </div>
                <div class="text-(40px) text-w-(700) text-black barlow" xl="text-(104px)">
                برندها                </div>
            </div>
    
    <?php 
    $args           = array(
	'taxonomy'     => 'brands',
	'orderby'      => 'name',
	'show_count'   => 0,
	'pad_counts'   => 0,
	'hierarchical' => 1,
	'title_li'     => '',
	'hide_empty'   => 0
);
$all_categories = get_categories( $args );
?>
      <div class="swiper mySwiper15 mt-20">
      <div class="swiper-wrapper">
    <?php

		foreach ( $all_categories as $index => $cat ) {

				$category_id = $cat->term_id;
				$image_id    = get_term_meta( $category_id, 'brands-image-id', true );
				$img_att     = wp_get_attachment_image_src( $image_id, 'full' );

    ?>
    
  
        <div class="swiper-slide cursor-pointer">
        <div class="w-(100%) pt-(100px) p-relative overflow-hidden" lg="pt-(100px)" xl="pt-(100px)">
        <img src="<?php echo $img_att[0] ?>" alt="<?php echo $cat->name ?>" class="w-(100%) h-(100%) p-absolute top-(0) right-(0) obj-fit scale-in ts-(0.5s)">
        </div>
          <div class="d-flex j-content-center mt-4 text-c-#c0c0c0"><?php echo $cat->name ?></div>
        </div>

        
        <?php
        }
        ?>
        </div>
    </div>

</div>
</section>

