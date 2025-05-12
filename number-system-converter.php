<?php
/*
Plugin Name: Number System Converter
Plugin URI: https://github.com/ajayraikvar/number-system-converter
Description: Convert numbers between binary, decimal, octal, and hexadecimal systems with modern UI and admin settings.
Version: 1.1.0
Author: Ajay Raikvar
Author URI: https://github.com/ajayraikvar
*/

define('NSC_PLUGIN_VERSION', '1.1.0');
define('NSC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NSC_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load required files
include_once NSC_PLUGIN_DIR . 'admin/admin-menu.php';
include_once NSC_PLUGIN_DIR . 'includes/converter-ui.php';
include_once NSC_PLUGIN_DIR . 'includes/functions.php';
include_once NSC_PLUGIN_DIR . 'includes/update-checker.php';

// Enqueue styles and scripts
function nsc_enqueue_assets() {
    wp_enqueue_style('nsc-style', NSC_PLUGIN_URL . 'assets/css/style.css', [], NSC_PLUGIN_VERSION);
    wp_enqueue_script('nsc-script', NSC_PLUGIN_URL . 'assets/js/converter.js', ['jquery'], NSC_PLUGIN_VERSION, true);
}
add_action('wp_enqueue_scripts', 'nsc_enqueue_assets');

// Register shortcode
function nsc_register_shortcode() {
    add_shortcode('number_converter', 'nsc_display_converter_ui');
}
add_action('init', 'nsc_register_shortcode');
