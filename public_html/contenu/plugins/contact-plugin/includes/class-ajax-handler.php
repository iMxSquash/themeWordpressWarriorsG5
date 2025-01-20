<?php
class Amid_Contact_Ajax_Handler {
    public function __construct() {
        add_action('wp_ajax_amid_delete_message', array($this, 'delete_message'));
    }

    public function delete_message() {
        check_ajax_referer('amid_admin_nonce', 'nonce');
        
        $message_id = intval($_POST['message_id']);
        global $wpdb;
        
        $deleted = $wpdb->delete(
            $wpdb->prefix . 'amid_messages',
            array('id' => $message_id),
            array('%d')
        );

        wp_send_json_success($deleted);
    }
}

new Amid_Contact_Ajax_Handler();
