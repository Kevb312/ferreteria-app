<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refaccion extends Model
{
    //
    protected $table = 'refaccion';
    protected $fillable = ['fk_marca_id', 'refaccion_nombre', 'refaccion_descripcion', 'refaccion_imagen'];
}
