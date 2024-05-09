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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('icon');
            $table->string('color');
            $table->string('redirect_to')->nullable()->default(null);
            $table->unsignedInteger('redirect_parameter')->nullable()->default(null);
            $table->timestamp('readed_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
