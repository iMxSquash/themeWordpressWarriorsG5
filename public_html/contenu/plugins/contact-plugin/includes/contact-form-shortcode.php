<?php
if (!defined('ABSPATH')) {
    exit;
}

// Shortcode pour afficher le formulaire de devis.
function amid_message_form_shortcode() {
    return amid_render_message_form();
}
add_shortcode('amid_message_form', 'amid_message_form_shortcode');