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
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('form_submission_id')
                ->constrained('form_submissions')
                ->cascadeOnDelete();

            // Step 1
            $table->bigInteger('user_id')->nullable();
            $table->string('selected_school')->nullable();

            // Step 2 - Primary Parent/Guardian
            $table->string('title')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('relationship')->nullable();
            $table->string('email')->nullable();
            $table->string('confirm_email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('home_telephone')->nullable();
            $table->string('work_number')->nullable();
            $table->string('address')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();

            // Step 2 - Secondary Parent/Guardian
            $table->string('secondary_title')->nullable();
            $table->string('secondary_fname')->nullable();
            $table->string('secondary_lname')->nullable();
            $table->string('secondary_relationship')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('secondary_confirm_email')->nullable();
            $table->string('secondary_mobile_number')->nullable();
            $table->string('secondary_home_telephone')->nullable();
            $table->string('secondary_work_number')->nullable();
            $table->string('secondary_address')->nullable();
            $table->string('secondary_apartment')->nullable();
            $table->string('secondary_city')->nullable();
            $table->string('secondary_province')->nullable();
            $table->string('secondary_postal_code')->nullable();
            $table->string('secondary_country')->nullable();
            $table->string('file3')->nullable();
            $table->string('file4')->nullable();

            // Step 3 (Students - Multiple, আলাদা টেবিল দরকার হবে)
            // এখানে শুধু parent id রাখছি
            // children টেবিলে child records save হবে
            $table->json('student')->nullable();

            // Step 4
            $table->string('health_care')->nullable();
            $table->string('previus_school')->nullable();
            $table->string('access_protocol')->nullable();
            $table->string('aythority')->nullable();
            $table->string('name')->nullable();
            $table->string('special_education')->nullable();
            $table->string('medical_condition')->nullable();
            $table->string('direct_placement')->nullable();
            $table->string('accpet')->nullable();
            $table->string('authority')->nullable();
            $table->string('assigned')->nullable();
            $table->string('percentage')->nullable();

            // Step 5
            $table->json('packages')->nullable();

            // Step 6
            $table->string('signature')->nullable();
            $table->string('signature_accept')->nullable();

            // Step 7 - Payment Info
            $table->string('payment_email')->nullable();
            $table->string('payment_country')->nullable();
            $table->string('payment_postal_code')->nullable();
            $table->string('payment_accept')->nullable();

            // Payment transaction details
            $table->string('status')->default('pending');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('currency')->nullable();
            $table->timestamp('payment_date')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
