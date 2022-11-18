<?php
/**
 * Plugin Name: Yapıfen Filtering
 * Plugin URI: https://yapifen.com.tr
 * Description: Yapıfen firması için geliştirilmiş özel wordpress eklentisidir.
 * Author: Ali GÜNDÜZ
 * Author URI: https://aliguduz.com
 * Version: 1.5.1
 * Text Domain: yapifen_filtering
 * License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Define constants
 *
 * @since 1.0
 */
if ( ! defined( 'PREFIX_VERSION_NUM' ) ) 		define( 'PREFIX_VERSION_NUM'		, '1.0' ); // Plugin version constant
if ( ! defined( 'PREFIX_STARTER_PLUGIN' ) )		define( 'PREFIX_STARTER_PLUGIN'		, trim( dirname( plugin_basename( __FILE__ ) ), '/' ) ); // Name of the plugin folder eg - 'starter-plugin'
if ( ! defined( 'PREFIX_STARTER_PLUGIN_DIR' ) )	define( 'PREFIX_STARTER_PLUGIN_DIR'	, plugin_dir_path( __FILE__ ) ); // Plugin directory absolute path with the trailing slash. Useful for using with includes eg - /var/www/html/wp-content/plugins/starter-plugin/
if ( ! defined( 'PREFIX_STARTER_PLUGIN_URL' ) )	define( 'PREFIX_STARTER_PLUGIN_URL'	, plugin_dir_url( __FILE__ ) ); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/starter-plugin/
if ( ! defined( 'PREFIX_STARTER_PLUGIN_URL_JS' ) )	define( 'PREFIX_STARTER_PLUGIN_URL_JS'	, plugin_dir_url( __FILE__ ) . '/includes/assets/js/' ); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/starter-plugin/
if ( ! defined( 'PREFIX_STARTER_PLUGIN_URL_CSS' ) )	define( 'PREFIX_STARTER_PLUGIN_URL_CSS'	, plugin_dir_url( __FILE__ ) . '/includes/assets/css/' ); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/starter-plugin/

/**
 * Database upgrade todo
 *
 * @since 1.0
 */
function prefix_upgrader() {

	// Get the current version of the plugin stored in the database.
	$current_ver = get_option( 'abl_prefix_version', '0.0' );

	// Return if we are already on updated version.
	if ( version_compare( $current_ver, PREFIX_VERSION_NUM, '==' ) ) {
		return;
	}

	// This part will only be excuted once when a user upgrades from an older version to a newer version.

	// Finally add the current version to the database. Upgrade todo complete.
	update_option( 'abl_prefix_version', PREFIX_VERSION_NUM );
}
add_action( 'admin_init', 'prefix_upgrader' );

// Load everything
require_once( PREFIX_STARTER_PLUGIN_DIR . 'loader.php' );

// Register activation hook (this has to be in the main plugin file or refer bit.ly/2qMbn2O)
register_activation_hook( __FILE__, 'prefix_activate_plugin' );

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', PREFIX_STARTER_PLUGIN_DIR . '/includes/acf/' );
define( 'MY_ACF_URL', PREFIX_STARTER_PLUGIN_URL . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }
