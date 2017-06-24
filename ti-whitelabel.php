<?php
/**
 * TI Whitelabel
 *
 * @author            Thoughts & Ideas <hello@thoughtsideas.uk>
 * @link              https://thoughtsideas.uk
 * @copyright         Copyright (c) 2017 Thoughts & Ideas
 * @license           https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @version           0.1.0
 * @package           TI_Whitelabel
 *
 * @wordpress-plugin
 * Plugin Name:       [TI] Whitelabel
 * Plugin URI:        http://www.thoughtsideas.uk
 * Description:       Whitelabel the WordPress Admin area.
 * Version:           0.1.0
 * Author:            Thoughts & Ideas
 * Author URI:        https://www.thoughtsideas.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ti-whitelabel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ti-whitelabel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_ti_whitelabel() {

	$plugin = new TI_Whitelabel();
	$plugin->run();

}

run_ti_whitelabel();
