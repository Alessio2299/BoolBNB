@extends('admin.layouts.dashboard')

@section('pageTitle', 'Apartments list')

@section('content')
    <div class="container">

        <a href="{{route('admin.apartments.create')}}" class="btn btn-warning">Add a new apartment</a>

        <div class="row">

            @foreach ($apartments as $apartment )
            <div class="card col" style="width: 18rem;">
                {{-- <img src="{{asset('storage/' . $apartment->image)}}" class="card-img-top" alt="{{$apartment->title}}"> --}}
                <div class="card-body">
                  <h5 class="card-title">{{$apartment->title}}</h5>
                  <p class="card-text">{{$apartment->description}}</p>
                  <p>Lat: {{$apartment->lat}}</p>
                  <p>Lon: {{$apartment->lon}}</p>

                  <a href="{{route('admin.apartments.show',$apartment->id)}}" class="btn btn-primary">Go to apartment</a>
                  <a href="{{route('admin.apartments.edit',$apartment->id)}}" class="btn btn-warning">Edit apartment</a>

                    <form class="d-inline-block" method="POST" action="{{route('admin.apartments.destroy', $apartment->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete apartment
                        </button>
                    </form>
                </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection