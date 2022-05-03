<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['title', 'description', 'rooms', 'beds', 'bathrooms', 'square_meters', 'image', 'availability', 'slug'];
}
