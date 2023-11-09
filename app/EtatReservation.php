<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtatReservation extends Model
{
    protected $fillable = [
        'id',
        'etat',

    ];

    public $timestamps = false;

    public function reservations()
    {
        return $this->hasMany(Reservation::class,'idetat');
    }
}
