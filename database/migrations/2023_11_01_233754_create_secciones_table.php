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
            $table->string('nombre')->nullable();
            $table->string('nombre_subseccion')->nullable();
            $table->unsignedBigInteger('contenido_id')->nullable();
            $table->foreign('contenido_id')->references('id')->on('contenidos_seccion');
            $table->enum('tipo', ['seccion', 'subseccion', 'contenido', 'sistema'])->default('seccion');
            $table->boolean('visible')->default(true);
            $table->unsignedBigInteger('seccion_id_padre')->nullable();
            $table->foreign('seccion_id_padre')->references('id')->on('secciones')->onDelete('cascade');
            $table->integer('orden_presentacion')->nullable();
            $table->string('ruta')->nullable()->default('/ruta');
            $table->string('nombre_componente')->nullable()->default('componente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};