<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.thoughtsideas.uk
 * @since      0.1.0
 *
 * @package    TI_Whitelabel
 * @subpackage TI_Whitelabel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1.0
 * @package    TI_Whitelabel
 * @subpackage TI_Whitelabel/includes
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 */
class TI_Whitelabel_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ti-whitelabel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
