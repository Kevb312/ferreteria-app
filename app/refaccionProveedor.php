<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class refaccionProveedor extends Model
{
    //
    protected $table = 'refaccion_proveedor';
    protected $fillable = [
        'fk_refaccion_id', 
        'fk_proveedor_id', 
        'precio', 
        'created_at',
    ];
}
