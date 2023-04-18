<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Guest extends Model
{
    use HasFactory;
    protected $primaryKey = 'identification';
    protected $fillable = ['identification', 'firstname','secondname','lastname','cellphone','type'];

    public function getGuests($parameters){
        $type = $parameters['type'];
        $guests = Guest::whereNull('deleted_at')
                                ->where('identification','like',$parameters['identification'].'%')
                                ->where('firstname','like',$parameters['firstname'].'%')
                                ->where('secondname','like',$parameters['secondname'].'%')
                                ->where('lastname','like',$parameters['lastname'].'%')
                                ->where('cellphone','like',$parameters['cellphone'].'%')
                                ->when($type, function($query, $type){
                                    $query->where('type','like','%'.$type.'%');
                                })
                                ->get();

        return $guests;
        }

        public function store(Request $request){
    
            $guest = new Guest;
            $guest->identification = $request->all()['identification'];
            $guest->firstname = $request->all()['firstname'];
            $guest->secondname = $request->all()['secondname'];
            $guest->lastname = $request->all()['lastname'];
            $guest->cellphone = $request->all()['cellphone'];
            $guest->type = $request->all()['type'];
            $guest->access = 0;
            $bool = $guest->save();
            return $bool;
        }

        public function getGuest($id){
            $guest = Guest::find($id);
            return $guest;
        }
}
