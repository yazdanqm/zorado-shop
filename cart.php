<?php /* Template Name: cart */

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
      <?php pll_e("home-p") ?>
    </a>
		<span class="mx-(10px) text-white">/</span>
		<a class="text-white sup-thin">
      <?php pll_e("cart") ?>
    </a>
	</div>
</section>
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
