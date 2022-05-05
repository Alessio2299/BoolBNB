@extends('admin.layouts.dashboard')

@section('pageTitle', $apartment->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-right"> 
                    <a href="{{route('admin.apartments.index')}}" class="btn btn-primary">All the apartments</a>
                </div>
                <div class="card m-auto border-0" style="width: 40rem; backgroundColor: transparent;">
                    <h1>{{$apartment->title}}</h1>
                    <img src="{{asset('storage/'.$apartment->image)}}" class="card-img-top" alt="{{$apartment->title}}">
                    <div class="card-body pl-1">
                        <p class="mb-2 font-weight-bold">Description:</p>
                        <p class="card-text">{{$apartment->description}}</p>
                        <p>____</p>
                        <p>Rooms: {{$apartment->rooms}}</p>

                        <p>Beds: {{$apartment->beds}}</p>
                        
                        <p>Bathrooms: {{$apartment->bathrooms}}</p>
                        
                        <p>Dimension in square meters: {{$apartment->square_meters}}</p>
                        
                        @if ($apartment->availability == 1)
                            <p>Availabilty: Available</p>
                            @else
                            <p>Availability: Not Available</p>
                        @endif

                        <div>
                            @foreach ($apartment->amenities as $amenity)
                                <span class="badge badge-primary">{{$amenity->name}}</span>
                            @endforeach
                        </div>

                        <div>You created this apartment entry: {{$diffInDays}} days ago</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection