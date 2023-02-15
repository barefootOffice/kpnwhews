<?php get_header(); ?>
<?php the_post(); ?>

<body id="general" <?php body_class(); ?>>
<?php get_header('navigation'); ?>

		<main>		
			<?php the_content(); ?>
		</main>
		
<?php get_footer(); ?>
</body>
</html>