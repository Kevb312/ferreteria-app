<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalProvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal_prov', function (Blueprint $table) {
            $table->id('sucursal_id');
            $table->unsignedBigInteger('fk_proveedor_id');
            $table->foreign('fk_proveedor_id')
            ->references('proveedor_id')
            ->on('proveedor');
            $table->text('sucursal_nombre');
            $table->text('sucursal_direccion');
            $table->text('sucursal_telefono');
            $table->text('sucursal_telefono_2');
            $table->text('sucursal_correo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal_prov');
    }
}
