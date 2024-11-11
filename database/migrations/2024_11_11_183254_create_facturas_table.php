<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_factura')->unique();
            $table->date('fecha_emision');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->decimal('monto_total', 10, 2);
            $table->decimal('impuestos', 10, 2);
            $table->enum('estado', ['pagado', 'pendiente', 'anulado'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
