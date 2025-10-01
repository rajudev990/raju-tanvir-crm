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
        Schema::create('group_years', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->nullable();
            $table->string('name')->nullable();
            $table->string('list1')->nullable();
            $table->string('list2')->nullable();
            $table->string('list3')->nullable();
            $table->string('list4')->nullable();
            $table->string('year1')->nullable();
            $table->string('year2')->nullable();
            $table->string('year3')->nullable();
            $table->string('year4')->nullable();
            $table->string('year5')->nullable();
            $table->string('year6')->nullable();
            $table->string('year7')->nullable();
            $table->string('year8')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_years');
    }
};
