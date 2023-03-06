<?php /* Template Name: Wellness Topic */ ?>
<?php /* Template Post Type: wellness,page */ ?>

<?php set_query_var('custom_body_class','page-wellness-topic'); ?>
<?php get_template_part('block','header'); ?>
<?php the_post(); ?>

<?php
	$row_hero = get_wellness_hero();
	if ($row_hero['background_color'] == ''){
		$row_hero['background_color'] = '#006ba6';
	}
?>

<main>

	<section id="hero" style="background-color:<?php if ($row_hero['background']){echo $row_hero['background'];}else{echo "transparent";} ?>;">
		<div class="container col2">
			<div class="column left text">
				<h1><?php echo $row_hero['title']; ?></h1>
				<div class="subhead">
					<?php echo $row_hero['subhead']; ?>
				</div>
			</div>
			<div class="column right image">
				<img src="<?php echo $row_hero['image']; ?>"/>
			</div>
		</div>
	</section>

	<section id="rows">
		<?php

			$rows = get_wellness_rows();
			foreach ($rows as $row){
				//print_r($row);
				$column_left = $row['col-left'];
				$column_right = $row['col-right'];

				$row_style = '';
				if ($row['row-background'] != ''){
					$row_style = "style='background-color:".$row['row-background']."'";
				}
				$row_id = '';
				if ($row['row-id'] != ''){
					$row_id = "id='".$row['row-id']."'";
				}
				$row_class = '';
				if ($row['row-class'] != ''){
					$row_class = $row['row-class'];
				}

				echo "<div ".$row_id." class='row ".$row_class."' ".$row_style.">";
				echo "<div class='container col2'>";


				// Left Block
				$column_left_background = '';
				$column_left_class = '';
				if ($column_left[0]['background'] != ''){
					$column_left_background = "style='background-color:".$column_left[0]['background']."'";
					$column_left_class = " background-color";
				}

				if ($column_left[0]['acf_fc_layout'] == 'block-text'){
					echo "<div class='column left text wp-content".$column_left_class."' ".$column_left_background.">";
					block_text($column_left[0]);
				} else if ($column_left[0]['acf_fc_layout'] == 'block-image'){
					echo "<div class='column left image".$column_left_class."' ".$column_left_background.">";
					block_image($column_left[0]);
				} else if ($column_left[0]['acf_fc_layout'] == 'block-video'){
					echo "<div class='column left video".$column_left_class."' ".$column_left_background.">";
					block_video($column_left[0]);
				}
				echo "</div>";

				// Right Block
				$column_right_background = '';
				$column_right_class = '';
				if ($column_right[0]['background'] != ''){
					$column_right_background = "style='background-color:".$column_right[0]['background']."'";
					$column_right_class = " background-color";
				}

				if ($column_right[0]['acf_fc_layout'] == 'block-text'){
					echo "<div class='column right text wp-content".$column_right_class."' ".$column_right_background.">";
					block_text($column_right[0]);
				} else if ($column_right[0]['acf_fc_layout'] == 'block-image'){
					echo "<div class='column right image".$column_right_class."' ".$column_right_background.">";
					block_image($column_right[0]);
				} else if ($column_right[0]['acf_fc_layout'] == 'block-video'){
					echo "<div class='column right video".$column_right_class."' ".$column_right_background.">";
					block_video($column_right[0]);
				}
				echo "</div>";

				echo "</div>";
				echo "</div>";
			}

			// Block Display - Text
			function block_text($block){
				if ($block['headline']){
					echo "<h2>".$block['headline']."</h2>";
				} else {
					echo "<div class='headline-spacer'>&nbsp;</div>";
				}
				echo $block['text'];
			}

			// Block Display - Image
			function block_image($block){
				if ($block['url'] != ''){
					$link_url = $block['url']['url'];
					$link_target = $block['url']['target'];
					$image_url = $block['image']['url'];
					echo "<a href='".$link_url ."' target='".$link_target."'><img src='".$image_url ."' /></a>";
				} else {
					echo "<img src='".$block['image']['url']."' />";
				}
			}

			// Block Display - YouTube Video Embed
			function block_video($block){
				// Extract YouTube ID from URL
				preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $block['url'], $match);
				$youtubeID = $match[1];
				if ($youtubeID && strlen($youtubeID) == 11){
					echo "<iframe class='youtube' src='https://www.youtube.com/embed/".$youtubeID."' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope;' allowfullscreen></iframe>";
				}
			}

		?>
	</section>

</main>

<?php get_template_part('block','footer'); ?>
</body>
</html>