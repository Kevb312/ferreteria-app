<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedor';
    protected $fillable = [
        'proveedor_nombre', 
        'proveedor_direccion', 
        'proveedor_telefono', 
        'proveedor_telefono_2',
        'proveedor_correo'
    ];
}
