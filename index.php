<?php
/**
 * Plugin Name: Kopituboard
 * Description: Adds a customizable "Copy to Clipboard" button with Kopituboard using the Classic Editor.
 * Version: 1.0
 * Author: Abdun Syakuur
 * Author URI: https://abduns.com
 */

function kopituboard_enqueue_scripts() {
    wp_enqueue_script(
        'clipboard-js',
        plugin_dir_url(__FILE__) . 'js/clipboardjs/clipboard.min.js', // Self-hosted clipboard.js
        array(),
        '2.0.11',
        true
    );

    wp_enqueue_script(
        'kopituboard',
        plugin_dir_url(__FILE__) . 'js/script.js',
        array('clipboard-js'),
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'kopituboard_enqueue_scripts');

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
add_shortcode('kopituboard', 'add_kopituboard_button');
