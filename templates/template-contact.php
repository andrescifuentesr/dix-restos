<?php
/*
Template Name: Template Contact
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="contact-top grid--full">
						<div class="contact-top__content col-1-3">

							<div class="contact-top__header">
								<header class="legend--button legend-white">
									<h1>
										<?php
											//call of custom field contact-label
											$page_contac_contact_label = types_render_field( "contact-label", array( ) );
											echo $page_contac_contact_label;
										?>										
									</h1>									
								</header><!-- .entry-header -->
								<?php
									//call of custom field contact-image
									$page_contac_contact_image = types_render_field( "contact-image", array( "alt" => "Contact image", "title" => "" ) );
									echo $page_contac_contact_image;
								?>
							</div>

							<div class="contact-top__general">
								<div class="wrapper--center">
									<div class="contact-legend__top">
										<?php
											//call of custom field conctact-information
											$page_contac_contact_information = types_render_field( "conctact-information", array( "output"=>"html" ) );
											echo $page_contac_contact_information;
										?>	
									</div>
									<div class="contact-legend__bottom">
										<?php
											//call of custom field reservation-information
											$page_contac_reservationinformation = types_render_field( "reservation-information", array( "output"=>"html" ) );
											echo $page_contac_reservationinformation;
										?>	
									</div>
								</div>
							</div>

						</div><!-- .contact-top__content --><!--

						--><div class="contact-top__map col-2-3">
								<?php
									//call of custom field restaurant-google-map
									$page_contac_restaurant_google_map = types_render_field( "restaurant-google-map", array( "output"=>"html" ) );
									echo $page_contac_restaurant_google_map;
								?>	
						</div><!-- .contact-top__content -->
					</section><!-- .contact-top -->

					<section class="contact-bottom">
						<div class="contact-bottom__content col-1-2--desk">
							<?php the_content(); ?>
						</div><!-- .contact-bottom__content --><!--

						--><div class="contact-bottom__figure col-1-2--desk">
							<p class="legend legend--button">
								<?php
									//call of custom field acces-label
									$page_contac_contact_label = types_render_field( "acces-label", array( ) );
									echo $page_contac_contact_label;
								?>	
							</p>
							<?php
								//call of custom field acces-image
								$page_contac_acces_image = types_render_field( "acces-image", array( "alt" => "Acces image", "title" => "" ) );
								echo $page_contac_acces_image;
							?>
						</div><!-- .contact-bottom__figure -->
					</section><!-- .contact-top -->
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>