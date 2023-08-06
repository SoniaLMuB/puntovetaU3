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
        Schema::table('productos', function (Blueprint $table) {
            //Se agrega el campo de subcategoria a la tabla de productos
            $table->unsignedBigInteger('subcategoria_id')->nullable()->after('nombre');
            $table->foreign('subcategoria_id')->references('id')->on('subcategoria')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            //Se elimina la columnas de la tabla productos
            $table->dropColumn('subcategoria_id');
        });
    }
};
