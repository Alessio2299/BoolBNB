@extends('admin.layouts.base')

@section('pageTitle', 'Apartments list')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Lista dei servizi aggiuntivi</h1>
                <ul class="list-group">
                    @foreach ($amenities as $amenity)
                        <li class="list-group-item d-flex justify-content-between">{{$amenity->name}}
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
@endsection