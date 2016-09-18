@extends('layouts/app')

@section('javascript')

@endsection

@section('content')
    <div id="map"></div>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 57.708870, lng: 11.974560},
                zoom: 7
            });

            var myLatLng = {lat: 57.708138, lng: 11.976159};

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: 'gfx/icons/parking.png',
                title: 'Hello World!'
            });

            var marker2 = new google.maps.Marker({
                position: {lat: 57.699646, lng: 11.967645},
                map: map,
                icon: 'gfx/icons/parking.png',
                title: 'Hello World!'
            });

            var marker3 = new google.maps.Marker({
                position: {lat: 57.697589, lng: 11.991652},
                map: map,
                icon: 'gfx/icons/parking.png',
                title: 'Hello World!'
            });

            var marker4 = new google.maps.Marker({
                position: {lat: 57.692073, lng: 11.993862},
                map: map,
                icon: 'gfx/icons/parking.png',
                title: 'Hello World!'
            });

            var marker5 = new google.maps.Marker({
                position: {lat: 57.698563, lng: 11.986778},
                map: map,
                icon: 'gfx/icons/parking.png',
                title: 'Hello World!'
            });

            marker.setMap(map);
            marker2.setMap(map);
            marker3.setMap(map);
            marker4.setMap(map);
            marker5.setMap(map);
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0eWKb8qsMyn5bg6sajOhkl3Mmns8KoU&callback=initMap" async defer></script>
@endsection

@section('sidebar')
    <div>
        <h3 class="header">{{trans('routes.my_routes')}}</h3>
        <ul class="list-unstyled my-routes">
            @foreach($user->routes as $route)
                <li>
                    <a href="">
                        {{$route->start_address}}
                        <br>
                        {{$route->end_address}}
                    </a>
                    <br>
                    <strong>{{trans('time.self')}}</strong> {{gmdate("i:s", $route->duration)}}
                    <br>
                    <strong>{{trans('distance.self')}}</strong> {{ number_format($route->distance / 1000, 1) }} km
                    <br>
                    <strong>{{trans('rating.self')}}</strong> {{ is_null($route->rating) ? '-' : $route->rating . ' / 5' }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection