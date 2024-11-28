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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('utube_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('faq_header')->nullable();
            $table->longText('faq_description')->nullable(); // Changed to longText
            $table->string('testimonial_header')->nullable();
            $table->longText('testimonial_description')->nullable(); // Changed to longText
            $table->string('Uniqueness_header')->nullable();
            $table->longText('Uniqueness_description')->nullable(); // Changed to longText
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
