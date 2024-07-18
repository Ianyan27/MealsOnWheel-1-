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
        Schema::create('meals', function (Blueprint $table) {
            $table->id('meal_id');
            $table->bigInteger('caregiver_id')->unsigned();
            $table->string('meal_name');
            $table->string('meal_description');
            $table->string('meal_image');
            $table->string('meal_type');
            $table->string('day');
            $table->timestamps();
            $table->foreign('caregiver_id')->references('caregiver_id')->on('caregivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
