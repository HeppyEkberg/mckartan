<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MC Kartan</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0eWKb8qsMyn5bg6sajOhkl3Mmns8KoU"></script>
    <script src="/js/app.js"></script>
    <script src="/js/manager.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


    @yield('javascript')
</head>
<body>

<div id="main-wrapper">
    @include('layouts/partials/navbar')

    <div class="sidebar {{View::hasSection('sidebar') ? '' : 'hidden'}}">
        @yield('sidebar')
    </div>

    <div id="main-content" class="{{ View::hasSection('sidebar') ? '' : 'sidebar-disabled' }}">
        @yield('content')
    </div>
</div>
</body>
</html>
