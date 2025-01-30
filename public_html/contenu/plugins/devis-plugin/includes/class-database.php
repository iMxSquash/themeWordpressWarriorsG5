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
            type_voyage VARCHAR(50),
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
        error_log('Données reçues : ' . print_r($data, true));
        
        $columns = array(
            'full_name' => '%s',
            'email' => '%s',
            'phone' => '%s',
            'type_voyage' => '%s',
            'destination' => '%s',
            'travel_date' => '%s',
            'return_date' => '%s',
            'participants' => '%d',
            'message' => '%s'
        );

        // Assurez-vous que toutes les colonnes existent
        $table_name = $wpdb->prefix . 'amid_quotes';
        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'");
        
        if ($table_exists) {
            $column_exists = $wpdb->get_var("SHOW COLUMNS FROM {$table_name} LIKE 'type_voyage'");
            if (!$column_exists) {
                $wpdb->query("ALTER TABLE {$table_name} ADD COLUMN type_voyage VARCHAR(50) AFTER destination");
            }
        }
        
        return $wpdb->insert(
            $table_name,
            $data,
            array_values($columns)
        );
    }
}
