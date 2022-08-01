<?php
/**
 * Operations of the plugin are included here.
 *
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function so17687619_jquery_add_inline() {
    wp_add_inline_script( 'jquery-core', '$ = jQuery;' );
}
add_action( 'wp_enqueue_scripts', 'so17687619_jquery_add_inline' );

function yapifenfilter_enqueue_style(){
  wp_enqueue_style( 'bootstrapcss','https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css', false, null );
  wp_enqueue_style( 'yapifenfilter_css', PREFIX_STARTER_PLUGIN_URL_CSS . 'yapifen-filter-main.css' , false, null );
}
function yapifenfilter_enqueue_script() {
  wp_enqueue_script( 'bootstapjs', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js', false, null );
  wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, null );
  wp_enqueue_script( 'yapifenfilter_js', PREFIX_STARTER_PLUGIN_URL_JS . 'yapifen-filter-main.js', false, null );
}

add_action( 'wp_enqueue_scripts', 'yapifenfilter_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'yapifenfilter_enqueue_script' );

require_once(PREFIX_STARTER_PLUGIN_DIR . 'includes/cpt-taxonomies.php');

// Add Shortcode
function get_filtering() {
    require_once( PREFIX_STARTER_PLUGIN_DIR . 'includes/filtering-table.php' );
}
add_shortcode( 'get_filtering', 'get_filtering' );
