<?php /* Template Name: register */
get_header();




if (isset($_POST['user_registeration']))
{
    //registration_validation($_POST['username'], $_POST['useremail']);
    global $reg_errors;
    $reg_errors = new WP_Error;
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $password=$_POST['password'];

    if(pll_current_language() == 'en'){
        $ramz_bala_5 = 'password must be more than 5 characters';
        $empty_fields = 'username or password must be filled';
        $user_name_4 = 'username must be more than 4 characters';
        $user_already = 'username already exists';
        $invalid_user = 'username is invalid';
        $invalid_mail = 'email address is invalid';
        $already_mail = 'email already exists';
        $error_title = 'Error';
    } else if(pll_current_language() == 'fa'){
        $ramz_bala_5 = 'رمزعبور باید بالای پنج حرف باشد';
        $empty_fields = 'قسمت های ضروری فرم خالی مانده است';
        $user_name_4 = 'نام کاربری باید حداقل چهار حرف باشد';
        $user_already = 'نام کاربری انتخابی شما از قبل موجود است';
        $invalid_user = 'نام کاربری وارد شده اشتباه است';
        $invalid_mail = 'ایمیل وارد شده اشتباه است';
        $already_mail = 'ایمیل از قبل موجود است';
        $error_title = 'خطا';
    }
    
    
    
    if(empty( $username ) || empty( $useremail ) || empty($password))
    {
        $reg_errors->add('field', $empty_fields);
    }    
    if ( 4 > strlen( $username ) )
    {
        $reg_errors->add('username_length', $user_name_4 );
    }
    if ( username_exists( $username ) )
    {
        $reg_errors->add('user_name', $user_already);
    }
    if ( ! validate_username( $username ) )
    {
        $reg_errors->add( 'username_invalid', $invalid_user );
    }
    if ( !is_email( $useremail ) )
    {
        $reg_errors->add( 'email_invalid', $invalid_mail );
    }
    
    if ( email_exists( $useremail ) )
    {
        $reg_errors->add( 'email', $already_mail );
    }
    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', $ramz_bala_5 );
    }
    
    if (is_wp_error( $reg_errors ))
    { 
        foreach ( $reg_errors->get_error_messages() as $error )
        {
             $signUpError='<p style="color:#FF0000; margin-bottom:40px;"><strong style="color:#FF0000;">'.$error_title.' :</strong> '.$error . '<br /></p>';
        } 
    }
    
    
    if ( 1 > count( $reg_errors->get_error_messages() ) )
    {
        // sanitize user form input
        global $username, $useremail;
        $username   =   sanitize_user( $_POST['username'] );
        $useremail  =   sanitize_email( $_POST['useremail'] );
        $password   =   esc_attr( $_POST['password'] );
        
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $useremail,
            'user_pass'     =>   $password,
            );
        $user = wp_insert_user( $userdata );
        
        $success = '<p style="color:green; margin-bottom:40px;">ثبت نام انجام شد، از صفحه ورود وارد شوید</p>';
        

        

         
         
         
    echo "<script>setTimeout(() => {  window.location.href = '".home_url()."/login' }, 3500)";
    echo "</script>";
    
         
        
    }
    
 

}
?>

 
     <section id="sign">
        <div class="grid cols-12 dir-en">
         
            <div class="col-12 p-relative order-2 py-(80px) h-auto" lg="col-5 order-1 px-0 h-(100vh)">
             <div class="d-flex a-items-center w-full h-full px-(66px)" children-form="w-full">
                 
                <form action=""  method="post" name="user_registeration">
                    <div class="mb-(34px) dir-en"><a href="<?php echo get_home_url() ?>"><img class="w-(110px)" src="<?php echo get_template_directory_uri() . '/assets/img/logo-h.svg'; ?>" alt=""></a></div>
                    <h1 class="text-black text-(40px) text-w-(700) barlow dir-en"><?php pll_e('register'); ?></h1>
                    <p class="text-black text-(15px) mb-(67px) text-w-(300) footer-thin dir-en"><?php pll_e('join-hyper'); ?></p>
                    
                    <?php
                    if(isset($signUpError)){
                    echo '<div>'.$signUpError.'</div>';
                    } else{
                        echo $success;
                        
                    }
                    
                    ?>
           
                          <input
                            type="text"
                            class="w-full text-black mb-(33px) text-(18px) border-bottom-(2px) border-bottom-solid border-black pb-(11px) dir-en barlow-thin"
                            focus="outline-none"
                            name="username"
                            placeholder="<?php pll_e('uname'); ?>"
                          />
                          <input
                            type="text"
                            class="w-full text-black mb-(33px) text-(18px) border-bottom-(2px) border-bottom-solid border-black pb-(11px) dir-en barlow-thin"
                            focus="outline-none"
                            name="useremail"
                            placeholder="<?php pll_e('hasht-mail'); ?>"
                          />
                          <input
                          type="password"
                          class="w-full text-black mb-(33px) text-(18px) border-bottom-(2px) border-bottom-solid border-black pb-(11px) dir-en barlow-thin"
                          focus="outline-none"
                          name="password"
                          placeholder="<?php pll_e('pass'); ?>"
                        />
                        <input
                        name="user_registeration"
                        type="submit"
                        value="<?php pll_e('register'); ?>"
                        class="w-full h-(52px) mt-(40px) bg-black text-w-(800) text-white d-flex cursor-pointer j-content-center a-items-center text-(20px) suprima-mid"
                        i-sm="text-(16px)"
                      />
                
                     
                      
                      <a
                      href="<?php echo get_home_url() . '/login'; ?>"
                      class="w-full h-(52px) mt-(11px) bg-white border-black border-solid border-(2px) text-w-(800) text-black d-flex cursor-pointer j-content-center a-items-center text-(20px) ts-(0.5s) suprima-mid"
                      hover="bg-black text-white"
                      i-sm="text-(16px)"
                    
                    >
     <?php pll_e('jon-already'); ?>
                    </a>
                    <div class="text-black text-(13px) text-center w-full     p-absolute
                    bottom-(3%)
                    right-0 barlow-thin">
                       <?php pll_e('copyright-t'); ?>
                    </div>
                </form>
                
                
                
                
                
                
             </div>
            </div>


            <div class="p-relative order-1 overflow-hidden h-(600px) d-none" lg="d-grid col-7 order-2 h-(100vh)">


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
get_footer();

?>