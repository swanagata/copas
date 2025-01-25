<?php
/**
 * Plugin Name: Copas
 * Description: This plugin adds a customizable "Copy to Clipboard" button using the Classic Editor.
 * Version: 1.0
 * Author: Abdun Syakuur
 * Author URI: https://abduns.com
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * GitHub Plugin URI: https://github.com/swanagata/copas
 */

// Enqueue the main script.js file for the Copas plugin
function copas_enqueue_scripts() {
    // Add the main script.js file for the Copas plugin
    wp_enqueue_script(
        'copas',
        plugin_dir_url(__FILE__) . 'js/script.js',
        array(), // No dependencies
        '1.0', // Script version
        true // Load this script in the footer
    );
}

// Hook the 'copas_enqueue_scripts' function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'copas_enqueue_scripts');

// Add the 'copas' shortcode
function add_copas_button($atts) {
    $atts = shortcode_atts(
        array(
            'content' => '',
            'buttontext' => 'Copy',
            'successmessage' => 'Copied!',
            'classtext' => 'button',
        ),
        $atts,
        'copas'
    );

    return '
        <button class="' . esc_attr($atts['classtext']) . ' copy-btn" data-clipboard-text="' . esc_attr($atts['content']) . '" data-success-message="' . esc_attr($atts['successmessage']) . '">' . esc_html($atts['buttontext']) . '</button>
    ';
}

// Register the 'copas' shortcode with the function 'add_copas_button'
add_shortcode('copas', 'add_copas_button');
