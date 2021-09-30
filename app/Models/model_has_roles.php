<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_has_roles extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $table='model_has_roles';

    protected $fillable = [
        'role_id',
        'model_type',
        'model_id'
        
    ];



}
