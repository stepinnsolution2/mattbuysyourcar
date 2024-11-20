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
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->string('car_type')->nullable();
            $table->string('model')->nullable();
            $table->string('specification')->nullable();
            $table->string('engine_size')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('kilometers')->nullable();
            $table->string('gcc_spec')->nullable();
            $table->string('condition')->nullable();
            $table->string('paintwork')->nullable();
            $table->string('interior_condition')->nullable();
            $table->string('service_history')->nullable();
            $table->string('loan_secured')->nullable();
            $table->text('comment')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->json('car_images')->nullable(); // Store image paths as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_details');
    }
};
