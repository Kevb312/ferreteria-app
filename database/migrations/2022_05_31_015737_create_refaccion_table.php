<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refaccion', function (Blueprint $table) {
            $table->id('refaccion_id');
            $table->unsignedBigInteger('fk_marca_id');
            $table->foreign('fk_marca_id')
            ->references('marca_id')
            ->on('marca');
            $table->string('refaccion_nombre');
            $table->text('refaccion_descripcion');
            $table->text('refaccion_imagen');
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
        Schema::dropIfExists('refaccion');
    }
}
