<?php
/**
 * Customise the WordPress login view.
 *
 * @link       https://www.thoughtsideas.uk
 * @since      0.1.0
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
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
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
	 * @since    0.1.0
	 */
	public function login_head() {

		$args = apply_filters(
			'ti_whitelable_login_css',
			array()
		);

		// Don't make any changes if none are requested.
		if ( empty( $args ) ) {
			return;
		}

		$before_output = '<style type="text/css">';
		$output = '';
		$after_output .= '</style>';

		// Customize view background colour.
		if ( ! empty( $args['background-color'] ) ) {
			$output .= "body {\nbackground-color: " . esc_attr( $args['background-color'] ) . ";\n}\n";
		}

		// Customize Logo.
		if ( ! empty( $args['logo'] ) ) {
			$output .= sprintf( ".login h1 a {\n%s\n}\n", self::custom_logo( $args['logo'] ) );
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

		/**
		 * Filters the login view CSS output.
		 *
		 * @since   0.1.0
		 *
		 * @param string $output CSS styles for login view.
		 */
		$output = apply_filters(
			'ti_whitelable_login_css_output',
			$output
		);

		echo $before_output . $output . $after_output; // WPCS: XSS OK.

	}

	/**
	 * Attributes for logo CSS class.
	 *
	 * @since    0.1.0
	 *
	 * @param array $args Options for logo.
	 */
	public function custom_logo( $args = null ) {

		$logo_css = 'background-size: 100%;';

		// Customize logo url.
		if ( ! empty( $args['url'] ) ) {
			$logo_css .= "background-image: url('" . esc_url( $args['url'] ) . "');";
		}

		// Customize logo width.
		if ( ! empty( $args['width'] ) ) {
			$logo_css .= esc_attr( 'width:' . $args['width'] . ';' );
		}

		// Customize logo height.
		if ( ! empty( $args['height'] ) ) {
			$logo_css .= esc_attr( 'height:' . $args['height'] . ';' );
		}

		return $logo_css;

	}

	/**
	 * Use custom login header url.
	 *
	 * @since    0.1.0
	 *
	 * @return string Website URL from options table
	 */
	public function login_headerurl() {

		/**
		 * Filters the login_headurl output.
		 *
		 * @since   0.1.0
		 *
		 * @param string home_url() Home url output from options table.
		 */
		return apply_filters(
			'ti_whitelabel_login_header_url',
			home_url()
		);

	}

	/**
	 * Use custom login header url.
	 *
	 * @since    0.1.0
	 *
	 * @return string Website URL from options table
	 */
	public function login_headertitle() {

		$output = get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );

		/**
		 * Filters the `login_headertitle` output.
		 *
		 * @since   0.1.0
		 *
		 * @param string $output Blog Name and Description from options table.
		 */
		return apply_filters(
			'ti_whitelabel_login_header_title',
			$output
		);

	}

}
