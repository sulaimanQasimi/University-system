<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->double('marks')->default(0);
            $table->string('passed')->nullable('fail');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('exam_id')->references('id')
                ->on('class_exams')->onDelete('CASCADE');
            $table->foreign('student_id')->references('id')
                ->on('students')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_results');
    }
}
