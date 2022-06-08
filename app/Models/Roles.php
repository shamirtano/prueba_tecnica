<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    // tabla
    protected $table = 'empleado_rol';

    // ignorar timestamps
    public $timestamps = false;

}
