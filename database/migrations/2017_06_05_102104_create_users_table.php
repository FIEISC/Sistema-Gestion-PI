<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_docente');
            $table->string('no_docente')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol')->default(4);
            /*$table->string('plantel');*/
            $table->string('c_carr')->default('N');
            $table->string('t_proy')->default('N');
            $table->integer('t_semestre')->default(0);
            $table->boolean('activo')->default(0);

            //LLave foreanea!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            $table->integer('plantel_id')->unsigned();
            $table->foreign('plantel_id')->references('id')->on('planteles')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
