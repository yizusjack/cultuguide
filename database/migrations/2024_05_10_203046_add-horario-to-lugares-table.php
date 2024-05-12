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
        Schema::table('lugares', function (Blueprint $table) {
            $table->time('horario_apertura')->default('00:00');
            $table->time('horario_cierre')->default('00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lugares', function (Blueprint $table) {
            $table->dropColumn('horario_apertura');
            $table->dropColumn('horario_cierre');
        });
    }
};
