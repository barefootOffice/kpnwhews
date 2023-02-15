<?php get_header(); ?>

<body id="search">
<?php get_header('navigation'); ?>

	<section class="masthead">
		<div class="container full">
			<h1>Search Results</h1>
		</div>
	</section>

	<main>	
		<div class="container">		

			<?php 
			if (have_posts()) {
				
				echo "<p>The following results were found for the term</p>";
				while (have_posts()){
					the_post();
					$url = get_permalink($post->ID);
					echo "<article>";
					echo "<a href='".$url."'><h2>".$post->post_title."</h2></a>";
					the_excerpt();
					echo "</article>";
				}
			
			} else {
				echo "<p>No content was found for the search term.</p>";
			}			
			?>

		</div>
	</main>
		
<?php get_footer(); ?>
</body>
</html>