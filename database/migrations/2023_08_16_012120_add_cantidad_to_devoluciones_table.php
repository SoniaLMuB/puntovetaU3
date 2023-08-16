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
        Schema::table('devoluciones', function (Blueprint $table) {
            //Se agrega la columna de cantidad a la tabla de devoluciones
            $table->integer('cantidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devoluciones', function (Blueprint $table) {
            //Se elimina la columna de cantidad en un rollback
            $table->dropColumn('cantidad');
        });
    }
};
