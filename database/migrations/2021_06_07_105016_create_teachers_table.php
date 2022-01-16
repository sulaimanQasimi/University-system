<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\College::class)->unsigned();
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->string('image')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('fathername')->nullable();
            $table->string('sex')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('field')->nullable();
            $table->integer('experience')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->double('salary')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
