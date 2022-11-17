<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */
get_header();

defined( 'ABSPATH' ) || exit;




?>

    <section id="sign">

        <div class="grid cols-12">

            <div class="col-12 p-relative order-2 py-(80px) h-auto" lg="col-5 order-1 px-0 h-(100vh)">
                <div class="d-flex a-items-center w-full h-full px-(66px)" children-form="w-full">
                    <form method="post" class="woocommerce-ResetPassword container mb-64 lost_reset_password">
                        <div class="mb-(34px) dir-en"><a href="<?php echo get_home_url() ?>"><img class="w-(110px)" src="<?php echo get_template_directory_uri() . '/assets/img/logo-h.svg'; ?>" alt=""></a></div>
                        <h1 class="text-black text-(40px) text-w-(700)"><?php pll_e('forget-pass'); ?></h1>
                        <p class="text-black text-(15px) mb-(67px) text-w-(300)"><?php pll_e('forget-t'); ?></p>
                        <?php
                        do_action( 'woocommerce_before_lost_password_form' );
                        ?>
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <input class="woocommerce-Input woocommerce-Input--text input-text w-full text-black mb-(33px) text-(18px) border-bottom-(2px) border-bottom-solid border-black pb-(11px)"
                                   focus="outline-none" type="text" name="user_login" id="user_login"
                                   placeholder="<?php pll_e('hasht-mail'); ?>"
                                   autocomplete="username"/>
                        </p>

                        <div class="clear"></div>

						<?php do_action( 'woocommerce_lostpassword_form' ); ?>

                        <p class="woocommerce-form-row form-row">
                            <input type="hidden" name="wc_reset_password" value="true"/>
                            <button type="submit"
                                    class="woocommerce-Button w-full h-(52px) mt-(40px) bg-black text-w-(800) text-white d-flex cursor-pointer j-content-center a-items-center text-(20px)"
                                    i-sm="text-(16px)"
                                    value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
                        </p>

						<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>


                        <div class="text-black text-(13px) text-center w-full     p-absolute
                    bottom-(3%)
                    right-0 barlow-thin">
		                    <?php pll_e('copyright-t'); ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 p-relative order-1 overflow-hidden h-(600px)" lg="col-7 order-2 h-(100vh)">


                <img class="w-full h-full p-absolute obj-fit left-0 top-0 bottom-0 right-0" src="<?php echo get_template_directory_uri() . '/assets/img/sign-img.png'; ?>" alt="">


                <div class="
                p-absolute
                top-(50%)
                bgbg
                text-white
                right-0 left-0
                mx-auto
                text-(15px)
                text-w-(700)
                bg-white
                bg-alpha-(0.1)
                d-inline-flex a-items-center j-content-center
                backdrop-blur-4
                ts-(0.5s)
                text-center
                w-(50%)
                py-(35px)
                "
                     xl="text-(25px)"
                     xxl="text-(40px)"

                     hover="left-0 right-0 w-full"
                >
                    HYPERSTYLE CLOTHING
                </div>
            </div>
        </div>
    </section>
<?php
do_action( 'woocommerce_after_lost_password_form' );

get_footer();