<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stafs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('national_id')->unique();
            $table->string('roll_id')->unique();
            $table->integer('salary'); 
            $table->string('photo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stafs');
    }
};
