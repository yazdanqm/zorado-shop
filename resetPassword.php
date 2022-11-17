<?php
/*
Template Name: resetPassword2
*/

    get_header();
    
wc_get_template( 'myaccount/form-lost-password.php', array( 'form' => 'lost_password' ) );

    get_footer();
