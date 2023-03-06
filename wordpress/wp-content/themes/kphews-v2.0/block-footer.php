		<footer>
		<div class="upper">
			<div class="container">

				<div class="flex">
					<div class="col1">
						<h3>Connect</h3>
						<p class="phone">Toll-Free: (866) 301-3866 <br />
						Phone: (503) 286-6816</p>
						<a class="globe" target="_blank" href="https://www.kp.org/languages">Other Languages</a>
						<ul class="social">
							<li><a class="facebook" target="_blank" href="https://www.facebook.com/kpthrive">Facebook</a></li>
							<li><a class="pinterest" target="_blank" href="https://www.pinterest.com/kpthrive/">Pinterest</a></li>
							<li><a class="twitter" target="_blank" href="https://twitter.com/HealthyLivingNW">Twitter</a></li>
							<li><a class="youtube" target="_blank" href="https://www.youtube.com/user/kaiserpermanenteorg">YouTube</a></li>
						</ul>
					</div>
					<div class="col2">
						<h3>Learn More</h3>
						<a href="<?php bloginfo('url') ?>/about/">About</a>
						<a href="<?php bloginfo('url') ?>/health-coaching/">Health Coaching</a>
						<a href="<?php bloginfo('url') ?>/classes/">Classes</a>
						<a href="<?php bloginfo('url') ?>/salud-y-bienestar-en-espanol/">Salud y Bienestar</a>
					</div>
					<div class="col3">
						<h3>Visit Our Other Sites</h3>
						<a target="_blank" href="https://healthy.kaiserpermanente.org/html/kaiser/index.shtml">kp.org</a>
						<a target="_blank" href="https://healthy.kaiserpermanente.org/health/care/consumer/shop-health-plans/individual-and-families">Individual & Family Plans</a>
					</div>
					<div class="col4">
						<h3>Legal</h3>
						<a target="_blank" href="https://thrive.kaiserpermanente.org/privacy-statement">Privacy Policy</a>
						<a target="_blank" href="https://healthy.kaiserpermanente.org/health/care/consumer/ancillary/!ut/p/a1/hZDLboMwEEW_hmWxW9KIIFUVidQGSAhRH1BvkCEGLIiNzASVv6-BRTdtMjtr7j1nZERQgoigPS8pcCloM77JMn3x3w7r9b2LD4uVjb39ZrvxwgDrQTEiSCfwP-PicT8GLO84IV6jJcaeHbwHn6vAwvgB-YiUjcwm21cF0DoGNnAuBTABiokTU0wZGkRhaBlKqMh501A13MoDP6EkjiLH2SU-SY6L8ONWJZ8VXBRSnX8_4bpG0LPudBxYOq2_Yay4IrPsEhHFijFpXpQmjZxuAkGleM_MmvKOqZZpm9BcZkpVGvi5btOukgryC6QTQBOe6nbeztW_HJXstPsKGoVbqY9t67rYw2M2WE2_Y_HdDw843W0!/dl5/d5/L2dBISEvZ0FBIS9nQSEh/">Accessibility</a>
						<a target="_blank" href="https://healthy.kaiserpermanente.org/health/care/consumer/center/!ut/p/a1/dc5RT4MwEAfwz-IDj3LnCLiZGMNMnLBsaDQ6-0IKKdDA2qbctvjtbeHVNWnS5u5-9wcGB2CKn2XLSWrFB_9nSfmSfxTr9V2KRVzEmO3izSpP9gt8vodvYOA68MpJ0dd9Q5S9T8TmLUHMltvP7ddqGyEuIAfWDrqatv10ROYhwAAvxtRakVBUuyts4KT5pfhRwIFE3SlZ8-FWqkbb45TYC6mqomULzIpGWGHDk3WwZ8fJpc7Kswh7LkdhjXCDyquhtm2AT70px05bqk9UToATHnszV-fR_3Z0eiQX6ToN-1ftUpu-b3YUV7_R5eYPAskEEg!!/dl5/d5/L2dBISEvZ0FBIS9nQSEh/">Technical Information</a>
					</div>
				</div>
				<div class="full">
					<p>This site includes Kaiser Permanente Northwest, other Kaiser Permanente regions, community, and national resources. Some offerings and online tools on other sites may not be available for your use.</p>
					<p>This information is not intended to replace the advice of a doctor. Since specific guidelines may vary, consult with your physician to find out which guidelines are recommended for you. Kaiser Permanente disclaims any liability for the decisions you make based on this information.</p>
				</div>

			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<p>&copy; <?php echo date('Y'); ?>, Kaiser Permanente Health Engagement and Wellness Services</p>
			</div>
		</div>
		</footer>

	</div>

	<!-- jQuery -->
	<?php wp_enqueue_script('browser',get_bloginfo('template_directory').'/js/jquery.preload.min.js',array('jquery')); ?>
	<?php wp_enqueue_script('custom-js',get_bloginfo('template_directory').'/js/functions.js',array('jquery','browser'),date('Y-m-d-h-i-s')); ?>

	<?php wp_footer(); ?>