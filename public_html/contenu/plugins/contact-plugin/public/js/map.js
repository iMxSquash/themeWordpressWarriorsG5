document.addEventListener('DOMContentLoaded', function() {
    const map = L.map('amid-map').setView([amidMapData.lat, amidMapData.lng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([amidMapData.lat, amidMapData.lng])
        .addTo(map)
        .bindPopup(amidMapData.title)
        .openPopup();

    const mapContainer = document.getElementById('amid-map');
    mapContainer.style.border = '2px solid #4B5563';
    mapContainer.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
    mapContainer.style.height = '20vh';
    mapContainer.style.borderRadius = '0.75rem';
    if (window.innerWidth >= 768) {
        mapContainer.style.borderRadius = '2rem';
    }
});