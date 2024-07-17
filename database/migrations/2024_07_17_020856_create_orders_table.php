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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('meal_id')->unsigned();
            $table->bigInteger('caregiver_id')->unsigned();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_phone_number');
            $table->string('order_meal_image');
            $table->string('order_meal_name')->nullable();
            $table->string('order_pickup_time')->nullable();
            $table->string('order_delivered_time')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('meal_id')->references('meal_id')->on('meals')->onDelete('cascade');
            $table->foreign('caregiver_id')->references('caregiver_id')->on('caregivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
