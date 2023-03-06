<?php get_template_part('block','header'); ?>
<?php the_post(); ?>

	<main>
		<section id="content">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</section>
	</main>

<?php get_template_part('block','footer'); ?>