<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefaccionProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refaccion_proveedor', function (Blueprint $table) {
            $table->id('refaccion_proveedor_id');
            $table->unsignedBigInteger('fk_refaccion_id');
            $table->unsignedBigInteger('fk_proveedor_id');
            $table->foreign('fk_refaccion_id')
            ->references('refaccion_id')
            ->on('refaccion');
            $table->foreign('fk_proveedor_id')
            ->references('proveedor_id')
            ->on('proveedor');
            $table->timestamps();
            $table->decimal('precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refaccion_proveedor');
    }
}
