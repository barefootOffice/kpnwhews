<?php /* Template Name: Classes */ ?>

<?php get_header(); ?>
<?php the_post(); ?>

<body id="classes" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCN4KH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php get_header('navigation'); ?>

	<main>
		<?php the_content(); ?>
		
		<section id="choices">
			<div class="container">

				<?php							
				$categories = get_posts(array(
					'numberposts'	=> -1,
					'post_type'		=> 'classes',
					'orderby'      => 'menu_order',
					'order'        => 'DESC'
				));
				
				$array_half = array_chunk($categories, ceil(count($categories)/2));

				function outputBox($array){
					$url = get_bloginfo('url')."/class-catalog/".get_field('file_name',$post->ID);
					
					foreach ($array as $category){
						echo "<div class='item'><div class='title'>".$category->post_title."<span class='button'></span></div><div class='dropdown'>";
						
						if (have_rows('class_topics',$category->ID)){
							while(have_rows('class_topics',$category->ID)){
								the_row();
								echo "<a href='".$url."#page=".get_sub_field('class_page_number')."' target='_blank' title='Link opens in new window'>".get_sub_field('class_name')."</a>";
							} 
						}
	
						if (have_rows('class_community_partner',$category->ID)){
							echo "<span class='heading'>Community Partners</span>";
							while(have_rows('class_community_partner',$category->ID)){
								the_row();
								echo "<a href='".$url."#page=".get_sub_field('class_page_number')."' target='_blank' title='Link opens in new window'>".get_sub_field('class_name')."</a>";
							} 
						}
						
						echo "</div></div>";
					}
				}
				?>
				
				<div class="col-left"><?php outputBox($array_half[0]); ?></div>
				<div class="col-right"><?php outputBox($array_half[1]); ?></div>
			
			</div>		
		</section>
	</main>
		
<?php get_footer(); ?>
</body>
</html>