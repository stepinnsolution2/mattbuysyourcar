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
        Schema::create('car_years', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('car_type_id');
            $table->integer('year');
            $table->timestamps();

            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_years');
    }
};
