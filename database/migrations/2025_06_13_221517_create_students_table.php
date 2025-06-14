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
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->string('national_id')->unique();

            $table->unsignedBigInteger('teacher_id')->nullable();

            $table->time('time')->nullable();

            $table->timestamps();

            // کلید خارجی به جدول teachers
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
