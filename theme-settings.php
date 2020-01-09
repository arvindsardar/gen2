<?php
/* Layout Settings Page */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'gen2_Theme_Options' ) ) {

	class gen2_Theme_Options {
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'gen2_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'gen2_Theme_Options', 'register_settings' ) );
			}
		}

		// Returns all theme options
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		// Returns single theme option
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		//Add sub menu page
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Site Layout', 'gen2' ),
				esc_html__( 'Site Layout', 'gen2' ),
				'manage_options',
				'theme-settings',
				array( 'gen2_Theme_Options', 'create_admin_page' )
			);
		}

		//Register a setting and its sanitization callback
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'gen2_Theme_Options', 'sanitize' ) );
		}

		//Sanitization callback
		public static function sanitize( $options ) {
			// If we have options lets sanitize them
			if ( $options ) {

				// Above Header Wrapper
				if ( ! empty( $options['above_header_fullwidth'] ) ) {
					$options['above_header_fullwidth'] = 'on';
				} else {
					unset( $options['above_header_fullwidth'] ); // Remove from options if not checked
				}

				// Branding Wrapper
				if ( ! empty( $options['branding_fullwidth'] ) ) {
					$options['branding_fullwidth'] = 'on';
				} else {
					unset( $options['branding_fullwidth'] ); // Remove from options if not checked
				}

				// Navigation Wrapper
				if ( ! empty( $options['nav_fullwidth'] ) ) {
					$options['nav_fullwidth'] = 'on';
				} else {
					unset( $options['nav_fullwidth'] ); // Remove from options if not checked
				}

				// Content Wrapper
				if ( ! empty( $options['content_fullwidth'] ) ) {
					$options['content_fullwidth'] = 'on';
				} else {
					unset( $options['content_fullwidth'] ); // Remove from options if not checked
				}

				// Footer Wrapper
				if ( ! empty( $options['footer_fullwidth'] ) ) {
					$options['footer_fullwidth'] = 'on';
				} else {
					unset( $options['footer_fullwidth'] ); // Remove from options if not checked
				}

			}

			// Return sanitized options
			return $options;

		}

		//Settings page output
		public static function create_admin_page() { ?>

			<div class="wrap">
				<h1><?php esc_html_e( 'Theme Options', 'gen2' ); ?></h1>
				<form method="post" action="options.php">
					<?php settings_fields( 'theme_options' ); ?>
					<table class="form-table wpex-custom-admin-login-table">
						<tr>
							<td></td>
							<td>Width</td>
							<td>Alignment</td>
							<td>tbc</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Above Header:', 'gen2' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'above_header_fullwidth' ); ?>
								<input type="checkbox" name="theme_options[above_header_fullwidth]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Full Width?', 'gen2' ); ?>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Branding:', 'gen2' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'branding_fullwidth' ); ?>
								<input type="checkbox" name="theme_options[branding_fullwidth]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Full Width?', 'gen2' ); ?>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Navigation:', 'gen2' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'nav_fullwidth' ); ?>
								<input type="checkbox" name="theme_options[nav_fullwidth]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Full Width?', 'gen2' ); ?>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Content:', 'gen2' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'content_fullwidth' ); ?>
								<input type="checkbox" name="theme_options[content_fullwidth]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Full Width?', 'gen2' ); ?>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Footer:', 'gen2' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'footer_fullwidth' ); ?>
								<input type="checkbox" name="theme_options[footer_fullwidth]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Full Width?', 'gen2' ); ?>
							</td>
						</tr>
					</table>
					<?php submit_button(); ?>
				</form>
			</div><!-- .wrap -->
		<?php }
	}
}
new gen2_Theme_Options();

// Helper function to use in your theme to return a theme option value
function gen2_get_theme_option( $id = '' ) {
	return gen2_Theme_Options::get_theme_option( $id );
}

// USAGE
// $value = myprefix_get_theme_option( 'select_example' );
// echo $value;