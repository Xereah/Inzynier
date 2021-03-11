<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZamowienieSzczegoly extends Model
{
    use HasFactory;

    protected $table='zamowienie_szczegoly';

    protected $fillable = [
        'fk_produkt',
        'fk_zamowienie',
        'ProduktNazwa',
        'ProduktCena',
        'ProduktIlosc'
    ];
}
