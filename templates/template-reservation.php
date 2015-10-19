<?php
/*
Template Name: Template Reservation
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('reservation-top grid--full'); ?>>
					<div class="reservation-top__content col-1-3">

						<div class="reservation-top__header">
							<header class="legend--button legend-white">
								<h1>
									<?php
										//call of custom field contact-label
										$page_reservation_label = types_render_field( "reservation-label", array( ) );
										echo $page_reservation_label;
									?>
								</h1>
							</header><!-- .entry-header -->
							<?php
								//call of custom field contact-image
								$page_reservation_reservation_image = types_render_field( "reservation-image", array( "alt" => "Reservation image", "title" => "" ) );
								echo $page_reservation_reservation_image;
							?>
						</div>

						<div class="reservation-top__general">
							<div class="wrapper--center">
								<div class="reservation-legend__top">
									<?php
										//call of custom field groups-reservation-description
										$page_reservation_groups_description = types_render_field( "groups-reservation-description", array( ) );
										echo $page_reservation_groups_description;
									?>
								</div>
								<div class="reservation-legend__bottom">
									<?php
										//call of custom field phones-reservation-description
										$page_reservation_phone_description = types_render_field( "phones-reservation-description", array( ) );
										echo $page_reservation_phone_description;
									?>
								</div>
							</div>
						</div>

					</div><!-- .reservation-top__content --><!--

					--><div class="reservation-top__calendar col-2-3">
						<?php the_content(); ?>
					</div><!-- .reservation-top__content -->
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>