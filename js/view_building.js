(function () {

    initializeContainersHeight();
    initializeMap();

    // Run the gallery
    baguetteBox.run('.gallery');

    function initializeContainersHeight() {

        var vHeight = $(window).height();
        $('.cover').css({ "height": vHeight });
        $('#map').css({ "height": vHeight });
    }

    function initializeMap() {
        var map = L.map('map', {
            scrollWheelZoom: false,
            zoomControl: false
        });

        var osmLayer = new L.TileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                minZoom: 1,
                maxZoom: 13,
                attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
            }
        );

        var lng = $("#lng").val();
        var lat = $("#lat").val();
        map.setView(new L.LatLng(lat, lng), 1);
        map.addLayer(osmLayer);

        var markers = [];

        var marker = L.marker({ lat: lat, lng: lng });
        marker.addTo(map);
        markers.push(marker);

        var featureGroup = L.featureGroup(markers);
        map.fitBounds(featureGroup.getBounds().pad(0.5), { animate: false });
    }
})();