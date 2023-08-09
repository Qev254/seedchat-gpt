<?php
/**
 * Plugin Name: SeedChat GPT
 * Description: A simple GPT-powered chatbot for your website.
 * Version: 1.0
 * Author: Joxdigital.com
 */

// Enqueue styles and scripts
function seedchat_gpt_enqueue_scripts() {
    wp_enqueue_style('seedchat-gpt-style', plugin_dir_url(__FILE__) . 'assets/css/SeedChat-GPT.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('seedchat-gpt-script', plugin_dir_url(__FILE__) . 'assets/js/SeedChat-GPT.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'seedchat_gpt_enqueue_scripts');

// Chatbot shortcode
function seedchat_gpt_chatbot_shortcode() {
    ob_start();
    ?>
    <div id="seedchat-gpt-chatbot">
        <div id="seedchat-gpt-conversation"></div>
        <div id="seedchat-gpt-input">
            <input type="text" id="seedchat-gpt-message" placeholder="Type your message...">
            <button id="seedchat-gpt-submit">Send</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('seedchat-gpt', 'seedchat_gpt_chatbot_shortcode');

// Initialize the chatbot
function seedchat_gpt_initialize_chatbot() {
    ?>
    <script>
        jQuery(document).ready(function($) {
            // Initialize chatbot UI and interaction
            // Your JavaScript code for chatbot interaction goes here
        });
    </script>
    <?php
}
add_action('wp_footer', 'seedchat_gpt_initialize_chatbot');

// Activation hook
function seedchat_gpt_activation_hook() {
    // Code to run on plugin activation
}
register_activation_hook(__FILE__, 'seedchat_gpt_activation_hook');
