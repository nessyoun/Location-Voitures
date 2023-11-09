<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $fillable = [
        'id',
        'marque'
    ];
    public $timestamps = false;
    public function models()
    {
        return $this->hasMany(ModelVoiture::class,'marque');
    }
}
