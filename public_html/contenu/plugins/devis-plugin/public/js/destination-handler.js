document.addEventListener('DOMContentLoaded', function() {
    const typeVoyageSelect = document.getElementById('type_voyage');
    const destinationSelect = document.getElementById('destination');

    // Définition des destinations par type de voyage
    const destinations = {
        'tourisme_algerie': {
            'alger': 'Alger',
            'oran': 'Oran',
            'constantine': 'Constantine',
            'annaba': 'Annaba'
        },
        'voyage_religieux': {
            'mecque': 'La Mecque',
            'medine': 'Médine'
        },
        'international': {
            'dubai': 'Dubai',
            'istanbul': 'Istanbul',
            'paris': 'Paris',
            'barcelone': 'Barcelone'
        }
    };

    // Définition des types de voyage par destination
    const destinationTypes = {
        'alger': 'tourisme_algerie',
        'oran': 'tourisme_algerie',
        'constantine': 'tourisme_algerie',
        'annaba': 'tourisme_algerie',
        'mecque': 'voyage_religieux',
        'medine': 'voyage_religieux',
        'dubai': 'international',
        'istanbul': 'international',
        'paris': 'international',
        'barcelone': 'international'
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
