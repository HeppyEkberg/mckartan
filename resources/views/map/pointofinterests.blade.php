<div id="map"></div>
<script>
    var map;
    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: {{ isset($mapLocation['latitud']) ? $mapLocation['latitud'] : '58.201498' }}, lng: {{ isset($mapLocation['longitud']) ? $mapLocation['longitud'] : '14.285086' }}},
            zoom: {{ isset($mapLocation['zoom']) ? $mapLocation['zoom'] : '7' }}
        });

            @foreach($pointOfInterests as $key => $pointOfInterest)
        var marker{{$key}} = new google.maps.Marker({
            position: {lat: {{$pointOfInterest->latitud}}, lng: {{$pointOfInterest->longitud}}},
        map: map,
            icon: '{{$pointOfInterest->icon()}}',
            title: 'Hello World!'
    });

        marker{{$key}}.setMap(map);

            @endforeach

    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0eWKb8qsMyn5bg6sajOhkl3Mmns8KoU&callback=initMap" async defer></script>
