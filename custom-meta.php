<?php 
namespace gemeindetag\ausfluege;
//  Exit if accessed directly.
defined('ABSPATH') || exit;

$string = [
    'type' => 'string',
    'single' => true,
    'show_in_rest' => true,
];
$boolean = [
    'type' => 'boolean',
    'single' => true,
    'show_in_rest' => true,
];
$number = [
    'type' => 'number',
    'single' => true,
    'show_in_rest' => true,
];
$multiple_numbers = [
    'type' => 'number',
    'single' => false,
    'show_in_rest' => true,
];

register_post_meta( 'ausfluege', 'nr', $number );
register_post_meta( 'ausfluege', 'character', $string );
register_post_meta( 'ausfluege', 'beschreibung', $string );
register_post_meta( 'ausfluege', 'startZeit', $string );
register_post_meta( 'ausfluege', 'endZeit', $string );
register_post_meta( 'ausfluege', 'maxPlaetze', $number );
register_post_meta( 'ausfluege', 'beschraenkt', $boolean );
register_post_meta( 'ausfluege', 'preis', $number );
register_post_meta( 'ausfluege', 'registrationClosed', $boolean );
