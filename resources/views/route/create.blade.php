@extends('layouts/app')

@section('content')
    <script>
        var directionsSave = null;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: {{ $mapCoordinates->zoom or 5}},
                center: {lat: {{ $mapCoordinates->latitude or 63.1717547 }}, lng: {{ $mapCoordinates->longitude or 14.7717495}}}
            });


            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer({
                draggable: true,
                map: map,
            });

            // directionsDisplay.addListener('directions_changed', function() {
            //     directionsChanged(directionsDisplay.getDirections());
            // });

            google.maps.event.addListener(map, 'click', function(event) {
                addToDirection(event.latLng, map);
            });

            var points = {
                start: null,
                end: null
            };

            // Adds a marker to the map.
            function addToDirection(location, map) {
                if(points.start == null) {
                    points.start = location;
                }
                else {
                    points.end = location;
                }

                if(points.start != null && points.end != null) {
                    displayRoute(points.start, points.end, directionsService, directionsDisplay);
                }
            }

            var routes = [];
            $.get('{{route('ajax.routes.index')}}', function(data) {

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

            $('#reset').on('click', function() {
                points.start = null;
                points.end = null;
                directionsDisplay.setDirections({routes: []});
            });


            // function directionsChanged(result) {
            //     dd(result);
            // }

            $('#save').on('click', function() {

                var data = directionsDisplay.getDirections();
                data = JSON.stringify(data);

                $.post('/route/store', { route: data }, function() {
                    $("#reset").click();
                });
            });

        }


        function displayRoute(origin, destination, service, display) {
            service.route({
                origin: origin,
                destination: destination,
                waypoints: [],
                travelMode: 'DRIVING',
                avoidTolls: true
            }, function(response, status) {


                if (status === 'OK') {
                    directionsSave = response;
                    display.setDirections(response);
                } else {
                    alert('Could not display directions due to: ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0eWKb8qsMyn5bg6sajOhkl3Mmns8KoU&callback=initMap"></script>

    <div id="map" class="{{View::hasSection('sidebar') ? 'sidebar-disabled' : ''}}"></div>

    <div id="route-buttons">
        <button id="reset" class="btn btn-danger">Reset</button>
        <button id="save" class="btn btn-primary">Save</button>
    </div>

@endsection
