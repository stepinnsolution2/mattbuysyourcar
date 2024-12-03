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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_year_id');
            $table->unsignedBigInteger('car_type_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('car_year_id')->references('id')->on('car_years')->onDelete('cascade');
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
