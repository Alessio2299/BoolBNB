<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['title', 'description', 'rooms', 'beds', 'bathrooms', 'square_meters', 'image', 'availability', 'street', 'civic_number', 'zip_code', 'city', 'country', 'lat', 'lon', 'slug'];

    public function amenities() {
        return $this->belongsToMany('App\Amenity');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

