<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('boletas_calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->string('numero_boleta');
            $table->string('nombre');
            $table->float('calificacion_parcial_1')->nullable();
            $table->float('calificacion_parcial_2')->nullable();
            $table->float('calificacion_parcial_3')->nullable();
            $table->integer('materias_recursadas')->default(0);
            $table->float('promedio')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('boletas_calificaciones');
    }
};
