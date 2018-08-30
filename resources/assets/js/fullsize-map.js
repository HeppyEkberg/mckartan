var fullsizeMap = function() {
    var $this = $(this);
    var latitude = 63.1717547;
    var longitude = 14.7717495;
    var zoom = 5;

    var map = null;
    var routes = [];
    var locations = [];
    var markers = null;
    var markerCluster = null;

    var activeRoute = null;

    var hightlightRoute = null;

    function init() {
        cacheElements();
        setupEvents();

        initMap();

        loadRoutes();
        loadPoints();
    }

    function initMap() {

        map = new google.maps.Map($this.get(0), {
            zoom: zoom,
            center: {lat: latitude, lng:  longitude}
        });

    }

    function cacheElements() {
        latitude = $this.data('latitude');
        longitude = $this.data('longitude');
        zoom = $this.data('zoom');
        hightlightRoute = $this.data('route')
    }

    function deactivateRoute() {
        if(activeRoute) {
            activeRoute.setOptions({strokeColor: '#FF0000'});
        }
    }

    function loadRoutes() {

        $.get('/ajax/routes', function(data) {

            $(data).each(function(index, r) {

                var route = [];

                $(r.coordinates).each(function(i, coordinate) {
                    route.push({
                        lat: coordinate.latitude,
                        lng: coordinate.longitude,
                    });
                });

                var routePath = new google.maps.Polyline({
                    path: route,
                    geodesic: true,
                    strokeColor: (hightlightRoute == r.id ? '#0000e5' : '#FF0000'),
                    strokeOpacity: 1.0,
                    strokeWeight: (hightlightRoute == r.id ? 3 : 2),
                    route_id: r.id
                });

                if(hightlightRoute == r.id) {
                    activeRoute = routePath;
                }

                google.maps.event.addListener(routePath, 'click', function(evt) {
                    deactivateRoute();
                    routePath.setOptions({strokeColor: '#0000e5'});
                    activeRoute = routePath;
                    $(document).trigger('OPEN_ROUTE', [routePath.route_id]);

                });

                routePath.setMap(map);
                routes.push(routePath);

            });
        });


    }

    function loadPoints() {

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
                var marker = new google.maps.Marker({
                    position: location.coordinates,
                    title: location.title,
                    icon: location.icon,
                    point_id: location.point_id
                });

                google.maps.event.addListener(marker, 'click', function(evt) {
                    deactivateRoute();
                    $(document).trigger('OPEN_MARKER', [marker.point_id]);
                });

                return marker;
            });

            // Add a marker clusterer to manage the markers.
            markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });

        });
    }

    function setupEvents() {

    }


    init();
};

$('document').ready(function() {
    app.addComponent('fullsize-map', fullsizeMap);
});
