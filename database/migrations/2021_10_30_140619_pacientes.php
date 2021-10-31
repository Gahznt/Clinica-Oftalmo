<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paciente_id', 100);
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('queixa', 280);
            $table->string('diagnostico', 280);
            $table->string('rdod', 32);
            $table->string('rdoe', 32);
            $table->string('rdad', 32);
            $table->string('reod', 32);
            $table->string('reoe', 32);
            $table->string('read', 32);
        });

        Schema::table('pacientes', function (Blueprint $table) {
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
