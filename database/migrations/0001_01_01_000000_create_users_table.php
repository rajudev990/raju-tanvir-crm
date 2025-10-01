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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('year_group_id');
            $table->string('package_id');
            $table->string('plan_id');
            $table->string('course_fee_id');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
