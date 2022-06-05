<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    //
    protected $table = 'sucursal_prov';
    protected $fillable = [
        'fk_proveedor_id', 
        'sucursal_nombre', 
        'sucursal_direccion', 
        'sucursal_telefono',
        'sucursal_telefono_2',
        'sucursal_correo'
    ];
}
