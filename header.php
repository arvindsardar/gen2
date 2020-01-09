<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gen2
 */
	// layout variables
	$aboveHeaderWidth = gen2_get_theme_option( 'above_header_fullwidth' ) ? 'container-fluid' : 'container';
	$headerWidth = gen2_get_theme_option( 'header_fullwidth' ) ? 'container-fluid' : 'container';
	$brandingWidth = gen2_get_theme_option( 'branding_fullwidth' ) ? 'container-fluid' : 'container';
	$navWidth = gen2_get_theme_option( 'nav_fullwidth' ) ? 'container-fluid' : 'container';
	$contentWidth = gen2_get_theme_option( 'content_fullwidth' ) ? 'container-fluid' : 'container';
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gen2' ); ?></a>


	<header id="site-header">

		<?php if ( is_active_sidebar( 'above_page_widgets' ) ) : ?>
			<div id="above-header-wrap" class="wrap-outer">
				<div class="wrap-inner <?php echo $aboveHeaderWidth; ?>">
					<div class="row">
						<?php dynamic_sidebar( 'above_page_widgets' );?>
					</div><!-- row -->
				</div><!-- wrap-inner -->
			</div><!-- wrap-outer -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'branding_zone_widgets' ) ) : ?>
			<div id="branding-wrap" class="wrap-outer">
				<div class="wrap-inner <?php echo $brandingWidth; ?>">
					<div class="row align-items-center">
						<?php dynamic_sidebar( 'branding_zone_widgets' );?>
						<div class="gen2-nav-toggle"><span class="dashicons dashicons-menu-alt3"></span></div>
					</div><!-- row -->
				</div><!-- wrap-inner -->
			</div><!-- wrap-outer -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'nav_zone_widgets' ) ) : ?>
			<div id="navigation-wrap" class="wrap-outer">
				<div class="wrap-inner <?php echo $navWidth; ?>">
					<div class="row">
						<?php dynamic_sidebar( 'nav_zone_widgets' );?>
					</div><!-- row -->
				</div><!-- wrap-inner -->
			</div><!-- wrap-outer -->
		<?php endif; ?>

	</header>

	<div id="page-content-wrap" class="wrap-outer">
		<div class="wrap-inner <?php echo $contentWidth; ?>">
			<div class="row">
