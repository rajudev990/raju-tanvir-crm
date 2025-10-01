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
        Schema::create('form_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_submission_id'); // parent form id

            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('start_date')->nullable();
            $table->string('group_id')->nullable();
            $table->string('year_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('hifdh')->default(0);

            $table->string('student_file1')->nullable();
            $table->string('student_file2')->nullable();

            $table->json('hifdh_subjects')->nullable();

            $table->json('language_subjects')->nullable();
            $table->json('core_subjects')->nullable();
            $table->json('islamic_subjects')->nullable();
            $table->json('additional_subjects')->nullable();

            $table->foreign('form_submission_id')
                ->references('id')->on('form_submissions')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_students');
    }
};
