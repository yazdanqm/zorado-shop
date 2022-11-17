<?php
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
		<a class="text-white"><?php echo get_the_title(); ?></a>
	</div>
</section>
<section id="page" class="py-(100px)">
    <div class="container-fluid px-(20px)" lg="px-(70px)" xxl="px-(140px)">
        <h1 class="text-center text-w-(700) mb-12"><?php echo get_the_title(); ?></h1>
<?php
the_content();
?>
</div>
</section>
<?php
get_template_part( 'templates/index/footer' );
get_template_part( 'templates/index/copyright' );


get_footer();
