function maps(lat, long, name){

    let map = L.map('map').setView([lat, long], 15);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18
    }).addTo(map);

    L.circle([lat, long], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);

    // L.marker([lat, long],{
    //     draggable: true
    // }).addTo(map).bindPopup(name).openPopup();

}