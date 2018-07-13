<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('startDate');
            $table->date('expiredDate');
            $table->longtext('description');
            $table->string('school_name');
            //$table->longblob('image');
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
        Schema::dropIfExists('courses');
    }
}
