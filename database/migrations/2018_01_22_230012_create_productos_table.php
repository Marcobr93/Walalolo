<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_usuario');
            $table->string('titulo');
            $table->string('foto');
            $table->text('descripcion');
            $table->string('direccion');
            $table->string('poblacion');
            $table->double('precio');
            $table->string('categoria');
            $table->string('tipo_envio');
            $table->boolean('negociacion_precio');
            $table->boolean('intercambio_producto');
            $table->boolean('destacado');
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
        Schema::dropIfExists('productos');
    }
}
