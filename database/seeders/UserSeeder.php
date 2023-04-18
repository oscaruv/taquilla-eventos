<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{    /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
       $user = new User();
       $user->adname="admin_og";
       $user->password= Hash::make('enter');
       $user->save();
   }
}
