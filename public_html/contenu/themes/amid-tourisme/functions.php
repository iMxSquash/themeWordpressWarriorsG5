<?php
// Support FSE (Full Site Editing)

function amid_setup() {
    add_theme_support( 'block-templates' );
    add_theme_support('block-editor');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'amid_setup');

function amid_enqueue_scripts() {
  wp_enqueue_style('amid-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'amid_enqueue_scripts');

add_theme_support('block-template-parts');

// Ajouter le support des template parts
function amid_load_template_parts() {
    get_template_part('parts/header');
    get_template_part('parts/footer');
}
add_action('get_header', 'amid_load_template_parts');


// Support des fonctions classiques de WordPress
function amid_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'amid_theme_support');

function enqueue_404_styles() {
    if (is_404()) {
        wp_enqueue_style('amid-404', get_template_directory_uri() . '/assets/css/404.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_404_styles');