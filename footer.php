<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gen2
 */
	// layout variables
	$footerWidth = gen2_get_theme_option( 'footer_fullwidth' ) ? 'container-fluid' : 'container';
?>

			</div><!-- #page-content-wrap.row -->
		</div><!-- #page-content-wrap.inner -->
	</div><!-- #page-content-wrap.wrapper -->

	<footer id="site-footer-wrap" class="wrap-outer">
		<div class="wrap-inner <?php echo $footerWidth; ?>">
			<div class="row">
				<?php if ( is_active_sidebar( 'footer1_widgets' ) ) { ?>
					<div id="footer-1" class="widget-column col"><?php dynamic_sidebar( 'footer1_widgets' );?></div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer2_widgets' ) ) { ?>
					<div id="footer-2" class="widget-column col"><?php dynamic_sidebar( 'footer2_widgets' );?></div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer3_widgets' ) ) { ?>
					<div id="footer-3" class="widget-column col"><?php dynamic_sidebar( 'footer3_widgets' );?></div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer4_widgets' ) ) { ?>
					<div id="footer-4" class="widget-column col"><?php dynamic_sidebar( 'footer4_widgets' );?></div>
				<?php } ?>
				<div id="site-info" class="col-12">
					<small>
					© <?php echo date("Y"); ?>  | <a href="https://thecreativecollective.com.au">Website Design &amp; Development</a> by <a href="https://thecreativecollective.com.au">The Creative Collective</a>
					</small>
				</div><!-- .site-info -->
			</div><!-- #site-footer-wrap.row -->
		</div><!-- #site-footer-wrap.container -->
	</footer><!-- #site-footer-wrap.wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
