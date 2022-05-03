<?php

use App\Amenity;
use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = ['Wi-Fi', 'Posto macchina', 'Portineria', 'Sauna', 'Vista mare'];
        
        foreach($amenities as $amenity){
            $newAmenity = new Amenity();
            $newAmenity -> name = $amenity;
            $newAmenity -> save();
        }
    }
}
