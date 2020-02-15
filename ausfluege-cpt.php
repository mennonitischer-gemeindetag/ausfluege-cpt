<?php
/**
 * gemeindetag ausfluege cpt
 *
 * @package gemeindetag-ausfluege
 */

namespace gemeindetag\ausfluege;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * create custom post type ausfluege
 */
function custom_post_type_ausfluege() {
	$labels = [
		'name'               => __( 'Ausflüge', 'gemeindetag' ),
		'singular_name'      => __( 'Ausflug', 'gemeindetag' ),
		'menu_name'          => __( 'Ausflüge', 'gemeindetag' ),
		'parent_item_colon'  => __( 'Übergeordneter Ausflug', 'gemeindetag' ),
		'all_items'          => __( 'Alle Ausflüge', 'gemeindetag' ),
		'view_item'          => __( 'Ausflug Anzeigen', 'gemeindetag' ),
		'add_new_item'       => __( 'Neuen Ausflug hinzufügen', 'gemeindetag' ),
		'add_new'            => __( 'Neuen hinzufügen', 'gemeindetag' ),
		'edit_item'          => __( 'Ausflug bearbeiten', 'gemeindetag' ),
		'update_item'        => __( 'Ausflug Aktualisieren', 'gemeindetag' ),
		'search_items'       => __( 'Ausflug Suchen', 'gemeindetag' ),
		'not_found'          => __( 'Nichts gefunden', 'gemeindetag' ),
		'not_found_in_trash' => __( 'Nichts im Papierkorb gefunden', 'gemeindetag' ),
	];

	$args = [
		'labels'                => $labels,
		'description'           => __( 'Ausflüge', 'gemeindetag' ),
		'menu_icon'             => 'dashicons-location-alt',
		'supports'              => [ 'title', 'editor', 'thumbnail', 'meta', 'custom-fields'],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,
		'menu_position'         => 20,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rest_base'             => 'ausfluege',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'template'              => [
			[ 'core/paragraph', [ 'placeholder' => 'Beschreibung des Ausflüge...', ] ],
			[ 'gemeindetag/ausflug-meta', [] ],
			[ 'gemeindetag/anmeldungen', [] ],
		],
		'template_lock'         => 'all', // or 'insert' to allow moving
	];
	register_post_type( 'ausfluege', $args );

}
add_action( 'init', __NAMESPACE__ . '\custom_post_type_ausfluege', 0 );
