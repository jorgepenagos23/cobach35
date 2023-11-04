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
        Schema::create('alumno_reportes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('matricula');
            $table->date('fecha');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('reporte_id');
            $table->foreign('reporte_id')->references('id')->on('reportes');
            $table->foreign('usuario_id')->references('id')->on('alumnos');



            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('alumno_reportes');
    }


};