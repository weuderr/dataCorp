<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataBodies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bodies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->float('massa')->index();
            $table->float('imc');
            $table->float('gordura');
            $table->float('musculo');
            $table->integer('calorias_diarias');
            $table->tinyInteger('idade_corporal');
            $table->tinyInteger('gordura_visceral');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_bodies');
    }
}
