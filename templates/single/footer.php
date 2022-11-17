

<?php wp_footer(); ?>

<script type="text/javascript">

    //     document.querySelector("#success").addEventListener("click", function () {
    //     swal.fire({
    //         icon: "success",
    //         html: "محصول مورد نظر با موفقیت به سبد خرید اضافه شد",
    //         timer: 2000,
    //         showCloseButton: false,
    //         showConfirmButton: false,
    //     });
    // });

    
    
    $(function () {
        $("#tabs").tabs({active: 0,});}
    );

    const sliderThumbs = new Swiper('.slider__thumbs .swiper-container', {
        direction: 'vertical',
        loop:true,
        freeMode: true,
        breakpoints: {
            0: {
                direction: 'horizontal',
                slidesPerView: 2,
                spaceBetween: 10,
            },
            400:{
                direction: 'horizontal',
                slidesPerView: 3,
                spaceBetween: 10,
            },
            500:{
                direction: 'horizontal',
                slidesPerView: 4,
                spaceBetween: 10,
            },
            768: {
                direction: 'vertical',
                slidesPerView: 5,
                spaceBetween: 20,
            },
        }
    });

    const sliderImages = new Swiper('.slider__images .swiper-container', {

        direction: 'vertical',
        loop:true,
      allowTouchMove: false,
        slidesPerView: 1,
        spaceBetween: 0,
        mousewheel: false,
        effect:"fade",
        grabCursor: false,
        scrollbar: {

    draggable: true,
  },
        thumbs: {
            swiper: sliderThumbs
        },
        breakpoints: {

        }
    });

</script>

</body>
</html>
