<?php
/*
Template Name: Template Menu
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				$args = array(
					'post_type' 		=> 'menu-section', 	//Costum type Proyectos			
					'order'				=> 'DESC',		// List in ascending order
					// 'orderby'      		=> 'id',		// List them in their menu order
					'posts_per_page'	=>   -1, 		// Show the last one
				);

				$QueryMenu = new WP_Query($args);
			?>

			<?php while ($QueryMenu->have_posts()) : $QueryMenu->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<section class="menu-wrapper">
						<div class="menu__image col-1-2">
							<?php the_content(); ?>
						</div><!-- .contact-bottom__content --><!--

						--><div class="menu__label col-1-2">
							<p class="menu-dish__ingredients" class="legend"><?php esc_html_e( 'Access', 'dix-restos' ); ?></p>
						</div><!-- .contact-bottom__figure -->

						<div class="js-menu menu-hidden">
							<div class="menu-content col-1-2">

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
											<h3 class="menu-dish__title">
												<?php echo $child_post->post_title; ?>
											</h3>
											<p class="menu-dish__ingredients" class="menu-dish__ingredients">
												<?php echo $child_post->fields['menu-dish-description']; ?>
											</p>
										</div><!--
									--><div class="menu-dish__price">
											<?php echo $child_post->fields['menu-dish-price']; ?>
										</div>
									</div>
								<?php } // End of the loop. ?>

							</div><!-- .menu-content --><!--

						--><div class="menu-select col-1-2">
								<div class="menu-select__wrapper">
									<div class="menu-select__item">
										INSALATA
									</div>
									<div class="menu-select__item">
										ANTIPASTI
									</div>
									<div class="menu-select__item">
										CARPACCIO & TRAMEZZINO
									</div>
									<div class="menu-select__item">
										INSALATA
									</div>
									<div class="menu-select__item">
										ANTIPASTI
									</div>
									<div class="menu-select__item">
										CARPACCIO & TRAMEZZINO
									</div>
								</div>						
							</div>
						</div><!-- .menu-hidden -->

					</section><!-- .menu-wrapper -->

					<section class="menu-wrapper clearfix">
						<div class="menu__image col-1-2">
							<?php the_content(); ?>
						</div><!-- .contact-bottom__content --><!--

						--><div class="menu__label col-1-2">
							<p class="menu-dish__ingredients" class="legend"><?php esc_html_e( 'Access', 'dix-restos' ); ?></p>
						</div><!-- .contact-bottom__figure -->


						<div class="js-menu menu-hidden">
							<div class="menu-content col-1-2">
								<div class="menu-dish">
									<div class="menu-dish__description">
										<h3 class="menu-dish__title">CUORE DI SUCRINE E OLIO D’OLIVA E LIMONE</h3 class="menu-dish__title">
										<p class="menu-dish__ingredients" class="menu-dish__ingredients">Cœur de sucrine et huile d’olive citronnée</p>
									</div><!--
								--><div class="menu-dish__price">
										10
									</div>
								</div>

								<div class="menu-dish">
									<div class="menu-dish__description">
										<h3 class="menu-dish__title">POMODORO E MOZZARELLA BUFALA/BURRATA</h3 class="menu-dish__title">              
										<p class="menu-dish__ingredients">Tomates grappes de Sicile et mozzarella Bufala/Burrata</p>
									</div><!--
								--><div class="menu-dish__price">
										11
									</div>
								</div>

								<div class="menu-dish">
									<div class="menu-dish__description">
										<h3 class="menu-dish__title">PANZANELLA</h3 class="menu-dish__title">
										<p class="menu-dish__ingredients">Pâte à pizza au romarin, huile d’olive, tomates cerises,
										mozzarella et oignons rouges</p>
									</div><!--
								--><div class="menu-dish__price">
										12
									</div>
								</div>

								<div class="menu-dish">
									<div class="menu-dish__description">
										<h3 class="menu-dish__title">INSALATA AVE CESARE</h3 class="menu-dish__title">
										<p class="menu-dish__ingredients">Cœur de romaine, tomates grappes, parmesan, œufs,
										anchois et blanc de poulet</p>
									</div><!--
								--><div class="menu-dish__price">
										10
									</div>
								</div>

								<div class="menu-dish">
									<div class="menu-dish__description">
										<h3 class="menu-dish__title">DETOX</h3 class="menu-dish__title">
										<p class="menu-dish__ingredients">Saumon mariné au jus de citron, betteraves, amandes,
										roquette et huile d’olive</p>
									</div><!--
								--><div class="menu-dish__price">
										11
									</div>
								</div>

								<div class="menu-dish">
									<div class="menu-dish__description">
										<h3 class="menu-dish__title">INSALATA ITALIANA</h3 class="menu-dish__title">
										<p class="menu-dish__ingredients">Mozzarella, légumes grillés, roquette, tomates grappes,
										artichauts et jambon de parme</p>
									</div><!--
									
								--><div class="menu-dish__price">
										12
									</div>
								</div>								
							</div><!-- .menu-content --><!--

						--><div class="menu-select col-1-2">
								<div class="menu-select__wrapper">
									<div class="menu-select__item">
										INSALATA
									</div>
									<div class="menu-select__item">
										ANTIPASTI
									</div>
									<div class="menu-select__item">
										CARPACCIO & TRAMEZZINO
									</div>
									<div class="menu-select__item">
										INSALATA
									</div>
									<div class="menu-select__item">
										ANTIPASTI
									</div>
									<div class="menu-select__item">
										CARPACCIO & TRAMEZZINO
									</div>
								</div>						
							</div>
						</div><!-- .menu-hidden -->

					</section><!-- .menu-wrapper -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>