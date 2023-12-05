<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('segundo__b__boleta_parcial1s', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('nombre_alumno');
            $table->integer('espanol1')->nullable();
            $table->integer('espanol2')->nullable();
            $table->integer('espanol3')->nullable();
            $table->integer('matematicas1')->nullable();
            $table->integer('matematicas2')->nullable();
            $table->integer('matematicas3')->nullable();
            $table->integer('ingles1')->nullable();
            $table->integer('ingles2')->nullable();
            $table->integer('ingles3')->nullable();
            $table->integer('historia1')->nullable();
            $table->integer('historia2')->nullable();
            $table->integer('historia3')->nullable();
            $table->integer('literatura1')->nullable();
            $table->integer('literatura2')->nullable();
            $table->integer('literatura3')->nullable();
            $table->integer('orientacion1')->nullable();
            $table->integer('orientacion2')->nullable();
            $table->integer('orientacion3')->nullable();
            $table->integer('fisica1')->nullable();
            $table->integer('fisica2')->nullable();
            $table->integer('fisica3')->nullable();
            $table->integer('biologia1')->nullable();
            $table->integer('biologia2')->nullable();
            $table->integer('biologia3')->nullable();
            $table->integer('civico1')->nullable();
            $table->integer('civico2')->nullable();
            $table->integer('civico3')->nullable();
            $table->integer('sistema1')->nullable();
            $table->integer('sistema2')->nullable();
            $table->integer('sistema3')->nullable();
            $table->decimal('promedio', 5, 2)->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segundo__b__boleta_parcial1s');
    }
};
