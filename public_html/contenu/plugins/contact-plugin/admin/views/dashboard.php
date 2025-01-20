<?php
if (!defined('ABSPATH')) exit;

global $wpdb;
$table_name = $wpdb->prefix . 'amid_messages';
$messages = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");
?>

<div class="wrap">
    <h1 class="wp-heading-inline">Gestion des messages</h1>
    
    <div class="tablenav top">
        <div class="alignleft actions">
            <select id="bulk-action-selector-top">
                <option value="-1">Actions groupées</option>
                <option value="delete">Supprimer</option>
            </select>
            <input type="submit" class="button action" value="Appliquer">
        </div>
    </div>

    <table id="amid-messages-table" class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
                <tr data-id="<?php echo esc_attr($message->id); ?>">
                    <td><?php echo esc_html($message->id); ?></td>
                    <td><?php echo esc_html($message->full_name); ?></td>
                    <td><?php echo esc_html($message->email); ?></td>
                    <td><?php echo esc_html($message->message); ?></td>
                    <td><?php echo esc_html($message->created_at); ?></td>
                    <td>
                        <button class="button delete-message" data-id="<?php echo esc_attr($message->id); ?>">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
