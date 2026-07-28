// Create the map
var map = L.map('map').setView([0, 0], 2);

// Load OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Get saved location
var lat = localStorage.getItem("lat");
var lon = localStorage.getItem("lon");
var city = localStorage.getItem("city");

// If a location exists, show it
if (lat && lon) {

    map.setView([lat, lon], 10);

    L.marker([lat, lon])
        .addTo(map)
        .bindPopup(city)
        .openPopup();

}