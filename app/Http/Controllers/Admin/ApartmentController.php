<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        $amenities = Amenity::all();

        return view('admin.apartments.index', compact('apartments', 'amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::all();
        return view('admin.apartments.create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:10',
            'rooms' => 'required|numeric|min:1|max:30',
            'beds' => 'required|numeric|min:1|max:40',
            'bathrooms' => 'required|numeric|min:1|max:20',
            'square_meters' => 'required|numeric|min:10|max:1000',
            'image' => 'required|image|max:2048',
            'availability' => 'required|boolean',
            'address' => 'required|min:2',
            'amenities' => 'required'
        ]);


        $data = $request->all();
        $slug = Str::slug($data['title']);
        $counter = 1;
        while (Apartment::where('slug', $slug)->first()) {
            $slug = Str::slug($data['title']) . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;
        
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $data['address'] . '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1');

        if($response->json()['results'] == []){
            $request->validate(
                ['address' => 'max:0'],
                ['address.max' => 'Inserire un indirizzo valido']
            );
        } else{
            $dataPosition = $response->json()['results']['0']['position'];
            $data['lat'] = $dataPosition['lat'];
            $data['lon'] = $dataPosition['lon'];
        }
        
        if (isset($data['image'])) {
            $image_path = Storage::put('images', $data['image']);
            $data['image'] = $image_path;
        }

        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->save();

        if(isset($data['amenities']))
            $apartment->amenities()->sync($data['amenities']);
        
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', '=', $slug)->with(['amenities'])->first();

        $now = Carbon::now();

        $apartmentDateTime = Carbon::create($apartment->created_at);

        $diffInDays = $now->diffInDays($apartmentDateTime);

        $amenities = Amenity::all();
        return view('admin.apartments.show', compact('apartment', 'amenities', 'diffInDays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $amenities = Amenity::all();
        return view('admin.apartments.edit', compact('apartment', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:10',
            'rooms' => 'required|numeric|min:1|max:30',
            'beds' => 'required|numeric|min:1|max:40',
            'bathrooms' => 'required|numeric|min:1|max:20',
            'square_meters' => 'required|numeric|min:10|max:1000',
            'image' => 'required|image|max:2048',
            'availability' => 'required|boolean',
            'address' => 'required|min:2'
        ]);

        $data = $request->all();

        $slug = Str::slug($data['title']);

        $counter = 1;

        if ($apartment->slug != $slug) {
            while (Apartment::where('slug', $slug)->first()) {
                $slug = Str::slug($data['title']) . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }


        if (isset($data['image'])) {
            $image_path = Storage::put('images', $data['image']);
            $data['image'] = $image_path;
        }

        $data['lat'] = 9;
        $data['lon'] = 9;

        $apartment->update($data);
        $apartment->save();

        $apartment->amenities()->sync($data['amenities']);

        return redirect()->route('admin.apartments.show', compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        Storage::delete($apartment->image);
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }
}
