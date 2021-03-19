<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gospodarstwo extends Model
{
    use HasFactory;
    use SoftDeletes;
  

    protected $table='gospodarstwo_dane';

    protected $fillable = [
        'Imie_Wlasciciel',
        'Nazwisko_Wlasciciel',
        'Miejscowosc',
        'Kod_Pocztowy',
        'Poczta_Miejscowosc',
        'Telefon',
        'Email',

        
    ];
}
