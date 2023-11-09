<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    'id',
    'tel',
    'permis'
    ];

    public $timestamps = false;

    public function reservations()
    {
        return $this->hasMany(Reservation::class,'cin');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
