<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = ['id',
        'nom',
        'addresse',
        'tel',
        'fix',
        'chiffreAffaire'
    ];
    public $timestamps = false;
    public function voitures()
    {
        return $this->hasMany(Voiture::class,'idAgence');
    }
}
