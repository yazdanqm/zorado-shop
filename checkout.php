<?php /* Template Name: checkout */

get_header();
get_template_part( 'templates/single/header' );
?>
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_breadcrumb - 20
 */
do_action( 'woocommerce_before_main_content' );
?>
<section id="dashboard" class="py-(100px)">

    <div class="container-fluid px-(20px)" lg="px-(70px)" xxl="px-(140px)">
<?php
the_content();
?>
</div>
</section>
<?php
get_template_part( 'templates/index/footer' );
get_template_part( 'templates/index/copyright' );


get_footer();
