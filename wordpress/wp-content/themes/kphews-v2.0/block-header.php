<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WCN4KH');</script>
	<!-- End Google Tag Manager -->

	<link rel='shortcut icon' type='image/x-icon' href='<?php bloginfo('template_directory'); ?>/images/favicon.ico' />
	<?php wp_enqueue_style('fontawesome',get_bloginfo('template_directory').'/css/font-awesome-4.5.0/font-awesome.min.css',array(),'4.5.0'); ?>
	<?php /* wp_enqueue_style('googlefonts','https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900',array('fontawesome'),'1.1'); */ ?>
	<?php if (strpos($_SERVER['HTTP_HOST'],'local') !== false) {//Local Testing
				wp_enqueue_style('styles',get_bloginfo('template_directory').'/style.css',array('fontawesome'),date('Y-m-d-h-i-s'));
			} else {//Live site uses file modified date
				$css = dirname(__FILE__).'/style.css';
				if (file_exists($css)) {$css_date = date ("Y.m.d", filemtime($css));}
				wp_enqueue_style('styles',get_bloginfo('template_directory').'/style.css',array('fontawesome'),$css_date);
			}
	?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(get_query_var('custom_body_class')); ?> >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCN4KH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php get_template_part('block','navigation'); ?>
