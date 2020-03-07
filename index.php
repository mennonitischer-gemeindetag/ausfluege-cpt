<?php
/**
 * Plugin Name: Ausfluege Custom Post Type
 * Description: WordPress CPT Ausfluege.
 * Author: Fabian Kägy
 * Author URI: fabian-kaegy.de
 * Version: 1.0.0
 * License: UNLICENSED
 *
 * @package gemeindetage-ausfluege
 */

namespace gemeindetag\ausfluege;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * get plugin directory
 */
function _get_plugin_directory() {
	return __DIR__;
}

/**
 * get plugin url
 */
function _get_plugin_url() {
	static $plugin_url;

	if ( empty( $plugin_url ) ) {
		$plugin_url = plugins_url( null, __FILE__ );
	}

	return $plugin_url;
}

/**
 * Initialize the Custom Post Type Projects
 */
require _get_plugin_directory() . '/enqueue-scripts.php';
require _get_plugin_directory() . '/ausfluege-cpt.php';
require _get_plugin_directory() . '/ausfluege.php';
require _get_plugin_directory() . '/custom-meta.php';
