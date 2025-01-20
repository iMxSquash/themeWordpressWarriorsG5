document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('amid-message-form');
    
    if (form) {
        form.addEventListener('submit', validateForm);
    }

    function validateForm(e) {
        e.preventDefault();
        
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();

        // Validation basique
        if (!name || !email || !message) {
            alert('Veuillez remplir tous les champs obligatoires');
            return;
        }

        // Validation email
        if (!isValidEmail(email)) {
            alert('Veuillez entrer une adresse email valide');
            return;
        }

        // Si tout est valide, soumettre le formulaire
        form.submit();
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});
