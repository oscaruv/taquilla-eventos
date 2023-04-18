<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'adname',
        'password',
    ];


    public function getAdmins(){
        $admins = Admin::all();
        return $admins;
    }

    public function store(Request $request){
    
        $admin = new Admin;
        $admin->adname = $request->all()['adname'];
        $admin->password = Hash::make($request->all()['password']);
        $bool = $admin->save();
        return $bool;
    }
}
