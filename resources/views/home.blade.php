@extends('layouts/app')

@section('javascript')

@endsection

@section('content')

    @include('map.fullsize')

@endsection

@if(isset($routes))
@section('sidebar')
    <div>
        <h3 class="header">{{trans('routes.my_routes')}}</h3>
        <ul class="list-unstyled my-routes">
            @forelse($routes as $route)
                <li>
                    <a href="" class="route-name">{{$route->start_address}}</a>
                    <br>
                    <a href="" class="route-name">{{$route->end_address}}</a>
                    <ul class="list-unstyled list-inline">
                        @for($i = 0; $i < 5; $i++)
                            <li><i class="fas fa-star"></i></li>
                        @endfor
                        <li>3.5/5</li>
                    </ul>


                    <br>
                    <strong>{{trans('time.self')}}</strong> {{gmdate("i:s", $route->duration)}}
                    <br>
                    <strong>{{trans('distance.self')}}</strong> {{ number_format($route->distance / 1000, 1) }} km
                </li>
            @empty
                <li></li>
            @endforelse
        </ul>
    </div>
@endsection
@endif
