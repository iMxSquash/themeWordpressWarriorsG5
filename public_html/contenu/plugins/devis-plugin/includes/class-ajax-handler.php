<?php
class Amid_Ajax_Handler {
    public function __construct() {
        add_action('wp_ajax_amid_delete_quote', array($this, 'delete_quote'));
        add_action('wp_ajax_amid_update_status', array($this, 'update_status'));
        add_action('wp_ajax_amid_export_quotes', array($this, 'export_quotes'));
    }

    public function delete_quote() {
        check_ajax_referer('amid_admin_nonce', 'nonce');
        
        $quote_id = intval($_POST['quote_id']);
        global $wpdb;
        
        $deleted = $wpdb->delete(
            $wpdb->prefix . 'amid_quotes',
            array('id' => $quote_id),
            array('%d')
        );

        wp_send_json_success($deleted);
    }

    public function update_status() {
        check_ajax_referer('amid_admin_nonce', 'nonce');
        global $wpdb;
        
        $quote_id = intval($_POST['quote_id']);
        $status_fr = sanitize_text_field($_POST['status']);
        
        error_log('Données reçues brutes - ID: ' . $quote_id . ', Status FR: ' . $status_fr);
        
        // Mapping des statuts
        $status_map = array(
            'en attente' => 'pending',
            'en cours' => 'processing',
            'terminé' => 'completed'
        );
        
        if (!array_key_exists($status_fr, $status_map)) {
            error_log('Statut invalide reçu : ' . $status_fr);
            error_log('Statuts valides : ' . implode(', ', array_keys($status_map)));
            wp_send_json_error('Statut invalide : ' . $status_fr);
            return;
        }
        
        $status_en = $status_map[$status_fr];
        error_log('Conversion du statut : ' . $status_fr . ' => ' . $status_en);
        
        $result = $wpdb->update(
            $wpdb->prefix . 'amid_quotes',
            array('status' => $status_en),
            array('id' => $quote_id),
            array('%s'),
            array('%d')
        );
        
        if ($result === false) {
            error_log('Erreur de mise à jour MySQL : ' . $wpdb->last_error);
            wp_send_json_error('Erreur de mise à jour');
            return;
        }
        
        // Vérification après mise à jour
        $new_status = $wpdb->get_var($wpdb->prepare(
            "SELECT status FROM {$wpdb->prefix}amid_quotes WHERE id = %d",
            $quote_id
        ));
        error_log('Statut après mise à jour en base : ' . $new_status);
        
        wp_send_json_success(array(
            'status' => $status_en,
            'status_fr' => $status_fr,
            'quote_id' => $quote_id
        ));
    }

    public function export_quotes() {
        check_ajax_referer('amid_admin_nonce', 'nonce');
        
        global $wpdb;
        $quotes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}amid_quotes ORDER BY created_at DESC");
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="devis-export-' . date('Y-m-d') . '.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Nom', 'Email', 'Téléphone', 'Destination', 'Date départ', 'Date retour', 'Participants', 'Message', 'Statut', 'Date création'));
        
        foreach ($quotes as $quote) {
            fputcsv($output, array(
                $quote->id,
                $quote->full_name,
                $quote->email,
                $quote->phone,
                $quote->destination,
                $quote->travel_date,
                $quote->return_date,
                $quote->participants,
                $quote->message,
                $quote->status,
                $quote->created_at
            ));
        }
        
        fclose($output);
        exit;
    }
}

new Amid_Ajax_Handler();
