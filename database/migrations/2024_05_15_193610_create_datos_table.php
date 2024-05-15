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
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->string('edad');
            $table->string('ciudad');
            $table->string('presupuesto');
            $table->timestamps();
        });

        Schema::table('lugares', function (Blueprint $table) {
            $table->unsignedBigInteger('datos_id')->nullable()->default(null);
            $table->foreign('datos_id')->references('id')->on('datos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lugares', function (Blueprint $table) {
            $table->dropForeign(['datos_id']);

            $table->dropColumn('datos_id');
        });
        
        Schema::dropIfExists('datos');

    }
};
