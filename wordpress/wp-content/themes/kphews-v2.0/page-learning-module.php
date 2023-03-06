<?php /* Template Name: Learning Module */ ?>

<?php set_query_var('custom_body_class','page-learning-module'); ?>
<?php get_template_part('block','header'); ?>
<?php the_post(); ?>
<?php $articulate_template = get_field('template-folder'); ?>
<main>

	<section id="content">
		<div class="container">
			<?php if ($articulate_template != ''){ ?>
				<iframe src="<?php bloginfo('url') ?>/wp-content/uploads/articulate_uploads/<?php echo $articulate_template; ?>/story.html" width="100%" height="600px" frameborder="0" scrolling="no"></iframe>
			<?php } ?>
			<div class="mobile">
				<h2>This player requires a desktop computer with a monitor resolution larger than 1024px wide to view</h2>
			</div>
		</div>
	</section>

</main>

<?php get_template_part('block','footer'); ?>