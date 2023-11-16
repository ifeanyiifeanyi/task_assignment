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
            $table->string('parish')->nullable();
            $table->string('home_parish')->nullable();
            $table->string('parish_of_residence')->nullable();
            $table->string('dioceses')->nullable();
            $table->boolean('inter_dioceses')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('column');
            $table->dropColumn('parish');
            $table->dropColumn('home_parish');
            $table->dropColumn('parish_of_residence');
            $table->dropColumn('dioceses');
            $table->dropColumn('inter_dioceses');
        });
    }
};