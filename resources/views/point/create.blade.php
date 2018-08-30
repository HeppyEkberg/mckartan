@extends('layouts/app')

@section('content')
    <script>
        // In the following example, markers appear when the user clicks on the map.
        // Each marker is labeled with a single alphabetical character.
        var marker = null;
        var markers = null;
        var locations = [];

        function initialize() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: {{ $mapCoordinates->zoom or 5}},
                center: {lat: {{ $mapCoordinates->latitude or 63.1717547 }}, lng: {{ $mapCoordinates->longitude or 14.7717495}}}
            });

            // This event listener calls addMarker() when the map is clicked.
            google.maps.event.addListener(map, 'click', function(event) {
                addMarker(event.latLng, map);
            });

            $('#reset').on('click', function() {
                if(marker != null) {
                    marker.setMap(null);
                }
            });

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

            $.get('/ajax/points', function(data) {

                $(data).each(function(index, loc) {
                    locations.push({
                        coordinates: { lat:  loc.latitude, lng: loc.longitude },
                        icon: loc.type.icon,
                        title: loc.name,
                        point_id: loc.id
                    });
                });

                markers = locations.map(function(location, i) {
                    var m = new google.maps.Marker({
                        position: location.coordinates,
                        title: location.title,
                        icon: location.icon,
                        point_id: location.point_id
                    });

                    return m;
                });

                // Add a marker clusterer to manage the markers.
                markerCluster = new MarkerClusterer(map, markers, {
                    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
                });

            });
        }




        // Adds a marker to the map.
        function addMarker(location, map) {
            if(marker != null) {
                marker.setMap(null);
            }

            $("#point_latitude").val(location.lat);
            $("#point_longitude").val(location.lng);

            marker = new google.maps.Marker({
                position: location,
                label:'A',
                map: map
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div id="map" class="{{View::hasSection('sidebar') ? 'sidebar-disabled' : ''}}"></div>


@endsection

@section('sidebar')

    <form method="post" action="{{ route('point.store') }}" id="form-store">
        <div class="col-md-12">
            <h4>Skapa punkt</h4>
            {!! csrf_field() !!}


            <div class="form-group">
                <input type="text" name="point[name]" placeholder="Namn" class="form-control">
            </div>

            <div class="form-group">
                <select name="point[type]" id="point_type" class="form-control">
                    @foreach($pointTypes as $pointType)
                        <option value="{{ $pointType->id }}">{{$pointType->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="point_latitude" placeholder="Latitude" name="point[latitude]" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="point_longitude" placeholder="Longitude" name="point[longitude]" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea placeholder="Beskrivning" name="point[description]" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group text-right">
                <input type="submit" class="btn btn-primary" value="Spara">
            </div>

        </div>
    </form>

@endsection