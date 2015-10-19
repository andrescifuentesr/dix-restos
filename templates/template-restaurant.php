<?php
/*
Template Name: Template Restaurant
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
					
					<section class="restaurant-block-1-3">

						<div class="restaurant-top__image col-1-3">

							<div class="restaurant-top__header">
								<div class="filter-overlay"></div>
								<header class="legend--button legend-white">
									<h1>
										<?php
											//call of custom field restaurant-label
											$page_restaurant_label = types_render_field( "restaurant-label", array( "output"=>"html" ) );
											echo $page_restaurant_label; 
										?>
									</h1>
								</header><!-- .entry-header -->
								<?php
									//call of custom field restaurant-image-label
									$page_restaurant_image_label = types_render_field( "restaurant-image-label", array( "alt" => "Restaurant image", "title" => "" ) );
									echo $page_restaurant_image_label;
								?>
							</div>

						</div><!-- .restaurant-top__content --><!--

						--><div class="restaurant-top__content col-2-3">
							<?php the_content(); ?>
						</div><!-- .restaurant-top__content -->

					</section><!-- .restaurant-block-1-3 -->

					<section class="restaurant-block-2-3">

						<div class="restaurant-middle__content col-2-3">							
							<?php
								//call of custom field restaurant-description-2nd-block
								$page_restaurant_description_2nd_block = types_render_field( "restaurant-description-2nd-block", array( "output"=>"html" ) );
								echo $page_restaurant_description_2nd_block;
							?>
						</div><!-- .restaurant-top__content --><!--

						--><div class="restaurant-middle__image col-1-3">
							<?php
								//call of custom field restaurant-image-2nd-block
								$page_restaurant_image_2nd_block = types_render_field( "restaurant-image-2nd-block", array( "alt" => "Restaurant Detail 1", "title" => "" ) );
								echo $page_restaurant_image_2nd_block;
							?>
							<?php
								//call of custom field restaurant-image-2nd-block
								$page_restaurant_image_3rd_block = types_render_field( "restaurant-image-3rd-block", array( "alt" => "Restaurant Detail 2", "title" => "", "class" => "restaurant-image-bottom" ) );
								echo $page_restaurant_image_3rd_block;
							?>
						</div><!-- .restaurant-top__content -->							

					</section><!-- .restaurant-block-2-3 -->

					<section class="restaurant-block-3-3">
	
						<div class="restaurant-bottom__image col-1-3">

							<?php
								//call of custom field restaurant-image-bottom
								$page_restaurant_image_image_bottom = types_render_field( "restaurant-image-bottom", array( "alt" => "Restaurant detail 3", "title" => "" ) );
								echo $page_restaurant_image_image_bottom;
							?>

						</div><!-- .restaurant-top__content --><!--

					--><div class="restaurant-bottom__content col-2-3">

							<?php
								//call of custom field restaurant-description-3rd-block
								$page_restaurant_description_3rd_block = types_render_field( "restaurant-description-3rd-block", array( "output"=>"html" ) );
								echo $page_restaurant_description_3rd_block;
							?>							

						</div><!-- .restaurant-top__content -->

					</section><!-- .restaurant-block-3-3 -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>