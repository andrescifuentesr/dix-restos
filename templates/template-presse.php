<?php
/*
Template Name: Template Press
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('category-presse'); ?>>

					<?php
						$args = array(
							'post_type' 		=> 'press', 	//Costum type Proyectos			
							'order'				=> 'DESC',		// List in ascending order
							'orderby'      		=> 'id',		// List them in their menu order
							'posts_per_page'	=>   -1, 		// Show the last one
						);

						$QueryPresse = new WP_Query($args);
					?>

					<div class="grid">

						<?php /* Start the Loop */ ?>
						<?php while ($QueryPresse->have_posts()) : $QueryPresse->the_post(); ?><!--
						--><div class="module-presse">
								
								<?php
									$press_detail_image = types_render_field( "press-detail-image", array( "output" => "raw" ) );
									$press_link = types_render_field( "press-link", array( ) );
									$press_pdf = types_render_field( "press-detail-pdf", array( "output" => "raw" ) );
									$press_date = types_render_field( "press-date", array( ) );
									 
									//if there is an image then we show the image on click
									if ( !empty($press_detail_image) ) {
										$link = $press_detail_image;
									
									//if there is an PDF then we show the image on click
									} elseif ( !empty($press_pdf) ) {
										$link = $press_pdf;
										$target = "target='_blank'";

									//if there is an URL then we go to the URL on click
									} elseif ( !empty($press_link) ) {
										$link = $press_link;
										$target = "target='_blank'";
									}
								?>

								<a class="fancybox" href="<?php echo $link; ?>"  <?php echo $target; ?> >
									<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'imgPresse' ); ?>
									<?php echo '<img src="' . $image_src[0]  . '"  />'; ?>
								</a>
								<div class="module-presse-texte">
									<h3><?php the_title(); ?></h3>
									<p><?php echo $press_date; ?></p>
									<a class="fancybox lire-suite" href="<?php echo $link; ?>">
										<?php _e('Read more','dix-restos');?>
									</a>
								</div>
							</div><!--
					--><?php endwhile; // end of the loop. ?>
					</div><!-- .grid -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>