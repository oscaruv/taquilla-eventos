<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;


class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guest = new Guest();
        $guest->identification= 1144105949;
        $guest->firstname="Juan";
        $guest->secondname="Arcesio";
        $guest->lastname="Riquelme";
        $guest->cellphone=301569889;
        $guest->type= 1;
        $guest->access= 1;
        $guest->save();    }
}
