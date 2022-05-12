<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Provider\Image;
use Faker\Provider\en_US\Address;




class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $files = Storage::files('images');


        for ($i = 0; $i < count($files); $i++) {

            $apartment = new Apartment();
            $apartment->user_id = $faker->randomNumber(1, 30);
            $apartment->title = 'apartment ' . $faker->word();
            $apartment->description = $faker->sentence(20);
            $apartment->rooms = $faker->numberBetween(1, 30);
            $apartment->beds =  $faker->numberBetween(1, 40);
            $apartment->bathrooms =  $faker->numberBetween(1, 20);
            $apartment->square_meters = $faker->numberBetween(10, 1000);
            $apartment->image = $files[$i];
            $apartment->availability = $faker->numberBetween(0, 1);
            $apartment->address = $faker->address();
            $apartment->lat = $faker->latitude($min = -90, $max = 90);
            $apartment->lon = $faker->longitude($min = -180, $max = 180);
            $apartment->slug = Str::slug($apartment->title);

            $apartment->save();
        }
    }
}
