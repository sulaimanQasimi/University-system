<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Classroom::class);;
            $table->foreignIdFor(\App\Models\Teacher::class);
            $table->foreignIdFor(\App\Models\Subject::class);
            $table->integer('chance')->default(1);
            $table->Integer('number_of_question');
            $table->double('question_mark');
            $table->double('pass_mark');
            $table->dateTime('date');
            $table->dateTime('result');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_exams');
    }
}
