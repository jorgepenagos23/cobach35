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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->integer('n');
            $table->integer('grado'); 
            $table->string('grupo'); 
            $table->string('matricula')->unique();
            $table->string('nombre_completo',255);
            $table->string('curp',18);
            $table->string('observaciones',);

            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
     
    }
};
