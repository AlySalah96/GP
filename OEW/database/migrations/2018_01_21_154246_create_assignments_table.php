<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('degree',8,4);
            $table->date('startDate');
            $table->time('startTime');
            $table->date('expiredDate');
            //$table->timedate('expiredTime');
            $table->text('cntent');
            $table->integer('id_course');
            //$table->Foreign('id_course')->references('id')->on('courses');
            $table->integer('id_student');
            //$table->Foreign('id_student')->references('id')->on('students');
            $table->integer('id_examiner');
            //$table->Foreign('id_examiner')->references('id')->on('examiners');
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
        Schema::dropIfExists('assignments');
    }
}
