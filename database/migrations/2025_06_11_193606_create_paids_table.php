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
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('department_id');
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('teacher_id');

        $table->integer('total_fees');
        $table->integer('paid');
        $table->integer('remaining_Fees');
        $table->enum('status', ['no_paid', 'paid'])->default('paid');
        $table->date('paid_date')->nullable();
        $table->string('method')->nullable();
        $table->string('order_date')->nullable();
        $table->string('order_month')->nullable();
        $table->string('order_year')->nullable();
        $table->timestamps();
    });

    // Add foreign keys only if referenced tables exist
    if (Schema::hasTable('students')) {
        Schema::table('paids', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }
    // Repeat for others...
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paids');
    }
};
