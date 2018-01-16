<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolosTable extends Migration
{

    public function up()
    {
        Schema::create('protocolos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_protocolo')->nullable();
            $table->string('universidad')->nullable();
            $table->string('facultad')->nullable();
            $table->string('carrera')->nullable();
            $table->text('introduccion')->nullable();
            $table->text('antecedentes')->nullable();
            $table->text('objetivos')->nullable();
            $table->text('obj_particulares')->nullable();
            $table->text('justificacion')->nullable();
            $table->text('herramientas')->nullable();
            $table->text('entregables')->nullable();
            $table->text('preguntas_guia')->nullable();
            $table->integer('semestre')->nullable();
            $table->string('grupo')->nullable();
            $table->date('fec_ini')->nullable();
            $table->date('fec_fin')->nullable();
            $table->boolean('activo')->default(1);
            $table->boolean('aceptado')->default(0);

            //Llaves foraneas!!!!!!!!!!!!!!
            $table->integer('carrera_id')->unsigned();
            $table->integer('ciclo_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('protocolos');
    }
}
