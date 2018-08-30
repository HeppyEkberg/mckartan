var sidebar = function() {
    var $this = $(this);

    function init() {
        cacheElements();
        setupEvents();


    }

    function show() {
        $this.removeClass('hidden');
    }

    function hide() {
        $this.addClass('hidden');
    }

    function cacheElements() {

    }

    function loadContent(content) {
        $this.html(content);
        show();
    }

    function openPoint(marker_id) {

        $.get('/point/' + marker_id, function(data) {
            var pointData = $(data).find('.pointofinterest_data');
            loadContent(pointData);
        });

    }

    function openRoute(route_id) {

        $.get('/route/' + route_id, function(data) {
           var showRoute = $(data).find('.show-route');
           loadContent(showRoute);
        });

    }

    function setupEvents() {

        $(document).on('OPEN_ROUTE', function(event, route_id) {
            openRoute(route_id);
        });

        $(document).on('OPEN_MARKER', function(event, point_id) {
            openPoint(point_id);
            console.log(point_id);
        });

    }

    function loadPoint(point_id) {

    }

    init();
};

$('document').ready(function() {
    app.addComponent('sidebar', sidebar);
});
