@extends('layouts.app')

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
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0eWKb8qsMyn5bg6sajOhkl3Mmns8KoU&callback=initMap" async defer></script>
@endsection
