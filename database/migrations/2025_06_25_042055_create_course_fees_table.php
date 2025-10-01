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
        Schema::create('course_fees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_year_id')->nullable();
            $table->bigInteger('qualification_id')->nullable();
            $table->string('contract')->nullable();
            $table->string('contract_year')->nullable();
            $table->string('list_one')->nullable();
            $table->string('list_one_status')->nullable();
            $table->string('list_two')->nullable();
            $table->string('list_two_status')->nullable();
            $table->string('list_three')->nullable();
            $table->string('list_three_status')->nullable();
            $table->string('additional_subjects_price')->nullable();
            $table->string('additional_subjects_text')->nullable();
            $table->longText('additional_fees_description')->nullable();
            $table->text('course_description')->nullable();
            $table->string('additional_fees_text_one')->nullable();
            $table->string('additional_fees_text_one_price')->nullable();
            $table->string('additional_fees_text_two')->nullable();
            $table->string('additional_fees_text_two_price')->nullable();
            $table->string('additional_fees_text_three')->nullable();
            $table->string('additional_fees_text_three_price')->nullable();
            $table->string('additional_fees_text_four')->nullable();
            $table->string('additional_fees_text_four_price')->nullable();
            $table->float('saving')->nullable();
            $table->float('admission_fee')->nullable();
            $table->float('deposit_fee')->nullable();
            $table->float('application_process_fee')->nullable();
            $table->float('course_fee')->nullable();
            $table->float('persubject_price')->nullable();
            $table->float('hifdh_programme_price')->nullable();
            $table->string('course_fee_text')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_fees');
    }
};
