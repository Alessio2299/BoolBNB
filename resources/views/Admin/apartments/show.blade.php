@extends('admin.layouts.dashboard')

@section('pageTitle', $apartment->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{$apartment->title}}</h1>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$apartment->description}}</p>
                        <p>Number of rooms: {{$apartment->rooms}}</p>
                        <p>Number of beds: {{$apartment->beds}}</p>
                        <p>Number of bathrooms: {{$apartment->bathrooms}}</p>
                        <p>Dimension in square meters: {{$apartment->square_meters}}</p>
                        <p>Availability: {{$apartment->availability}}</p>
                        <a href="{{route('admin.apartments.index')}}" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection