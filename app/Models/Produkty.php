<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Produkty extends Model
{
    use HasFactory;
    use SoftDeletes;
  

    protected $table='produkty';

    protected $fillable = [
        'Nazwa',
        'Cena',
        'Cena',
        'Zdjecie',
        'Ilosc',
        'JednostkaMiary',
        'Opis',
        'fk_kategorie'
    ];
}
