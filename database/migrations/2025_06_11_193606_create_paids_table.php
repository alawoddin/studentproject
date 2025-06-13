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
            $table->string('student');
            $table->string('department');
            $table->string('subject');
            $table->string('teacher');
            $table->integer('total_fees');
            $table->integer('paid');
            $table->integer('remaining_Fees');
            $table->date('entry_date');
            $table->date('paid_date');
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
