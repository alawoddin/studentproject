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
        Schema::create('paids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->references('id')->on('department')->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->unsignedBigInteger('subject_id')->references('id')->on('subject')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_id')->references('id')->on('teacher')->onDelete('cascade');
            $table->integer('total_fees');
            $table->integer('paid');
            $table->integer('remaining_Fees');
            $table->date('entry_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->string('method')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paids');
    }
};
