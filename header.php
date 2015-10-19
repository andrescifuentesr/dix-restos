<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Dix Restos
 */
//we initialize redux variable
global $redux_options;


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dix-restos' ); ?></a>

	<header id="masthead" class="site-header" role="banner" >
		<div class="site-header__wrapper">
			<div class="site-branding">
				<!-- .nav-social -->
				<div class="nav-social">
					<?php get_template_part( 'menu', 'social' ); ?>
				</div><!--

			--><h2 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo $redux_options['header-image-logo']['url']; ?>" alt="Logo">
					</a>
				</h2><!--
						
			--><div class="nav-lang">
					<div class="nav-lang__phone"><?php echo $redux_options['header-phone']; ?></div>
					<div class="nav-lang__menu">
						<?php do_action('wpml_add_language_selector'); ?>
					</div>
				</div><!-- #lang nav -->

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '&#9776; Menu', 'dix-restos' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- .site-header__wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
