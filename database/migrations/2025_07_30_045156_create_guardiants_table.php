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
        Schema::create('guardiants', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('confirm')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_number_code')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('time_table')->nullable();
            $table->bigInteger('total_students')->nullable();
            $table->string('year_group_id');
            $table->string('package_id');
            $table->string('plan_id');
            $table->string('course_fee_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardiants');
    }
};
