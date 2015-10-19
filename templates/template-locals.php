<?php
/*
Template Name: Template Locals
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				$args = array(
					'post_type' 		=> 'restaurant', 	//Costum type Proyectos			
					'order'				=> 'ASC',		// List in ascending order
					'orderby'      		=> 'id',		// List them in their menu order
					'posts_per_page'	=>   -1, 		// Show the last one
				);

				$QueryRestaurants = new WP_Query($args);
			?>

			<?php while ($QueryRestaurants->have_posts()) : $QueryRestaurants->the_post(); ?><!--

				--><article id="post-<?php the_ID(); ?>" <?php post_class('local__item'); ?>>

					<?php 
						//we create a link for the restaurants
						$page_restaurant_link = types_render_field( "restaurant-link", array(  ) );
						//if this is the current restaurant we take off its link
						$page_restaurant_active = types_render_field( "active-restaurant", array( ) ) ;
					?>

					<?php if( $page_restaurant_active != '1' ) { ?><a href="<?php echo $page_restaurant_link; ?>" target="_blank"><?php } ?>
						<div class="local-item-wrapper">

							<div class="local-image col-1-2">
								<figure>
									<?php the_post_thumbnail(); ?>
								</figure>
								<div class="local-image__description">
									<?php the_content(); ?>
								</div>
								<div class="overlay"></div>
							</div><!--
						--><div class="local-label col-1-2">
								<div class="local--legend">
									<?php the_title( '<h2>', '</h2>' ); ?>
								</div>
							</div>

						</div>
					<?php if( $page_restaurant_active != '1' ) { ?></a><?php } ?>

				</article><!--
			
		--><?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>