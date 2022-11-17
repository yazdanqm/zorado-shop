<?php
get_header();


get_template_part( 'templates/index/header' );
get_template_part( 'templates/single/breadcrumbs' );

echo the_title();

get_template_part( 'templates/index/new-arrivals' );
get_template_part( 'templates/index/footer' );
get_template_part( 'templates/index/copyright' );


get_footer();
