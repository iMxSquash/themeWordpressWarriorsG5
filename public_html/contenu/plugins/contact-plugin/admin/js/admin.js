document.addEventListener('DOMContentLoaded', function() {
    const messagesTable = document.getElementById('amid-messages-table');

    // Gestionnaires de table
    if (messagesTable) {
        // Gestion des suppressions
        messagesTable.addEventListener('click', e => {
            if (e.target.matches('.delete-message')) {
                deletemessage(e.target.dataset.id);
            }
        });
    }

    function deletemessage(id) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce devis ?')) return;

        fetch(amidAjax.ajax_url, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({
                action: 'amid_delete_message',
                nonce: amidAjax.nonce,
                message_id: id
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`tr[data-id="${id}"]`).remove();
            }
        });
    }
});
