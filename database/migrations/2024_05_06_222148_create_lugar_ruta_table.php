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
        Schema::create('lugar_ruta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lugar_id');
            $table->unsignedBigInteger('ruta_id');
            $table->foreign('lugar_id')->references('id')->on('lugares')->onDelete('cascade');
            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugar_ruta');
    }
};
