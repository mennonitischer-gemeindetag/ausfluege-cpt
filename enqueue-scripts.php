<?php
/**
 * enqueue scripts
 *
 * @package gemeindetag-ausfluege
 */

namespace gemeindetag\ausfluege;

add_action( 'init', __NAMESPACE__ . '\register_block_assets' );

/**
 * register block assets
 */
function register_block_assets() {
	register_block_type( _get_plugin_directory() . '/build/blocks/ausflug-meta/' );
	register_block_type( _get_plugin_directory() . '/build/blocks/ausfluege/' );
}
