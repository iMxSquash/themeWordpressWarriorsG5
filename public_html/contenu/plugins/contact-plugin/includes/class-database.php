<?php

if (!defined('ABSPATH')) {
    exit;
}

class Amid_Contact_Database {
    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}amid_messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        try {
            dbDelta($sql);
        } catch (Exception $e) {
            error_log('Erreur lors de la création de la table amid_messages: ' . $e->getMessage());
        }
    }

    public static function insert_message($data) {
        global $wpdb;
        
        return $wpdb->insert(
            $wpdb->prefix . 'amid_messages',
            array(
                'full_name' => sanitize_text_field($data['full_name']),
                'email' => sanitize_email($data['email']),
                'message' => sanitize_textarea_field($data['message'])
            ),
            array('%s', '%s', '%s')
        );
    }
}
