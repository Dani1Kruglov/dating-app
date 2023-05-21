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
        Schema::create('user_with_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_1_id')->constrained('users');
            $table->boolean('is_like_from_user_1');
            $table->foreignId('user_2_id')->constrained('users');
            $table->boolean('is_like_from_user_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_with_users');
    }
};
