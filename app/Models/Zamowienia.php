<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zamowienia extends Model
{
    use HasFactory;

    protected $table='zamowienie';

    protected $fillable = [
        'fk_uzytkownik',
        'fk_platnosc',
        'ZamowienieStatus',
        'ZamowienieKoszt'
    ];

}
