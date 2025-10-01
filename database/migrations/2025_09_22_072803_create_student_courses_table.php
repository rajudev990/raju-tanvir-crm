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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->string('group_id')->nullable();
            $table->string('year_id')->nullable();
            $table->string('package_id')->nullable();
            $table->json('language')->nullable();
            $table->json('core_subject')->nullable();
            $table->json('islamic_subject')->nullable();
            $table->json('additional_subject')->nullable();
            $table->string('hifdh')->nullable();
            $table->string('hifdh_text')->nullable();
            $table->string('plan_text_one')->nullable();
            $table->string('plan_text_two')->nullable();
            $table->string('plan_text_three')->nullable();
            $table->string('plan_text_four')->nullable();
            $table->string('plan_text_five')->nullable();
            $table->string('plan_text_six')->nullable();
            $table->string('m_regular_price')->nullable();
            $table->string('m_discount_price')->nullable();
            $table->string('m_discount')->nullable();
            $table->string('m_list_one')->nullable();
            $table->string('m_list_two')->nullable();
            $table->string('m_list_three')->nullable();
            $table->string('m_list_four')->nullable();
            $table->string('m_list_five')->nullable();
            $table->string('m_list_six')->nullable();
            $table->string('a_regular_price')->nullable();
            $table->string('a_discount_price')->nullable();
            $table->string('a_discount')->nullable();
            $table->string('a_list_one')->nullable();
            $table->string('a_list_two')->nullable();
            $table->string('a_list_three')->nullable();
            $table->string('a_list_four')->nullable();
            $table->string('a_list_five')->nullable();
            $table->string('a_list_six')->nullable();
            $table->string('t_regular_price')->nullable();
            $table->string('t_discount_price')->nullable();
            $table->string('t_discount')->nullable();
            $table->string('t_list_one')->nullable();
            $table->string('t_list_two')->nullable();
            $table->string('t_list_three')->nullable();
            $table->string('t_list_four')->nullable();
            $table->string('t_list_five')->nullable();
            $table->string('t_list_six')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
