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


        return response()->json(
            [
                'results' => $apartments,
                'success' => true
            ]
        );
    }
}
