<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_usuario')->unique();
            $table->string('name');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->string('password');
            $table->string('dni')->unique();
            $table->string('num_telefono')->nullable();
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('website')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('num_productos')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
