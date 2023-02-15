<?php /* Template Name: Wellness Topics */ ?>

<?php get_header(); ?>
<?php the_post(); ?>

<?php
$children = get_pages('child_of='.$post->ID);
if(count($children) != 0){
	$pageID = "listing";	
} else {
	$pageID = "topic";
}
?>

<body id="<?php echo $pageID; ?>" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCN4KH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php get_header('navigation'); ?>

	<main>
		<?php the_content(); ?>
	</main>
			
<?php get_footer(); ?>
</body>
</html>