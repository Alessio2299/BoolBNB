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

        $address= [
            'Via Fonte della Tegola, Rocca Priora Italia IT',
            'Via Teramo, 00176 Roma Italia IT',
            'Via Perugia, 00176 Roma Italia IT',
            'Via del Ciclone, 07026 Olbia Italia IT',
            "Via Corso, L'Aquila Italia IT",
            'Via degli Orti, Monteceneri Svizzera CH',
            "Via Brigata Sassari, Quartu Sant'Elena Italia IT",
            'Via del Campo, Venzone Italia IT',
            'Via della Crotta, Monteceneri Svizzera CH',
            'Via Roma, Bolzano Italia IT',
            'Via dei Romani, Saluzzo Italia IT',
            'Eliahu Hanavi Street Israel IL',
            'Viale Alcione, Francavilla al Mare Italia IT',
            'Rue de Pissot, Bussy-le-Grand France FR',
            "Chemin de l'Autoroute, Cessieu France FR",
            'Straußstraße, Ibbenbüren Deutschland DE',
            'Via Daniele Manin 20121 Milano Italia IT'

        ];

        for ($i = 0; $i < count($address); $i++) {

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
            $apartment->address = $address[$i];
            $apartment->lat = $faker->latitude($min = -90, $max = 90);
            $apartment->lon = $faker->longitude($min = -180, $max = 180);
            $apartment->slug = Str::slug($apartment->title);

            $apartment->save();
        }
    }
}
