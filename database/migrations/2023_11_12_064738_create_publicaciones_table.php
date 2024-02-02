<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {  Schema::create('publicaciones', function (Blueprint $table) {
        $table->id();
        $table->text('titulo');
        $table->text('descripcion');
        $table->date('fecha')->default(now());
        $table->enum('tipo', ['banner', 'publicacion']);
        $table->string('publicador')->nullable();
        $table->string('imagen')->nullable()->default('');
        $table->unsignedBigInteger('seccion_id')->nullable();
        $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
        $table->unsignedBigInteger('subseccion_id')->nullable();
        $table->foreign('subseccion_id')->references('id')->on('secciones')->onDelete('cascade');
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
