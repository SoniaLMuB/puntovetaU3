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
            //Se añade la columna 
            $table->text('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //Se elimina la columna con un rollback
            $table->dropColumn('descripcion');
        });
    }
};
