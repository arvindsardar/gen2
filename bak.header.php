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

	<div id="above-header-wrap" class="wrapper">
		<div class="<?php echo $aboveHeaderWidth; ?>"><!-- container -->
			<div class="row">
				<?php if ( is_active_sidebar( 'above_page_widgets' ) ) : ?>
					<?php dynamic_sidebar( 'above_page_widgets' );?>
				<?php endif; ?>
			</div><!-- row -->
		</div><!-- /container -->
	</div>

	<header id="site-header-wrap" class="wrapper">
		<div class="<?php echo $headerWidth; ?>"><!-- container -->
			<div class="row">

				<?php if ( is_active_sidebar( 'branding_zone_widgets' ) ) : ?>
					<div id="branding-section" class="section <?php echo $brandingWidth; ?>">
						<div class="row">
							<?php dynamic_sidebar( 'branding_zone_widgets' );?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'nav_zone_widgets' ) ) : ?>
					<div id="navigation-section" class="section <?php echo $navWidth; ?>">
						<?php dynamic_sidebar( 'nav_zone_widgets' );?>
					</div>
				<?php endif; ?>

			</div><!-- row -->
		</div><!-- /container -->
	</header>

	<div id="navigation-fixed-wrap" class="wrapper" role="complementary">
		<div class="<?php echo $headerWidth; ?>">
			<div class="row"><?php dynamic_sidebar( 'nav_zone_widgets' );?></div>
		</div>
	</div>

	<div id="page-content-wrap" class="wrapper">
		<div class="<?php echo $contentWidth; ?>">
			<div class="row">
