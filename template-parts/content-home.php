<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Dix Restos
 */

//we initialize redux variable
global $redux_options;

?>

<section class="home-welcome">

	<div class="home-welcome__image col-1-3 col-1-3--home">
		<img src="<?php echo $redux_options['home-image-media']['url']; ?>" alt="Welcome image">
		<span class="legend--button home-welcome__legend--white">
			<?php echo $redux_options['home-image-caption']; ?>
		</span>
	</div><!-- .home-welcome__image --><!--
  
	--><div class="home-welcome__content col-2-3 col-2-3--home">
		<p>
			<?php echo $redux_options['home-description-textarea']; ?>
		</p>
		<a href="<?php echo $redux_options['home-menu-link-label']; ?>" class="button--home_link legend--button">
			<?php echo $redux_options['home-description-button']; ?>
		</a>
	</div><!-- .home-welcome__content -->

</section><!-- .home-welcome -->

<section class="home-middle">

	<div class="home-middle__slider col-2-3">

		<div class="flexslider-wrapper loading">

			<div class="spinner">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>

			<div class="flexslider">
				<ul class="slides">
				    <?php
						foreach($redux_options['home-opt-slides'] as $slide) {
							echo '<li><img src="' . $slide['image'] . '" alt="' . $slide['title'] . '"></li>'; 
						}
					?>
				</ul>
			</div>
		</div><!-- .flexslider-wrapper -->

	</div><!-- .home-middle__image --><!--

	--><div class="home-middle__content col-1-3">
		<a href="<?php echo $redux_options['home-reservation-link']; ?>" class="legend--button legend--inline-block">
			<?php echo $redux_options['home-reservation-link-label']; ?>
		</a>
	</div><!-- .home-middle__content -->

</section><!-- .home-middle -->

<section class="home-bottom">

	<div class="home-bottom__left">
		<a href="<?php echo $redux_options['home-contact-link']; ?>" >
			<div class="legend--wrapper col-1-3">
				<div class="legend--button legend--inline-block">
					<?php echo $redux_options['home-contact-link-label']; ?>
				</div>
			</div><!--
		--><div class="home-bottom__image col-2-3">
				<img src="<?php echo $redux_options['home-contact-image']['url']; ?>" alt="Menu A la carte Image">
			</div>
		</a>
	</div><!-- .home-bottom__left -->

	<div class="home-bottom__right">
		<a href="<?php echo $redux_options['home-menu-link']; ?>" >
			<div class="legend--wrapper col-1-3">
				<div class="legend--button legend--inline-block">
					<?php echo $redux_options['home-menu-link-label']; ?>
				</div>
			</div><!--
		--><div class="home-bottom__image col-2-3">
				<img src="<?php echo $redux_options['home-menu-image']['url']; ?>" alt="Menu">
			</div>
		</a>
	</div><!-- .home-bottom__right -->

</section><!-- .home-bottom -->
