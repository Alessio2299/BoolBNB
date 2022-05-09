@extends('admin.layouts.base')

@section('pageTitle', 'Edit Apartment')

@push('script')
    <script src="{{ asset('js/formApartment.js') }}" defer></script>
@endpush


@section('content')
    <div class="container">
        <h1>Edit apartment</h1>

        <form id="form" method="POST" action="{{ route('admin.apartments.update', $apartment->id) }}" enctype="multipart/form-data">
            @csrf


            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $apartment->title) }}">
                @error('title')
                     <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input style="width: min-content;" type="file" class="form-control h-25" id="image" name="image">
                @error('image')
                      <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mt-2">
                    <img src="{{asset('storage/'.$apartment->image)}}" style="width: 18rem;" class="img-thumbnail">
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{old('description', $apartment->description)}}</textarea>
                @error('description')
                      <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="number" class="form-control" id="rooms" name="rooms" value="{{old('rooms', $apartment->rooms)}}">
                @error('rooms')
                      <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="beds">Beds</label>
                <input type="number" class="form-control" id="beds" name="beds" value="{{old('beds', $apartment->beds)}}">
                @error('beds')
                      <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{old('bathrooms', $apartment->bathrooms)}}">
                @error('bathrooms')
                      <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="square_meters">Square Meters</label>
                <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters', $apartment->square_meters)}}">
                @error('square_meters')
                      <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input @focus="autoComplete" type="text" class="form-control {{ $errors->first('address') ? 'border-danger' : ''}}" v-model="addressInput" id="address" name="address" value="{{old('address')}}">
                <div v-if="success == false" class="text-danger">This street address is not valid</div>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mt-1">
                    <div @click="clickAddress(index)" class="bg-white my_hover p-3" v-for="(address,index) in listAddress">
                        <i class="mr-2 fas fa-map-marker-alt"></i> @{{address.address.freeformAddress}} @{{address.address.country}} @{{address.address.countryCode}}  
                    </div>
                </div>  
            </div>

            <input hidden type="text" class="form-control" v-model="addressLat" id="lat" name="lat">

            <input hidden type="text" class="form-control" v-model="addressLon" id="lon" name="lon">

            <div class="form-group">
                <label for="availability">Already available?</label>
                <select class="form-control" name="availability" id="availability">
                    <option value="">Select</option>
                    <option {{(old('availability', $apartment->availability) == 1) ? 'selected': ''}} value="1">Yes</option>
                    <option {{(old('availability', $apartment->availability) == 0) ? 'selected': ''}} value="0">No</option>
                </select>
            </div>



            @foreach ($amenities as $amenity) 

            @if ($errors->any())
                <div class="custom-control custom-checkbox">
                    <input name="amenities[]" type="checkbox" class="custom-control-input" id="amenity_{{$amenity->id}}" value={{$amenity->id}} {{in_array($amenity->id, old('amenities'))?'checked':''}}>
                    <label class="custom-control-label" for="amenity_{{$amenity->id}}">{{$amenity->name}}</label>
                </div>
            @else
                <div class="custom-control custom-checkbox">
                    <input name="amenities[]" type="checkbox" class="custom-control-input" id="amenity_{{$amenity->id}}" value="{{$amenity->id}}" {{($apartment->amenities->contains($amenity))?'checked':''}}>
                    <label class="custom-control-label" for="amenity_{{$amenity->id}}">{{$amenity->name}}</label>
                </div>
            @endif
            @endforeach

            @error('amenities')
                <div class="text-danger">At least one amenity is required</div>
            @enderror



            <button @click="sendForm" type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('admin.apartments.index')}}" class="btn btn-danger"> Cancel </a>
        </form>
    </div>
@endsection