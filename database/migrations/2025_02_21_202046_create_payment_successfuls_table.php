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
        Schema::create('payment_successfuls', function (Blueprint $table) {
            $table->id();

            $table->string('matric_no')->nullable();
		    $table->string('name')->nullable(); // Discriminator column
            $table->string('email')->nullable();
            $table->string('faculty')->nullable();
		    $table->string('department')->nullable(); // Discriminator column
            $table->text('programme')->nullable();
            $table->string('level')->nullable();
		    $table->string('receipt_no')->nullable(); // Discriminator column
            $table->text('reference_no')->nullable();
            $table->string('payment_name')->nullable();
		    $table->string('academic_section')->nullable(); // Discriminator column
            $table->text('amount_paid')->nullable();
            $table->longText('amount_in_words')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_successfuls');
    }
};
