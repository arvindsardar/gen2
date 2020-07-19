<?php
/**
 * The header for our theme
 * @package gen2
 */

	//Theme Settings Page
	$sitename = get_bloginfo( 'name' );
	$sitelogo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	$fixedlogo = get_theme_mod( 'fixed_menu_logo', '' );
	$topbarWidth = get_theme_mod( 'topbbar_width', true ) ? 'container-fluid' : 'container';
	$headerWidth = get_theme_mod( 'header_width', true ) ? 'container-fluid' : 'container';
	$navWidth = get_theme_mod( 'nav_width', true ) ? 'container-fluid' : 'container';
	$pageWidth = get_theme_mod( 'page_width', true ) ? 'container-fluid' : 'container';
	$navPosition = get_theme_mod( 'nav_position', true );
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
<div id="fixed-header">
	<div class="container">
		<div class="row flexi-spaced flexi-middle">
			<?php if($fixedlogo){ ?>
				<img class="site-logo-small" src="<?php echo $fixedlogo; ?>">
			<?php } else {
				echo '<div class="sitename">' . $sitename . '</div>';
			}
			?>
			<?php
				wp_nav_menu( $args = array(
					'menu' => 'mainmenu',
					'menu_id' => 'id-fixed-menu',
					'menu_class' => 'fixed-menu header-menu',
					'container' => '',
				));
			?>
		</div>
	</div>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gen2' ); ?></a>

	<header id="site-header">

		<?php if ( is_active_sidebar( 'above_page_widgets' ) ) : ?>
			<div id="above-page-wrap" class="wrap-outer">
				<div class="wrap-inner <?php echo $topbarWidth; ?>">
					<div class="row">
						<?php dynamic_sidebar( 'above_page_widgets' );?>
					</div><!-- row -->
				</div><!-- wrap-inner -->
			</div><!-- wrap-outer -->
		<?php endif; ?>

		<div id="header-content-wrap" class="wrap-outer">

			<form style="display:none" role="search" method="get" id="searchform-header" action="<?php echo esc_url( home_url( '/' ) ) ?>" >
				<label class="screen-reader-text" for="s">Search</label>
				<div class="d-flex container">
					<input class="searchinput col" type="text" placeholder="Type & press enter..." value="<?php get_search_query(); ?>" name="s" id="s" />
					<span class="unsearch col-auto">X</span>
				</div>
			</form>

			<?php wp_nav_menu( $args = array(
				'menu_class' => 'offscreen-menu',
				'container_class' => 'offscreen-menu-container',
			)); ?>

			<div class="wrap-inner <?php echo $headerWidth; ?>">

				<a href="/" class="site-logo"><img src="<?php echo esc_url( $sitelogo[0] ); ?>"></a>

				<?php
					if($navPosition == 0){
						wp_nav_menu( $args = array(
							'menu_class' => 'header-menu',
							'container_class' => 'header-menu-container',
						));
					}
				?>

				<?php if ( is_active_sidebar( 'header_zone_widgets' ) ) : ?>
					<div class="header-widgets"><?php dynamic_sidebar( 'header_zone_widgets' );?></div>
				<?php endif; ?>

				<div class="mobilemenu-button">
					<div class="bar bar1"></div>
					<div class="bar bar2"></div>
					<div class="bar bar3"></div>
				</div>

			</div><!-- wrap-inner -->
		</div><!-- wrap-outer -->

	</header>

	<?php if($navPosition == 1){ ?>
		<nav id="navigation-wrap" class="wrap-outer">
			<div class="wrap-inner <?php echo $navWidth; ?>">
				<?php
					wp_nav_menu( $args = array(
						'menu_class' => 'header-menu',
						'container_class' => 'header-menu-container',
					));
				?>
			</div><!-- wrap-inner -->
		</nav><!-- wrap-outer --><?php
	} ?>


	<?php do_action('gen2_below_nav'); ?>

	<div id="page-content-wrap" class="wrap-outer">
		<div class="wrap-inner <?php echo $pageWidth; ?>">
			<div class="row">
