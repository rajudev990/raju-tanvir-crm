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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_year_id')->nullable();
            $table->bigInteger('qualification_package_id')->nullable();
            $table->string('name')->nullable();
            $table->string('subject_selector')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('total_subjects')->nullable();
            $table->string('locked')->default(1);
            $table->string('hifdh_programme')->nullable();
            $table->bigInteger('hifdh_status')->default(1);
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
