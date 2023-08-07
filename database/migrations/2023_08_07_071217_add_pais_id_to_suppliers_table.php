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
        Schema::table('suppliers', function (Blueprint $table) {
            //se agrega campo de pais y cuidad de la base de datos de clientes
            $table->unsignedBigInteger('pais_id')->nullable()->after('imagen');
            $table->foreign('pais_id')->references('id')->on('countries')->onDelete('set null');
            $table->string('ciudad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //se eliminan columnas
            $table->dropColumn('pais_id');
            $table->dropColumn('ciudad');
        });
    }
};