<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('class')->nullable();
            $table->string('school')->nullable();
            $table->string('parish')->nullable();
            $table->string('home_parish')->nullable();
            $table->string('parish_of_residence')->nullable();
            $table->string('dioceses')->nullable();
            $table->boolean('inter_dioceses')->default(false);
            $table->string('role')->default('member');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        User::create([
            'name' => 'Admin Manager',
            'username' => 'admin',
            'phone' => '08123456789',
            'photo' => 'https://fakeimg.pl/400x400/12afe3/f0f0f0?text=ADMIN&font=noto',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};