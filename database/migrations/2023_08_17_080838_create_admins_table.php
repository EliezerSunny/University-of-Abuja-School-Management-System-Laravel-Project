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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('session_id')->constrained()->onDelete('cascade');
            $table->foreignId('unique_id')->nullable();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('picture')->nullable();
            $table->string('password');
            $table->rememberToken('reset_password_token')->nullable();
            $table->string('school_email')->nullable();
            $table->string('email');
            $table->string('phone_no')->nullable();
            $table->string('location')->nullable();
            $table->string('last_activity')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
