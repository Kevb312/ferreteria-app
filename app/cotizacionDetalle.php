<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizacionDetalle extends Model
{
    //
    protected $table = 'cotizacion_detalle';
    protected $fillable = [
        'fk_cotizacion_id', 
        'fk_refaccion_proveedor_id', 
        'cotizacion_detalle_incremento', 
        'cotizacion_detalle_numero_piezas',
        'cotizacion_detalle_mano_obra',
        'cotizacion_detalle_costo_parcial',
        'Activo'
    ];

}
