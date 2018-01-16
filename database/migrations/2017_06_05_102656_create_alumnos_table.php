<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
 
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_alumno');
            $table->string('email')->unique();
            $table->integer('semestre');
            $table->boolean('activo')->default(1);

            //Llaves foraneas!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $table->integer('equipo_id')->unsigned()->nullable();
            $table->integer('carrera_id')->unsigned();
            $table->integer('plantel_id')->unsigned();

            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('plantel_id')->references('id')->on('planteles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
