<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_name', 'sender_email', 'message'];

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
