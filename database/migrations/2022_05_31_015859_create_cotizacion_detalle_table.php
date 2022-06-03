<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_detalle', function (Blueprint $table) {
            $table->id('cotizacion_detalle_id');
            $table->unsignedBigInteger('fk_cotizacion_id');
            $table->unsignedBigInteger('fk_refaccion_proveedor_id');
            $table->foreign('fk_cotizacion_id')
            ->references('cotizacion_id')
            ->on('cotizacion');
            $table->foreign('fk_refaccion_proveedor_id')
            ->references('refaccion_proveedor_id')
            ->on('refaccion_proveedor');
            $table->decimal('cotizacion_detalle_incremento');
            $table->decimal('cotizacion_detalle_numero_piezas');
            $table->decimal('cotizacion_detalle_mano_obra');
            $table->decimal('cotizacion_detalle_costo_parcial');
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
        Schema::dropIfExists('cotizacion_detalle');
    }
}
