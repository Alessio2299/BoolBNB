@extends('admin.layouts.login')

@section('pageTitle', 'Create Apartment')

@push('script')
    <script src="{{ asset('js/formApartment.js') }}" defer></script>
@endpush

@section('content')

    <div class="container py-4" id="app">

        <h1>Add new apartment</h1>


        <form id="form" method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" required class="form-control {{ $errors->first('title') ? 'border-danger' : ''}}" id="title" name="title" value="{{old('title')}}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="image">Image *</label>
                <input type="file" required class="form-control h-25 {{ $errors->first('image') ? 'border-danger' : ''}}" id="image" name="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea class="form-control  {{ $errors->first('description') ? 'border-danger' : ''}}" required id="description" name="description" rows="5">{{old('description')}}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="rooms">Rooms *</label>
                <input type="number" required max="10" min="1" class="form-control {{ $errors->first('rooms') ? 'border-danger' : ''}}" id="rooms" name="rooms" value="{{old('rooms')}}">
                @error('rooms')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="beds">Beds *</label>
                <input type="number" required max="15" min="1" class="form-control {{ $errors->first('beds') ? 'border-danger' : ''}}" id="beds" name="beds" value="{{old('beds')}}">
                @error('beds')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="bathrooms">Bathrooms *</label>
                <input type="number" required max="4" min="1" class="form-control {{ $errors->first('bathrooms') ? 'border-danger' : ''}}" id="bathrooms" name="bathrooms" value="{{old('bathrooms')}}">
                @error('bathrooms')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="square_meters">Square Meters *</label>
                <input type="number" required max="300" min="1" class="form-control {{ $errors->first('square_meters') ? 'border-danger' : ''}}" id="square_meters" name="square_meters" value="{{old('square_meters')}}">
                @error('square_meters')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="address">Address *</label>
                <input @focus="autoComplete" type="text" required class="form-control {{ $errors->first('address') ? 'border-danger' : ''}}" v-model="addressInput" id="address" name="address">
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

            <input hidden type="text" class="form-control" id="old-address" name="old-address" value="{{old('address')}}">

            <input hidden type="text" class="form-control" v-model="addressLat" id="lat" name="lat">

            <input hidden type="text" class="form-control" v-model="addressLon" id="lon" name="lon">


            <div class="form-group">
                <label for="availability">Already available? *</label>
                <select class="form-control" required name="availability" id="availability">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            
            <span class="mb-2 d-inline-block">Amenities: *</span>
            @foreach ($amenities as $amenity) 
                <div class="custom-control custom-checkbox">
                    <input name="amenities[]" required type="checkbox" id="amenity_{{$amenity->id}}" value="{{$amenity->id}}" {{in_array($amenity->id, old('amenities', []))?'checked':''}}>
                    <label class="custom-control-checkbox" for="amenity_{{$amenity->id}}">{{$amenity->name}}</label>
                </div>
            @endforeach
            @error('amenities')
                <div class="text-danger">At least one amenity is required</div>
            @enderror

            <button @click="sendForm" type="submit" class="mt-3 mb-3 btn btn-primary">Create</button>

            <p class="text-danger">All starred "*" fields are required</p>
        </form>
    </div>
@endsection
