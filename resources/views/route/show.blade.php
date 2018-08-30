@extends('layouts/app')

@section('content')

    @include('map.fullsize', ['highlightRoute' => $route])

@endsection


@section('sidebar')

    <div class="show-route">

        <div class="row-fluid">
            <div class="col-md-12 sidebar-title">
                <h4><img src="/gfx/icons/road.png"> Rutt</h4>

                @include('component.rating', ['rating' => $route->rating])
            </div>

            <div class="col-md-12">
                <hr>
            </div>

            @include('component.tags', ['tags' => $route->tags])

            <div class="col-md-12">
                <i class="fa fa-map-marker-alt"></i> &nbsp;{{ $route->start_address }}
            </div>
            <div class="col-md-12">
                <i class="fa fa-map-marker-alt"></i> &nbsp;{{ $route->end_address }}
            </div>
            <div class="col-md-12">
                <i class="far fa-clock"></i> {{ round($route->duration / 60) }} minuter
            </div>

            <div class="col-md-12">
                <i class="fas fa-road"></i> {{ round($route->distance / 1000) }} km
            </div>

        </div>

        <div class="col-md-12">
            <hr>
            @include('component.comments', ['comments' => $route->comments])
            <hr>
        </div>

        <div class="col-md-6">
            <i class="fa fa-user"></i> Skapad av {{ $route->user->name }}
        </div>

        @if($route->user_id == Auth::id())
            <div class="col-md-6 text-right">
                <a href="{{route('route.delete')}}" class="btn btn-xs btn-danger">Radera</a>
            </div>
        @endif



    </div>

@endsection