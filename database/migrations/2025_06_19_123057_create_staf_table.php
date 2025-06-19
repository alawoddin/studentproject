<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staf', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('photo');
            $table->string('national_id')->unique();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('roll_id')->unique();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staf');
    }
};
