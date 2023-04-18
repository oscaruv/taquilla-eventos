<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    
    public function index(){
        return view('welcome');
    }
    
    public function login(){

        if(Auth::check())
        {
            return redirect()->route('admin.index');
        }
        else
        {
            return view('welcome');
        }
    }

    public function authenticate(Request $request){
        
        // dump($request->all()); 
        // $data = $request->all();
        // dd($data['adname'],$data['psw']);
        $credentials = $request->validate(['adname' => ['required'], 'password' => ['required'] ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        else {   
            return back()->withErrors([
                'adname' => 'Incorrect information.',
            ]); 
        }
    }

}
