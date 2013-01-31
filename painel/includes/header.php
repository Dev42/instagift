<?php

if (!isset($_GET['ver'])){
    include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/config.php';
}
include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/classLoader.php';

?>
<!doctype html public "✰">
<!--[if lt IE 7]> <html lang="en-us" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en-us" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en-us" class="no-js ie8"> <![endif]-->
<!--[if IE 9]>    <html lang="en-us" class="no-js ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en-us" class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		
		<title>Quup | Painel de Controle</title>
  		<meta name="description" content="http://themeforest.net/item/adminica-the-professional-admin-template/160638">
  		<meta name="author" content="Oisin Lavery - Tricycle Labs">
  		
	<!-- iPhone, iPad and Android specific settings -->	
	
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1;">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<link rel="apple-touch-icon" href="images/iOS_icon.png">
		<link rel="apple-touch-startup-image" href="images/iOS_startup.png">
				
	<!-- Styles -->

		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/reset.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
		
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/fancybox/jquery.fancybox-1.3.4.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/tinyeditor/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/slidernav/slidernav.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/syntax_highlighter/styles/shCore.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/syntax_highlighter/styles/shThemeDefault.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/uitotop/css/ui.totop.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/isotope/isotope.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/elfinder/css/elfinder.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/tiptip/tipTip.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/uniform/css/uniform.aristo.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/multiselect/css/ui.multiselect.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/selectbox/jquery.selectBox.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/colorpicker/css/colorpicker.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/uistars/jquery.ui.stars.min.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/scripts/themeroller/Aristo.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/text.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/grid.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/main.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/theme_base.css">

		<!-- Style Switcher  
		
		The following stylesheet links are used by the styleswitcher to allow for dynamically changing how Adminica looks and acts.
		Styleswitcher documentation: http://style-switcher.webfactoryltd.com/documentation/
		
		switcher1.php : layout - fluid by default.								(eg. styles/theme/switcher1.php?default=layout_fixed.css)
		switcher2.php : header and sidebar positioning - sidebar by default.	(eg. styles/theme/switcher1.php?default=header_top.css)
		switcher3.php : colour skin - black/grey by default.					(eg. styles/theme/switcher1.php?default=theme_red.css)
		switcher4.php : background image - dark boxes by default.				(eg. styles/theme/switcher1.php?default=bg_honeycomb.css)
		switcher5.php : controls the theme - dark by default.					(eg. styles/theme/switcher1.php?default=theme_light.css)
		
		-->
		
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/switcher.css" media="screen">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/switcher1.php?default=layout_fixed.css" media="screen" > 
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/switcher2.php?default=switcher.css" media="screen" >
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/switcher3.php?default=theme_blue.css" media="screen" >
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/switcher4.php?default=bg_squares.css" media="screen" >
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/theme/switcher5.php?default=theme_light.css" media="screen" >
		
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/colours.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $urlGeral; ?>/styles/ie.css">
		
	<!-- Scripts -->

		<!-- Load JQuery -->		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

		<!-- Load JQuery UI -->
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>
		
		<!-- Global -->
		<script src="<?php echo $urlGeral; ?>/scripts/touchPunch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/uitotop/js/jquery.ui.totop.js" type="text/javascript"></script>
				
		<!-- Forms -->
		<script src="<?php echo $urlGeral; ?>/scripts/uniform/jquery.uniform.min.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/autogrow/jquery.autogrowtextarea.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/multiselect/js/ui.multiselect.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/selectbox/jquery.selectBox.min.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/timepicker/jquery.timepicker.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/colorpicker/js/colorpicker.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/uistars/jquery.ui.stars.min.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/tiptip/jquery.tipTip.minified.js"></script>
		<script src="<?php echo $urlGeral; ?>/scripts/validation/jquery.validate.min.js" type="text/javascript"></script>		

		<!-- Configuration Script -->
		<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_ui.js"></script>
		<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_forms.js"></script>
		<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_mobile.js"></script>
		
		<!-- Live Load (remove after development) -->
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	</head>
	<body>