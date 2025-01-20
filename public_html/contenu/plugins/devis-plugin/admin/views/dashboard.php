<?php
if (!defined('ABSPATH')) exit;

global $wpdb;
$table_name = $wpdb->prefix . 'amid_quotes';
$quotes = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");
?>

<div class="wrap">
    <h1 class="wp-heading-inline">Gestion des devis</h1>
    <button id="export-quotes" class="page-title-action">Exporter en CSV</button>
    
    <div class="tablenav top">
        <div class="alignleft actions">
            <select id="bulk-action-selector-top">
                <option value="-1">Actions groupées</option>
                <option value="delete">Supprimer</option>
            </select>
            <input type="submit" class="button action" value="Appliquer">
        </div>
    </div>

    <table id="amid-quotes-table" class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Destination</th>
                <th>Dates</th>
                <th>Participants</th>
                <th>Statut</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quotes as $quote): ?>
                <tr data-id="<?php echo esc_attr($quote->id); ?>">
                    <td><?php echo esc_html($quote->id); ?></td>
                    <td><?php echo esc_html($quote->full_name); ?></td>
                    <td><?php echo esc_html($quote->email); ?></td>
                    <td><?php echo esc_html($quote->phone); ?></td>
                    <td><?php echo esc_html($quote->destination); ?></td>
                    <td><?php echo esc_html($quote->travel_date) . ' - ' . esc_html($quote->return_date); ?></td>
                    <td><?php echo esc_html($quote->participants); ?></td>
                    <td class="status-cell" data-status="<?php echo esc_attr($quote->status); ?>">
                        <select class="status-select" data-id="<?php echo esc_attr($quote->id); ?>">
                            <option value="en attente" <?php selected($quote->status, 'pending'); ?>>En attente</option>
                            <option value="en cours" <?php selected($quote->status, 'processing'); ?>>En cours</option>
                            <option value="terminé" <?php selected($quote->status, 'completed'); ?>>Terminé</option>
                        </select>
                    </td>
                    <td><?php echo esc_html($quote->created_at); ?></td>
                    <td>
                        <button class="button delete-quote" data-id="<?php echo esc_attr($quote->id); ?>">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
