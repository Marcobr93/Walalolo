<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valora_user_id')->unsigned();
            $table->integer('valorado_user_id')->unsigned();
            $table->integer('valoracion')->unsigned();
            $table->timestamps();

            $table->foreign('valora_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('valorado_user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoracions');
    }
}
