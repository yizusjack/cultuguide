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
            $table->string('tag')->default("Cultura");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lugares', function (Blueprint $table) {
            $table->dropColumn('tag');
        });
    }
};
