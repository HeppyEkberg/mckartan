@extends('layouts/app')

@section('javascript')

@endsection

@section('content')
    @include('map/pointofinterests')
@endsection

@section('sidebar')
    <div class="pointofinterest_data">
        <h3 class="header">{{$point->name}}</h3>
        <img src="{{$point->image}}">
        <div class="container">
            <p>{!! $point->description !!}</p>
        </div>
    </div>
@endsection
