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
        Schema::create('caregivers', function (Blueprint $table) {
            $table->bigInteger("user_id")->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('working_day');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregivers');
    }
};
