<?php /* Template Name: About */ ?>

<?php get_header(); ?>
<?php the_post(); ?>

<body id="about" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCN4KH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php get_header('navigation'); ?>

<main>		
	<?php the_content(); ?>
	
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

<?php get_footer(); ?>
</body>
</html>