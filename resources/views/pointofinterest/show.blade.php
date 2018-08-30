@extends('layouts/app')

@section('javascript')

@endsection

@section('content')
    @include('map.fullsize', ['point' => $point])
@endsection

@section('sidebar')

    <div class="pointofinterest_data">
        <div class="row-fluid">
            <div class="col-md-12 sidebar-title">
                <h4><img src="{{$point->type->icon}}"> {{$point->name}}</h4>

                @include('component.rating', ['rating' => $point->rating])
            </div>
        </div>

        <div class="row-fluid">

            @if($point->image)
                <div class="col-md-12">
                    <hr>
                    <img class="sidebar-image" src="{{ $point->image }}">
                </div>
            @endif

            @if(!empty($point->description))
                <div class="col-md-12">
                    <p>{{ $point->description }}</p>
                </div>
            @endif

            <div class="col-md-12">
                <hr>
                @include('component.comments', ['comments' => $point->comments])
                <hr>
            </div>

            <div class="col-md-6">
                <i class="fa fa-user"></i> Skapad av {{ $point->user->name }}
            </div>

            @if($point->user_id == Auth::id())
                <div class="col-md-6 text-right">
                    <a href="#" class="btn btn-xs btn-danger">Radera</a>
                </div>
            @endif

        </div>
    </div>


@endsection
