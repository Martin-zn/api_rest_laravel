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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_cotizacion_id')->constrained('solicitudes_cotizacions')->cascadeOnDelete();
            $table->foreignId('proveedor_id')->constrained('proveedors')->cascadeOnDelete();
            $table->date('fecha_cotizacion');
            $table->decimal('valor_total', 10, 2);
            $table->string('archivo')->nullable();
            $table->string('estado'); // pendiente, aceptada, rechazada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
