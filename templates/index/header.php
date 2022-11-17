<div class="!bg-(#000000ba) p-fixed inset-0 d-flex a-items-center j-content-center z-999999999 loader mylod">
    <img id="lodlod" class="w-40 opacity-0 ts-500" src="<?php echo get_template_directory_uri(), '/assets/img/henro.svg'; ?>" />
</div>

<a href="#" class="p-fixed z-9999999 right-4 bottom-4 bg-white w-(50px) h-(50px) d-flex a-items-center j-content-center rounded-full box-shadow scale-in ts-300 bxshdw" md="w-(70px) h-(70px) right-8 bottom-8">
  <img  class="w-(50%)"  src="<?php echo get_template_directory_uri() . '/assets/img/whatsapp.svg'; ?>"/>
</a>

<section id="header">
   
    <!-- Swiper -->
    <div dir="rtl" class="swiper mySwiper h-(700px)" md="h-(1087px)">
        <div class="swiper-wrapper" m-ignore-observe="children">

            <?php
            for ($i = 1; $i <= 3; $i++) {
                if (!empty(get_option('hasht-slide' . $i)) && !empty(get_option('hasht-onvan' . $i))) {
            ?>
                    <div class="swiper-slide" m-ignore-observe="children">
                        <div class="px-(25px) dir-en" md="px-(70px)">
                            <h1 class="text-(50px) text-lh-(50px) w-(100%) text-right text-w-bold text-white text-en barlow mb-(40px)" md="text-(104px) text-lh-(104px) w-(40%)">
                                <?php pll_e('hasht-slide' . $i); ?>
                            </h1>
                            <a class="text-white text-(17px) font-w-(800) text-right w-(100%) d-block p-relative border-bottom-(2px) border-bottom-solid border-white ts-(0.5s) text-en read-en" href="<?php echo get_option('hasht-link' . $i) ?>"><?php pll_e('read-more'); ?></a>
                        </div>
                        <img src="<?php echo get_option('hasht-slide' . $i); ?>" alt="" />
                    </div>
            <?php
                }
            }
            ?>


        </div>
        <div class="p-absolute bottom-(25px) left-(20px) z-100000" md="bottom-(70px) left-(70px)">
            <i class="ri-arrow-left-s-fill text-(20px) border-solid border-(2px) mx-1 cursor-pointer w-full h-full pa-2 text-white rounded-full border-white"></i>
            <i class="ri-arrow-right-s-fill text-(20px) border-solid border-(2px) mx-1 cursor-pointer w-full h-full pa-2 text-white rounded-full border-white"></i>
        </div>
        <div class="swiper-pagination text-(20px) text-(#666) bottom-(25px) right-(20px) w-100" md="bottom-(70px) right-(70px)"></div>
    </div>
</section>