<?php
/*
Plugin Name: Simple Social Share Plugin
Description: Add social sharing buttons to posts and pages.
Version: 1.0
Author: Samuel Barden
Author: https://samuelbarden.com
*/

function display_social_share_buttons($content) {
    // Get the current post/page URL
    $post_url = get_permalink();

    // Create the sharing buttons HTML
    $share_buttons = '
        <div class="social-share">
            <a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url($post_url) . '" target="_blank" class="share-button share-facebook">Facebook</a>
            <a href="https://twitter.com/intent/tweet?url=' . esc_url($post_url) . '" target="_blank" class="share-button share-twitter">Twitter</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=' . esc_url($post_url) . '" target="_blank" class="share-button share-linkedin">LinkedIn</a>
            <a href="https://t.me/share/url?url=' . esc_url($post_url) . '" target="_blank" class="share-button share-telegram">Telegram</a>
            <a href="https://api.whatsapp.com/send?text=' . esc_url($post_url) . '" target="_blank" class="share-button share-whatsapp">WhatsApp</a>
        </div>
    ';

    // Append the sharing buttons to the content
    $content .= $share_buttons;

    // Return the modified content
    return $content;
}

// Hook to display the sharing buttons on posts and pages
add_filter('the_content', 'display_social_share_buttons');
add_filter('the_content_page', 'display_social_share_buttons');

// Enqueue styles
function enqueue_social_share_styles() {
    wp_enqueue_style('social-share-styles', plugin_dir_url(__FILE__) . 'social-share-styles.css');
}

// Hook to enqueue styles
add_action('wp_enqueue_scripts', 'enqueue_social_share_styles');
