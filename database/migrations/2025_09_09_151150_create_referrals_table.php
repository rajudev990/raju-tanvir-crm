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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entry_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('address')->nullable();
            $table->string('student_fname')->nullable();
            $table->string('student_lname')->nullable();
            $table->string('student_dob')->nullable();
            $table->string('student_start_date')->nullable();
            $table->string('student_country')->nullable();
            $table->string('details1')->nullable();
            $table->string('details2')->nullable();
            $table->string('details3')->nullable();
            $table->string('details4')->nullable();
            $table->string('submission_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
