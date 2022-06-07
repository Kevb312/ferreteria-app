<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionDetalleTemporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_detalle_temporal', function (Blueprint $table) {
            $table->id('cotizacion_detalle_temporal_id');
            $table->unsignedBigInteger('fk_cotizacion_id_temporal');
            $table->unsignedBigInteger('fk_refaccion_proveedor_id_temporal');

            $table->foreign('fk_cotizacion_id_temporal')
            ->references('cotizacion_id')
            ->on('cotizacion');
            
            $table->foreign('fk_refaccion_proveedor_id_temporal')
            ->references('refaccion_proveedor_id')
            ->on('refaccion_proveedor');
            $table->decimal('cotizacion_detalle_incremento_temporal');
            $table->decimal('cotizacion_detalle_numero_piezas_temporal');
            $table->decimal('cotizacion_detalle_mano_obra_temporal');
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
        Schema::dropIfExists('cotizacion_detalle_temporal');
    }
}
