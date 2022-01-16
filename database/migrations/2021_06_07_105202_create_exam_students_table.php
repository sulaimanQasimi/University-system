<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id')->unsigned()->index();
            $table->foreignIdFor(\App\Models\Student::class);
            $table->boolean('active')->default(true);
            $table->double('successMark')->nullable(0);
            $table->double('mid')->nullable(0);
            $table->double('final')->nullable(0);
            $table->double('homework')->nullable(0);
            $table->double('classActivity')->nullable(0);
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
        Schema::dropIfExists('exam_students');
    }
}
