<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Time Excelindo',
                'latitude' => -7.7422191,
                'longitude' => 110.4143039,
            ],
        ])->each(function($locations){
            Location::create($locations);
        });
    }
}
