document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('amid-quote-form');
    
    if (form) {
        form.addEventListener('submit', validateForm);
    }

    function validateForm(e) {
        e.preventDefault();
        
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const travelDate = new Date(document.getElementById('travel_date').value);
        const returnDate = new Date(document.getElementById('return_date').value);

        // Validation basique
        if (!name || !email || !phone) {
            alert('Veuillez remplir tous les champs obligatoires');
            return;
        }

        // Validation email
        if (!isValidEmail(email)) {
            alert('Veuillez entrer une adresse email valide');
            return;
        }

        // Validation dates
        if (travelDate >= returnDate) {
            alert('La date de retour doit être postérieure à la date de départ');
            return;
        }

        // Si tout est valide, soumettre le formulaire
        form.submit();
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});
