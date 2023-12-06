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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->date('Fecha');
            $table->time('Hora');
            $table->enum('Tipo',['Deportivo','Cultural']);
            $table->enum('Lugar',['Polideportivo La Plata','Universidad Politécnica de Pachuca']);
            $table->string('imagen');// si está bien
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
