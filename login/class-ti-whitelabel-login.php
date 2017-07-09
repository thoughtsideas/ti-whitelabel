<?php
/**
 * Customise the WordPress login view.
 *
 * @link       https://www.thoughtsideas.uk
 * @since      1.0.0
 *
 * @package    TI_Whitelabel
 * @subpackage TI_Whitelabel/login
 */

/**
 * Customise the WordPress login view.
 *
 * Defines the plugin name, version, and hooks.
 *
 * @package    TI_Whitelabel
 * @subpackage TI_Whitelabel/login
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 */
class TI_Whitelabel_Login {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the inline style to adjust the layout of the login view.
	 *
	 * @since    1.0.0
	 */
	public function login_head() {

		$args = apply_filters(
			'ti_customize_login_view',
			array()
		);

		// Don't make any changes if none are requested.
		if ( empty( $args ) ) {
			return;
		}

		$output = '<style type="text/css">';

		// Customize view background colour.
		if ( ! empty( $args['background-color'] ) ) {
			$output .= "body {\nbackground-color: " . esc_attr( $args['background-color'] ) . ";\n}\n";
		}

		$logo_css = 'background-size: 100%;';

		// Customize logo url.
		if ( ! empty( $args['logo']['url'] ) ) {
			$logo_css .= "background-image: url('" . esc_url( $args['logo']['url'] ) . "');";
		}

		// Customize logo width.
		if ( ! empty( $args['logo']['width'] ) ) {
			$logo_css .= esc_attr( 'width:' . $args['logo']['width'] . ';' );
		}

		// Customize logo height.
		if ( ! empty( $args['logo']['height'] ) ) {
			$logo_css .= esc_attr( 'height:' . $args['logo']['height'] . ';' );
		}

		// Customize Logo.
		if ( ! empty( $args['logo'] ) ) {
			$output .= sprintf( ".login h1 a {\n%s\n}\n", $logo_css );
		}

		// Customize text colour.
		if ( ! empty( $args['color'] ) ) {
			$output .= "body {\ncolor: " . esc_attr( $args['color'] ) . ";\n}\n";
		}

		// Customize link colours.
		if ( ! empty( $args['link'] ) ) {
			$output .= ".login #nav a,\n.login #backtoblog a {\ncolor: " . esc_attr( $args['link'] ) . ";\n}\n";
		}

		// Customize link hover.
		if ( ! empty( $args['hover'] ) ) {
			$output .= ".login #nav a:hover,\n.login #backtoblog a:hover {\ncolor: " . esc_attr( $args['hover'] ) . ";\n}\n";
		}

		$output .= '</style>';

		echo $output; // WPCS: XSS OK.

	}

}
