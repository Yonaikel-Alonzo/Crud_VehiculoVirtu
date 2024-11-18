<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculo';

    protected $fillable = [
        'tipo_vehiculo',
        'descripcion_vehiculo',
        'categoria',
        'fecha_creacion_matricula',
        'fecha_caducidad_matricula',
    ];
}
