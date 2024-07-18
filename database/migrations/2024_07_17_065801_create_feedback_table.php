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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('meal_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('feedback');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('meal_id')->references('meal_id')->on('meals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
