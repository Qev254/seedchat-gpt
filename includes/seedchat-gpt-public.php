<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles and scripts trySeedChat-GPT
function seedchat_gpt_enqueue_scripts() {
    wp_enqueue_style('seedchat-gpt-style', plugin_dir_url(__FILE__) . '../assets/css/seedchat-gpt.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('seedchat-gpt-script', plugin_dir_url(__FILE__) . '../assets/js/seedchat-gpt.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'seedchat_gpt_enqueue_scripts');

// Display chatbot interface
function seedchat_gpt_display_chatbot() {
    ?>
    <div id="seedchat-gpt-chatbot" class="seedchat-gpt-chatbot">
        <div id="seedchat-gpt-conversation" class="seedchat-gpt-conversation"></div>
        <div class="seedchat-gpt-input">
            <input type="text" id="seedchat-gpt-message" placeholder="Type your message...">
            <button id="seedchat-gpt-submit">Send</button>
        </div>
    </div>
    <?php
}

// API endpoint for chatbot interaction
function seedchat_gpt_api_endpoint() {
    // Define the endpoint URL
    $endpoint_url = 'https://api.openai.com/v1/chat/completions';

    // Return the endpoint URL
    return $endpoint_url;
}


// Create shortcode for displaying chatbot
function seedchat_gpt_chatbot_shortcode() {
    ob_start();
    seedchat_gpt_display_chatbot();
    return ob_get_clean();
}
add_shortcode('seedchat_gpt_chatbot', 'seedchat_gpt_chatbot_shortcode');
