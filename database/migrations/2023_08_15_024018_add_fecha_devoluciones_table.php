<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('devoluciones', function (Blueprint $table) {
            //Se agrega la columna de status en detalles de ventas
            $table->date('fecha')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devoluciones', function (Blueprint $table) {
            //Se elimina la columna status en detalles de ventas
            $table->dropColumn('fecha');
        });
    }
};