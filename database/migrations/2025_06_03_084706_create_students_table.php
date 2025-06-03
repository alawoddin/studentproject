<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
            {
                Schema::create('students', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->string('lastname');
                    $table->string('father_name');
                    $table->string('department_name');
                    $table->string('subject_name');
                    $table->string('phone_number');
                    $table->string('email')->unique();
                    $table->integer('amount');
                    $table->integer('paid');
                    $table->integer('remaining_fees');
                    $table->date('entry_date');
                    $table->date('paid_date');
                    $table->string('national_id')->unique();
                    $table->timestamps();
                });
            }

        public function down()
            {
                Schema::dropIfExists('students');
            }

};
