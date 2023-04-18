<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;



class GuestController extends Controller
{
    public function find(Request $request){
        $parameters = $request->all();
        $guest = new Guest();
        $guests = $guest->getGuests($parameters);
        return response()->json([
            'guests' => $guests,
            'status' => 200,
            'message' => 'Guest was found',
        ]);
    }

    
    public function insert(Request $request){
        $validator = Validator::make($request->all(),[
            'identification' => 'required|unique:guests|integer',
            'firstname' => 'required',
            'secondname' => 'required',
            'lastname' => 'required',
            'cellphone' => 'required',
            'type' => 'required',

        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        $guest = new Guest();
        if($guest->store($request)){
            return response()->json([
                'status' => 200,
                'message' => 'Guest added correctly',
            ]);
        }else {
            return response()->json([
                'status' => 400,
                'errors' => 'Error creating guest',
            ]);
        }
    }






}
