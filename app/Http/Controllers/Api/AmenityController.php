<?php

namespace App\Http\Controllers\Api;

use App\Amenity;
use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();

        return response()->json(
            [
                'results' => $amenities,
                'success' => true
            ]
        );
    }
}
