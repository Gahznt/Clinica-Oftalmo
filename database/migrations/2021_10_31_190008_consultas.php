<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('paciente_id')->unsigned();
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('queixa', 280)->nullable();
            $table->string('diagnostico', 280)->nullable();
            $table->string('rdod', 32)->nullable();
            $table->string('rdoe', 32)->nullable();
            $table->string('rdad', 32)->nullable();
            $table->string('reod', 32)->nullable();
            $table->string('reoe', 32)->nullable();
            $table->string('read', 32)->nullable();
        });

        Schema::table('consultas', function (Blueprint $table) {
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
