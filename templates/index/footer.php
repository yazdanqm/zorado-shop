  
<section id="footer">
	<div
		class="container-fluid px-(20px) text-center bg-black text-white text-c-white pt-20"
		xl="px-(70px) text-right"
		xxl="px-(140px)"
	>
		<div class="grid cols-12 dir-en h-(100%) footer footerr-en">
		    
		    
			<div class="col-12 px-10 " xl="col-4 h-(100%)" xxl="px-0">
				<div class="text-(20px) text-w-(800) text-white mb-(30px) footer-en dir-en text-left-en" xxl="text-(25px)">
					<?php echo get_bloginfo(); ?>
				</div>
				<p class="text-white text-(17px) text-w-(100) footer-thin dir-en text-left-en">
				    <?php pll_e('hasht-footer-desc'); ?>
				</p>
				
			</div>



					<div class="col-12  px-10" sm="col-6" xl="col-2 h-(100%)" xxl="px-0">
						<div class="text-(20px) text-w-(800) text-white mb-(30px) footer-en dir-en text-left-en" xxl="text-(25px)">
							<?php pll_e('hasht-footer-cat'); ?>
						</div>
						<ul class="text-left-en">
						    
						    <?php

            $menuLocations = get_nav_menu_locations();
            $menuID = $menuLocations['footer-cat']; 
            $items = wp_get_nav_menu_items($menuID);
            $limit =0;

            if (is_array($items) || is_object($items))
            {
            foreach( $items as $item) {
                ?>
                <li>
				<a href="<?php  echo $item->url ?>"class="text-white text-w-(100) d-block mb-(17px) text-(17px) footer-thin">
				    <?php echo $item->title ?>
				</a>
				</li>
                <?php
                $limit ++;
                if($limit>2){break;}
            } }
            ?>
						</ul>
					</div>
					<div class="col-12  px-10" sm="col-6" xl="col-2 h-(100%)" xxl="px-0">
						<div class="text-(20px) text-w-(800) text-white mb-(30px) footer-en dir-en text-left-en" xxl="text-(25px)">
							<?php pll_e('hasht-footer-link'); ?>
						</div>
						<ul class="text-left-en">
							<?php

            $menuLocations = get_nav_menu_locations();
            $menuID = $menuLocations['footer-link']; 
            $items = wp_get_nav_menu_items($menuID);
            $limit =0;

            if (is_array($items) || is_object($items))
            {
            foreach( $items as $item) {
                ?>
                <li>
				<a href="<?php  echo $item->url ?>"class="text-white text-w-(100) d-block mb-(17px) text-(17px) footer-thin">
				    <?php echo $item->title ?>
				</a>
				</li>
                <?php
                $limit ++;
                if($limit>2){break;}
            } }
            ?>
						</ul>
					</div>
	
		

			<div class="col-12 px-10 " xl="col-4 px-0 h-(100%)" xxl=" xxl="px-0">
				<div class="text-(20px) text-w-(800) text-white mb-(30px) footer-en dir-en text-left-en" xxl="text-(25px)">
					<?php pll_e('get-in-touch'); ?>
				</div>
				<div
					class="mx-auto"
				>
				    
				    <ul class="dir-en text-left-en">
    <li><span class="text-white text-w-(700) footer-en"><?php pll_e('hasht-mail'); ?> :</span><span class="px-2 footer-con text-white">ehsan@gmail.com</span></li>
    <li><span class="text-white text-w-(700) footer-en"><?php pll_e('call-num'); ?> :</span><span class="px-2 footer-num footer-thin text-white">09109103261</span></li>
</ul>


				</div>
				<div class="socials-bg2 mt-(20px)">
					<ul class="text-left-en">
						<li class="d-inline-block ml-2 ts-(0.5s)" hover="ml-4">
							<a href="#"
							><i class="text-(25px) text-white ri-instagram-line"></i
								></a>
						</li>
						<li class="d-inline-block ml-2 ts-(0.5s)" hover="ml-4">
							<a href="#"
							><i class="text-(25px) text-white ri-telegram-line"></i
								></a>
						</li>
						<li class="d-inline-block ml-2 ts-(0.5s)" hover="ml-4">
							<a href="#"
							><i class="text-(25px) text-white ri-pinterest-line"></i
								></a>
						</li>
						<li class="d-inline-block ml-2 ts-(0.5s)" hover="ml-4">
							<a href="#"
							><i class="text-(25px) text-white ri-twitter-line"></i
								></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>