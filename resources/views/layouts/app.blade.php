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
    <link href="/css/mckartan.css" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('javascript')
</head>
<body>

@include('layouts/partials/navbar')

<div class="page-container">
    <div class="sidebar {{View::hasSection('sidebar') ? '' : 'hidden'}}">
        @yield('sidebar')
    </div>

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
