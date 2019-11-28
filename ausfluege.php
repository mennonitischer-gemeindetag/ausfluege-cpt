<?php 

namespace gemeindetag\ausfluege;

//  Exit if accessed directly.
defined('ABSPATH') || exit;

function gemeindetag_ausfluege_render_callback( $attributes, $content ) {    
    ob_start();
    ?> <div class="wp-block-ausfluegecpt-ausfluege"><?php
    $args = [ 
        'post_type' => 'ausfluege',
        'posts_per_page' => 99,
        "order" => "ASC",
        'meta_key' => 'character',
	    'meta_value' => $attributes['character'],
	    'meta_compare' => '='
    ];
    
    $ausfluege_query = new \WP_Query($args); 
    if ($ausfluege_query->have_posts()) : while($ausfluege_query->have_posts()) : $ausfluege_query->the_post(); ?> 
        <?php include _get_plugin_directory() . '/ausflug.php'; ?>

    <?php endwhile; else : ?>

        <p>Keine Ausflüge</p>
    
    <?php endif; 
    
    wp_reset_postdata(); 

    ?></div><?php

    $data = ob_get_clean();

    return $data;
}