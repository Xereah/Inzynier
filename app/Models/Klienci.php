<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klienci extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table='klienci';

    protected $fillable = [
        'name',
        'surname',
        'adress',
        'email',
        'phone'
    ];
}
