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
        Schema::table('users', function (Blueprint $table) {
            //Se añaden columnas para el apartado de usuarios
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('role')->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //Se eliminan las columnas al hacer rollback
            $table->dropColumn('image');
            $table->dropColumn('phone');
            $table->dropColumn('lastname');
            $table->dropColumn('role');
            $table->dropColumn('status');

        });
    }
};
