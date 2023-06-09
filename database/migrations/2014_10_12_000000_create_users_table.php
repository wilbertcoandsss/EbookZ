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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('customer');
            $table->date('dob');
            $table->string('gender');
            $table->double('readTime')->default(0);
            $table->unsignedInteger('points')->default(0);
            $table->unsignedBigInteger('recentOpenedBook')->nullable();
            $table->boolean('isSubscribe')->default(false);
            $table->date('subscribeStart')->nullable();
            $table->date('subscribeEnd')->nullable();
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

