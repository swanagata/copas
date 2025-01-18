<?php
/**
 * Plugin Name: Copas
 * Description: This plugin adds a customizable "Copy to Clipboard" button using the Classic Editor.
 * Version: 1.0
 * Author: Abdun Syakuur
 * Author URI: https://abduns.com
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Enqueue the necessary JavaScript files for the Copas plugin.
 *
 * This function includes the following scripts:
 * - The self-hosted clipboard.js library.
 * - The main script.js file for the Copas plugin.
 */
function copas_enqueue_scripts() {
    // Add the self-hosted clipboard.js library
    wp_enqueue_script(
        'clipboard-js',
        plugin_dir_url(__FILE__) . 'js/clipboardjs/clipboard.min.js',
        array(), // No dependencies
        '2.0.11', // Script version
        true // Load this script in the footer
    );

    // Add the main script.js file for the Copas plugin
    wp_enqueue_script(
        'copas',
        plugin_dir_url(__FILE__) . 'js/script.js',
        array('clipboard-js'), // This script depends on clipboard.js
        '1.0', // Script version
        true // Load this script in the footer
    );
}

// Hook the 'copas_enqueue_scripts' function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'copas_enqueue_scripts');

/**
 * Shortcode function to create a copy-to-clipboard button.
 *
 * Generates a button allowing users to copy specified content to their clipboard.
 * Several button attributes can be customized using shortcode parameters.
 *
 * @param array $atts {
 *     Optional. An array of attributes to customize the button.
 *
 *     @type string $content        Text to be copied to the clipboard. Default is empty.
 *     @type string $buttontext     The label displayed on the button. Default is 'Copy'.
 *     @type string $successmessage Message shown after a successful copy. Default is 'Copied!'.
 *     @type string $classtext      CSS class applied to the button. Default is 'button'.
 * }
 * @return string HTML button markup for copying content to the clipboard.
 */
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
