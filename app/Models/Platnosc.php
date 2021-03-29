<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platnosc extends Model
{
    use HasFactory;

    protected $table='platnosc';

    protected $fillable = [
        'platnosc'
    ];

    public function platnosc()
    {
        return $this->hasMany('App\Models\Zamowienia');
    }
}
