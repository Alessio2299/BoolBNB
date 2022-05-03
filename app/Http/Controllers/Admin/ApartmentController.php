<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apartments.create');
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
            'rooms' => 'required|numeric|min:1',
            'beds' => 'required|numeric|min:1',
            'bathrooms' => 'required|numeric|min:1',
            'square_meters' => 'required|numeric|min:10',
            'image' => 'required|image|max:2048',
            'availability' => 'required|boolean',
        ]);

        $data = $request->all();

        $slug = Str::slug($data['title']);
        $counter = 1;
        while (Apartment::where('slug', $slug)->first()) {
            $slug = Str::slug($data['title']) . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;

        if (isset($data['image'])) {
            $image_path = Storage::put('images', $data['image']);
            $data['image'] = $image_path;
        }

        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->save();

        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        return view('admin.apartments.edit', compact('apartment'));
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
            'rooms' => 'required|numeric|min:1',
            'beds' => 'required|numeric|min:1',
            'bathrooms' => 'required|numeric|min:1',
            'square_meters' => 'required|numeric|min:10',
            'image' => 'required|image|max:2048',
            'availability' => 'required|boolean',
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


        $apartment->update($data);
        $apartment->save();

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
