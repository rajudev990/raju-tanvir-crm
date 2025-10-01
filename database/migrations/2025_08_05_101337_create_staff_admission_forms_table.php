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
        Schema::create('staff_admission_forms', function (Blueprint $table) {
            $table->id();
            $table->string('job_applied_for')->nullable();
            $table->string('forename')->nullable();
            $table->string('middle_names')->nullable();
            $table->string('surname')->nullable();
            $table->string('preferred_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('home_telephone')->nullable();
            $table->string('street_address')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('county_state_region')->nullable();
            $table->string('zip_postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('uk_work')->nullable();
            $table->string('dbs')->nullable();
            $table->string('emergency_forename')->nullable();
            $table->string('emergency_surname')->nullable();

            $table->string('profile_photo')->nullable();
            $table->string('prof_of_id')->nullable();
            $table->string('prof_of_address')->nullable();
            $table->string('certificated')->nullable();
            $table->string('dbs_one')->nullable();
            $table->string('cv')->nullable();
            $table->string('bank_type')->nullable();
            $table->string('international_account_name')->nullable();
            $table->string('international_bank_name')->nullable();
            $table->string('international_account_number')->nullable();
            $table->string('uk_account_name')->nullable();
            $table->string('uk_bank_name')->nullable();
            $table->string('uk_account_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('branch')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('sort_code')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_admission_forms');
    }
};
