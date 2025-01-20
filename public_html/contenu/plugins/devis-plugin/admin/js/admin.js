document.addEventListener('DOMContentLoaded', function() {
    const quotesTable = document.getElementById('amid-quotes-table');
    const exportBtn = document.getElementById('export-quotes');
    
    if (exportBtn) {
        exportBtn.addEventListener('click', exportQuotes);
    }

    // Gestionnaires de table
    if (quotesTable) {
        // Gestion des suppressions
        quotesTable.addEventListener('click', e => {
            if (e.target.matches('.delete-quote')) {
                deleteQuote(e.target.dataset.id);
            }
        });

        // Gestion des changements de statut
        quotesTable.addEventListener('change', e => {
            if (e.target.matches('.status-select')) {
                const id = e.target.dataset.id;
                const newStatus = e.target.value;
                console.log('Changement de statut d��tect��:', { id, newStatus });
                updateStatus(id, newStatus);
            }
        });
    }

    function updateStatus(id, status) {
        console.log('D��but updateStatus:', { id, status });
        const selectElement = document.querySelector(`tr[data-id="${id}"] .status-select`);
        const statusCell = document.querySelector(`tr[data-id="${id}"] .status-cell`);
        
        if (!selectElement || !statusCell) {
            console.error('�0�7l��ments non trouv��s:', { selectElement, statusCell });
            return;
        }

        selectElement.disabled = true;
        
        fetch(amidAjax.ajax_url, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({
                action: 'amid_update_status',
                nonce: amidAjax.nonce,
                quote_id: id,
                status: status
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('R��ponse serveur:', data);
            selectElement.disabled = false;
            
            if (data.success) {
                statusCell.dataset.status = data.data.status;
                selectElement.value = status;
            } else {
                console.error('Erreur lors de la mise �� jour:', data);
                alert('Erreur lors de la mise �� jour du statut');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            selectElement.disabled = false;
            alert('Erreur lors de la mise �� jour du statut');
        });
    }

    function deleteQuote(id) {
        if (!confirm('�0�8tes-vous s�0�4r de vouloir supprimer ce devis ?')) return;

        fetch(amidAjax.ajax_url, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({
                action: 'amid_delete_quote',
                nonce: amidAjax.nonce,
                quote_id: id
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`tr[data-id="${id}"]`).remove();
            }
        });
    }

    function exportQuotes() {
        window.location.href = `${amidAjax.ajax_url}?action=amid_export_quotes&nonce=${amidAjax.nonce}`;
    }
});
