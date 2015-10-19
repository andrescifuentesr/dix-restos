<?php
/*
Template Name: Template Privatisation
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="privatisation-top">
						
						<div class="privatisation-top__legend col-1-3">

							<div class="privatisation-top__header">
								<header class="legend--button legend-white">
									<h1>
									<?php
										//call of custom field privatisation-label
										$page_privatisation_label = types_render_field( "privatisation-label", array( ) );
										echo $page_privatisation_label;
									?>
								</h1>
								</header><!-- .entry-header -->
								<?php
									//call of custom field privatisation-image
									$page_privatisation_image = types_render_field( "privatisation-image", array( "alt" => "Privatisation image", "title" => "" ) );
									echo $page_privatisation_image;
								?>
							</div>

						</div><!-- .privatisation-top__content --><!--


						--><div class="privatisation-top__content col-2-3">
								<?php the_content(); ?>
						</div><!-- .privatisation-top__content -->

					</section><!-- .privatisation-top -->

					<section class="privatisation-bottom">

						<div class="privatisation-bottom__content col-1-3">

							<div class="privatisation-bottom__general">
								<div class="">
									<div class="privatisation-legend__top">
										<?php
											//call of custom field privatisation-capacity
											$page_privatisation_capacity = types_render_field( "privatisation-capacity", array( ) );
											echo $page_privatisation_capacity;
										?>
									</div>
									<div class="privatisation-legend__bottom">
										<?php
											//call of custom field privatisation-possitibilities
											$page_privatisation_possitibilities = types_render_field( "privatisation-possitibilities", array( ) );
											echo $page_privatisation_possitibilities;
										?>
									</div>
								</div>
							</div>

						</div><!-- .privatisation-top__content --><!--

					--><div class="privatisation-bottom__image col-2-3">
							<?php
								//call of custom field privatisation-image
								$page_privatisation_bottom_image = types_render_field( "privatisation-bottom-image", array( "alt" => "Privatisation space", "title" => "" ) );
								echo $page_privatisation_bottom_image;
							?>
						</div><!-- .privatisation-top__content -->
					
					</section><!-- .privatisation-bottom -->

					<section class="privatisation-form">
						<?php
							//call of custom field privatisation-contact-form
							$page_privatisation_contact_form = types_render_field( "privatisation-contact-form", array( ) );
							echo $page_privatisation_contact_form;
						?>
					</section><!-- .privatisation-bottom -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>