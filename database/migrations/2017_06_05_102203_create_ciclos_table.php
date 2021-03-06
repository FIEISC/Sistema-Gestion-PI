<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiclosTable extends Migration
{

    public function up()
    {
        Schema::create('ciclos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_ciclo')->unique();
            $table->integer('ciclo');
            $table->date('fec_ini');
            $table->date('fec_fin');
            $table->boolean('activo')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ciclos');
    }
}
