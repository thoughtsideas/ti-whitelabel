<?php
/**
 * Customise the WordPress admin footer content.
 *
 * @link           https://www.thoughtsideas.uk
 * @since          0.2.0
 *
 * @package        TI_Whitelabel
 * @subpackage     TI_Whitelabel/Admin
 */

/**
 * Customise the WordPress admin content.
 *
 * Defines the plugin name, version, and hooks.
 *
 * @package        TI_Whitelabel
 * @subpackage     TI_Whitelabel/Admin
 * @author         Thoughts & Ideas <hello@thoughtsideas.uk>
 */
class TI_Whitelabel_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since         0.2.0
	 * @access        private
	 * @var           string $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since         0.2.0
	 * @access        private
	 * @var           string $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since         0.2.0
	 * @param         string $plugin_name       The name of the plugin.
	 * @param         string $version           The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Change Admin Footer content.
	 *
	 * @since         0.2.0
	 */
	public function admin_footer_text() {

		$string = sprintf(
			'%1$s <a href="%3$s" target="_blank">%2$s</a>.',
			esc_html( 'Created by', 'ti-admin' ),
			esc_html( 'Thoughts & Ideas', 'ti-admin' ),
			esc_url( 'https://www.thoughtsideas.uk/' )
		);

		$allowed_html = array(
			'a'       => array(
				'href'   => array(),
				'title'  => array(),
				'target' => array(),
			),
			'strong'  => array(),
			'em'      => array(),
		);

		$allowed_protocols = array(
			'http',
			'https',
			'matilto',
		);

		/**
		 * Filters the admin footer text.
		 *
		 * @since   0.2.0
		 *
		 * @param string $string Content to output.
		 */
		$string = apply_filters(
			'ti_whitelabel_admin_footer_text',
			$string
		);

		/**
		 * Filters the admin footer allowed HTML.
		 *
		 * @since   0.2.0
		 *
		 * @param array $allowed_html Allowed elements in output.
		 */
		$allowed_html = apply_filters(
			'ti_whitelabel_admin_footer_allowed_html',
			$allowed_html
		);

		/**
		 * Filters the admin footer allowed protocals.
		 *
		 * @since   0.2.0
		 *
		 * @param array $allowed_protocols Allowed protocols in output.
		 */
		$allowed_protocols = apply_filters(
			'ti_whitelabel_admin_footer_allowed_protocols',
			$allowed_protocols
		);

		return wp_kses(
			$string,
			$allowed_html,
			$allowed_protocols
		);

	}

}
