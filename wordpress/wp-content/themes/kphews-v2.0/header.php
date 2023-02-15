<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title(' - ', true, 'left'); ?></title>
	<link rel='shortcut icon' type='image/x-icon' href='<?php bloginfo('template_directory'); ?>/images/favicon.ico' />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WCN4KH');</script>
	<!-- End Google Tag Manager -->

	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php wp_enqueue_style('fontawesome',get_bloginfo('template_directory').'/css/font-awesome-4.5.0/font-awesome.min.css',array(),'4.5.0'); ?>
	<?php wp_enqueue_style('cssreset',get_bloginfo('template_directory').'/css/cssreset.min.css',array('fontawesome'),'1.1'); ?>

	<?php if (strpos($_SERVER['HTTP_HOST'],'local') !== false) {//Local Testing
				wp_enqueue_style('styles',get_bloginfo('template_directory').'/style.css',array('fontawesome','cssreset'),date('Y-m-d-h-i-s'));
			} else {//Live site uses file modified date
				$css = dirname(__FILE__).'/style.css';
				if (file_exists($css)) {$css_date = date ("Y.m.d", filemtime($css));}
				wp_enqueue_style('styles',get_bloginfo('template_directory').'/style.css',array('fontawesome','cssreset'),$css_date);
			}
	?>
	 
	<?php wp_head(); ?>

</head>
