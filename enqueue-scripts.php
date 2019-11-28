<?php

namespace gemeindetag\ausfluege;

add_action('init', __NAMESPACE__.'\register_block_assets');

function register_block_assets() {

	$block_path = "/build/index.js";
    $script_dependencies = ( include _get_plugin_directory() . '/build/index.asset.php' );
	wp_register_script(
		'gemeindetag-ausfluege-blocks',
		_get_plugin_url() . $block_path,
		array_merge( $script_dependencies['dependencies'], [] ),
		$script_dependencies['version']
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
	
    register_block_type( 'gemeindetag/ausfluege', [
		'editor_script' => 'gemeindetag-ausfluege-blocks',
		'editor_style' => 'gemeindetag-ausfluege-blocks-editor-styles',
		'style' => 'gemeindetag-ausfluege-blocks-styles',
		'render_callback' => __NAMESPACE__.'\gemeindetag_ausfluege_render_callback',
		'attributes'      => [
            'character'    => [
                'type'      => 'string',
                'default'   => 'A',
			]
		]
	 ] );
    
}


add_action('init', __NAMESPACE__.'\enqueue_frontend_assets');

function enqueue_frontend_assets() {

	// If in the backend, bail out.
	if ( is_admin() ) {
		return;
	}

	$frontend_path = '/build/frontend.js';
	$frontend_dependencies = ( include _get_plugin_directory() . '/build/frontend.asset.php' );
	wp_enqueue_script(
		'gemeindetag-ausfluege-blocks-frontend',
		_get_plugin_url() . $frontend_path,
		array_merge( $frontend_dependencies['dependencies'], [] ),
		$frontend_dependencies['version']
	);
}