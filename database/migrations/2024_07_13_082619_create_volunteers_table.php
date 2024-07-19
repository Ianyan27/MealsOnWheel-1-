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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id('volunteer_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('volunteer_name');
            $table->string('email');
            $table->string('payment')->nullable();
            $table->integer('donation_amount')->nullable();
            $table->string('message')->nullable();
            $table->timestamp('donation_date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
