<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Apartment;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();

        $apartments_id = [];
        $messages = [];

        foreach ($apartments as $apartment) {
            $apartment_id = $apartment['id'];

            array_push($apartments_id, $apartment_id);
            $tests = Message::where('apartment_id', $apartment_id)->orderBy('created_at', 'desc')->get();

            foreach ($tests as $test) {
                if ($test != null) {
                    array_push($messages, $test);
                }
            }
        }



        return view('admin.messages.index', compact('messages', 'apartments'));
    }
}
