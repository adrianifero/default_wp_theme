<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon.png" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/style.css">
	
</head>

<body style="margin: 0;font-family: 'Open Sans', sans-serif;color: #EEE;">
	<header id="header" class="fixed">
		<div class="logo">
			<h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</div>		
		<nav id="mainmenu">
			<?php wp_nav_menu( array( 'theme_location' => 'topbar', 'menu_class' => 'menu' ) ); ?>
		</nav>	
	</header>
    
