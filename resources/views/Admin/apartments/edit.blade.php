@extends('admin.layouts.dashboard')

@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif

        <h1>Edit apartment</h1>

        <form method="POST" action="{{ route('admin.apartments.update', $apartment->id) }}" enctype="multipart/form-data">
            @csrf


            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $apartment->title) }}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{old('description', $apartment->description)}}</textarea>
            </div>

            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="number" class="form-control" id="rooms" name="rooms" value="{{old('rooms', $apartment->rooms)}}">
            </div>

            <div class="form-group">
                <label for="beds">Beds</label>
                <input type="number" class="form-control" id="beds" name="beds" value="{{old('beds', $apartment->beds)}}">
            </div>

            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{old('bathrooms', $apartment->bathrooms)}}">
            </div>

            <div class="form-group">
                <label for="square_meters">Square Meters</label>
                <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters', $apartment->square_meters)}}">
            </div>

            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="{{old('street',$apartment->street)}}">
            </div>

            <div class="form-group">
                <label for="civic_number">Civic Number</label>
                <input type="text" class="form-control" id="civic_number" name="civic_number" value="{{old('civic_number',$apartment->civic_number)}}">
            </div>

            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{old('zip_code',$apartment->zip_code)}}">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{old('city',$apartment->city)}}">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{old('country',$apartment->country)}}">
            </div>


            <div class="form-group">
                <label for="availability">Already available?</label>
                <select class="form-control" name="availability" id="availability">
                    <option value="">Select</option>
                    <option {{(old('availability', $apartment->availability) == 1) ? 'selected': ''}} value="1">Yes</option>
                    <option {{(old('availability', $apartment->availability) == 0) ? 'selected': ''}} value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection