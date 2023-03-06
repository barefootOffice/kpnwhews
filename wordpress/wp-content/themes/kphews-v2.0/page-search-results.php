<?php set_query_var('custom_body_class','page-search-results'); ?>
<?php get_template_part('block','header'); ?>
<?php
	// Builds array of all posts from search query
	while (have_posts()){
		the_post();
		//print_r($post);echo "</br></br>";
		$searchResult[$post->ID]['type'] = $post->post_type;
		$searchResult[$post->ID]['date'] = get_the_date('Y-m-d',$post->ID);
		$excerpt = get_the_excerpt($post->ID);

		if ($post->post_type == 'attachment'){
			$searchResult[$post->ID]['title'] = $post->post_title;
			$searchResult[$post->ID]['url'] = $post->guid;
			$searchResult[$post->ID]['file'] = basename($post->guid);
			$searchResult[$post->ID]['excerpt'] = wp_get_attachment_caption($post->ID);
		} else {
			$searchResult[$post->ID]['title'] = $post->post_title;
			$searchResult[$post->ID]['url'] = get_permalink($post->ID);

			if (!$excerpt){
				$meta = get_post_meta($post->ID,'_genesis_description');
				$searchResult[$post->ID]['excerpt'] = $meta[0];
			} else {
				$searchResult[$post->ID]['excerpt'] = $excerpt;
			}
		}
	}
	wp_reset_postdata();
?>
<main>

	<section id="hero">
		<div class="headline">
			<div class="container">
				<h1>Search Results</h1>
			</div>
		</div>
	</section>

	<section id="content">
		<div class="container wp-content">

			<?php if (isset($searchResult)){
				echo "<div class='results-subhead'><p>The following results were found for the term</p></div>";
				foreach($searchResult as $result){
					echo "<article class='".$result['type']."'>";


					if ($result['type'] == 'attachment'){
						echo "<div class='pdf'>";
						echo "<a target='_blank' href='".$result['url']."'><h3>".$result['title']."</h3></a>";
						if ($result['excerpt']){echo "<div class='excerpt'>".$result['excerpt']."</div>";}
						echo "</div>";
					} else {
						echo "<a href='".$result['url']."'><h3>".$result['title']."</h3></a>";
						echo "<div class='excerpt'>".$result['excerpt']."</div>";
					}
					echo "</article>";
				}
			} else {
				echo "<div class='results-subhead'><p>Unfortunately no results were returned from your search query.</p></div>";
			} ?>

		</div>
	</section>

	<section id="lower">
		<div class="container">
			<p>Health Engagement and Wellness Services (HEWS) is a department of Kaiser Permanente Northwest serving Northwest Oregon and Southwest Washington. HEWS is dedicated to providing information and support to help you improve your health.</p>
		</div>
	</section>
</main>

<?php get_template_part('block','footer'); ?>