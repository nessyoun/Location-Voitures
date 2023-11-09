<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    protected $fillable = [
        'id',
        'date_mise_en_service',
        'main_image',
        'images',
        'prix'
    ];
    public $timestamps = false;
    public function Agence()
    {
        return $this->belongsTo(Agence::class, 'id_agence');
    }
    public function modelVoiture()
    {
        return $this->belongsTo(ModelVoiture::class, 'model');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class,'voiture');
    }
}
