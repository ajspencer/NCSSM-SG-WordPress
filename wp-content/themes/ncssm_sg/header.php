<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ncssm_sg
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>NCSSM SGA</title>

        <?php wp_head(); ?>
    </head>
    <!--
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'ncssm_sg'); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e('Primary Menu', 'ncssm_sg'); ?></button>
			<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
		</nav>
	</header>

	<div id="content" class="site-content">

-->

    <body <?php body_class(); ?>>
        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <span><a href="http://ncssm.edu/sg/index.html"><?php bloginfo('name'); ?> </a></span>
                </div>
                <div id="headernav">
                    <div id="mobilenavtoggle" style="display: none;"><a href="#">Menu<div><span></span><span></span><span></span></div></a></div>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                </div>
            </div>
        </header>
        <script type="text/javascript" src="<?=get_stylesheet_directory_uri()?>/js/jquery.everestMobileNav.js"></script>
        <script>
            (function($){
                $('.main-header').everestMobileNav();
            })(jQuery);
        </script>
