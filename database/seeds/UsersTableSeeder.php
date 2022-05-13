<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {

            $user = new User();
            $user->name =  $faker->name();
            $user->surname =  $faker->lastName();
            $user->email =  $faker->email();
            $user->password =  Hash::make('password');

            $user->save();
        }
    }
}
