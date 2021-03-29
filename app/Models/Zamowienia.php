<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public function zamowienia()
    {
        return $this->belongsTo('App\Models\User','fk_uzytkownik');
    }

    public function zamowieniaplatnosc()
    {
        return $this->belongsTo('App\Models\Platnosc','fk_platnosc');
    }

}
