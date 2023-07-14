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
        Schema::table('suppliers', function (Blueprint $table) {
            //Se añaden las columnas
            $table->string('nombre');
            $table->string('codigo');
            $table->string('email');
            $table->string('telefono');
            $table->string('pais');
            $table->string('imagen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //
            $table->dropColumn('nombre');
            $table->dropColumn('codigo');
            $table->dropColumn('email');
            $table->dropColumn('telefono');
            $table->dropColumn('pais');
            $table->dropColumn('imagen');
        });
    }
};
