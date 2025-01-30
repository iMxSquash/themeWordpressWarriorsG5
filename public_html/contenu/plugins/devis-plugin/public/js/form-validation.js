document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('amid-quote-form');
    const formFields = {
        name: document.getElementById('name'),
        email: document.getElementById('email'),
        phone: document.getElementById('phone'),
        type_voyage: document.getElementById('type_voyage'),
        destination: document.getElementById('destination'),
        travel_date: document.getElementById('travel_date'),
        return_date: document.getElementById('return_date'),
        participants: document.getElementById('participants')
    };

    // Configurer les dates minimales
    const today = new Date().toISOString().split('T')[0];
    formFields.travel_date.setAttribute('min', today);

    // Mettre à jour la date minimale de retour quand la date de départ change
    formFields.travel_date.addEventListener('change', function () {
        const selectedDate = new Date(this.value);
        const nextDay = new Date(selectedDate);
        nextDay.setDate(selectedDate.getDate() + 1);
        formFields.return_date.setAttribute('min', nextDay.toISOString().split('T')[0]);

        if (formFields.return_date.value && new Date(formFields.return_date.value) <= selectedDate) {
            formFields.return_date.value = nextDay.toISOString().split('T')[0];
        }
    });

    // Fonction pour afficher les erreurs
    function showError(element, message) {
        // Ajouter les styles d'erreur à l'élément avec !important
        element.style.cssText = `
            transition: border-color 0.3s ease !important;
            border-color: #C81E1E !important;
            border-width: 2px !important;
            border-style: solid !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
        `;

        // Créer ou mettre à jour le message d'erreur
        const errorDiv = element.parentElement.querySelector('.error-message') || createErrorElement(element);
        errorDiv.style.cssText = `
            transition: all 0.3s ease !important;
            color: #C81E1E !important;
            font-size: 0.75rem !important;
            margin-top: 0.25rem !important;
        `;
        errorDiv.textContent = message;
    }

    // Fonction pour créer l'élément d'erreur
    function createErrorElement(element) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message text-xs text-danger-700 mt-1';
        errorDiv.style.transition = 'all 0.3s ease';
        element.parentElement.appendChild(errorDiv);
        return errorDiv;
    }

    // Fonction pour nettoyer les erreurs
    function clearError(element) {
        // Réinitialiser les styles avec !important
        element.style.cssText = `
            transition: border-color 0.3s ease !important;
            border-color: rgba(12, 38, 77, 0.3) !important;
            border-width: 2px !important;
            border-style: solid !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
        `;

        const errorDiv = element.parentElement.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.remove();
        }
        element.classList.remove('error-field');
    }


    if (form) {
        // Validation en temps réel pour les champs requis
        Object.values(formFields).forEach(field => {
            if (field && field.hasAttribute('required')) {
                field.addEventListener('blur', function () {
                    if (!this.value.trim()) {
                        showError(this, 'Ce champ est requis');
                    } else if (this.id === 'email' && !isValidEmail(this.value)) {
                        showError(this, 'Adresse email invalide');
                    } else {
                        clearError(this);
                    }
                });

                field.addEventListener('input', function () {
                    if (this.value.trim()) {
                        if (this.id === 'email' && !isValidEmail(this.value)) {
                            showError(this, 'Adresse email invalide');
                        } else {
                            clearError(this);
                        }
                    }
                });
            }
        });
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});
