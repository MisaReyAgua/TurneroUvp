<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // create_turnos_table.php
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_estudiante');
            $table->unsignedBigInteger('casilla_id');
            $table->foreign('casilla_id')->references('id')->on('casillas')->onDelete('cascade');
            $table->timestamp('hora_asignada');
            $table->boolean('atendido')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
