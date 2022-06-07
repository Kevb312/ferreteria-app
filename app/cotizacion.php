<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
    //
    protected $table = 'cotizacion';
    protected $fillable = [
        'cotizacion_nombre_cliente', 
        'cotizacion_descripcion_coche', 
        'cotizacion_costo_total', 
        'created_at'
    ];
}
