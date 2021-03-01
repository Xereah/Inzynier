<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategorie extends Model
{
    use HasFactory;
    use SoftDeletes;
  

    protected $table='kategorie';

    protected $fillable = [
        'Nazwa',
        'Opis',
        
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Produkty');
    }
}
