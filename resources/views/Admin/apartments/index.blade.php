@extends('admin.layouts.base')

@section('pageTitle', 'Apartments list')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($apartments as $apartment )
            <div class="card col" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h5 class="card-title">{{$apartment->title}}</h5>
                  <p class="card-text">{{$apartment->description}}</p>

                  <a href="{{route('admin.apartments.show',$apartment->id)}}" class="btn btn-primary">Go to apartment</a>

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