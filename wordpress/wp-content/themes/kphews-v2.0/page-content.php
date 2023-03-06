<?php /* Template Name: Content Page */ ?>
<?php get_template_part('block','header'); ?>
<?php the_post(); ?>

<main>

	<section id="hero">
		<div class="headline">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</section>

	<section id="content">
		<div class="container wp-content">
			<?php the_content(); ?>
		</div>
	</section>

	<section id="carousel">
		<div class="container">
			<h2>What Participants Are Saying</h2>
			<ul class="slider">
			<?php
				while (have_rows('testimonials')){
					the_row();
					$quote = get_sub_field('testimonials_quote');
					$person = get_sub_field('testimonials_person');
					echo "<li>";
					echo "<div class='quote'>".$quote."</div>";
					echo "<div class='person'>".$person."</div>";
					echo "</li>";
				}
			?>
			</ul>
		</div>
	</section>

	<section id="lower">
		<div class="container">
			<p>Health Engagement and Wellness Services (HEWS) is a department of Kaiser Permanente Northwest serving Northwest Oregon and Southwest Washington. HEWS is dedicated to providing information and support to help you improve your health.</p>
		</div>
	</section>
</main>

<?php get_template_part('block','footer'); ?>