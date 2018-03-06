<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContraofertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendedor_user_id')->unsigned();
            $table->integer('comprador_user_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->double('oferta');
            $table->string('estado_oferta');
            $table->timestamps();

            $table->foreign('vendedor_user_id')->references('user_id')->on('productos')->onDelete('cascade');
            $table->foreign('comprador_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contraofertas');
    }
}
