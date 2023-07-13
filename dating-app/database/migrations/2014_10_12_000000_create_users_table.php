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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumInteger('age');
            $table->string('email')->unique();
            $table->string('role')->default('user');
            $table->date('birth_date');
            $table->string('country')->default('Страна');
            $table->string('city')->default('Город');
            $table->string('family_status')->default('Свободен');
            $table->string('gender');
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('dislikes')->default(0);
            $table->string('user_preferences')->default('all');
            $table->text('content')->default('О себе');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
