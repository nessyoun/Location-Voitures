<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'id',
        'date_de_creation',
        'date_debut',
        'date_fin'
    ];
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class, 'cin');
    }
    public function Voiture()
    {
        return $this->belongsTo(Voiture::class, 'voiture');
    }
    public function etat()
    {
        return $this->belongsTo(EtatReservation::class,'id_etat');
    }
    public function calendrier()
    {
        return $this->belongsTo(Calendrier::class, 'idCalendrier');
    }
}
