<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\College::class)->unsigned()->index();
            $table->string('name');
            $table->string('grade');
            $table->enum('statue',['enable','disable'])->default('enable');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('college_id')
                ->references('id')
                ->on('sub_departments')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
