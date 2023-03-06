<?php /* Template Name: Wellness Listing */ ?>
<?php /* Template Post Type: wellness */ ?>
<?php set_query_var('custom_body_class','page-wellness-listing'); ?>
<?php get_template_part('block','header'); ?>
<?php the_post(); ?>

<?php
	$row_hero = get_wellness_hero();
	if ($row_hero['background_color'] == ''){
		$row_hero['background_color'] = '#006ba6';
	}
?>

<main>

	<section id="hero">
		<div class="headline" style="background-color:<?php if ($row_hero['background']){echo $row_hero['background'];}else{echo "transparent";} ?>;">
			<div class="container">
				<h1><?php echo $row_hero['title']; ?></h1>
			</div>
		</div>
		<div class="subhead">
			<div class="container">
				<?php echo $row_hero['subhead']; ?>
			</div>
		</div>
	</section>

	<section id="rows">
		<?php
		$rows = get_wellness_rows();
		foreach ($rows as $row){ //print_r($row);

			if ($row['url']['url'] != ''){
				$row_url = $row['url']['url'];
				if ($row['url']['target']){
					$row_url_target = $row['url']['target'];
				} else {
					$row_url_target = "_self";
				}
			?>
			<div class="row">
				<div class="container col2">
					<div class="column left text wp-content">
						<?php echo "<h2><a href='".$row_url."' target='".$row_url_target."'>".$row['headline']."</a></h2>"; ?>
						<?php echo $row['text']; ?>
						<?php echo "<p><a href='".$row_url."' target='".$row_url_target."'>".$row['url']['title']."</a></p>"; ?>
					</div>
					<div class="column right image">
						<?php echo "<a href='".$row_url."' target='".$row_url_target."'><img src='".$row['image']['url']."' alt='".$row['image']['alt']."' /></a>"; ?>
					</div>
				</div>
			</div>
			<?php } else {	?>
			<div class="row">
				<div class="container col2">
					<div class="column left text wp-content">
						<h2><?php echo $row['headline']; ?></h2>
						<?php echo $row['text']; ?>
					</div>
					<div class="column right image">
						<img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
					</div>
				</div>
			</div>
			<?php } ?>

		<?php } ?>
	</section>

</main>

<?php get_template_part('block','footer'); ?>
</body>
</html>