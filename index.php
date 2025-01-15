<?php
/**
 * Plugin Name: Kopituboard
 * Description: Adds a customizable "Copy to Clipboard" button with Kopituboard using the Classic Editor.
 * Version: 1.0
 * Author: Abdun Syakuur
 * Author URI: https://abduns.com
 */


/**
 * Enqueue scripts for the KopituBoard plugin.
 *
 * This function enqueues the necessary JavaScript files for the KopituBoard plugin.
 * It includes the self-hosted clipboard.js library and the main script.js file for the plugin.
 */
function kopituboard_enqueue_scripts() {
    // Enqueue the self-hosted clipboard.js library
    wp_enqueue_script(
        'clipboard-js',
        plugin_dir_url(__FILE__) . 'js/clipboardjs/clipboard.min.js', // Path to the clipboard.js file
        array(), // No dependencies
        '2.0.11', // Version of the script
        true // Load in the footer
    );

    // Enqueue the main script.js file for the KopituBoard plugin
    wp_enqueue_script(
        'kopituboard',
        plugin_dir_url(__FILE__) . 'js/script.js', // Path to the script.js file
        array('clipboard-js'), // Dependencies (clipboard.js)
        '1.0', // Version of the script
        true // Load in the footer
    );
}


// Hook the 'kopituboard_enqueue_scripts' function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'kopituboard_enqueue_scripts');


/**
 * Shortcode function to add a copy-to-clipboard button.
 *
 * This function generates a button that allows users to copy specified content to their clipboard.
 * The button text, success message, and CSS class can be customized via shortcode attributes.
 *
 * @param array $atts {
 *     Optional. An array of shortcode attributes.
 *
 *     @type string $content        The content to be copied to the clipboard. Default empty.
 *     @type string $buttontext     The text displayed on the button. Default 'Copy'.
 *     @type string $successmessage The message displayed after successful copy. Default 'Copied!'.
 *     @type string $classtext      The CSS class applied to the button. Default 'button'.
 * }
 * @return string HTML markup for the copy-to-clipboard button.
 */
function add_kopituboard_button($atts) {
    $atts = shortcode_atts(
        array(
            'content' => '',
            'buttontext' => 'Copy',
            'successmessage' => 'Copied!',
            'classtext' => 'button',
        ),
        $atts,
        'kopituboard'
    );

    return '
        <button class="' . esc_attr($atts['classtext']) . ' copy-btn" data-clipboard-text="' . esc_attr($atts['content']) . '" data-success-message="' . esc_attr($atts['successmessage']) . '">' . esc_html($atts['buttontext']) . '</button>
    ';
}

// Register the 'kopituboard' shortcode
add_shortcode('kopituboard', 'add_kopituboard_button');
