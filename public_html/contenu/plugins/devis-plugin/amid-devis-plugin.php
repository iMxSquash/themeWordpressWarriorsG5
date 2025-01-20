<?php
/**
 * Plugin Name: Amid Devis Plugin
 * Plugin URI: https://amid-tourisme-voyage.dz/
 * Description: Plugin de formulaire de devis personnalisé pour Amid Tourisme & Voyage.
 * Version: 1.0
 * Author: Elwen / Célia
 */

// Sécurité : Empêche un accès direct au fichier.
if (!defined('ABSPATH')) {
    exit;
}

// Inclure les fichiers nécessaires.
require_once plugin_dir_path(__FILE__) . 'includes/class-ajax-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-database.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-email-notification.php';
require_once plugin_dir_path(__FILE__) . 'includes/quote-form-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/quote-form-shortcode.php';
require_once plugin_dir_path(__FILE__) . 'admin/class-admin-dashboard.php';

// Vérifier si WP Mail SMTP est actif
function amid_check_smtp_plugin() {
    if (!is_plugin_active('wp-mail-smtp/wp_mail_smtp.php')) {
        add_action('admin_notices', 'amid_smtp_missing_notice');
    }
}
add_action('admin_init', 'amid_check_smtp_plugin');

function amid_smtp_missing_notice() {
    ?>
    <div class="notice notice-error">
        <p><?php _e('Le plugin "WP Mail SMTP" est requis pour le bon fonctionnement des envois d\'emails. Veuillez l\'installer et l\'activer.', 'amid-devis'); ?></p>
    </div>
    <?php
}

// Fonction d'activation du plugin
function amid_activate_plugin() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-database.php';
    Amid_Database::create_tables();
}
register_activation_hook(__FILE__, 'amid_activate_plugin');

// Configurer les options recommandées pour WP Mail SMTP
function amid_configure_smtp_settings() {
    if (!get_option('wp_mail_smtp')) {
        $options = array(
            'mail' => array(
                'from_email' => get_option('admin_email'),
                'from_name' => get_option('blogname'),
            ),
            'mailer' => 'sendinblue',
            'smtp' => array(
                'auth' => true,
                'encryption' => 'tls',
            )
        );
        update_option('wp_mail_smtp', $options);
    }
}
register_activation_hook(__FILE__, 'amid_configure_smtp_settings');

// Enqueue des styles
function amid_enqueue_styles() {
    wp_enqueue_style(
        'amid-tailwind', 
        plugin_dir_url(__FILE__) . 'public/css/main.min.css',
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'public/css/main.min.css')
    );
}
add_action('wp_enqueue_scripts', 'amid_enqueue_styles');
