<?php
/*
Template Name: Template Menu
*/

//we initialize redux variable
global $redux_options;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- we call the template for the first block of menu page if dishes exists : Carte -->
			<?php
				$count_post_carte = wp_count_posts('menu-section-carte')->publish;
				if ( $count_post_carte != 0 ) {
					get_template_part( 'template-parts/content-menu-carte', get_post_format() );
				}
			?>

			<!-- we call the template for the second block of menu page if dishes exists : Day -->
			<?php
				$count_post_day = wp_count_posts('menu-section-day')->publish;
				if ( $count_post_day != 0 ) {
					get_template_part( 'template-parts/content-menu-day', get_post_format() );
				}
			?>

			<!-- we call the template for the third block of menu page if dishes exists : Brunch -->
			<?php
				$count_post_brunch = wp_count_posts('menu-section-brunch')->publish;
				if ( $count_post_brunch != 0 ) {
					get_template_part( 'template-parts/content-menu-brunch', get_post_format() );
				}
			?>

			<!-- we call the template for the fourth block of menu page if dishes exists : Drink -->
			<?php
				$count_post_drink = wp_count_posts('menu-section-drink')->publish;
				if ( $count_post_drink != 0 ) {
					get_template_part( 'template-parts/content-menu-drink', get_post_format() );
				}
			?>

			<!-- we call the template for the fifth block of menu page if dishes exists : Special -->
			<?php
				$count_post_special = wp_count_posts('menu-section-special')->publish;
				if ( $count_post_special != 0 ) {
					get_template_part( 'template-parts/content-menu-special', get_post_format() );
				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>