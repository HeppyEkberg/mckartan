<div id="map" class="{{View::hasSection('sidebar') ? 'sidebar-disabled' : ''}}"></div>
<script>

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: {{ $mapCoordinates->zoom or 5}},
            center: {lat: {{ $mapCoordinates->latitude or 63.1717547 }}, lng: {{ $mapCoordinates->longitude or 14.7717495}}}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
            return new google.maps.Marker({
                position: location.coordinates,
                title: location.title,
                icon: location.icon
            });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

        var routes = [];

        $.get('{{route('json.routes.index')}}', function(data) {

            $(data).each(function(index, r) {

                var route = [];

                $(r.coordinates).each(function(i, coordinate) {
                    route.push({
                        lat: coordinate.latitude,
                        lng: coordinate.longitude
                    });
                });

                var routePath = new google.maps.Polyline({
                    path: route,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });

                routePath.setMap(map);
                routes.push(routePath);

            });
        });

    }



    var locations = [];

    @foreach($pointOfInterests as $key => $pointOfInterest)
    locations.push({
        coordinates: {lat: {{$pointOfInterest->latitude}}, lng: {{$pointOfInterest->longitude}}},
        icon: '{{$pointOfInterest->type->icon}}',
        title: '{{ $pointOfInterest->name }}'
    });
    @endforeach


</script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0eWKb8qsMyn5bg6sajOhkl3Mmns8KoU&callback=initMap" async defer></script>
