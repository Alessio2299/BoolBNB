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