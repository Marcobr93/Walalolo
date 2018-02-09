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
            $table->string('slug')->unique();
            $table->string('name')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->string('dni')->unique()->nullable();
            $table->string('num_telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('website')->nullable();
            $table->text('descripcion')->nullable();
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
