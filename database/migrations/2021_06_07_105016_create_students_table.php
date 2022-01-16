<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {

            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->foreignIdFor(\App\Models\College::class)->nullable();

            $table->string('kankor_id')->nullable()->unique();
            $table->string('school')->nullable();
            $table->year('year')->nullable();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('fathername')->nullable();
            $table->string('grandfathername')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('sex')->nullable();
            $table->string('grade')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->nullable('active')->default(1);
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
        Schema::dropIfExists('students');
    }
}
