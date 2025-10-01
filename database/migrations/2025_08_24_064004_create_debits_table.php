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
        Schema::create('debits', function (Blueprint $table) {
            $table->id();
            $table->string('forename')->nullable();
            $table->string('surename')->nullable();
            $table->string('p_country')->nullable();
            $table->string('street_address')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('c_country')->nullable();
            $table->string('email')->nullable();
            $table->string('confirm_email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('sort_code')->nullable();
            $table->string('debit_date')->nullable();
            $table->string('student_name1')->nullable();
            $table->string('student_group1')->nullable();
            $table->string('more_student')->nullable();
            $table->string('student_name2')->nullable();
            $table->string('student_group2')->nullable();
            $table->string('student_name3')->nullable();
            $table->string('student_group3')->nullable();
            $table->string('student_name4')->nullable();
            $table->string('student_group4')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debits');
    }
};
