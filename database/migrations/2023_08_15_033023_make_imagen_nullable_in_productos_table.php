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
            //Se coloca la columna de imagen como opcional en la tabla productos
            $table->string('imagen')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            //Se elimina la opcionalidad del campo imagen en la tabla de productos
            $table->string('imagen')->nullable(false)->change();
        });
    }
};
