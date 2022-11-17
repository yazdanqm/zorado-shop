<section id="newsletter" class="mt-(100px)" md="mt-(240px)">
	<div class="text-center px-(20px)">
		<div class="text-(40px) text-w-(700) text-black barlow" xl="text-(104px)">
			<?php pll_e('hasht-newsletter-title'); ?>
		</div>
		<div
			class="text-(15px) text-w-(800) text-black en-desc"
			xl="text-(25px) mt-(-20px)"
		>
			<?php pll_e('hasht-newsletter-desc'); ?>
		</div>
	</div>

	<div
		class="mx-auto w-(70%) mt-(25px)"
		xl="mt-(135px) w-(40%)"
	>
		<?php
		echo do_shortcode('[newsletter_signup_form id=3]');
		?>
	</div>
</section>