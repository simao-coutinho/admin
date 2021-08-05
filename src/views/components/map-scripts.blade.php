<!-- Google Maps -->
<script>
    var map;
    var markers = [];

    function initMap() {
        var uluru = {lat: 41.223695, lng: -8.684129};

        map = new google.maps.Map(
            document.getElementById('map'), {zoom: 10, center: uluru});

        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        })

        google.maps.event.addListener(map, 'click', function (event) {
            let coordinates = document.getElementById("coordinates");
            let latitude = document.getElementById("latitude");
            let longitude = document.getElementById("longitude");
            let finalCoordinates = document.getElementById("finalCoordinates");
            setMapOnAll(null);
            marker = new google.maps.Marker({position: event.latLng, map: map});
            markers.push(marker);

            latitude.value = event.latLng.lat();
            longitude.value = event.latLng.lng();
            finalCoordinates.innerHTML = "Coordenadas: Latitude: " + event.latLng.lat() + ", longitude: " + event.latLng.lng();
            coordinates.innerHTML = "Coordenadas selecionadas: Latitude: " + event.latLng.lat() + ", longitude: " + event.latLng.lng();
        });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                let coordinates = document.getElementById("coordinates");
                let latitude = document.getElementById("latitude");
                let longitude = document.getElementById("longitude");
                let finalCoordinates = document.getElementById("finalCoordinates");
                setMapOnAll(null);
                marker = new google.maps.Marker({position: place.geometry.location, map: map});
                markers.push(marker);

                latitude.value = place.geometry.location.lat();
                longitude.value = place.geometry.location.lng();
                finalCoordinates.innerHTML = "Coordenadas: Latitude: " + place.geometry.location.lat() + ", longitude: " + place.geometry.location.lng();
                coordinates.innerHTML = "Coordenadas selecionadas: Latitude: " + place.geometry.location.lat() + ", longitude: " + place.geometry.location.lng();

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    // Refresh the markers
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    };
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8XiCPsAa8H2bqCiasjWCJVeUYNOsfsmo&libraries=places&callback=initMap">
</script>