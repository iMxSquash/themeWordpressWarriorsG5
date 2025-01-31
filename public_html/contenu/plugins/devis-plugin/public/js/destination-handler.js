document.addEventListener('DOMContentLoaded', function() {
    const typeVoyageSelect = document.getElementById('type_voyage');
    const destinationSelect = document.getElementById('destination');

    // Définition des destinations par type de voyage
    const destinations = {
        'tourisme_algerie': {
            'plage': 'Plage',
            'sahara': 'Sahara',
            'bien_etre': 'Bien-être',
            'weekend_decouverte': 'Weekend découverte'
        },
        'voyage_religieux': {
            'omra': 'Omra',
            'hajj': 'Hajj'
        },
        'international': {
            'turquie': 'Turquie',
            'tunisie': 'Tunisie',
            'emirats': 'Émirats Arabe Unis',
            'egypte': 'Égypte',
            'malaisie': 'Malaisie',
            'qatar': 'Qatar',
            'maroc': 'Maroc',
            'arabie_saoudite': 'Arabie Saoudite'
        }
    };

    // Définition des types de voyage par destination
    const destinationTypes = {
        'plage': 'tourisme_algerie',
        'sahara': 'tourisme_algerie',
        'bien_etre': 'tourisme_algerie',
        'weekend_decouverte': 'tourisme_algerie',
        'omra': 'voyage_religieux',
        'hajj': 'voyage_religieux',
        'turquie': 'international',
        'tunisie': 'international',
        'emirats': 'international',
        'egypte': 'international',
        'malaisie': 'international',
        'qatar': 'international',
        'maroc': 'international',
        'arabie_saoudite': 'international'
    };

    function updateDestinations(selectedType) {
        destinationSelect.innerHTML = '<option value="">Sélectionnez une destination</option>';
        
        if (selectedType) {
            Object.entries(destinations[selectedType]).forEach(([value, label]) => {
                const option = new Option(label, value);
                destinationSelect.add(option);
            });
        }
    }

    function updateTypeVoyage(selectedDestination) {
        if (selectedDestination) {
            const correspondingType = destinationTypes[selectedDestination];
            typeVoyageSelect.value = correspondingType;
        }
    }

    // Event listeners
    typeVoyageSelect.addEventListener('change', function() {
        updateDestinations(this.value);
    });

    destinationSelect.addEventListener('change', function() {
        updateTypeVoyage(this.value);
    });

    // Initial update if type is pre-selected
    if (typeVoyageSelect.value) {
        updateDestinations(typeVoyageSelect.value);
    }
});
