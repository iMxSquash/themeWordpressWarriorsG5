document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('amid-message-form');
    const formFields = {
        name: document.getElementById('name'),
        email: document.getElementById('email'),
        message: document.getElementById('message')
    };

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
    }

    if (form) {
        // Ajouter message d'aide pour l'email
        const emailInput = formFields.email;
        const helpText = document.createElement('div');
        helpText.className = 'help-text';
        helpText.style.cssText = `
            font-size: 0.75rem;
            color: #C81E1E;
            margin-top: 0.25rem;
            transition: all 0.3s ease;
            display: none;
        `;
        helpText.textContent = 'Veuillez entrer une adresse email valide (exemple@domaine.com)';
        emailInput.parentElement.appendChild(helpText);

        // Validation en temps réel pour tous les champs
        Object.values(formFields).forEach(field => {
            if (field) {
                field.addEventListener('blur', function() {
                    if (this.id === 'email') {
                        if (!this.value.trim()) {
                            showError(this, 'Ce champ est requis');
                            helpText.style.display = 'none';
                        } else if (!isValidEmail(this.value)) {
                            helpText.style.display = 'block';
                        } else {
                            clearError(this);
                            helpText.style.display = 'none';
                        }
                    } else if (!this.value.trim()) {
                        showError(this, 'Ce champ est requis');
                    } else {
                        clearError(this);
                    }
                });

                // Supprimer l'affichage du message pendant la saisie
                field.addEventListener('input', function() {
                    if (this.id === 'email') {
                        helpText.style.display = 'none';
                        if (!(this.value.trim() && !isValidEmail(this.value))) {
                            clearError(this);
                        }
                    } else {
                        if (this.value.trim()) {
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
