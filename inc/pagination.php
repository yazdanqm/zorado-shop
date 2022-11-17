<?php


function cat_pagination($the_query) {
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $the_query->max_num_pages,
        'type'  => 'array'
    ) );
    if ( is_array( $page_format ) ) {
        $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        echo '<div class="col-12 text-center" md="col-6 text-right"><ul class="float-xl-left float-lg-left float-md-left float-sm-right big-next-page">';
        echo "<li>" . get_next_posts_link( 'صفحه بعد', $the_query->max_num_pages ) . "</li>";
        echo "<li>" . get_previous_posts_link( 'صفحه قبل', $the_query->max_num_pages ) . "</li>";
        echo '</ul></div>';
        echo '<div class="col-12 d-flex j-content-center" md="col-6 d-block"><ul class="float-left sm-nxpr-page">';
        echo '<span>' . ' صفحه ' . $paged . ' از ' . $the_query->max_num_pages . '</span>';
        echo '</ul></div>';
    }
}

