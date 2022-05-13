<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($address)
    {
        $apartments = Apartment::where('address', 'like', '%' . $address . '%')->with(['amenities'])->get();

        $apartments->each(function($apartment) {
            $apartment->image = url('storage/' . $apartment->image);
        });

        return response()->json(
            [
                'results' => $apartments,
                'success' => true
            ]
        );
    }


    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->with(['amenities'])->first();
        
        if($apartment) {
            $apartment->image = url('storage/' . $apartment->image);
        }

        if($apartment) {
           return response()->json(
                [
                    'results' => $apartment,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'results' => 'No apartment found',
                    'success' => false
                ]
            );
        }
        
    }

    
}
