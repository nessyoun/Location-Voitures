<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelVoiture extends Model
{
    protected $fillable = [
        'model_voiture'
    ];
    public $timestamps = false;
    public function marqueOrigin()
    {
        return $this->belongsTo(Marque::class, 'marque');
    }
    public function voitures()
    {
        return $this->hasMany(Voitures::class);
    }
}
