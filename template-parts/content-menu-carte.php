<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Dix Restos
 */

//we initialize redux variable
global $redux_options;

?>

<article <?php post_class('js-menu_section'); ?>>

	<section class="menu-wrapper">

		<div class="js-menu-switcher">
			<div class="menu__image col-1-2">
				<img src="<?php echo $redux_options['menu-section-carte-image']['url']; ?>" alt="Contact">
			</div><!-- .contact-bottom__content --><!--

		--><div class="menu__label col-1-2">
				<p class="menu-dish__ingredients legend--inline-block">
					<?php echo $redux_options['menu-section-carte-label']; ?>
				</p>
			</div><!-- .contact-bottom__figure -->				
		</div>


		<div class="js-menu menu-section--hidden menu-hidden">		

			<?php
				$args = array(
					'post_type' 		=> 'menu-section-carte', 	//Costum menu-section-carte			
					'order'				=> 'ASC',					// List in ascending order
					// 'orderby'      		=> 'id',				// List them in their menu order
					'posts_per_page'	=>   -1, 					// Show the last one
				);

				$QueryMenu = new WP_Query($args);
			?>

			<div class="menu-content col-1-2">

				<?php while ($QueryMenu->have_posts()) : $QueryMenu->the_post(); ?>

					<div id="menu-dish-<?php the_ID(); ?>" class="menu-dish-wrapper">

						<div class="dish-note"><?php the_content(); ?></div>

						<?php
							// we create a for loop for callin all dishes children from menu-section
							$args_menu = array(
								'order'				=> 'ASC',		// List in ascending order
								'posts_per_page'	=>   -1, 		// Show all child-posts
								'orderby'      		=> 'id',		// List them in their menu order
							);

							$child_posts = types_child_posts('menu-dish', $args_menu);
							foreach ($child_posts as $child_post) {
						?>
							<div class="menu-dish">
								<div class="menu-dish__description">
									<p class="menu-dish__title">
										<?php echo $child_post->post_title; ?>
									</p>
									<p class="menu-dish__ingredients" class="menu-dish__ingredients">
										<?php echo $child_post->fields['menu-dish-description']; ?>
									</p>
								</div><!--
							--><div class="menu-dish__price">
									<?php echo $child_post->fields['menu-dish-price']; ?>
								</div>
							</div>
						<?php } // End of the loop. ?>

					</div><!-- #"menu-dish-## -->

				<?php endwhile; // End of the loop. ?>

			</div><!-- .menu-content --><!--
			
		--><div class="menu-select col-1-2">

				<?php while ($QueryMenu->have_posts()) : $QueryMenu->the_post(); ?>

					<button id="js-menu-select-<?php the_ID(); ?>" class="js-menu-select_item menu-select__item">
						<?php the_title(); ?>
					</button>

				<?php endwhile; // End of the loop. ?>

			</div>
				
		</div><!-- .menu-hidden -->

	</section><!-- .menu-wrapper -->

</article><!-- #post-## -->
