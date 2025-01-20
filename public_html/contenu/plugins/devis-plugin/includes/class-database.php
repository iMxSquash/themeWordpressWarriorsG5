<?php

if (!defined('ABSPATH')) {
    exit;
}

class Amid_Database {
    // Ajout des constantes de statut
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_COMPLETED = 'completed';
    
    public static function get_status_mapping() {
        return array(
            'en attente' => self::STATUS_PENDING,
            'en cours' => self::STATUS_PROCESSING,
            'terminé' => self::STATUS_COMPLETED
        );
    }

    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}amid_quotes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(20),
            destination VARCHAR(255),
            travel_date DATE,
            return_date DATE,
            participants INT,
            message TEXT,
            status VARCHAR(50) DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        try {
            dbDelta($sql);
        } catch (Exception $e) {
            error_log('Erreur lors de la création de la table amid_quotes: ' . $e->getMessage());
        }
    }

    public static function insert_quote($data) {
        global $wpdb;
        
        return $wpdb->insert(
            $wpdb->prefix . 'amid_quotes',
            array(
                'full_name' => sanitize_text_field($data['full_name']),
                'email' => sanitize_email($data['email']),
                'phone' => sanitize_text_field($data['phone']),
                'destination' => sanitize_text_field($data['destination']),
                'travel_date' => $data['travel_date'],
                'return_date' => $data['return_date'],
                'participants' => intval($data['participants']),
                'message' => sanitize_textarea_field($data['message'])
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s')
        );
    }
}
