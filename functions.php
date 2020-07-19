<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/* !! THEME DEFAULTS AND SUPPORT FOR VARIOUS FEATURES
------------------------------------------------------*/
	if ( ! function_exists( 'gen2_setup' ) ) :
		function gen2_setup() {
			add_theme_support( 'title-tag' ); //let WP manage the <title> head tag
			add_theme_support( 'editor-styles' ); //register gutenberg stylesheet
			add_theme_support( 'align-wide' );
			add_theme_support( 'customize-selective-refresh-widgets' ); //support for widget selective refresh
			add_theme_support( 'post-thumbnails' ); //Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'responsive-embeds' ); // Add support for responsive embeds.
			add_editor_style( 'css/style-editor.css' ); //load gutenberg stylesheet
			add_theme_support( 'automatic-feed-links' );

			// ADD WOOCOMMERCE THEME SUPPORT
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );


			// This theme uses wp_nav_menu() in one location
			register_nav_menus( array(
				'menu-1' => esc_html__( 'Primary', 'gen2' ),
			) );

			// Change markup for HTML5
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Support for core custom logo
			add_theme_support('custom-logo');
		}
	endif;
	add_action( 'after_setup_theme', 'gen2_setup' );


/* !! ALLOW SVG
--------------------------------------------*/
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');


/* !! SET CONTENT WIDTH
--------------------------------------------*/
	function gen2_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'gen2_content_width', 1140 );
	}
	add_action( 'after_setup_theme', 'gen2_content_width', 0 );



/* !! CUSTOM TEMPLATE TAGS
--------------------------------------------*/
	require get_template_directory() . '/inc/template-tags.php';


/* !! CUSTOMIZER ADDITIONS
/* see https://kirki.org/docs/
--------------------------------------------*/
	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/inc/kirki/kirki.php';

	Kirki::add_config( 'gen2_config_id', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	Kirki::add_section( 'gen2_section_id', array(
		'title'          => esc_html__( 'Gen2 Theme Setup', 'kirki' ),
		//'description'    => esc_html__( 'Theme Specific Settings', 'kirki' ),
		'priority'       => 50,
	) );

	//fixed menu logo
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'image',
		'settings'    => 'fixed_menu_logo',
		'label'       => esc_html__( 'Sticky Header: Logo', 'kirki' ),
		//'description' => esc_html__( 'Add the small logo version', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '',
	] );

	//descriptive
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'custom',
		'settings'    => 'custom_01',
		'section'     => 'gen2_section_id',
		'default'     => '<h3 style="padding:15px 0 0; border-bottom: 1px solid #333; margin:0;">Nav Position</h3>',
		'priority'    => 10,
	] );

	//navbar position
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'nav_position',
		'label'       => esc_html__( 'Nav Menu below logo?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//descriptive
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'custom',
		'settings'    => 'custom_02',
		'section'     => 'gen2_section_id',
		'default'     => '<h3 style="padding:15px 0 0; border-bottom: 1px solid #333; margin:0;">Width Controls</h3>',
		'priority'    => 10,
	] );

	//topbar width toggle
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'topbbar_width',
		'label'       => esc_html__( 'Topbar Full Width?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//header width toggle
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'header_width',
		'label'       => esc_html__( 'Header Full Width?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//Nav Area (below logo) width toggle
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'nav_width',
		'label'       => esc_html__( 'Nav (below logo) Full Width?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//Page width toggle
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'page_width',
		'label'       => esc_html__( 'Page Content Full Width?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//Above Footer width toggle
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'abovefooter_width',
		'label'       => esc_html__( 'Above Footer Full Width?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//Footer width toggle
	Kirki::add_field( 'gen2_config_id', [
		'type'        => 'toggle',
		'settings'    => 'footer_width',
		'label'       => esc_html__( 'Footer Full Width?', 'kirki' ),
		'section'     => 'gen2_section_id',
		'default'     => '0',
		'priority'    => 10,
	] );

	//backend link to customizer settings page
	add_action( 'admin_menu', 'register_gen2_settings_page' );
	function register_gen2_settings_page() {
	// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_menu_page( 'Gen2', 'Theme Setup', 'manage_options', '/customize.php?autofocus[section]=gen2_section_id', '', 'dashicons-admin-generic', 10 );
	}


/* !! ADDITIONAL BODY CLASSES
--------------------------------------------*/
	function gen2_body_classes( $classes ) {
		//add theme class
		$classes[] = 'gen2';

		//Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		//Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		//Adds a class of not-front if it's an internal page
		if ( ! is_front_page() ) {
			$classes[] = 'not-front';
		}

		return $classes;
	}
	add_filter( 'body_class', 'gen2_body_classes' );


/* !! ENQUEUE SCRIPTS & STYLES
--------------------------------------------*/
	//for cache busting
	define( 'MY_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

	add_action( 'wp_enqueue_scripts', function(){

		// styles
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'gen2-bs4-grid', get_stylesheet_directory_uri()  . '/css/bootstrap-grid.min.css' );
		wp_enqueue_style( 'gen2-gf-restyle', get_stylesheet_directory_uri()  . '/gf-restyle/gf.css', array(), MY_THEME_VERSION );
		wp_enqueue_style( 'gen2-style', get_stylesheet_uri(), array(), MY_THEME_VERSION );

		// scripts
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'gen2_custom_js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	}, 99 );

	add_action( 'admin_enqueue_scripts', function(){
		wp_enqueue_style( 'tcc_admin_css', get_stylesheet_directory_uri()  . '/css/admin-styles.css', false, '1.0.0' );
	} );


/* !! REGISTER WIDGET AREAS
--------------------------------------------*/
	add_action( 'widgets_init', 'gen2_widgets_init' );
	function gen2_widgets_init() {
		// MAIN SIDEBAR
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'gen2' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// ABOVE PAGE ZONE
		register_sidebar( array(
			'name'          => esc_html__( 'Above Page Zone', 'gen2' ),
			'id'            => 'above_page_widgets',
			'description'   => esc_html__( 'Widgets will appear at the top of the page', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="col widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// HEADER ZONE
		register_sidebar( array(
			'name'          => esc_html__( 'Header Zone', 'gen2' ),
			'id'            => 'header_zone_widgets',
			'description'   => esc_html__( 'Widgets will appear in the header zone', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="col widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// NAVIGATION ZONE
		register_sidebar( array(
			'name'          => esc_html__( 'Navigation Zone', 'gen2' ),
			'id'            => 'nav_zone_widgets',
			'description'   => esc_html__( 'Widgets will appear in the navigation zone', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// ABOVE FOOTER ZONE
		register_sidebar( array(
			'name'          => esc_html__( 'Above Footer Zone', 'gen2' ),
			'id'            => 'above_footer_widgets',
			'description'   => esc_html__( 'Widgets will appear above the footer', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER ONE
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 1', 'gen2' ),
			'id'            => 'footer1_widgets',
			'description'   => esc_html__( 'First footer area', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER TWO
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', 'gen2' ),
			'id'            => 'footer2_widgets',
			'description'   => esc_html__( 'Second footer area', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER THREE
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', 'gen2' ),
			'id'            => 'footer3_widgets',
			'description'   => esc_html__( 'Third footer area', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER FOUR
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'gen2' ),
			'id'            => 'footer4_widgets',
			'description'   => esc_html__( 'Fourth footer area', 'gen2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

