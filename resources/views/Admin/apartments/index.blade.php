@extends('admin.layouts.base')

@section('pageTitle', 'Apartments list')

@section('content')
    <div class="container">
        
        
        <div class="d-flex align-items-center mb-5 justify-content-between">
            <h1 class=" text-center">Your Apartments</h1>
            <a style="font-size: 2rem" href="{{route('admin.apartments.create')}}" class="btn btn-success text-right py-0"><i class="fa-regular fa-square-plus"></i></a>
        </div>

        
        <div class="row ">

            @foreach ($apartments as $apartment )
            <div class="card bg-white col-3 pt-4 mx-2">
                <img src="{{asset('storage/' . $apartment->image)}}" style="max-height: 155px;" class="img-thumbnail " alt="{{$apartment->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$apartment->title}}</h5>
                  <p class="card-text text-truncate">{{$apartment->description}}</p>

                <div>
                    @foreach ($apartment->amenities as $amenity)
                        <span class="badge badge-primary">{{$amenity->name}}</span>
                    @endforeach
                </div>

                  <div class="text-center">
                      <a href="{{route('admin.apartments.show',$apartment->slug)}}" class="btn btn-primary"> <i class="fa-solid fa-eye"></i> </a>
                      <a href="{{route('admin.apartments.edit',$apartment->slug)}}" class="btn btn-warning mx-2"> <i class="fa-solid fa-pencil"></i> </a>
                      <form class="d-inline-block" method="POST" action="{{route('admin.apartments.destroy', $apartment->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection