<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    // tabla
    protected $table = 'empleado';

    // campos
    protected $fillable = [
        'nombre',
        'email',
        'sexo',
        'area_id',
        'descripcion'
    ];

    // deshabilitar timestamp
    public $timestamps = false;

    // primary key
    protected $primaryKey = 'id';

    public const SEXO = [
        'M' => 'Masculino',
        'F' => 'Femenino'
    ];

    public function sexo()
    {
        return self::SEXO[$this->sexo];
    }

    public const BOLETIN = [
        1 => 'Si',
        0 => 'No'
    ];

    public function boletin(){
        return self::BOLETIN[$this->boletin];
    }

    public function getById($id){
        return Empleado::select('*', 'areas.nombre as area')
            ->join('areas', function($join) {
                $join->on('areas.id', '=', 'empleado.area_id');
            })->where('empleado.id', $id)->first();
    }
}
