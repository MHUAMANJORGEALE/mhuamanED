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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->foreignId('evento_id')->constrained()->onDelete('cascade'); // Foreign key hacia 'eventos'
            $table->string('nombre_entrada'); // Nombre de la entrada
            $table->text('descripcion'); // Descripción de la entrada
            $table->decimal('precio', 10, 2); // Precio de la entrada
            $table->integer('cantidad'); // Cantidad de entradas
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
