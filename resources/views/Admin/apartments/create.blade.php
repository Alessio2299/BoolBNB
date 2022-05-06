@extends('admin.layouts.base')

@section('pageTitle', 'Apartments list')

@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif

        <h1>Create apartment</h1>

        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="number" class="form-control" id="rooms" name="rooms" value="{{old('rooms')}}">
            </div>

            <div class="form-group">
                <label for="beds">Beds</label>
                <input type="number" class="form-control" id="beds" name="beds" value="{{old('beds')}}">
            </div>

            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{old('bathrooms')}}">
            </div>

            <div class="form-group">
                <label for="square_meters">Square Meters</label>
                <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters')}}">
            </div>

            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="{{old('street')}}">
            </div>

            <div class="form-group">
                <label for="civic_number">Civic Number</label>
                <input type="text" class="form-control" id="civic_number" name="civic_number" value="{{old('civic_number')}}">
            </div>

            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{old('zip_code')}}">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{old('country')}}">
            </div>

            <div class="form-group">
                <label for="availability">Already available?</label>
                <select class="form-control" name="availability" id="availability">
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            @foreach ($amenities as $amenity) 
                <div class="custom-control custom-checkbox">
                    <input name="amenities[]" type="checkbox" id="amenity_{{$amenity->id}}" value="{{$amenity->id}}" {{in_array($amenity->id, old('amenities', []))?'checked':''}}>
                    <label class="custom-control-checkbox" for="amenity_{{$amenity->id}}">{{$amenity->name}}</label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>
@endsection