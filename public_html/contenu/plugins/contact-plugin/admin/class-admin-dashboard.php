<?php
class Amid_Admin_Contact_Dashboard {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
    }

    public function add_menu() {
        add_menu_page(
            'Gestion des messages',
            'Gestion des messages',
            'manage_options',
            'amid-messages',
            array($this, 'render_dashboard'),
            'dashicons-email',
            20
        );
    }

    public function enqueue_admin_scripts($hook) {
        if ('toplevel_page_amid-messages' !== $hook) return;

        wp_enqueue_style('amid-admin-css', plugin_dir_url(__FILE__) . 'css/admin.css', array(), '1.0');
        wp_enqueue_script('amid-admin', plugin_dir_url(__FILE__) . 'js/admin.js', array(), '1.0', true);
        wp_localize_script('amid-admin', 'amidAjax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('amid_admin_nonce')
        ));
    }

    public function render_dashboard() {
        include plugin_dir_path(__FILE__) . 'views/dashboard.php';
    }
}

new Amid_Admin_Contact_Dashboard();
