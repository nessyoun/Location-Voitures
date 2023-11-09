<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendrier extends Model
{
    protected $fillable = [
    'id',
    'mois',
    'year'
    ];
    public $timestamps = false;

    public function reservations()
    {
        return $this->hasMany(Reservation::class,'idCalendrier');
    }
}
