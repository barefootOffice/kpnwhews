<?php /* Template Name: Home Page */ ?>
<?php get_template_part('block','header'); ?>
<?php the_post(); ?>

	<main>

		<?php /*
		<section id="banner">
			<div class="container">
				<h3>Coronavirus/COVID-19</h3>
				<p>Check out these helpful resources:</p>
				<ul>
					<li><a href="https://www.youtube.com/watch?v=BmvNCdpHUYM" target="_blank">Steps for working through stress and worry about the virus</a></li>
					<li><a href="https://www.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/prevention.html" target="_blank">How to protect yourself and others</a></li>
					<li><a href="https://healthy.kaiserpermanente.org/oregon-washington/health-wellness/coronavirus-information" target="_blank">Kaiser Permanente Northwest members: how to get care</a></li>
				</ul>
			</div>
		</section>
		*/ ?>

		<section id="carousel">
			<div class="slider">
				<div class="slide slide1">&nbsp;</div>
				<div class="slide slide2">&nbsp;</div>
				<div class="slide slide3">&nbsp;</div>
				<div class="slide slide4">&nbsp;</div>
				<div class="slide slide5">&nbsp;</div>
				<div class="slide slide6">&nbsp;</div>
				<div class="slide slide7">&nbsp;</div>
			</div>

			<div class="message">
				<div class="container">
					<h1>Good health is yours for the making</h1>
				</div>
			</div>
		</section>

		<section id="blocks">
			<div class="container">

				<a class="box classes" href="<?php bloginfo('url') ?>/classes/">
					<h2 class="title">Classes</h2>
					<img alt="Kaiser Permanente Classes" src="<?php bloginfo('template_directory') ?>/images/home-box-classes.jpg"/>
				</a>

				<a class="box coaching" href="<?php bloginfo('url') ?>/health-coaching/">
					<h2 class="title">Health Coaching</h2>
					<img alt="Kaiser Permanente Health Coaching" src="<?php bloginfo('template_directory') ?>/images/home-box-coaching.jpg"/>
				</a>

				<div class="box wellness">
					<h2 class="title">Wellness Topics</h2>
					<img alt="Kaiser Permanente Wellness Topics" src="<?php bloginfo('template_directory') ?>/images/home-box-wellness.jpg"/>
					<ul>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/emotional-health/adhd/">ADHD</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/healthy-aging/aging/">Aging</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/emotional-health/anxiety/">Anxiety</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/emotional-health/depression/">Depression</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/diabetes/">Diabetes</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/healthy-weight/exercise-physical-activity/">Exercise and Physical Activity</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/kids-and-family-health/">Kids and Family Health</a></li>
					<!--<li><a href="<?php bloginfo('url') ?>/wellness-topics/healthy-aging/life-care-planning/">Life Care Planning </a></li>-->
					<li><a href="https://healthy.kaiserpermanente.org/oregon-washington/health-wellness/life-care-plan" target="_blank">Life Care Planning </a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/healthy-weight/nutrition-healthy-eating/">Nutrition and Healthy Eating</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/pain/">Pain</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/prediabetes/">Prediabetes</a></li>
					<li class="double"><a href="<?php bloginfo('url') ?>/wellness-topics/pregnancy-and-childbirth/">Pregnancy, Childbirth, and Newborn Care</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/healthy-aging/preventing-falls/">Preventing Falls</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/quitting-tobacco/">Quitting Tobacco</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/sleep/">Sleep</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/emotional-health/stress/">Stress</a></li>
					<li><a href="<?php bloginfo('url') ?>/wellness-topics/healthy-weight/weight-management/">Weight Management</a></li>
					</ul>
				</div>

				<div class="tagline">
					<h3>We help people reach their health goals, by listening, supporting and guiding, so they can live their best lives.</h3>
				</div>

			</div>
		</section>

	</main>

<?php get_template_part('block','footer'); ?>
</body>
</html>