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

<<<<<<< HEAD
    public function filterApartments(Request $request){
            
        $data = $request->all();

        if($data['rooms'] == 'All' && $data['bathrooms'] == 'All' && $data['beds'] == 'All'){
            $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
            ->with(['amenities'])
            ->get();
            
            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        };

        if($data['rooms'] != 'All' && $data['bathrooms'] != 'All' && $data['beds'] != 'All'){
            if($data['bathrooms'] == '10+' || $data['rooms'] == '10+' || $data['beds'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('bathrooms','>=',$data['bathrooms'])
                ->where('beds','>=',$data['beds'])
                ->where('rooms','>=',$data['rooms'])
                ->with(['amenities'])
                ->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('bathrooms',$data['bathrooms'])
                ->where('beds',$data['beds'])
                ->where('rooms',$data['rooms'])
                ->with(['amenities'])
                ->get();
            }

            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        };

        if($data['bathrooms'] != 'All' && $data['rooms'] == 'All' && $data['beds'] == 'All'){
            if($data['bathrooms'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('bathrooms','>=',$data['bathrooms'])->with(['amenities'])->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('bathrooms',$data['bathrooms'])->with(['amenities'])->get();
            }
            

            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        }

        if($data['beds'] != 'All' && $data['rooms'] == 'All' && $data['bathrooms'] == 'All'){
            if($data['beds'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('beds','>=',$data['beds'])->with(['amenities'])->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('beds',$data['beds'])->with(['amenities'])->get();
            }
            
            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        }

        if($data['rooms'] != 'All' && $data['beds'] == 'All' && $data['bathrooms'] == 'All'){
            if($data['rooms'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('rooms','>=',$data['rooms'])->with(['amenities'])->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('rooms',$data['rooms'])->with(['amenities'])->get();
            }
            
            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        }

        if($data['rooms'] != 'All' && $data['beds'] != 'All' && $data['bathrooms'] == 'All'){
            if($data['rooms'] == '10+' || $data['beds'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('rooms','>=',$data['rooms'])
                ->where('beds','>=',$data['beds'])
                ->with(['amenities'])
                ->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('rooms',$data['rooms'])
                ->where('beds', $data['beds'])
                ->with(['amenities'])
                ->get();
            }
            
            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        }

        if($data['rooms'] != 'All' && $data['beds'] == 'All' && $data['bathrooms'] != 'All'){
            if($data['rooms'] == '10+' || $data['bathrooms'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('rooms','>=',$data['rooms'])
                ->where('bathrooms','>=',$data['bathrooms'])
                ->with(['amenities'])
                ->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('rooms',$data['rooms'])
                ->where('bathrooms', $data['bathrooms'])
                ->with(['amenities'])
                ->get();
            }
            
            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        }

        if($data['rooms'] == 'All' && $data['beds'] != 'All' && $data['bathrooms'] != 'All'){
            if($data['beds'] == '10+' || $data['bathrooms'] == '10+'){
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('beds','>=',$data['beds'])
                ->where('bathrooms','>=',$data['bathrooms'])
                ->with(['amenities'])
                ->get();
            } else{
                $apartments = Apartment::where('address', 'like', '%' . $data['address'] . '%')
                ->where('beds',$data['beds'])
                ->where('bathrooms', $data['bathrooms'])
                ->with(['amenities'])
                ->get();
            }
            
            return response()->json(
                [
                    'results' => $apartments,
                    'success' => true
                ]
            );
        }
    }
=======

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

    
>>>>>>> new-single-apartment-page
}
