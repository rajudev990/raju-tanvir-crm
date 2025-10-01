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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_serial')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('country')->nullable();
            $table->string('start_date')->nullable();
            $table->bigInteger('group_year_id')->nullable();
            $table->string('selected_year')->nullable();
            $table->bigInteger('qualification_id')->nullable();
            $table->json('core_subjects')->nullable();
            $table->json('additional_subjects')->nullable();
            $table->json('languages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
