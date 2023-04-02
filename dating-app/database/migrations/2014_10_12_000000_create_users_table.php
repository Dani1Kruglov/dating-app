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
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('dislikes')->default(0);
            $table->string('role')->default('user');
            $table->string('country')->default('null');
            $table->string('city')->default('null');
            $table->string('family_status')->default('Свободен');
            $table->string('gender');
            $table->string('email')->unique();
            $table->date('birth_date');
            $table->text('content')->default('null');
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
