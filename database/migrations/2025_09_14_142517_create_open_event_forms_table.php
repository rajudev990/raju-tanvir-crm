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
        Schema::create('open_event_forms', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('country')->nullable();
            $table->string('sfname')->nullable();
            $table->string('slname')->nullable();
            $table->string('dob')->nullable();
            $table->string('start_date')->nullable();
             $table->json('time')->nullable();
            $table->string('questions')->nullable();
            $table->string('terms')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_event_forms');
    }
};
