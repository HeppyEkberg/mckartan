@extends('layouts/app')

@section('javascript')

@endsection

@section('content')
    @include('map/pointofinterests')
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
