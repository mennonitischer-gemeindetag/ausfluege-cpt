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

	$block_path          = '/build/index.js';
	$script_dependencies = ( include _get_plugin_directory() . '/build/index.asset.php' );
	wp_register_script(
		'gemeindetag-ausfluege-blocks',
		_get_plugin_url() . $block_path,
		array_merge( $script_dependencies['dependencies'], [] ),
		$script_dependencies['version'],
		false
	);

	$style_path = '/style.css';
	wp_register_style(
		'gemeindetag-ausfluege-blocks-styles',
		_get_plugin_url() . $style_path,
		[],
		$script_dependencies['version']
	);

	$editor_style_path = '/editor.css';
	wp_register_style(
		'gemeindetag-ausfluege-blocks-editor-styles',
		_get_plugin_url() . $editor_style_path,
		[],
		$script_dependencies['version']
	);

	register_block_type(
		'gemeindetag/ausfluege',
		[
			'editor_script'   => 'gemeindetag-ausfluege-blocks',
			'editor_style'    => 'gemeindetag-ausfluege-blocks-editor-styles',
			'style'           => 'gemeindetag-ausfluege-blocks-styles',
			'render_callback' => __NAMESPACE__ . '\gemeindetag_ausfluege_render_callback',
			'attributes'      => [
				'character' => [
					'type'    => 'string',
					'default' => 'A',
				],
			],
		]
	);

}
