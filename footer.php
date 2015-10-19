<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Dix Restos
 */

//we initialize redux variable
global $redux_options;

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-wrapper">
			<div class="site-info">
				<div class="site-info__left col-1-3">
					<div class="nav-social">
						<?php get_template_part( 'menu', 'social' ); ?>
					</div>
					
					<div class="bt-newsletter">
						<a href="#block-newsletter" class="button-news-fancy">
							<?php esc_html_e( 'Newsletter', 'dix-restos' ); ?>
						</a>
					</div>

					<div class="site-info__jobs">
						<a href="mailto:<?php echo $redux_options['footer-jobs-email']; ?>">
							<?php echo $redux_options['footer-jobs']; ?>
						</a>
					</div>
				</div><!--

				--><div class="site-info__center col-1-3">
						<div class="site-info__general">
							<div class="site-info__address">
								<?php echo $redux_options['footer-adress']; ?>
							</div>
							<div class="site-info__hours">
								<?php echo $redux_options['footer-schedules']; ?>
							</div>
							<div class="site-info__phone">
								<?php echo $redux_options['footer-phone']; ?>
							</div>							
						</div>
				</div><!--

				--><div class="site-info__rigth col-1-3">
						<?php $google_map_shortcode = $redux_options['footer-googlemap']; ?>
						<?php echo do_shortcode( $google_map_shortcode ); ?>
				</div>
			</div><!-- .site-info -->
			<div class="footer-menu">
				<ul>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-1']; ?>"><?php echo $redux_options['footer-restaurant-1']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-2']; ?>"><?php echo $redux_options['footer-restaurant-2']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-3']; ?>"><?php echo $redux_options['footer-restaurant-3']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-4']; ?>"><?php echo $redux_options['footer-restaurant-4']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-5']; ?>"><?php echo $redux_options['footer-restaurant-5']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-6']; ?>"><?php echo $redux_options['footer-restaurant-6']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-7']; ?>"><?php echo $redux_options['footer-restaurant-7']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-8']; ?>"><?php echo $redux_options['footer-restaurant-8']; ?></a></li>
					<li><a href="<?php echo $redux_options['footer-restaurant-link-9']; ?>"><?php echo $redux_options['footer-restaurant-9']; ?></a></li>
				</ul>
			</div><!-- .footer-menu -->

			<div class="module-newsletter clearfix" id="block-newsletter">
				<?php

					$argsFr = array(
						'prepend' => '<h2>Newsletter</h2><p>Recevez nos actualités !</p>', 
						'showname' => false,
						'nametxt' => 'Name:', 
						'nameholder' => 'Name...', 
						'emailtxt' => 'Email : ',
						'emailholder' => '', 
						'showsubmit' => true, 
						'submittxt' => 'ENVOYER', 
						'jsthanks' => false,
						'thankyou' => 'Nous vous remercions de votre souscription à nôtre newsletter !'
					);

					$argsEn = array(
						'prepend' => '<h2>Newsletter</h2><p>Receive our notifications!</p>', 
						'showname' => false,
						'nametxt' => 'Name:', 
						'nameholder' => 'Name...', 
						'emailtxt' => 'Email : ',
						'emailholder' => '', 
						'showsubmit' => true, 
						'submittxt' => 'SUBMIT', 
						'jsthanks' => false,
						'thankyou' => 'Thank you for subscribing to our mailing list !'
					);
					

					if ( ICL_LANGUAGE_CODE == 'fr' ) {
						echo smlsubform($argsFr);	
					} else {
						echo smlsubform($argsEn);
					}
				?>
			</div><!-- .module-newsletter -->

			<div class="footer-mentions">
				<p>
					<?php echo $redux_options['footer-copyright']; ?> <?php echo date('Y'); ?> |
					<a href="<?php echo $redux_options['footer-mention-link']; ?>">
						<?php echo $redux_options['footer-mention']; ?>
					</a>
				</p>
			</div>

		</div><!-- .site-footer-wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- google analytics option -->
<?php echo $redux_options['footer-google-analytics']; ?>

</body>
</html>
