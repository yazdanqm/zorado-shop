<?php /* Template Name: login */
if (isset($_POST['login_form'])){
    
    

    

    
       
    

        $username=$_POST['username'];
        $password=$_POST['password'];
        $error = '';

    
        global $user;
        $creds = array();
        $creds['user_login'] = $username;
        $creds['user_password'] =  $password;
        $creds['remember'] = true;
        $user = wp_signon( $creds, true );
        
        if ( is_wp_error($user) ) {
        
        $error = '<p class="login-err"> '.$user->get_error_message() . '<br /></p>';
        
        }
        
        if ( !is_wp_error($user) ) {
        wp_redirect(home_url() . '/dashboard');
        }

     




}
get_header();





?>


  <section id="sign">
        <div class="grid cols-12 dir-en">
         
            <div class="col-12 p-relative order-2 py-(80px) h-auto" lg="col-5 order-1 px-0 h-(100vh)">
             <div class="d-flex a-items-center w-full h-full px-(66px)" children-form="w-full">


               <form  method="post" name="login_form">
                   
                
                   
                 <div class="mb-(34px) dir-en"><a href="<?php echo get_home_url() ?>"><img class="w-(110px)" src="<?php echo get_template_directory_uri() . '/assets/img/logo-h.svg'; ?>" alt=""></a></div>
                    
                <?php
                if ( is_user_logged_in() ) {
                    
                    echo "<script>window.location.href = '".home_url()."/dashboard'";
                    echo "</script>";
                }else{
                    ?>
                    <h1 class="text-black text-(40px) text-w-(700) text-en-left dir-en barlow"><?php pll_e('log-in'); ?></h1>
                    <p class="text-black text-(15px) mb-(67px) text-w-(300) text-left-en footer-thin"><?php pll_e('log-in-to-your-acc'); ?></p>
                    
                    <?php
                    if(!empty($error)){
                    echo $error;
                    }
                    
                    ?>
                    
                    
                    
                    
           
                      
                          <input
                            type="text"
                            class="w-full text-black mb-(33px) text-(18px) border-bottom-(2px) border-bottom-solid border-black pb-(11px) dir-en barlow-thin"
                            name="username" 
                            id="username" 
                            value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>"
                            focus="outline-none"
                            placeholder="<?php pll_e('uname'); ?>"
                          />
                          
                          <input
                          type="password"
                          class="w-full text-black mb-(33px) text-(18px) border-bottom-(2px) border-bottom-solid border-black pb-(11px) dir-en barlow-thin"
                          name="password" 
                          id="password"
                          focus="outline-none"
                          placeholder="<?php pll_e('pass'); ?>"
                        />
                        
                        
                       

      	<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                        <button
                        
                        type="submit" 
                        name="login_form" 
                        class="w-full h-(52px) mt-(40px) bg-black text-w-(800) text-white d-flex cursor-pointer j-content-center a-items-center text-(20px) suprima-mid"
                        i-sm="text-(16px)"
                      >
               <?php pll_e('log-in'); ?>
                      </button>
                      <a
                      href="<?php echo get_home_url() . '/register'; ?>"
                      class="w-full h-(52px) mt-(11px) bg-white border-black border-solid border-(2px) text-w-(800) text-black d-flex cursor-pointer j-content-center a-items-center text-(20px) ts-(0.5s) suprima-mid"
                      hover="bg-black text-white"
                      i-sm="text-(16px)"
                    >
     <?php pll_e('not-mem'); ?>
                    </a>
                    
                                          <a
                      href="<?php echo get_home_url() . '/dashboard/lost-password/'; ?>"
                      class="w-full h-(52px) mt-(11px) bg-white border-black border-solid border-(2px) text-w-(800) text-black d-flex cursor-pointer j-content-center a-items-center text-(20px) ts-(0.5s) suprima-mid dir-en"
                      hover="bg-black text-white"
                      i-sm="text-(16px)"
                    >
     <?php pll_e('forget'); ?>
                    </a>
           
                    
                    
                    <div class="text-black text-(13px) text-center w-full     p-absolute
                    bottom-(3%)
                    right-0 barlow-thin">
                        <?php pll_e('copyright-t'); ?>
                    </div>
                    <?php
                }
                ?>
                    
                    
                </form>
             </div>
            </div>


            <div class="p-relative order-1 overflow-hidden h-(600px) d-none" lg="d-grid col-7 order-2 h-(100vh)">


                <img class="w-full h-full p-absolute obj-fit left-0 top-0 bottom-0 right-0" src="<?php echo get_template_directory_uri() . '/assets/img/sign-img.png'; ?>" alt="">


                <div class="
                p-absolute  
                top-(50%)
                bgbg
                right-0 left-0
                mx-auto
                text-white
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
get_footer();

?>


  


