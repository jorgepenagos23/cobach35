<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->integer('orden_presentacion')->nullable();
            $table->string('nombre');
            $table->boolean('visible')->default(false);
            $table->unsignedBigInteger('seccion_id')->nullable()->default(NULL);
            $table->foreign("seccion_id", "fk_subseccion")->on("secciones")->references("id");
            $table->string('objetivo')->nullable();
            $table->enum('tipo', ['seccion', 'contenido', 'sistema']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};