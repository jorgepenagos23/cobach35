<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration

{
    public function up()
    { Schema::create('boletas_parcial1', function (Blueprint $table) {
        $table->id();
        $table->string('matricula');
        $table->string('nombre_alumno');
        $table->integer('espanol1');
        $table->integer('espanol2');
        $table->integer('espanol3');
        $table->integer('matematicas1');
        $table->integer('matematicas2');
        $table->integer('matematicas3');
        $table->integer('ingles1');
        $table->integer('ingles2');
        $table->integer('ingles3');
        $table->integer('historia1');
        $table->integer('historia2');
        $table->integer('historia3');
        $table->integer('literatura1');
        $table->integer('literatura2');
        $table->integer('literatura3');
        $table->integer('orientacion1');
        $table->integer('orientacion2');
        $table->integer('orientacion3');
        $table->integer('fisica1');
        $table->integer('fisica2');
        $table->integer('fisica3');
        $table->integer('biologia1');
        $table->integer('biologia2');
        $table->integer('biologia3');
        $table->integer('civico1');
        $table->integer('civico2');
        $table->integer('civico3');
        $table->integer('sistema1');
        $table->integer('sistema2');
        $table->integer('sistema3');
        $table->decimal('promedio', 5, 2);
        $table->string('observaciones');
        $table->timestamps();
    });
    }

    public function down()
    {
        Schema::dropIfExists('boleta_parcial1');
    }
};
