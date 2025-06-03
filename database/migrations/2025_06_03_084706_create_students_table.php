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
                    $table->unsignedBigInteger('teacher_id');
                    $table->integer('department_id')->references('id')->on('department')->onDelete('cascade');
                    $table->string('name');
                    $table->string('lastname');
                    $table->string('father_name');
                    $table->string('depart_subject');
                    $table->string('phone_number');
                    $table->string('email')->unique();
                    $table->integer('amount');
                    $table->integer('paid');
                    $table->integer('remaining_fees');
                    $table->date('entry_date');
                    $table->date('paid_date');
                    $table->string('national_id')->unique();
                    $table->timestamps();

                    $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
                });

            }


        public function down()
            {
                Schema::dropIfExists('students');
            }

};
