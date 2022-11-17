
<section id="instagram" class="mt-(100px)" md="mt-(240px)">
	<div class="container-fluid pa-0">
		<div class="grid cols-12 gap-0">


			<div m-ignore-observe="children" class="col-12" lg="col-4">

                    <?php
                    echo do_shortcode('[instagram-feed feed=3]');
                    ?>

			</div>

			<div
				class="col-12 text-center px-(20px) d-flex a-items-center j-content-center parent py-(50px)"
				lg="px-(100px) col-4 py-(0)"
			>
				<div>
					<i
						class="ri-instagram-line d-block text-black text-(80px) mx-auto mb-(30px) ts-(0.5s)"
						parent-hover="text-(#c0c0c0)"
					></i>
					<div
						class="text-(30px) text-w-(700) text-black ts-(0.5s) barlow"
						xl="text-(50px)"
						parent-hover="mt-(50px)"
					>
					<?php pll_e('hasht-instashop'); ?>
					</div>
					<p
						class="text-w-(100) text-black text-(14px) mt-(-5px) mb-(50px) sup-thin insta-desc"
						xl="text-(17px)"
					>
					    <?php pll_e('hasht-instashop-desc'); ?>
					</p>
					<a
						class="text-(13px) text-w-(500) font-w-(800) d-block mx-auto w-(1%) w-(max-content) text-right p-relative border-bottom-(2px) border-bottom-solid border-black ts-(0.5s) text-black read-en"
						xl="text-(17px)"
						hover="border-transparent"
						href=""
					>
						<?php pll_e('hasht-goto-insta'); ?>
					</a>
				</div>
			</div>

			<div m-ignore-observe="children" class="col-12" lg="col-4">
					<?php
					echo do_shortcode('[instagram-feed feed=4]');
					?>
			</div>
		</div>
	</div>
</section>