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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('course_id')->nullable();
            $table->float('amount')->nullable();
            $table->string('stripe_transaction_id')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_last4')->nullable();
            $table->string('authorization_code')->nullable();
            $table->string('merchant_name')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
