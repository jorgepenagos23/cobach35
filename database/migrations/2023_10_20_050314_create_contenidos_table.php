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
        Schema::create('contenidos_seccion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->default('');
            $table->text('descripcion');
            $table->string('publicador')->default('');
            $table->string('imagen')->nullable()->default('');
            $table->date('fecha')->nullable();

            $table->timestamps();
            
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos_seccion');
    }
};
