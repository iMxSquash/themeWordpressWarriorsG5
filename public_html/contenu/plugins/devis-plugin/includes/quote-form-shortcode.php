<?php
if (!defined('ABSPATH')) {
    exit;
}

// Shortcode pour afficher le formulaire de devis.
function amid_quote_form_shortcode() {
    return amid_render_quote_form();
}
add_shortcode('amid_quote_form', 'amid_quote_form_shortcode');